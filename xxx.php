<?php


function get_max_id(){
    require_once("db.php");
    $query = "SELECT max(id) as id FROM author";
    $result = $db->query($query); 
    $sql = 0;
    while ($row = $result->fetch_assoc()){
        $sql += $row['id'];
    }
    return $sql+1;
}
echo get_max_id();