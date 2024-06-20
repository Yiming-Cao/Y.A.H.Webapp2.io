<?php
session_start();
include("conn.php");

if(isset($_POST['submit'])) {
    $startdatum = $_POST['startdatum'];
    $einddatum = $_POST['einddatum'];
    echo "startdatum: " . $startdatum . "<br>";
    echo "einddatum: " . $einddatum . "<br>";
    // Save dates to session
    $_SESSION['startdatum'] = $startdatum;
    $_SESSION['einddatum'] = $einddatum;

    try {
        // Prepare the SQL statement
        $stmt = $connection->prepare("INSERT INTO boekingen (startdatum, einddatum) VALUES (:startdatum, :einddatum)");

        // Bind parameters to the prepared statement
        $stmt->bindParam(':startdatum', $startdatum);
        $stmt->bindParam(':einddatum', $einddatum);

        if($stmt->execute()) {
            $_SESSION['status'] = "Date values Inserted";
            header("Location: ../submit_booking.php");
            exit();
        } else {
            $_SESSION['status'] = "Date values Inserting Failed";
            header("Location: ../submit_booking.php");
            exit();
        }
    } catch (PDOException $e) {
        
        exit();
    }
}


?>
