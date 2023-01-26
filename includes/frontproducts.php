<div class="frontProducts">
   
<?php

include_once "./includes/connect.php";

$sql = "SELECT `frontproducts`.*, `users`.`user_name`, `users`.`user_img`, `users`.`user_alt` FROM `frontproducts` LEFT JOIN `users` ON `frontproducts`.`author_id` = `users`.`user_id`";
$stmt = $conn->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

<article>
    <img src="./img/uploads/front/<?php echo $row['front_imgsrc']; ?>" alt="<?php echo $row['front_imgalt']; ?>">
        <div class="info">
            <h3><?php echo $row['front_title']; ?></h3>
            <div class="stars">

                <?php
                for ($x = 0; $x <= 5; $x++) { 

                    if ($x <= $row['front_stars']) { ?>
                        <i class='fa fa-star' aria-hidden='true'></i>
                    <?php }

                    else { ?>
                        <i class='fa fa-star-o' aria-hidden='true'></i>
                    <?php }
                } ?>

            </div>
        </div>

        <div class="description">
        <?php

        if(isset($_SESSION['accesslevel'])) {
            $accesslevel = $_SESSION['accesslevel'];

            if ($_SESSION['accesslevel'] <= 2) { ?>
                <div class="published">
                    Oprettet: <?php echo $row['front_published'] . " af " . $row['user_name']; ?>
                </div>
             <?php }
        }

        ?>

            <p><?php echo $row['front_desc']; ?></p>
            <a href="#">Læs mere...</a></p>
            <!-- Mulighed for sletning herunder -->
        </div>
</article>

    <?php
    } ?>