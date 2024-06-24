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
        $stmt = $connection->prepare("INSERT INTO boekingen (reis_id, startdatum, einddatum) VALUES (:reis_id, :startdatum, :einddatum)");
        $stmt->bindParam(":startdatum", $startdatum);
        $stmt->bindParam(":einddatum", $einddatum);
        $stmt->bindParam(":reis_id", $_SESSION['reis_id']);

        if ($stmt->execute()) {
            echo "Booking successful!";
            header('./Location:boekingen.php');
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
    <?php
   



   if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['startdatum']) && isset($_GET['einddatum'])) {
       $startdatum = $_GET['startdatum'];
       $einddatum = $_GET['einddatum'];

       // Query to fetch bookings based on date range
       $stmt = $connection->prepare("SELECT * FROM boekingen WHERE startdatum >= :startdatum AND einddatum <= :einddatum ORDER BY startdatum");
       $stmt->bindParam(':startdatum', $startdatum);
       $stmt->bindParam(':einddatum', $einddatum);
       $stmt->execute();
       
       echo '<div class="bookings">';
       echo '<h2>bookings from ' . ($startdatum) . ' to ' . ($einddatum) . '</h2>';

       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           echo '<div class="booking">';
           echo '<p><strong>Start Date:</strong> ' . htmlspecialchars($row['startdatum'], ENT_QUOTES, 'UTF-8') . '</p>';
           echo '<p><strong>End Date:</strong> ' . htmlspecialchars($row['eindatum'], ENT_QUOTES, 'UTF-8') . '</p>';
           echo '</div>';
       }

       echo '</div>';
       
   }
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<title>Document</title>
</head>
<body>


<form action='../boekingen.php' method="POST" id='registerform'>
<label>Hoeveel gasten?</label>
<input  type="number" id='amountGuests' name="aantal_gasten" placeholder="1">
<button onclick="setAmountOfGuests()">add guests</button>
<input type="text" name="voornaam" placeholder="voornaam">
<input type="text" name="achternaam" placeholder="achternaam">
<select name="geslacht">
   <option value="man">Man</option>
   <option value="vrouw">Vrouw</option>
   <option value="anders">anders</option>
</select>
<input type="text" name="leeftijd" placeholder="leeftijd">
<input type="text" name="woonadres" placeholder="woonadres"> 
<input type="button" name="submit" value="submit">
</form>
<br>




<script src='js/main.jsx'></script>