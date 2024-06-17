<?php
        include "../conn.php";


    
    $startDatum = $_POST['startDatum'];
    $eindDatum = $_POST['eindDatum'];

    
    $stmt = $connection->prepare("INSERT INTO boekingen (startDatum, eindDatum, price) VALUES (:eindDatum, :startDatum, :price)");
    $stmt->bindParam(':startDatum', $startDatum, PDO::PARAM_STR);
    $stmt->bindParam(':eindDatum', $eindDatum, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: index.php?message=Booking successful');
        exit();
    } else {
        header('Location: index.php?message=Booking failed. Please try again.');
        exit();
    }
?>
