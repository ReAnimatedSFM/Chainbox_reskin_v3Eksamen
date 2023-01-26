<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">
<?php $title = "Forside | SuperCyklisterne.dk"; $desc = "Velkommen til SuperCyklisterne.dk"; 
include_once "./includes/head.php"; ?>

<body>

<?php include_once "./includes/top.php" ?>

<?php include_once "./includes/hero.php" ?>

<?php include_once "./includes/main.php"; ?>

<?php include_once "./includes/footer.php"; ?>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

    <!-- Add your site or application content here -->


    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/slider.min.js"></script>
    <script src="js/myScript.js"></script>
    <script>
        $(window).on("load", function() {
            $("#slider").slider();
        });
    </script>
</body>

</html>
