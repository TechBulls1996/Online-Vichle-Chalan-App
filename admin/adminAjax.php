<?php
include_once('../includes/connection.php');

if (isset($_POST['login'])) {
    $tableName = 'users';
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    //$myHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM $tableName WHERE username = '$username' AND type='admin'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        // User with the given email exists, check the password
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, user is authenticated

            $_SESSION['USERNAME'] = $row['username'];
            $_SESSION['LOGIN'] = true;
            $_SESSION['ID'] = $row['id'];

            $sucMsg = array('status' => 200);
            echo json_encode($sucMsg);
        } else {
            $errMsg = array('msg' => 'please Enter Correct Login Details');
            echo json_encode($errMsg);
        }
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
    $email = $row['username'];
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
