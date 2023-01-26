<?php

$news_name = $_POST['news_name'];
$news_email = $_POST ['news_email'];

if (isset($_POST['submit'])) {
    include_once "connect.php";

    $sql = "SELECT * FROM newsletter WHERE news_email =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$news_email]);

    if (empty($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
        try {
            $sql = "INSERT INTO `newsletter` (`news_id`, `news_name`, `news_email`)
            VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([NULL, $news_name, $news_email]);

            header("location: ../index.php");
        } catch (Exception $e) {
            echo "Fejl: " . $e->getMessage();
        }
    }
}