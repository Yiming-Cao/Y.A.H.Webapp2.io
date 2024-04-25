<?php
session_start();
include("conn.php");



$productid = $_POST["id_product"];

$stmt = $connection->prepare("DELETE FROM products WHERE id=:id");
$stmt->bindParam(":id", $productid);
$stmt->execute();


header("Location: menu.php");
?>