<?php
// Lite skit
$host = 'localhost';
$dbname = 'blogg';
$user = 'admin';
$password = 's3WEeuKZic4VPlAQ';

// Styr vi våra inställningar för vårt PDO-Objekt.
// All data hämtas associativt.
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

//Lägger till utf8 för pdo
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Vi skapar här vårt PDO-Objekt
$pdo = new PDO($dsn, $user, $password, $attr);

if($pdo) {
    $model = array();
    //Lade till "ORDER BY" efter Posts så den soterar efter tidigast från creation time.
    foreach($pdo->query('SELECT Posts.ID AS ID, Slug, Headline, Username, Creation_time, Text AS Message FROM Posts JOIN Users ON Posts.User_ID = Users.ID ORDER BY Creation_time ASC') as $row) {
        $model += array(
            $row['ID'] => array(
                'slug' => $row['Slug'],
                'title' => $row['Headline'],
                'author' => $row['Username'],
                'date' => $row['Creation_time'],
                'message' => $row['Message']
            )
        );
    }
} else {
print_r($pdo->errorInfo());
}
  ?>
