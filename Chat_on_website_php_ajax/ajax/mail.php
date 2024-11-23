<?php
$username = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';
if (strlen($username) < 2)
    $error = 'Введіть им\'я';
else if (strlen($email) < 5)
    $error = 'Введіть email';
else if (strlen($mess) < 10)
    $error = 'Введіть повідомлення';

if ($error != '') {
    echo $error;
    exit();
}
$to="beefeater83@gmail.com";
$subject = "=?utf-8?B?".base64_encode("Нове повідомлення")."?=";
$message = "Користувач: $username.<br/>$mess";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

mail($to, $subject, $message, $headers);

echo "Done";