<?php

$target_dir = "../../img/uploads/slides/";
$file_name = $_FILES['fileToUpload']['name'];
$target_file = $target_dir . basename($file_name);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$slide_img = $file_name;
$slide_alt = $_POST['slide_alt'];

if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);

    if ($check !== false) {
        $uploadOk = 1;

        include_once "../connect.php";

        try {
            $sql = "INSERT INTO `slides` (`slide_id`, `slide_img`, `slide_alt`)
            VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([NULL, $slide_img, $slide_alt]);

            header("location: ../../index.php");
        } catch(Exception $e) {
            echo "fejl: " . $e->getMessage();
        }
    } else {
        $uploadOk = 0;
    }
};

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