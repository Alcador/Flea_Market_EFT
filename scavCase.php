<?php
error_reporting(0);
require_once "db.php";
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: login_page.php");
}

?>


    <!DOCTYPE html>
    <html lang="en">
<head>
    <title> Index Page</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        #center{
            display: grid;
        }
        .buttonCase a:hover{
            font-weight: bold;
            cursor: pointer;
            font-size: 60px;
            color: white;
            text-decoration: none;
            background-color: darkolivegreen;

        }
      .buttonCase  {
          background-color: #101820ff;

        }
      .table{
         margin-top: 20%;
      }
        table.table{
            font-size: 50px;
            margin-left:auto;
            margin-right:auto;
            border: 3px solid white ;
        }

    </style>
</head>
<body>
<div id="container">
    <div id="navbar">
        <a href="index.php">Home</a>
        <a href="flea_market.php">Flea Market</a>
        <a href="InvetorySite.php">Inventory</a>
        <a class="active" href="scavCase.php">Scav Case</a>
        <a href="aboutPage.php">About</a>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?php include "login_status.php"; ?>
        </form>


    </div>
    <div id="center">
        <table class="table">
        <td class="buttonCase"><a href="scav_case.php" >OPEN SCAV CASE</a></td>
        </table>
    </div>


</div>

</body>
    </html><?php
