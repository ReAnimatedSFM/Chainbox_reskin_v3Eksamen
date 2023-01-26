<?php
session_start();

$target_dir = "../img/uploads/products/";
$file_name = $_FILES['fileToUpload']['name'];
$target_file = $target_dir . basename($file_name);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$product_imgsrc = $file_name;
$product_imgalt = $_POST['product_imgalt'];
$product_title = $_POST['product_title'];
$product_desc = $_POST['product_desc'];
$product_stars = $_POST['product_stars'];
$product_category = $_POST['product_category'];
$author_id = $_SESSION['user_id'];

function getDateTimeNow() {
    $datetime = new DateTime();
    return $datetime->format('-d/-m/Y/ h:i:s');
}

include_once "connect.php";

if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);

    if ($check !== false) {
        $uploadOk = 1;

        $sql = "INSERT INTO `products` 
        (`product_id`, `product_imgsrc`, `product_imgalt`, `product_title`, `product_desc`, `product_stars`, `product_category`, `product_published`, `author_id`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([NULL, $product_imgsrc, $product_imgalt, $product_title, $product_desc, $product_stars, $product_category, getDateTimeNow(), $author_id]);

        header("location: ../products.php");
    } 

    else {
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $uploadOk = 0;
}

if ($_FILES['fileToUpload']['size'] > 500000) {
    echo "Fejl. Filen du har uploaded er for stor";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
    echo "Kun JPG, JPEG, PNG og GIF filer kan uploades";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Fil ikke uploaded";
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "Filen " . htmlspecialchars( basename( $_FILES['fileToUpload']['name'])) . " er blevet uploaded.";
    } else {
        echo "Billedet blev ikke uploaded, pga en fejl.";
    }
}