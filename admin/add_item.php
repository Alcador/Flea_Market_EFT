<?php
$db = mysqli_connect("localhost","root", "", "flea_market");

$name = $_POST["Name"];
$url = $_POST["ImageUrl"];

$Insert = "INSERT INTO items (Name, image_url) VALUES ('${name}', '${url}')";
if(mysqli_query($db, $Insert))
    echo "Item Added";
