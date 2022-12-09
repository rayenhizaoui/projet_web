<?php
require 'connexion.php';

$name = 'ZTC';
$login = 'ztcodin@gmail.com';
$pass= password_hash("123", PASSWORD_DEFAULT);

$pdo = $pdo->prepare("INSERT INTO users(name, login, password) VALUES (?, ?, ?)");
$pdo->execute([$name, $login, $pass]);


?>