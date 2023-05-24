<?php

include_once('../includes/connection.php');

if ($_REQUEST['page'] == 'users') {
    $sql = "SELECT id, username, status FROM `users` where type='user'";
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
}



if ($_REQUEST['page'] == 'formdata') {
    $sql = "SELECT *  FROM `formData` ";
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
}
