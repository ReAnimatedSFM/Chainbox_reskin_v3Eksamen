<?php

$target_dir = "../../img/uploads/users/";
$file_name = $_FILES['fileToUpload']['name'];
$target_file = $target_dir . basename($file_name);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$user_name = $_POST['user_name'];
$user_password1 = $_POST['password1'];
$user_password2 = $_POST['password2'];
$user_img = $file_name;
$user_alt = $file_name;


    if (isset($_POST['submit'])) {

            $check = getimagesize($_FILES['fileToUpload']['tmp_name']);

            if ($check !== false) {

                $uploadOk = 1;

                    if ($user_password1 == $user_password2) {

                        include_once "../connect.php";

                        $sql = "SELECT * FROM users WHERE user_name = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$user_name]);

                                if (empty($row = $stmt->fetch(PDO::FETCH_ASSOC))) {

                                    try {

                                        $sql = "INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `accesslevel`, `user_img`, `user_alt`)
                                        VALUES (?, ?, ?, ?, ?, ?)";
                                
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute([NULL, $user_name, $user_password1, 3, $user_img, $user_alt]);


                                        session_start();
                                        $_SESSION['user_name'] = $user_name;
                                        $_SESSION['accesslevel'] = 3;
                                        $_SESSION['user_img'] = $user_img;
                                        $_SESSION['user_alt'] = $user_alt;

                                        header("location: ../../index.php");

                                    } catch(Exception $e) {
                                        echo "fejl:" . $e->getMessage();
                                    }

                                } else {
                                    header("location: ../register.php?ex=exists");
                                }
                }
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

    


