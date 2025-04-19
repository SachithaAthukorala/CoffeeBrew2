<?php
require "connection.php";
require "email/SMTP.php";
require "email/PHPMailer.php";
require "email/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

session_start();
if (isset($_SESSION["ud"])) {

    $email = $_GET["email"];
    $reservation_id = $_GET["res_id"];

    $booking_rs = Database::search("SELECT reservation.table AS table_number, reservation.date_time,user.fname, user.lname FROM reservation INNER JOIN user ON reservation.user_id = user.id  WHERE reservation.id = '" . $reservation_id . "';");
    $booking_data = $booking_rs->fetch_assoc();
    $customerName = $booking_data["fname"] . ' ' . $booking_data["lname"];
    $tableNo = $booking_data["table_number"];
    $reservationDate = date("Y-m-d h:i A", strtotime($booking_data["date_time"]));

    Database::iud("UPDATE `reservation` SET `email_sent_status_id` = 2 WHERE `id` = '" . $reservation_id . "';");
    

    $mail = new PHPMailer;

    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'emailsender138@gmail.com';
    $mail->Password = 'abmesauzpvgpeqao';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('emailsender138@gmail.com', 'CoffeeBrew');
    $mail->addReplyTo('emailsender138@gmail.com', 'CoffeeBrew');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'CoffeeBrew Reservation Confirmation';
    $bodyContent = '<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #6f4e37;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #6f4e37;
            font-size: 20px;
        }

        .content p {
            margin: 10px 0;
            line-height: 1.6;
            color: #333333;
        }

        .reservation-details {
            background-color: #f9f6f2;
            border: 1px solid #e0dcd7;
            border-radius: 6px;
            padding: 16px;
            margin: 18px 0;
        }

        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>CoffeeBrew Reservation Confirmation</h1>
        </div>
        <div class="content">
            <h2>Hello,
                ' . htmlspecialchars($customerName) . '!
            </h2>
            <p>Thank you for reserving a table at <strong>CoffeeBrew</strong>. We’re excited to welcome you!</p>
            <div class="reservation-details">
                <p style="font-size: 16px;"><strong>Reservation Details</strong></p>
                <p style="font-size: 16px;"><strong>Name:</strong>
                    ' . htmlspecialchars($customerName) . '
                </p>
                <p style="font-size: 16px;"><strong>Table Number:</strong>
                    ' . htmlspecialchars($tableNo) . '
                </p>
                <p style="font-size: 16px;"><strong>Date:</strong>
                    ' . htmlspecialchars($reservationDate) . '
                </p>
            </div>
            <p>If you need to modify or cancel your reservation, please reply to this email or call us at <a
                    href="tel:+1234567890">+94 70 111 1111</a>.</p>
            <p>We look forward to serving you a perfect cup!</p>
        </div>
        <div class="footer">
            <p class="m-0" style="color: #bdc3c7;">&copy; 2025 Your Coffee Brew. All rights reserved by
                <a href="https://www.linkedin.com/in/sachitha-athukorala" style="color: #3498db; text-decoration: none;">Sachitha
                    Athukorala</a>.
            </p>
        </div>
    </div>
</body>

</html>';
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo ("Verification code sending failed");
    } else {
        echo ("Customer Confirmed Successfully");
    }
} else {
    header("Location:adminsignIn.php");
}
