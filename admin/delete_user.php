<?php
$db = mysqli_connect("localhost","root", "", "flea_market");
$id = $_GET["id"];

if(mysqli_query($db, "DELETE FROM users WHERE id = ${id}"))
    echo "User deleted!";
