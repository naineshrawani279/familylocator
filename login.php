<?php

include_once 'dbconnect.php';

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        $successmsg = "Succesfully Logged in";
        echo $successmsg;
    } else {
        $errormsg = "Incorrect Email or Password!";
        echo $errormsg;
    }
}
?>
