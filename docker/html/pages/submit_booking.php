<?php
session_start();
include("conn.php");
    
    $_SESSION['startdatum'] = $_POST["startdatum"];
    $_SESSION ['einddatum'] = $_POST["einddatum"];


    $stmt = $connection->prepare("INSERT INTO boekingen (startdatum, einddatum)  VALUES (:startdatum, :einddatum)");
    $stmt->bindParam(":startdatum", $startdatum);
    $stmt->bindParam(":einddatum", $einddatum);
    if ($stmt->execute()) {
        header('Location: index.php?message=Booking successful');
        exit();
    } else {
        header('Location: index.php?message=Booking failed. Please try again.');
        exit();
    }
?>
