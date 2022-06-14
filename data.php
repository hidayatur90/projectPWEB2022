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

    function read()
    {
        $begin = isset($_GET['begin']) ? $_GET['begin'] : 0;
        $query = "SELECT * FROM books ORDER BY Name ASC LIMIT {$begin}, 9";
        $sql = $this -> db -> query($query);
        $data = [];
        while ($row = $sql -> fetch_assoc()) {
            if (file_exists("img/{$row['id']}.jpg")) {
                $row['thumbnail'] = "img/{$row['id']}.jpg";
            } else {
                $row['thumbnail'] = "img/no-image.jpg";
            }
            array_push($data, $row);
        }

        header("Content-Type: application/json");
        echo json_encode($data);
    }

    function create($data)
    {
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = (strlen($value) > 0 ? $value : NULL);
        }
        
        $query = "INSERT INTO books VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $this -> db -> prepare($query);
        $sql -> bind_param(
            'ssisiis',
            $data['Name'],
            $data['author_id'],
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
        $sql -> close();

    }
}

$book = new Book();
// $book-> read();
switch ($_GET['action']) {
    case 'create':
        $book -> create($_POST);
        break;
    
    default:
        $book -> read();
        break;
}