<style>
    @font-face {
        font-family: 'benderlight';
        src: url('jovanny_lemonad_-_bender-light-webfont.woff2') format('woff2'),
        url('jovanny_lemonad_-_bender-light-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }
    html,body{
        height:100%
    }
    body{
        margin: 0;
        display: grid;
        font-family: benderlight, Arial, 'Times New Roman';
    }

</style>
<?php
session_start();
$db = mysqli_connect("localhost","root", "", "flea_market");
$userInv = $_SESSION["id"];

$randomItemSql = "SELECT * FROM items ORDER BY RAND() LIMIT 1";
$randomItem = mysqli_fetch_array(mysqli_query($db,$randomItemSql));

?>
<head>
    <title> Index Page</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        #center{
            display: grid;
        }
        .table{
            margin-top: 10%;
        }
        table.table{
            font-size: 40px;
            margin-left:auto;
            margin-right:auto;
            border: 3px solid white ;
        }
        .data{
            font-weight: bold;
            background-color: darkolivegreen;
            font-size: 45px;
            text-align: center;
        }
        .pictureData{
            display: inline-block;
            width: 100%;
            height: 100%;
        }
        .itemName{
            font-size: 35px;
            background-color: darkolivegreen;
            text-align: center;
        }

    </style>
</head>
<body>
<div id="container">
    <div id="navbar">
        <a href="index.php">Home</a>
        <a href="flea_market.php">Flea Market</a>
        <a href="InvetorySite.php">Inventory</a>
        <a href="scavCase.php">Scav Case</a>
        <a href="aboutPage.php">About</a>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?php include "login_status.php"; ?>
        </form>


    </div>
    <div id="center">
        <table class="table">
            <tr>
            <td class="data"><p> You got an item! </p></td>
            </tr>
            <tr>
            <td ><img class="pictureData" src="<?php echo $randomItem["image_url"]; ?>" alt="item image"></td>
            </tr>
            </tr>
            <td class="itemName"><h1><?php echo $randomItem["Name"]; ?></h1></td>
            </tr>

        </table>
    </div>


</div>

</body>
</html>

<?php

$existingItemSql = "SELECT * FROM user_inventory WHERE userID = ${userInv} AND itemID = ${randomItem['id']}";
$result = mysqli_query($db, $existingItemSql);

if ($result->num_rows > 0) {
    $existing = mysqli_fetch_array($result);
    $newAmount = $existing['amount'] + 1;
    $updateItem = "UPDATE user_inventory SET amount = ${newAmount} WHERE userID = ${userInv} AND itemID = ${randomItem['id']}";
    mysqli_query($db, $updateItem);
} else {
    $insertItem = "INSERT INTO user_inventory (userID,itemID,amount) VALUES (${_SESSION['id']}, ${randomItem['id']},1)";
    mysqli_query($db,$insertItem);
}
