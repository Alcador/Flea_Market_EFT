<style>
    a:link{
        text-decoration: none;
        color: white;
        font-weight: bold;
        text-align: center;

    }
    a:visited{
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
    a:hover {
        text-decoration: underline;
        color: #a8b7bc;
    }
    a:active {

    }

    .MOTD{
        color: white;
        padding: 5px;
        float: right;
        margin-top: 8px;
        margin-right: 16px;
        font-size: 17px;
        border: none;
        cursor: pointer;
        font-family: benderlight, Arial, 'Times New Roman';
        font-weight: bolder;
    }
    input[type=button]{
        padding: 5px;
        float: right;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
        font-family: benderlight, Arial, 'Times New Roman';
        font-weight: bolder;
    }

</style>
<?php
error_reporting(0);

if (isset($_SESSION["Username"])) {
    ?>
    <input type="button" onclick="window.location.href = 'logout_page.php'; " value="Logout"/>
    <p class="MOTD"> Hello <?= $_SESSION["Username"] ?> </p>
    <?php
}
?>