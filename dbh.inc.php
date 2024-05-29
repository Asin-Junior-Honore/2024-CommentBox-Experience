<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirstdatabase');
if (!$conn) {
    die('connection failed' . mysqli_connect_error());
}



$host = 'localhost';
$databasename = "myfirstdatabase";
$databaseusername = "root";
$databasepassword = "";

try {
    //code...
    $pdo = new PDO("mysql:host=$host;dbname=$databasename", $databaseusername, $databasepassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("connection failed:  " . $e->getMessage());
    //throw $th;
}

$conn2 = mysqli_connect('localhost', 'root', '', 'myfirstdatabase');
if (!$conn2) {
    die('connection failed' . mysqli_connect_error());
}