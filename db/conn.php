<?php 
$host='localhost';
$db='user_management';
$user='root';
$pass='';
$charset='utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo = new PDO($dsn,$user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo 'Database Connection Successfull';
} catch(PDOException $e) {
    // echo 'error establishing the connection';
    throw new PDOException($e->getMessage());

}
require_once "crud.php";
$crud = new crud($pdo);
?>