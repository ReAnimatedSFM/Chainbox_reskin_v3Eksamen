<?php

include_once "../connect.php";

$sql = "DELETE FROM slides WHERE slide_id = '" . $_GET['slide_id'] . "'";
$stmt = $conn->prepare($sql);
$stmt->execute();

header("location: ../../index.php");