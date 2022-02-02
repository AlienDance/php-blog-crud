<?php

$conn = new PDO('mysql:host=localhost', 'root', null);

$sql = "CREATE DATABASE webstudiose";

$conn->exec($sql);

$conn = new PDO('mysql:host=localhost;dbname=webstudiose', 'root', null);

$sql = "CREATE TABLE blogs (
        id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        body TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP )";

$conn->exec($sql);

header('Location: index.php');

// echo 'Database and tables created';
