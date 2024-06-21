<?php
session_start();
include("conn.php");

if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirm_password"])) {
    header("Location: reset_password.php");
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if ($password !== $confirm_password) {
    header("Location: reset_password.php?username=$username&error=password_mismatch");
    exit();
}




// Validate the token and update the password
$stmt = $connection->prepare("SELECT * FROM user WHERE reset_username=:username AND reset_expires > NOW()");
$stmt->bindParam(":username", $username);
$stmt->execute();
$user = $stmt->fetch();

if (!$user) {
    header("Location: reset_password.php?username=$username&error=invalid_username");
    exit();
}

$stmt = $connection->prepare("UPDATE user SET password=:pass, reset_username=NULL, reset_expires=NULL WHERE reset_username=:username");
$stmt->bindParam(":pass", $password);
$stmt->bindParam(":username", $username);
$stmt->execute();

header("Location: login.php?status=password_reset");
exit();

?>