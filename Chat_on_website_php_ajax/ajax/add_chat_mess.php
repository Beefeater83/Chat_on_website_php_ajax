<?php
$message = trim(filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($message) < 1)
    exit();

require_once "../lib/mysql.php";
$sql_username = $pdo->prepare("SELECT name FROM users WHERE login = ?");
$sql_username->execute([$login]);
$username = $sql_username->fetchColumn();

$sql = 'INSERT INTO chat(message, username, date ) VALUES(?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$message, $username, time()]);

echo "Done";