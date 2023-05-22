<?php
include_once('../includes/connection.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "SELECT * FROM `users` WHERE username = '$username' and email = '$email' and `type` = 'admin'";
    $res = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($res);
    if ($total > 0) {
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $_SESSION["ID"] = $id;
        $_SESSION["USERNAME"] = $row['username'];
        // header('location:admin.php');
        $sucMsg = array('status' => 200);
        echo json_encode($sucMsg);
    } else {
        $errMsg = array('msg' => 'Please Enter Correct Login Details');
        echo json_encode($errMsg);
    }
}

if (isset($_POST['view'])) {
    $val = $_POST['viewVal'];
    $sql = "SELECT * FROM `users` WHERE id = '$val'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $name = $row['username'];
    $email = $row['email'];
    $status = $row['status'];
    $viewMsg = array('name' => $name, 'email' => $email, 'status' => $status,);
    echo json_encode($viewMsg);
}

if (isset($_POST['delete'])) {
    $id = $_POST['delVal'];
    $sql = "DELETE FROM `users` WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    $arr = array('msg' => 'Data Deleted Succesfully');
    echo json_encode($arr);
}



if (isset($_POST['status'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `users` WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $status = $row['status'];

    // $status = '';
    if ($status == 'active') {
        $status = "deactive";
    } elseif ($status == 'deactive') {
        $status = "active";
    }

    $sql2 = "UPDATE `users` SET `status`='$status' WHERE id = '$id'";
    $res2 = mysqli_query($conn, $sql2);
    $arr = array('msg' => 'Status Updated Succesfully');
    echo json_encode($arr);
}

if (isset($_POST['insert'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $status = $_POST['selstatus'];

    $sql = "INSERT INTO `users`(`username`, `email`, `status`) VALUES ('$name','$email','$status')";
    $res = mysqli_query($conn, $sql);
    $arr = array('msg' => 'Data inserted succesfully');
    echo json_encode($arr);
}
