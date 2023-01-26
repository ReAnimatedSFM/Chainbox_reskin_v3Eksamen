<?php

$server = "localhost";
$dbname = "chainboxdb";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Fejl: ". $e->getMessage();
}