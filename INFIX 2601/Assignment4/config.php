<?php
session_start();

$db_host = 'localhost'; 
$db_name = 'mysql'; 
$db_user = 'root'; 
$db_pass = 'root'; 

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die ('Your DB connection is misconfigured. Enter the correct values and try again.');
?>