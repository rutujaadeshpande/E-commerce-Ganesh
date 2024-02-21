<?php

$db_name = 'mysql:host=localhost;dbname=shopping';
$user_name = 'root';
$user_password = '';
try {
    $conn = new PDO($db_name, $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}

?>