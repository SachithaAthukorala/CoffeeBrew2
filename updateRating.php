<?php
require "connection.php";
session_start();
if (isset($_SESSION["ud"])) {
    $id = $_GET["id"];
    $rate = $_GET["check"];

    if ($rate == "1") {
        Database::iud("UPDATE `menu` SET `menu_rating_top_id` = 1 WHERE `id` = '" . $id . "'");
    } else {
        Database::iud("UPDATE `menu` SET `menu_rating_top_id` = 2 WHERE `id` = '" . $id . "'");
    }

    echo ("Rating Updated Successfully");
} else {
    header("Location:adminsignIn.php");
}
