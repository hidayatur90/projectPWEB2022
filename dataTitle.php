<?php
require_once("./db.php");

$search = $_GET["search"];

$sql = "SELECT books.*, genre.genre FROM books
        JOIN genre ON books.genre_id = genre.id
        WHERE Name LIKE '%{$search}%' 
        LIMIT 4";

$result = $db->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
}
header("Content-Type: aplication/json");
echo json_encode($data);

