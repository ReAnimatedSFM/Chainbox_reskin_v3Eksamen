
<?php

include_once "./includes/connect.php";

if(isset($_SESSION['user_name'])) {

    
    $myUser = $_SESSION['user_id'];
    
    $sql = "SELECT `products`.*, `users`.`user_id`, `users`.`user_name` FROM `products` LEFT JOIN `users` ON `products`.`author_id` = `users`.`user_id` WHERE `users`.`user_id` = $myUser";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    ?>
    <h4 class="userDisplay"><?php echo $_SESSION['user_name']; ?>:</h4>

    <div class="personalGear">

    <?php

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

        <article>
            <img src="./img/uploads/products/<?php echo $row['product_imgsrc']; ?>">

        <div class="info">
            <h3><?php echo $row['product_title']; ?></h3>
            
        </div>

        <div class="description">


                <div class="published">
                    Oprettet: <?php echo $row['product_published']; ?>
                </div>

                <?php
            if (isset($_SESSION['user_name'])) {
                if ($row['user_id'] == $_SESSION['user_id'] || $_SESSION['accesslevel'] == 1) { ?>
                    <a href="./includes/products/deleteProduct.php?product_id=<?php echo $row['product_id']; ?>">Slet billede</a>
                <?php }
            }
            ?>
        </article>
    
    <?php
    } ?>
    </div>

 <?php } else {
    ?>

<h4 class="userDisplay">Du er ikke logget ind</h4>

    <?php
} ?>
