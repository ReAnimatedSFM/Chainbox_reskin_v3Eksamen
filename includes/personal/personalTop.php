<div class="top topcontainer">

<div class="language">
    <div class="flag">
        <img src="img/ikon.png" alt="Dansk ikon">
        <span>Dansk</span>
    </div>
    <span>DKK</span>
</div>

</div>

<hr>

<!-- Middle topbar / Welcome message -->
<div class="container home">

<a href="index.php"><img src="img/icon.png" alt="Forside ikon"></a>

<?php
        if (isset($_SESSION['user_name'])) {
            $user = $_SESSION['user_name'];
            $user_img = $_SESSION['user_img'];

            echo "<h2>Velkommen: $user</h2>
            <img src=\"./img/uploads/users/$user_img\" alt=\"$user\">";
        }
?>

</div>

<hr>

<!-- Navigation / links -->
<div class="container navbar">

<nav>

    <ul>
        <li><a href="index.php">Forside</a></li>
        <li><a href="products.php">Produkter</a></li>
        <li><a href="#">Nyheder</a></li>
        <li><a href="#">Handelsbetingelser</a></li>
        <li><a href="about.php">Om os</a></li>

        <?php
                if (!isset($_SESSION['user_name'])) {
                    echo "<li><a href='#' class='loginBtn'>Log ind</a></li>
                    <li><a href='register.php' class='loginBtn'>Opret bruger</a></li>";
                } else {
                    echo "<li class='active'><a href='personal.php'>Medlemsområde</a></li>";
                    echo "<li><a href='./includes/logout.php' class='logoutBtn'>Log ud</a></li>";
                }

                ?>
    </ul>

</nav>

<div class="basket">

    <div class="basketContent">
        <p>Din indkøbskurv er tom</p>
    </div>

    <div class="shopIcon">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>

</div>

<!-- Container end -->
</div>
<hr>