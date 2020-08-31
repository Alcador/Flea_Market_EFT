<?php
$db = mysqli_connect("localhost","root", "", "flea_market");

$username = $_POST["username"];
$password = $_POST["password"];
$rubel = $_POST["rubel"];

$Insert = "INSERT INTO users (username, password, rubel) VALUES ('${username}', '${password}', '${rubel}')";
if(mysqli_query($db, $Insert))
    echo "User Added";
