<?php
session_start();
include("conn.php");

// Initialize a variable to track booking success
$booking_successful = false;

// Check if POST data is set
if (isset($_POST['startdatum']) && isset($_POST['einddatum'])) {
    // Trim input values to remove any extra spaces
    $startdatum = trim($_POST['startdatum']);
    $einddatum = trim($_POST['einddatum']);

    // Save dates to session
    $_SESSION['startdatum'] = $startdatum;
    $_SESSION['einddatum'] = $einddatum;

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
        $stmt = $connection->prepare("INSERT INTO boekingen (reis_id, startdatum, einddatum) VALUES (:reis_id, :startdatum, :einddatum)");
        $stmt->bindParam(":startdatum", $startdatum);
        $stmt->bindParam(":einddatum", $einddatum);
        $stmt->bindParam(":reis_id", $_SESSION['reis_id']);

        if ($stmt->execute()) {
            $booking_successful = true;
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/maincss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <?php if ($booking_successful): ?>
        <p>Boeking datum succesvol verstuurd.</p>
        <form action="http://localhost:8000/pages/boekingen.php" method="get">
            <button type="submit" class="button">Continue Booking</button>
        </form>
    <?php endif; ?>
</body>
</html>
