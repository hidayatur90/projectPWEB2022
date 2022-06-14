<?php

require_once('db.php');

$db = new mysqli(HOST,USER,PASS, DB);
if($db->connect_error){
    http_response_code(500);
    die("Connection Failed: {$db->connect_error}");
}

$query = "SELECT * FROM genre ORDER BY id";
$sql = $db->query($query);
$data = [];

while($row = $sql->fetch_assoc()){
    array_push($data, $row);
}

header("Content-Type: application/json");
echo json_encode($data);

?>