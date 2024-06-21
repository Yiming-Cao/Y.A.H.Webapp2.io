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
session_start();
include("conn.php");

// Validate and set POST data
if (isset($_POST['startdatum']) && isset($_POST['einddatum'])) {
    $_SESSION['startdatum'] = $_POST['startdatum'];
    $_SESSION['einddatum'] = $_POST['einddatum'];

    echo $_SESSION['startdatum'] = $_POST['startdatum'] . "<br>";
    echo $_SESSION['einddatum'] = $_POST['einddatum'] . "<br>";

    // Prepare and execute SQL statement
    try {
        $stmt = $connection->prepare("INSERT INTO boekingen (startdatum, einddatum) VALUES (:startdatum, :einddatum)");
        $stmt->bindParam(":startdatum", $_SESSION['startdatum']);
        $stmt->bindParam(":einddatum", $_SESSION['einddatum']);
        
        if ($stmt->execute()) {
            header('Location: index.php?message=Booking successful');
            exit();
        } else {
            header('Location: index.php?message=Booking failed. Please try again.');
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header('Location: index.php?message=Invalid input.');
    exit();
}
?>


