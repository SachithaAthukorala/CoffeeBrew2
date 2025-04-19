<?php
require "email/SMTP.php";
require "email/PHPMailer.php";
require "email/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;


$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$contactUsEmail = 'sachithathedeveloper@gmail.com';

if (empty($name)) {
    echo ("Please Enter Your Name");
} else if (strlen($name) > 50) {
    echo ("Name length must between 50 characters");
} else if (empty($email)) {
    echo ("Please Enter Your Email");
} else if (strlen($email) > 100) {
    echo ("Email length must between 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email address");
} else if (empty($message)) {
    echo ("Please Enter Your Message");
} else if (strlen($message) > 500) {
    echo ("Message length must between 500 characters");
} else {

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
    $mail->addAddress($contactUsEmail);
    $mail->isHTML(true);
    $mail->Subject = 'CoffeeBrew Contact Us Form';
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
            <h1>CoffeeBrew Contact Form Submission</h1>
        </div>
        <div class="content">
            <h2>Hello, CoffeeBrew Team!</h2>
            <p>You have received a new message from your website contact form.</p>

            <p style="font-size: 16px;"><strong>Name:</strong> ' . htmlspecialchars($name) . '</p>
            <p style="font-size: 16px;"><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
            <p style="font-size: 16px;"><strong>Message:</strong></p>
            <p style="font-size: 16px;">' . nl2br(htmlspecialchars($message)) . '</p>

            <p>Thank you for connecting with us!</p>
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
        echo ("success");
    }
}
