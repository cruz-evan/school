<?php
session_start();

$db_host = 'localhost'; 
$db_name = 'lab2db'; 
$db_user = 'root'; 
$db_pass = 'root'; 

try{
	$pdo = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}


?>