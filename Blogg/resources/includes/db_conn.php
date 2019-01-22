<?php
$host = 'localhost';
$dbname = 'blogg';
$user = 'admin';
$password = 's3WEeuKZic4VPlAQ';

// Styr vi våra inställningar för vårt PDO-Objekt.
// All data hämtas associativt.
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

//Lägger till utf8 för pdo
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// $users = new User($pdo);

// Vi skapar här vårt PDO-Objekt
$pdo = new PDO($dsn, $user, $password, $attr);


$sql = '';

?>
