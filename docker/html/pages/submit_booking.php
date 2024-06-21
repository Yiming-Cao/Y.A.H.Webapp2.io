<?php
session_start();
include("conn.php");

// Check if POST data is set
if (isset($_POST['startdatum']) && isset($_POST['einddatum'])) {
    // Trim input values to remove any extra spaces
    $startdatum = trim($_POST['startdatum']);
    $einddatum = trim($_POST['einddatum']);

    // Save dates to session
    $_SESSION['startdatum'] = trim($_POST['startdatum']);
    $_SESSION['einddatum'] = trim($_POST['einddatum']);

    // Debugging output
    echo "Received POST data:<br>";
    echo "startdatum: " . htmlspecialchars($startdatum) . "<br>";
    echo "einddatum: " . htmlspecialchars($einddatum) . "<br>";

    // Ensure the dates are not empty
    if (empty($startdatum) || empty($einddatum)) {
        die("Error: 'startdatum' and 'einddatum' cannot be empty");
    }

    // Validate date format
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $startdatum) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $einddatum)) {
        die("Error: 'startdatum' and 'einddatum' must be in the format YYYY-MM-DD");
    }

    // Prepare and execute SQL statement
    try {
        $stmt = $connection->prepare("INSERT INTO boekingen ( startdatum, einddatum) VALUES (:startdatum, :einddatum)");
        $stmt->bindParam(":startdatum", $startdatum);
        $stmt->bindParam(":einddatum", $einddatum);

        if ($stmt->execute()) {
            echo "Booking successful!";
            header('Location: index.php?message=Booking successful');
            exit();
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error: " . $errorInfo[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: 'startdatum' and 'einddatum' must be set";
    exit();
}
?>