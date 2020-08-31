<?php
$db = mysqli_connect("localhost","root", "", "flea_market");
$users = mysqli_query($db, "SELECT * FROM users");
$items = mysqli_query($db, "SELECT * FROM items");``

?>

<form action="add_user.php" method="post">
    <input name="username" type="text" placeholder="Username">
    <input name="password" type="password" placeholder="Password">
    <input name="rubel" type="number" value="0">
    <button type="submit"> ADD NEW USER </button>
</form>

<h1>Users</h1>
<ul>
    <?php
        while ($row = mysqli_fetch_array($users)) {
            echo "<li>" . $row['username'] . " <a href='delete_user.php?id=${row['id']}'>==DELETE==</a></li>";
        }
    ?>
</ul>

<form action="add_item.php" method="post">
    <input name="Name" type="text" placeholder="Item Name">
    <input name="ImageUrl" type="text" placeholder="Item URL">
    <button type="submit"> ADD NEW ITEM </button>
</form>

<h1>Items</h1>
<ul>
    <?php
    while ($row = mysqli_fetch_array($items)) {
        echo "<li>" . $row['Name'] . " <a href='delete_item.php?id=${row['id']}'>==DELETE==</a></li>";
    }
    ?>
</ul>
