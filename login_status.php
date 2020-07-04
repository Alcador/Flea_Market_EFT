<?php
error_reporting(0);

if (isset($_SESSION["Username"])) {
    ?>
    <p> Hello <?= $_SESSION["Username"] ?> </p>
    <a href="logout_page.php"> Logout </a>
    <?php
}
?>