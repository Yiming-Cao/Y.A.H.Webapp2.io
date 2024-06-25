<?php
session_start();
include("conn.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    die("Error: User not logged in.");
}
$_SESSION['user_id'] = $_SESSION['id'];

// Initialize a variable to track booking success
$booking_successful = false;

// Check if POST data is set
if (isset($_POST['startdatum']) && isset($_POST['einddatum']) && isset($_POST['reis_id'])) {
    // Trim input values to remove any extra spaces
    $startdatum = trim($_POST['startdatum']);
    $einddatum = trim($_POST['einddatum']);
    $reis_id = trim($_POST['reis_id']);

    // Save dates and reis_id to session
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
        $stmt = $connection->prepare("INSERT INTO boekingen (reis_id, user_id, startdatum, einddatum) VALUES (:reis_id, :user_id, :startdatum, :einddatum)");
        $stmt->bindParam(":reis_id", $reis_id);
        $stmt->bindParam(":user_id", $_SESSION['user_id']); // Bind the user ID from the session
        $stmt->bindParam(":startdatum", $startdatum);
        $stmt->bindParam(":einddatum", $einddatum);

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
    echo "Error: 'startdatum', 'einddatum', and 'reis_id' must be set";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="../../css/maincss.css">
</head>
<body>
    <?php if ($booking_successful): ?>
        <p>Boeking datum succesvol verstuurd.</p>
        <p>User ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        <p>Reis ID: <?php echo htmlspecialchars($reis_id); ?></p>
        <form action="http://localhost:8000/pages/boekingen.php" method="get">
            <button type="submit" class="button">Continue Booking</button>
        </form>
    <?php endif; ?>
</body>
</html>
