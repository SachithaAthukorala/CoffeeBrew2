<?php
require "connection.php";
session_start();
if (isset($_SESSION["ud"])) {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $details = $_POST["details"];
    $category = $_POST["category"];
    $status = $_POST["status"];
    $modelType = $_POST["modelType"];
    $menu_id = $_POST["menuId"];

    if (empty($name)) {
        echo "Please enter a Name.";
    } else if (strlen($name) > 100) {
        echo "Name should have less than 100 characters.";
    } else if (empty($price)) {
        echo "Please enter the Price.";
    } else if (!is_numeric($price) || $price <= 0) {
        echo "Invalid input for Price.";
    } else if (empty($details)) {
        echo "Please enter the Details.";
    } else if (empty($category)) {
        echo "Please select a Category.";
    } else if (empty($status) || ($status != "1" && $status != "2")) {
        echo "Status must be either 'Available' or 'Unavailable'.";
    } else {

        if ($modelType == 1) {
            $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

            if (isset($_FILES["img1"])) {
                $img_file = $_FILES["img1"];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extentions)) {

                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "img/menu/" . $name  . "_" . uniqid() . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `menu` (`name`, `price`, `description`, `menu_status_id`, `menu_type_id`, `menu_rating_top_id`, `img_path`) VALUES('" . $name . "','" . $price . "','" . $details . "','1','" . $category . "',' 2 ','" . $file_name . "')");
                    echo ("success");
                } else {
                    echo ("Invalid Image type");
                }
            } else {
                echo ("No image uploaded");
            }
        } else if ($modelType == 2) {
            $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

            if (isset($_FILES["img1"]) && $_FILES["img1"]["error"] == UPLOAD_ERR_OK) {
                $img_file = $_FILES["img1"];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extentions)) {

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    } else {
                        $new_img_extention = "";
                    }

                    $file_name = "img/menu/" . $name  . "_" . uniqid() . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud(
                        "UPDATE `menu` SET `name` = '" . $name . "',`price` = '" . $price . "',`description` = '" . $details . "',`menu_status_id` = '" . $status . "',`menu_type_id` = '" . $category . "' `img_path` = '" . $file_name . "' WHERE `id` = '" . $menu_id . "'"
                    );
                    echo ("successs");
                } else {
                    echo ("Invalid Image type");
                }
            } else {
                Database::iud("UPDATE `menu` SET `name` = '" . $name . "',`price` = '" . $price . "',`description` = '" . $details . "',`menu_status_id` = '" . $status . "',`menu_type_id` = '" . $category . "' WHERE `id` = '" . $menu_id . "'");
                echo ("successs");
            }
        }
    }
} else {
    echo ("Not a valid Email or Password please SignIn");
}
