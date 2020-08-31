<style>
    h1.selling{
        text-align: center;
    }
    div.selling{
        margin: auto;
        padding: auto;
        width: 12%;
        margin: ;
    }
    .imageField, td{
        width: 5%;
    }
    table.center{
        margin-left:auto;
        margin-right:auto;
    }
    table,td,th{
        border: 1px solid white;
        text-align: center;

    }
    table{
        align-content: center;
        border-collapse: collapse;
        width: 33%;
    }
    tr{
        background-color: #101820ff;
    }
    td, {

        background-color: #F2AA4CFF;
        color: black;
        font-weight: bolder;
    }
    th {
        background-color: #F2AA4CFF;
    }
    .itemImage{
        width: 30%;
        height:20%;
    }
    @font-face {
        font-family: 'benderlight';
        src: url('jovanny_lemonad_-_bender-light-webfont.woff2') format('woff2'),
        url('jovanny_lemonad_-_bender-light-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }
    select {
        width: 100%;
        padding: 5px;
        float: center;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        font-family: benderlight, Arial, 'Times New Roman';
        font-weight: bold;
    }
    input[type=number]{
        width: 100%;
        padding: 5px;
        float: center;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        font-family: benderlight, Arial, 'Times New Roman';
    }
    input[type=submit]{
        color: white;
        width: 100%;
        padding: 5px;
        float: center;
        margin-top: 8px;
        margin-right: 16px;
        background: #101820ff;
        font-size: 17px;
        border: none;
        cursor: pointer;
        font-family: benderlight, Arial, 'Times New Roman';
        font-weight: bolder;
    }
    .labels{
        display: inline-block;
        background-color: #F2AA4CFF ;
        text-align: center;
        border: 1px solid white;
        width: 100%;
    }

</style>

<?php
$items = [];
$userInv = $_SESSION["id"];
//function Table_Generator() {

//require_once ("index.php");
$db = mysqli_connect("localhost","root", "", "flea_market");

$sql = "SELECT * FROM users INNER JOIN user_inventory ON users.id = user_inventory.UserID INNER JOIN items ON user_inventory.ItemID = items.id WHERE users.id = '${userInv}'";

$userInfoSql = "SELECT * FROM users WHERE id = ${userInv}";
$userInfo = mysqli_fetch_array(mysqli_query($db, $userInfoSql));

$result = mysqli_query($db, $sql);
$resultSet = $db->query("SELECT * FROM users INNER JOIN user_inventory ON users.id = user_inventory.UserID INNER JOIN items ON user_inventory.ItemID = items.id WHERE users.id = '${userInv}'");


?>
<table class="center">
    <tr>
        <th>Item Image</th>
        <th>Item</th>
        <th>Amount</th>
    </tr>
    <?php
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <tr>
                <td class="imageField"><img class="itemImage" src="<?php echo $row["image_url"]; ?>" alt="itemImage"></td>
                <td><?php echo $row["Name"]; ?></td>
                <td><?php echo $row["amount"]; ?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<head>
    <title> Inventory</title>
</head>
<body>
<div class="selling">
<h1>SELL YOUR ITEMS</h1>
<p> Balance: ₽ <?php echo $userInfo["rubel"] ?> </p>
<form action="checkAmount.php" method="post" enctype="multipart/form-data">
    <select class="selectList" name="Items" id="Items" required>
        <?php
        while($rows = $resultSet->fetch_assoc())
        {
            $itemName = $rows["Name"];
            $itemId = $rows["itemID"];
            echo "<option value = '$itemId'>$itemName</option>";
        }
        ?>
    </select><br> <br>
    <label class="labels" for="Price">Price</label>
    <input type="number" name="Price" min="1" required> <br> <br>
    <label class="labels" for="Price">Amount</label>
    <input type="number" name="Amount" min="1" required> <br>
    <input type="submit" value="Submit" name="Submit"> <br>
</form>
</div>

</body>


<?php

