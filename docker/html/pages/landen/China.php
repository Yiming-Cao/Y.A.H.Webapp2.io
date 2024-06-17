<?php
session_start();
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
    <?php
        include '../../includes/header.php';
        include "../conn.php";
   
        $specific_naam = 'China';
            // Query om de kolommen te selecteren 'naam' en correcte kolom 'beschrijving' enz
            // $stmt = $connection->query("SELECT naam, beschrijving, prijs, bestemmingen_id, startDatum, eindDatum, file FROM reizen");
            $stmt = $connection->prepare("SELECT naam, prijs, beschrijving, file FROM reizen WHERE naam = :naam");
            $stmt->bindParam(':naam', $specific_naam);
            $stmt->execute(); // Execute the prepared statement to fetch results

    echo '<div class="singleReis">';
    echo '<section class="productenRow">';
    
    // Loop through the results and print only the 'naam' column
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="singleReis">';    
        echo '<h2>' . ($row['naam']) . '</h2>'; // Print only the 'naam' column
        echo '<p>Prijs: ' . ($row['prijs']) . '</p>';
        echo '<p>Beschrijving: ' . ($row['beschrijving']) . '</p>';
        echo '<div class="singleConImgFlorida">';
        echo '<div class="singleImgFlorida">';
        echo '<img src="../uploads/' . ($row['file']) . '" alt="' . ($row['naam']) . '">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    
    echo '</section>';
    echo '</div>';
            
            // Query to select only one row based on the specific 'naam'

    ?>
    <h1>Kies je reisdatum</h1>

    <div class="agenda-con">
    <form method="GET" action="">
        <label for="startDatum">Start Datum:</label>
        <input type="date" id="startDatum" name="eindDatum" required>
        
        <label for="eindDatum">Eind Datum:</label>
        <input type="date" id="eindDatum" name="eindDatum" required>
        
        <button type="submit">submit</button>
    </form>
    </div>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['startDatum']) && isset($_GET['eindDatum'])) {
            $startDatum = $_GET['startDatum'];
            $eindDatum = $_GET['eindDatum'];

            // Query to fetch bookings based on date range
            $stmt = $connection->prepare("SELECT * FROM boekingen WHERE startDatum >= :startDatum AND eindDatum <= :eindDatum ORDER BY startDatum");
            $stmt->bindParam(':startDatum', $startDatum, PDO::PARAM_STR);
            $stmt->bindParam(':eindDatum', $eindDatum, PDO::PARAM_STR);
            $stmt->execute();

            echo '<div class="bookings">';
            echo '<h2>Bookings from ' . ($startDatum) . ' to ' . ($eindDatum) . '</h2>';

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="booking">';
                echo '<p><strong>Start Date:</strong> ' . htmlspecialchars($row['startDatum'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p><strong>End Date:</strong> ' . htmlspecialchars($row['eindDatum'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p><strong>Price:</strong> ' . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '</div>';
            }

            echo '</div>';
        }
    ?>
    <?php
        include '../../includes/footer.php';
            
    ?>
</body>
</html>
