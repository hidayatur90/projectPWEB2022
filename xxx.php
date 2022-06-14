<?php


// function get_max_id(){
//     require_once("db.php");
//     $query = "SELECT max(id) as id FROM author";
//     $result = $db->query($query); 
//     $sql = 0;
//     while ($row = $result->fetch_assoc()){
//         $sql += $row['id'];
//     }
//     return $sql+1;
// }
// echo get_max_id();


function read_detail($book_id)
{
    require_once("db.php");
    $query = "SELECT books.*, author.name AS Author, genre.genre AS Genre 
        FROM books 
        JOIN author ON books.author_id = author.id 
        JOIN genre ON books.genre_id = genre.id 
        WHERE books.id=$book_id";
        
    $sql = $db -> query($query);
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
    return json_encode($data);
}

read_detail(3);