<?php
session_start();
include("conn.php");



$userid = $_POST["user_id"];

$stmt = $connection->prepare("DELETE FROM user WHERE id=:userid");
$stmt->bindParam(":userid", $userid);
$stmt->execute();


header("Location: user-detail.php");
?>