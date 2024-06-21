<?php
session_start();
include("conn.php");
if(empty($_POST["username"]) || empty($_POST["password"])){
    header("Location: login.php");
    exit();
}
$username = $_POST["username"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if ($password != $confirm_password) {
    header("Location: login.php?error=password_mismatch");
    exit();
}


$stmt = $connection->prepare("SELECT * FROM user WHERE username=:user AND password=:pass");
$stmt->execute(["user"=> $username,"pass"=> $password]);
$result = $stmt->fetch();


if (!$result) {
   
    header("Location: login.php");
    exit();
} else {
    $_SESSION["id"]=$result['id'];
    $_SESSION["user"] = $username;
    $_SESSION['loggedin'] = true;
    header("Location: map.php");
    exit();
}

?>