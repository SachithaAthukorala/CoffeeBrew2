<?php
require "connection.php";
session_start();
$session_pwd = $_SESSION["ud"]["password"];

$email = $_POST["email"];
$pass = $_POST["pass"];

if ($pass == $session_pwd) {
    echo "Current Password & New Password is Same";
} else if (empty($pass)) {
    echo ("Please Enter Your Password");
} else if (strlen($pass) < 5 || strlen($pass) > 30) {
    echo ("Password length must be between 5 and 30");
} else {
    $user_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {
        Database::iud("UPDATE `admin` SET `password`='" . $pass . "' WHERE `email` = '" . $email . "'");
        setcookie("password", "", -1);
        echo ("success");
    } else {
        echo ("Not a valid User");
    }
}
