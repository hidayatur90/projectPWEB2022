<?php

require_once("./db.php");

$genre = $_GET["genre"];

if (strlen($genre) > 0)
{
    $sql = "SELECT books.*, genre.genre FROM books
            JOIN genre ON books.genre_id = genre.id
            WHERE genre_id = '{$genre}'
            LIMIT 4";
}

else if (strlen($genre) == 0)
{
    $sql = "SELECT books.*, genre.genre FROM books
            JOIN genre ON books.genre_id = genre.id
            ORDER BY books.id ASC
            LIMIT 4";
}

$result = $db->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
}
header("Content-Type: aplication/json");
echo json_encode($data);

