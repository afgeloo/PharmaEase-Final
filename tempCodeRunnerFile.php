<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendStyledOrderStatusEmail($toEmail, $toName, $orderId, $status) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';        // Replace with your SMTP host
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_email@example.com';  // SMTP username
        $mail->Password   = 'your_password';           // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('no-reply@pharmaease.com', 'PharmaEase');
        $mail->addAddress($toEmail, $toName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Your Order #$orderId Status Update";

        // HTML Email Template
        $mail->Body = "
            <html>
            <head>
                <style>
                    body { 
                        font-family: 'Varela Round', Arial, sans-serif; 
                        color: #333333; 
                        margin: 0; 
                        padding: 0; 
                        background-color: #f4f4f4; 
                    }
                    .container { 
                        width: 100%; 
                        max-width: 600px; 
                        margin: 0 auto; 
                        background-color: #ffffff; 
                        border: 1px solid #dddddd; 
                    }
                    .header { 
                        background-color: #88c273; 
                        padding: 20px; 
                        text-align: center; 
                    }
                    .header img { 
                        max-width: 150px; 
                    }
                    .content { 
                        padding: 20px; 
                    }
                    .content h2 { 
                        color: #5d257c; 
                    }
                    .button {
                        background-color: #5d257c;
                        color: #ffffff;
                        padding: 10px 20px;
                        text-decoration: none;
                        border-radius: 5px;
                        display: inline-block;
                        margin-top: 20px;
                    }
                    .footer {
                        background-color: #333333;
                        color: #ffffff;
                        text-align: center;
                        padding: 10px;
                        font-size: 12px;
                    }
                    @media only screen and (max-width: 600px) {
                        .container { width: 100% !important; }
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <img src='https://pharmaease.com/assets/PharmaEaseLogo.png' alt='PharmaEase Logo'>
                    </div>
                    <div class='content'>
                        <h2>Hi {$toName},</h2>
                        <p>We're excited to let you know that your order <strong>#{$orderId}</strong> is now <strong>{$status}</strong>.</p>
                        <p>You can view your order details by clicking the button below:</p>
                        <a href='https://pharmaease.com/orders/{$orderId}' class='button'>View Order</a>
                        <p>If you have any questions, feel free to contact our support team.</p>
                        <p>Thank you for choosing PharmaEase!</p>
                        <p>Best regards,<br/>PharmaEase Team</p>
                    </div>
                    <div class='footer'>
                        &copy; " . date('Y') . " PharmaEase. All rights reserved.<br/>
                        123 Pharma Street, Health City, HC 12345
                    </div>
                </div>
            </body>
            </html>
        ";

        // Plain Text Alternative
        $mail->AltBody = "Hi {$toName},\n\nYour order #{$orderId} is now {$status}.\n\nYou can view your order details here: https://pharmaease.com/orders/{$orderId}\n\nThank you for choosing PharmaEase!\n\nBest regards,\nPharmaEase Team";

        $mail->send();
    } catch (Exception $e) {
        // Handle error
    }
    // Example usage
$toEmail = "miguelynigopineda@gmail.com";
$toName = "Miguel Pineda";
$orderId = 12345;
$status = "Shipped";

sendStyledOrderStatusEmail($toEmail, $toName, $orderId, $status);
}