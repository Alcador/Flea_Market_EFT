<?php
if (isset($_SESSION["Username"])) {
    ?>
    <p> Hello <?= $_SESSION["Username"] ?> </p>
    <a href="logout_page.php"> Logout </a>
    <?php
}

/*
 * <html>
  <h1> Sample Text </h1>
  <?php include "login_status.php"; ?>
  <p>
    Henlo
  </P
</html>
 */