<?php
session_start();
include("conn.php");
if(empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || empty($_POST["leeftijd"]) || empty($_POST["woonadres"])){
    header("Location: registerA.php");
    exit();
}


$voornaam = $_POST["voornaam"];
$achternaam = $_POST["achternaam"];
$leeftijd = $_POST["leeftijd"];
$woonadres = $_POST["woonadres"];

$stmt = $connection->prepare("INSERT INTO user_data(voornaam, achternaam, leeftijd, woonadres)  VALUES(:voor, :achter, :leeft, :adres)");
$stmt->bindParam(":voor", $voornaam);
$stmt->bindParam(":achter", $achternaam);
$stmt->bindParam(":leeft", $leeftijd);
$stmt->bindParam(":adres", $woonadres);
$stmt->execute();

$user_data_id = $connection->lastInsertId();
$_SESSION['user_data_id'] = $user_data_id;

header("Location: registerB.php");
exit();
?>