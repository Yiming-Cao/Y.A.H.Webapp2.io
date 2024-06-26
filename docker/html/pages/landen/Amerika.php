<?php
session_start();
if (!isset($_SESSION['id'])) {
    die("Error: User not logged in.");
}
?>
<!DOCTYPE html>
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
   
        $specific_naam = 'Amerika';

        // Query to select the relevant columns
        $stmt = $connection->prepare("SELECT id, naam, prijs, beschrijving, file FROM reizen WHERE naam = :naam");
        $stmt->bindParam(':naam', $specific_naam);
        $stmt->execute(); // Execute the prepared statement to fetch results
          
        echo '<div class="singleReis">';
        echo '<section class="productenRow">';
        
        // Loop through the results and print the details
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['reis_id'] = $row['id'];
            echo '<div class="singleReis">'; 
            echo '<div class="singleTitle">';   
            echo '<h6>' . htmlspecialchars($row['id']) . '</h6>'; 
            echo '<h6>' . htmlspecialchars($row['naam']) . '</h6>'; // Print only the 'naam' column
            echo '</div>';
            echo '<div class="singleText">'; 
            echo '<h4>Prijs: ' . htmlspecialchars($row['prijs']) . '</h4>';
            echo '<h4>Beschrijving: ' . htmlspecialchars($row['beschrijving']) . '</h4>';
            echo '</div>';
            echo '<div class="singleConImgFlorida">';
            echo '<div class="singleImgFlorida">';
            echo '<img src="../uploads/' . htmlspecialchars($row['file']) . '" alt="' . htmlspecialchars($row['naam']) . '">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
        echo '</section>';
        echo '</div>';
    ?>
    <h1>Kies je reisdatum</h1>
    
    <form method="POST" action="../submit_booking.php">
    <label for="huurAuto">Huur auto</label>    
    <input type="int" name="huurAuto" required>
        <input type="hidden" name="reis_id" value="<?php echo htmlspecialchars($_SESSION['reis_id']); ?>">
        <label for="startdatum">Startdatum:</label>
        <input type="date" id="startdatum" name="startdatum" required>
        
        <label for="einddatum">Einddatum:</label>
        <input type="date" id="einddatum" name="einddatum" required>
        
        <button type="submit">Submit</button>
    </form>
    <script src='js/main.jsx'></script>
</body>
<div class="revieuw-container">
    <div class="revieuw-button">
        <a href="http://localhost:8000/pages/recensiescopy.php">Recensies</a>
    </div>
    <a href="javascript:history.back()" class="register2">
        <h1>Back</h1>
    </a>

</div>
</html>
<?php
    include '../../includes/footer.php';
?>
