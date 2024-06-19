<?php
session_start();
include("conn.php");
?>
<?php

    
    $startdatum = $_POST["startdatum"];
    $einddatum = $_POST["einddatum"];


    $stmt = $connection->prepare("INSERT INTO boekingen(startdatum, einddatum)  VALUES (:sdatum, :edatum)");
    $stmt->bindParam(":sdatum", $startdatum);
    $stmt->bindParam(":edatum", $einddatum);
    if ($stmt->execute()) {
        header('Location: index.php?message=Booking successful');
        exit();
    } else {
        header('Location: index.php?message=Booking failed. Please try again.');
        exit();
    }
?>
