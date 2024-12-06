<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->Mailer = "smtp";
    // $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "pharmaease.info@gmail.com";
    $mail->Password   = "mgbo dlkk ukoo feve";
    
    $mail->IsHTML(true);
    $mail->AddAddress("miguelynigopineda@gmail.com", "sel");
    $mail->SetFrom("pharmaease.info@gmail.com", "pharmaease");
    // $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
    // $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
    $mail->Subject = "Test Email sent via Gmail SMTP Server using PHP Mailer";
    $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
    
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
    } else {
      echo "Email sent successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Test</title>
</head>
<body>
    <form method="POST">
        <button type="submit">Send Test Email</button>
    </form>
</body>
</html>