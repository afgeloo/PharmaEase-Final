<?php
require __DIR__ . '/vendor/autoload.php';

$sid = "AC4c7f351e7280bb17f0bc24c6a8d3d263";
$token = "e246525c2a893d135c526d2ced329916";
$client = new Twilio\Rest\Client($sid, $token);

// Send the message and store the result
$message = $client->messages->create(
    // The number you'd like to send the message to
    '+639454965452',
    [
        // A Twilio phone number you purchased at https://console.twilio.com
        'from' => '+17755878678',
        // The body of the text message you'd like to send
        'body' => "Hey Angelo! Good luck on the bar exam!"
    ]
);

// Check if the message was sent successfully
if($message) {
    echo 'Message sent successfully!';
} else {
    echo 'Message failed to send.';
}
?>