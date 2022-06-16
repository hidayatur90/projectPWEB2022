<?php

require_once("db.php");

class Book
{
    private $db;

    function __construct()
    {
        $this -> db = new mysqli(HOST, USER, PASS, DB);
        if ($this -> db -> connect_error) {
            die("koneksi gagal");
        }
    }

    function read(){
        $begin = isset($_GET['begin']) ? $_GET['begin'] : 0;
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $query = "SELECT books.*,genre.genre FROM books
            JOIN genre ON books.genre_id = genre.id
            WHERE Name LIKE '%{$search}%'
            ORDER BY books.Name ASC
            LIMIT {$begin}, 4";
        $sql = $this->db->query($query);
        $data = [];

        while($row = $sql->fetch_assoc()){
            if(file_exists("assets/img/{$row['id']}.jpg")){
                $row['img'] = "assets/img/{$row['id']}.jpg";
            } else{
                $row['img'] = "assets/img/no-image.png";
            }
            array_push($data, $row);
        }

        header("Content-Type: application/json");
        echo json_encode($data);
    }

    function readOrder($order){
        $begin = isset($_GET['begin']) ? $_GET['begin'] : 0;
        $genre = isset($_GET['genre']) ? $_GET['genre'] : 0;

        if($genre==0 || $genre==''){       
            $query = "SELECT books.*,genre.genre FROM books
                JOIN genre ON books.genre_id = genre.id
                ORDER BY books.Name {$order}
                LIMIT {$begin}, 4";
                $sql = $this->db->query($query);
        } else{
            $query = "SELECT books.*,genre.genre FROM books
                JOIN genre ON books.genre_id = genre.id
                WHERE books.genre_id = '{$genre}'
                ORDER BY books.Name {$order}
                LIMIT {$begin}, 4";
            $sql = $this->db->query($query);
        }

        $data = [];

        while($row = $sql->fetch_assoc()){
            if(file_exists("assets/img/{$row['id']}.jpg")){
                $row['img'] = "assets/img/{$row['id']}.jpg";
            } else{
                $row['img'] = "assets/img/no-image.png";
            }
            array_push($data, $row);
        }

        header("Content-Type: application/json");
        echo json_encode($data);
    }

    function get_max_id(){
        require_once("db.php");
        $query = "SELECT max(id) as id FROM author";
        $result = $this->db->query($query); 
        $sql = 0;
        while ($row = $result->fetch_assoc()){
            $sql += $row['id'];
        }
        return $sql+1;
    }

    function create_author($data)
    {
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = (strlen($value) > 0 ? $value : NULL);
        }
        
        $query = "INSERT INTO author VALUES(NULL, ?)";
        $sql = $this->db->prepare($query);
        $sql -> bind_param(
            's',
            $data['author_id']
        );
        
        try {
            $sql -> execute();
        } catch (\Exception $e) {
            $sql -> close();
            http_response_code(500);
            die($e -> getMessage());
        }
        $sql -> close();
    }

    function create($data)
    {
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = (strlen($value) > 0 ? $value : NULL);
        }

        $auth_id = $this->get_max_id();
        $this->create_author($data);
        
        $query = "INSERT INTO books VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $this -> db -> prepare($query);
        $sql -> bind_param(
            'sididii',
            $data['Name'],
            $auth_id,
            $data['Rating'],
            $data['Reviews'],
            $data['Price'],
            $data['Year'],
            $data['genre_id']
        );
        
        try {
            $sql -> execute();
        } catch (\Exception $e) {
            $sql -> close();
            http_response_code(500);
            die($e -> getMessage());
        }
        $book_id = $sql->insert_id;
        $sql -> close();
        return $book_id;
    }

    function detail($id)
    {
        $query = "SELECT books.*, author.name AS Author
            FROM books LEFT JOIN author ON books.author_id = author.id 
            WHERE books.id={$id}";
        
        $sql = $this -> db -> query($query);
        $data = $sql->fetch_assoc();

        header("Content-Type: application/json");
        echo json_encode($data);
    }

    function update($data)
    {   

        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = (strlen($value) > 0 ? $value : NULL);
        }

        $auth_id = $this->get_max_id();
        // $book_id = $data['id'];
        $query = "UPDATE books 
                SET Name=?,
                    author_id=?,
                    Rating=?,
                    Reviews=?,
                    Price=?,
                    Year=?,
                    genre_id=?
                WHERE id=?";
        $sql = $this -> db -> prepare($query);
        $sql -> bind_param(
            'sididiii',
            $data['Name'],
            $auth_id,
            $data['Rating'],
            $data['Reviews'],
            $data['Price'],
            $data['Year'],
            $data['genre_id'],
            $data['id'],
        );
        
        try {
            $sql -> execute();
        } catch (\Exception $e) {
            $sql -> close();
            http_response_code(500);
            die($e -> getMessage());
        }
        $sql -> close();
        // $this->create($data);
        // $this->delete();
        return $book_id;
    }

    function delete($book_id) {
        $query = "DELETE FROM books
            WHERE books.id=?";
            
        $sql = $this -> db -> prepare($query);
        $sql -> bind_param(
            'i',
            $book_id
        );
        
        try {
            $sql -> execute();
        } catch (\Exception $e) {
            $sql -> close();
            http_response_code(500);
            die($e -> getMessage());
        }
        $sql -> close();

        header("Content-Type: application/json");
        echo json_encode($data);
    }

}

$book = new Book();
// $book->read();
switch ($_GET['action']) {
    case 'create':
        $book_id = $book -> create($_POST);
        move_uploaded_file($_FILES['img']['tmp_name'], "assets/img/{$book_id}.jpg");
        break;
    case 'detail':
        $book -> detail($_GET['id']);
        break;
    case 'update':
        $book_id = $book -> update($_POST);
        move_uploaded_file($_FILES['img']['tmp_name'], "assets/img/{$book_id}.jpg");
        break;
    case 'delete':
        $book -> delete($_GET['id']);
        unlink("assets/img/{$_GET['id']}.jpg");
        header("Location: main.php");
        break;
    default:
        switch ($_GET['order']) {
            case 'ASC':
                $book -> readOrder('ASC');
                break;
            case 'DESC':
                $book -> readOrder('DESC');
                break;
            default:
                $book -> read();
                break;
            }
        break;
}