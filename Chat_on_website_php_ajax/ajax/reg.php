<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';
if (strlen($username) < 2)
    $error = 'Введіть им\'я';
else if (strlen($email) < 5)
    $error = 'Введіть email';
else if (strlen($login) < 3)
    $error = 'Введіть логін';
else if (strlen($pass) < 5)
    $error = 'Введіть пароль';

if ($error != '') {
    echo $error;
    exit();
}



require_once "../lib/mysql.php";

$salt = 'gnud##>5445sf#';
$pass_coded = md5($salt . $pass);

$sql = 'INSERT INTO users(name, email, login, password) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass_coded]);

$to = $email;
$from = "beefeater83@gmail.com";
$subject = "=?utf-8?B?".base64_encode("Реєстрація на сайті blog.diakonov-it.com.ua успішна")."?=";
$message = "Реєстрація на сайті blog.diakonov-it.com.ua успішна.<br/>Логін: $login.<br/>Пароль: $pass.<br/>Пароль зашифрован: $pass_coded.";
$headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=utf-8\r\n";
mail($to, $subject, $message, $headers);

echo "Done";