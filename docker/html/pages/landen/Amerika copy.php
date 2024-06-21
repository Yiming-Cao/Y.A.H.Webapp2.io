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
   
        $specific_naam = 'Amerika';
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
        echo '<div class="singleTitle">';   
        echo '<h2>' . ($row['naam']) . '</h2>'; // Print only the 'naam' column
        echo '</div>';
        echo '<div class="singleText">'; 
        echo '<p>Prijs: ' . ($row['prijs']) . '</p>';
        echo '<p>Beschrijving: ' . ($row['beschrijving']) . '</p>';
        echo '</div>';
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
    
    
    <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>
                <h1>Kies je reisdatum</h1>

    <div class="agenda-con">
    woordje
    <form method="POST" action="/pages/submit_booking.php">
    <label for="startdatum">Start Datum:</label>
    <input type="date" id="startdatum" name="startdatum" required>
    <label for="einddatum">Eind Datum:</label>
    <input type="date" id="einddatum" name="einddatum" required>
    <button type="submit" name="submit">submit</button>                          
    </form>
         
    </div>
    
    


<script src='js/main.jsx'></script>
</body>
</html>
    <?php
        include '../../includes/footer.php';
            
    ?>
</body>
</html>


<h1>Kies je reisdatum</h1>

    <div class="agenda-con">
        woordje
    <form method="POST" action="../submit_booking.php">
        <label for="startdatum">Start Datum:</label>
        <input type="date" id="startdatum" name="startdatum" required>
        
        <label for="einddatum">Eind Datum:</label>
        <input type="date" id="einddatum" name="einddatum" required>
        
        <button type="submit">submit</button>

    </form>
    
    </div>
    <?php
    if(isset($_POST['submit']))
    {
        $_SESSION['startdatum'] = $_POST["startdatum"];
        $_SESSION ['einddatum'] = $_POST["einddatum"];
    }
    ?>