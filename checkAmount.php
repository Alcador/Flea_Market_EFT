<?php
session_start();
$db = mysqli_connect("localhost","root", "", "flea_market");
$userInv = $_SESSION["id"];
$amountCheck = $_POST["Amount"];
$itemId = $_POST['Items'];
$price = $_POST['Price'];
$itemCount = "SELECT amount FROM user_inventory WHERE userID = ${userInv} AND itemID = ${itemId}";



var_dump($userInv);
var_dump($amountCheck);
var_dump($itemId);

/*if(!empty($_POST)) {
    $amount = $_POST['Amount'];
    $price = $_POST['Price'];
    $username_checkamount = $_SESSION["Username"];

    $sql = "SELECT * FROM user_inventory JOIN users ON users.id = user_inventory.UserID WHERE amount = '${amount}'";
    $query = mysqli_query($db, $sql);
    var_dump($query);
}
*/

$result = mysqli_query($db, $itemCount);
$actualItemAmount = $result->fetch_assoc()["amount"];

if ($result->num_rows == 0 ||  $actualItemAmount < $amountCheck) {
    echo "<script type='text/javascript'>if(confirm(\"Can't sell what you dont have\")) document.location = 'InvetorySite.php';</script>";
} else {
    echo "<script type='text/javascript'>if(confirm(\"Success\")) document.location = 'InvetorySite.php';</script>";
    $ResultSucc = false;

    if($actualItemAmount == $amountCheck) {
        $ItemDelete = "DELETE FROM user_inventory WHERE userID = ${userInv} AND itemID = ${itemId}";
        $ResultSucc = mysqli_query($db, $ItemDelete);
    }
    else {
        $newAmount = $actualItemAmount - $amountCheck;
        $ItemsUpdate = "UPDATE user_inventory SET amount = ${newAmount} WHERE userID = ${userInv} AND itemID = ${itemId}";
        $ResultSucc = mysqli_query($db, $ItemsUpdate);
    }

    if($ResultSucc) {
        $ItemsInsert = "INSERT INTO items_sale (UserID,ItemID,Amount,Price) VALUES (${userInv},${itemId}, ${amountCheck},${price})";
        $ResultSucc = mysqli_query($db, $ItemsInsert);

    }
    if ($ResultSucc) {
        echo "Successful Listing";
    }
    else {
        echo "Error boi";
    }
}


