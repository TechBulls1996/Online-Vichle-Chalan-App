<?php

include_once('../includes/connection.php');
$sql = "SELECT * FROM `users`";
$res = mysqli_query($conn, $sql);
$array = [];
while ($row = mysqli_fetch_assoc($res)) {
    $array[] = $row;
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
