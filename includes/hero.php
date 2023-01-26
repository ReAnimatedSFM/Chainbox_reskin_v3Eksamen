
<div class="container">
        <ul class="slider" id="slider">
            <?php 
            include_once "./includes/connect.php";

            $sql = "SELECT * FROM slides";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                <li><a href="<?php
                //If user has accesslevel 1, they can click on the slide they want to delete
                if (isset($_SESSION['user_name']) && $_SESSION['accesslevel'] == 1) {
                        echo "./includes/registerSlide/deleteSlide.php?slide_id=". $row['slide_id'];
                } else {echo "";} 
                ?>" title="<?php if(isset($_SESSION['user_name']) && $_SESSION['accesslevel'] == 1) {echo "SLET: ". $row['slide_alt'];} else {echo $row['slide_alt'];} 
                ?>"><img src="img/uploads/slides/<?php echo $row['slide_img']; ?>" alt="<?php echo $row['slide_alt']; ?>"></a></li>

            <?php } ?>
        </ul>

        <?php
        if (isset($_SESSION['user_name'])) {
            if ($_SESSION['accesslevel'] == 1) { ?>
            <a href="registerSlide.php">Tilføj ny slide</a>
            <?php }
        }
        ?>
    </div>
    
    <hr class="hide400">
    <h1 class="tagline">SuperCyklisterne.dk</h1>
    <hr>