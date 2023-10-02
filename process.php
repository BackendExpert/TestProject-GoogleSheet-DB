<?php

$mysqli = new mysqli("localhost", "php_data", "root", "");
// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();

} else {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['message'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $mobile = htmlspecialchars(trim($_POST['mobile']));
        $msg = htmlspecialchars(trim($_POST['message']));
    }

    $sql = "INSERT INTO user_tbl(name,email,mobile,message) VALUES ('" . addslashes($name) . "', '" . addslashes($email) . "','" . addslashes($mobile) . "', '" . addslashes($msg) . "')";

    if (mysqli_query($mysqli, $sql)) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Thank you!</strong> You you have sent message successfullly we will get back to you soon...
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

    } else {
        echo "something went wrong!.." . $message;
    }
    // echo "data submit  in database";
}