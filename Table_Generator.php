<?php
$items = [];
//function Table_Generator() {

    //require_once ("index.php");
    $db = mysqli_connect("localhost","root", "", "flea_market");

    $sql = "SELECT * FROM users INNER JOIN items_sale ON users.id = items_sale.UserID";

    $usersQuery = mysqli_query($db,"SELECT * FROM users");
    $itemsQuery = mysqli_query($db,"SELECT * FROM items");
    $saleQuery  = mysqli_query($db,"SELECT * FROM items_sale");


    $usersArray = mysqli_fetch_all($usersQuery);
    $itemsArray = mysqli_fetch_all($itemsQuery);
    $salesArray = mysqli_fetch_all($saleQuery);
    $users = array();
    $items = array();
    $sale = array();

    foreach($usersArray as $user) {

        $users[$user -> id] = $user;

    }

    foreach($itemsArray as $item) {

        $items[$item -> id] = $item;

    }

    foreach($salesArray as $sale) {

        $sales[$sale -> id] = $sale;

    }


    var_dump($users);
 ?>

<table>
    <tr>
        <th>User</th>
        <th>Item</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Purchase Field</th>
    </tr>
    <?php  foreach($users as $user): ?>
        <tr>
            <td><?php echo $user-> username ?></td>
        </tr>
    <? endforeach; ?>

</table>



