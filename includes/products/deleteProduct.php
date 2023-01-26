<?php

include_once "../connect.php";

$sql = "DELETE FROM products WHERE product_id = '" . $_GET['product_id'] . "'";

$stmt = $conn->prepare($sql);
$stmt->execute();

header("location: ../../products.php");