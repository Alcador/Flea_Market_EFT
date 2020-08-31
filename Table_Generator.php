<style>
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
        width: 60%;
    }
    tr{
        background-color: #101820ff;
    }
     td, {

        background-color: #F2AA4CFF;
         color: black;
         font-weight: bolder;
    }
    .buyButton, a:hover{
        background-color: #a8b7bc;
        color: black;
        text-decoration: none;
        font-weight: bold;
    }
    th {
        background-color: #F2AA4CFF;
    }
    .itemImage{
        width: 30%;
        height:20%;
    }
</style>
<?php
$items = [];
//function Table_Generator() {

    //require_once ("index.php");
    $db = mysqli_connect("localhost","root", "", "flea_market");

    $sql = "SELECT items_sale.id, items.Name, items_sale.Price, items_sale.Amount, users.username, items.image_url FROM users INNER JOIN items_sale ON users.id = items_sale.UserID INNER JOIN items ON items_sale.ItemID = items.id";


    $result = mysqli_query($db, $sql);

?>
<table class="center">
    <tr>
        <th>Username</th>
        <th>Item Image</th>
        <th>Item</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Purchase</th>
    </tr>
<?php
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td><?php echo $row["username"];?></td>
            <td class="imageField"><img class="itemImage" src="<?php echo $row["image_url"];?>" alt="itemImage"> </td>
            <td><?php echo $row["Name"]; ?></td>
            <td>₽ <?php echo $row["Price"]; ?></td>
            <td><?php echo $row["Amount"]; ?></td>
            <td class="buyButton"> <a href="BuyItem.php?saleID=<?php echo $row["id"] ?>">== BUY ==</a> </td>

        </tr>
        <?php
    }
}
?>
</table>
