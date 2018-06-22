<?php
$db = mysqli_connect($_SERVER['database1.cilnxsic6nbr.eu-west-1.rds.amazonaws.com'], $_SERVER['Nibec2018'], $_SERVER['Nibec2018'], $_SERVER['Database1'], $_SERVER['3306']);
if (mysqli_connect_errno($db)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
    }
?>