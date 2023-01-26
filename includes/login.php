<?php

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

include_once "connect.php";

$sql = "SELECT * FROM users WHERE user_name = ? AND user_password = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_name, $user_password]);
$conn = NULL;

if (empty($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
    header("location: ../login.php?err=error");
} else {

    session_start();

    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['accesslevel'] = $row['accesslevel'];
    $_SESSION['user_img'] = $row['user_img'];
    $_SESSION['user_alt'] = $row['user_alt'];

    header("location: ../index.php");
}