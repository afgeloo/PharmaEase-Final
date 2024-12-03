<?php
require __DIR__ . '/vendor/autoload.php';

function sendVerificationCode($contactNumber) {
    $contactNumber = preg_replace('/^0/', '+63', $contactNumber); // Replace leading 0 with +63
    $sid = "AC4c7f351e7280bb17f0bc24c6a8d3d263";
    $token = "e246525c2a893d135c526d2ced329916";
    $twilio = new Twilio\Rest\Client($sid, $token);

    $verificationCode = rand(100000, 999999);

    try {
        $message = $twilio->messages->create(
            $contactNumber,
            [
                'from' => '+17755878678',
                'body' => "Your verification code is: $verificationCode"
            ]
        );
        $_SESSION['verification_code'] = $verificationCode;
        return true;
    } catch (Exception $e) {
        echo "Error sending SMS: " . $e->getMessage();
        return false;
    }
}
?>
