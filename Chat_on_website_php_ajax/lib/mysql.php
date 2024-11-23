<?php

$user = 'root';
$password = '';
$db = 'web-blog';
$host = 'localhost';
$port = 3306;
/*
$user = 'gz551000_blog';
$password = 'J5*7Zx^5em';
$db = 'gz551000_blog';
$host = 'gz551000.mysql.ukraine.com.ua';
$port = 3306;
*/
$dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';port=' . $port;
$pdo = new PDO($dsn, $user, $password);
