<?php
require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$date = $_POST["date"];
$time = $_POST["time"];
$mobile = $_POST["mobile"];
$message = $_POST["message"];

$datetime = $date . ' ' . $time;
echo $datetime;
if (empty($fname)) {
    echo ("Please Enter Your First Name");
} else if (strlen($fname) > 25) {
    echo ("Name length must between 25 characters");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} else if (strlen($lname) > 25) {
    echo ("Name length must between 25 characters");
} else if (empty($email)) {
    echo ("Please Enter Your Email");
} else if (strlen($email) > 100) {
    echo ("Email length must between 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email address");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile Number");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number must have 10 characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo ("Invalid Mobile Number");
} else if (empty($message)) {
    echo ("Please Enter Your Message");
} else if (strlen($message) > 500) {
    echo ("Message length must between 500 characters");
} else {


    function book($datetime, $email, $message)
    {

        $reservedTablesResult = Database::search("SELECT `table` FROM `reservation` WHERE `date_time`='" . $datetime . "'");
        $reservedTables = array();
        while ($row = $reservedTablesResult->fetch_assoc()) {
            $reservedTables[] = $row['table'];
        }

        $allTables = range(1, 10);
        $availableTables = array_diff($allTables, $reservedTables);

        if (empty($availableTables)) {
            echo "All tables are booked for this time.";
            return;
        } else {
            $selectedTable = reset($availableTables);

            $userResult = Database::search("SELECT `id` FROM `user` WHERE `email`='" . $email . "'");
            if ($userResult->num_rows > 0) {
                $userId = $userResult->fetch_assoc()['id'];

                Database::iud("INSERT INTO `reservation`(`user_id`, `date_time`, `table`, `message`, `email_sent_status_id`) 
                           VALUES ('" . $userId . "','" . $datetime . "'," . $selectedTable . ",'" . $message . "',1)");

                echo "Success! Table " . $selectedTable . " has been booked.";
            } else {
                echo "Error: User not found.";
            }
        }
    }

    $userResult = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    if ($userResult->num_rows > 0) {

        book($datetime, $email, $message);
    } else {

        Database::iud("INSERT INTO `user`(`fname`, `lname`, `email`, `mobile`) 
                   VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "')");

        book($datetime, $email, $message);
    }
}
