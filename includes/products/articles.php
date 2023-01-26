<div class="frontProducts">
   
<?php

include_once "./includes/connect.php";

$sql = "SELECT `products`.*, `users`.`user_id`, `users`.`user_name`, `users`.`user_img`, `users`.`user_alt` FROM `products` LEFT JOIN `users` ON `products`.`author_id` = `users`.`user_id`";
$stmt = $conn->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

<article>
    <img src="./img/uploads/products/<?php echo $row['product_imgsrc']; ?>" alt="<?php echo $row['product_imgalt']; ?>">
        <div class="info">
            <h3><?php echo $row['product_title']; ?></h3>
            <div class="stars">

                <?php
                for ($x = 0; $x <= 5; $x++) { 

                    if ($x <= $row['product_stars']) { ?>
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
                    Oprettet: <?php echo $row['product_published'] . " af " . $row['user_name']; ?>
                </div>
             <?php }
        }

        ?>

            <p><?php echo $row['product_desc']; ?></p>
            <a href="#">Læs mere...</a></p>
            <!-- Mulighed for sletning herunder -->
            <?php
            if (isset($_SESSION['user_name'])) {
                if ($row['user_id'] == $_SESSION['user_id'] || $_SESSION['accesslevel'] == 1) { ?>
                    <a href="./includes/products/deleteProduct.php?product_id=<?php echo $row['product_id']; ?>">Slet produkt</a>
                <?php }
            }
            ?>
        </div>
</article>

    <?php
    } ?>