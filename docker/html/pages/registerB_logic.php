<?php
session_start();
include("conn.php");
if(empty($_POST["username"]) || empty($_POST["password"])){
    header("Location: registerB.php");
    exit();
}


$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

$stmt = $connection->prepare("INSERT INTO user(username, password, email, user_data_id)  VALUES(:user, :pass, :mail, :user_data_id)");
$stmt->bindParam(":user", $username);
$stmt->bindParam(":pass", $password);
$stmt->bindParam(":mail", $email);
$stmt->bindParam(":user_data_id", $_SESSION['user_data_id'] );
$stmt->execute();


header("Location: login.php");
exit();
?>