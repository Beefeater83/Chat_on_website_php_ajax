<?php
$current_user_login = $_COOKIE['login'];
$id_to_delete = $_POST['id'];

require_once "../lib/mysql.php";
$query = $pdo->prepare('SELECT login FROM users WHERE id = ?');
$query->execute([$id_to_delete]);
$login_to_delete = $query->fetchColumn();

if($current_user_login === $login_to_delete){
    echo "Неможливо видалити залогінєного користувача";
}else{
    $sql = 'DELETE FROM `users` WHERE id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$id_to_delete]);
    
    echo "Done";
}



