<?php
require "connection.php";

session_start();

$email = $_POST["email"];
$pass = $_POST["pass"];
$remeber = $_POST["rmbrme"];

$user_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "' AND `password`='" . $pass . "'");
$user_num = $user_rs->num_rows;

if ($user_num == 1) {
    $user_data = $user_rs->fetch_assoc();

    $_SESSION["ud"] = $user_data;

    if ($remeber == "true") {
        setcookie("email", $email, time() + (60 * 60 * 24 * 365));
        setcookie("password", $pass, time() + (60 * 60 * 24 * 365));
    } else {
        setcookie("email", "", -1);
        setcookie("password", "", -1);
    }

    echo ("success");
} else {
    echo ("Not a valid Email or Password");
}
