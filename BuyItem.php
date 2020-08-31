<?php
session_start();
$db = mysqli_connect("localhost","root", "", "flea_market");

$userInv = $_SESSION["id"];
$saleID = $_GET["saleID"];
$saleSelect = "SELECT * FROM items_sale WHERE id = ${saleID}";
$result = mysqli_query($db, $saleSelect);
$sale = mysqli_fetch_array($result);

if($userInv == $sale["UserID"]) {
    echo "<script type='text/javascript'>if(confirm(\"Cant buy from yourself\")) document.location = 'flea_market.php';</script>";
    die();
}

$userSelect = "SELECT * FROM users WHERE id = ${userInv}";
$result = mysqli_query($db, $userSelect);
$user = mysqli_fetch_array($result);

$SellerSelect = "SELECT * FROM users WHERE id = ${sale['UserID']}";
$result = mysqli_query($db, $SellerSelect);
$seller = mysqli_fetch_array($result);

if($sale["Price"] <= $user["rubel"]) {

    $newAmountBuyer = $user["rubel"] - $sale["Price"];
    $DecreaseRubels ="UPDATE users SET rubel = ${newAmountBuyer} WHERE id = ${userInv}";
    $ResultSucc = mysqli_query($db, $DecreaseRubels);


    $newAmountSeller =$seller["rubel"] + $sale["Price"];
    $IncreaseRubels = "UPDATE users SET rubel = ${newAmountSeller} WHERE id = ${seller['id']}";
    $ResultSucc = mysqli_query($db, $IncreaseRubels);

    $ItemCheck = "SELECT * FROM user_inventory WHERE itemID = ${sale['ItemID']} AND userID = ${userInv}";
    $ResultSucc = mysqli_query($db, $ItemCheck);
    echo "<script type='text/javascript'>if(confirm(\"Success\")) document.location = 'flea_market.php';</script>";

    if ($ResultSucc->num_rows == 0) {
        $newItemBuyerInsert = "INSERT INTO user_inventory (userID, itemID, amount) VALUES ($userInv,${sale['ItemID']},${sale['Amount']} )";
        $ResultSucc = mysqli_query($db, $newItemBuyerInsert);
    }
    else {
        $ResultAmount = mysqli_fetch_array($ResultSucc);
        $newAmountItem = $ResultAmount["amount"] + $sale["Amount"];
        $newItemBuyerUpdate = "UPDATE user_inventory SET amount = ${newAmountItem} WHERE userID = ${userInv} AND itemID = ${sale['ItemID']}";
        $ResultSucc = mysqli_query($db, $newItemBuyerUpdate);
    }

    $ItemDelete = "DELETE FROM items_sale WHERE id = ${saleID}";
    mysqli_query($db, $ItemDelete);



}
else {
    echo "Not enough rubles!";
}