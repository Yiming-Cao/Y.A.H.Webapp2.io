<?php
session_start();
include 'conn.php';

// Fetch user data based on session user_id
$user_id = $_SESSION['id'] ?? null;
$user_data = null;
$bookings_data = [];

if ($user_id) {
    try {
        // Fetch user data
        $sql1 = "SELECT id, voornaam, achternaam, leeftijd, woonadres FROM user_data WHERE id = :user_id";
        $stmt1 = $connection->prepare($sql1);
        $stmt1->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt1->execute();
        $user_data = $stmt1->fetch(PDO::FETCH_ASSOC);

        // Fetch bookings data
        $sql2 = "SELECT id, reis_id, startdatum, einddatum, user_id, huurAuto FROM boekingen WHERE user_id = :user_id";
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt2->execute();
        $bookings_data = $stmt2->fetchAll(PDO::FETCH_ASSOC);  // Assuming multiple bookings might exist

    } catch (PDOException $e) {
        // Handle any errors
        echo 'Error: ' . $e->getMessage();
    }
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
    <?php
        include '../includes/header.php';
        include 'conn.php';
        
    ?>
    <div class="user-detail-mid">
        <div class="user-mid-left">
            
        <a href="javascript:history.back()">
            <h1><</h1>
        </a>
            
            <div class="user-mid-head">
                <b><?php echo htmlspecialchars($_SESSION['user']); ?></b>
            </div>
        </div>
        <div class="user-mid-right">
            <div class="user-info">
                <?php if ($user_data): ?>
                    <b><span class="label">ID:</span> <?php echo htmlspecialchars($user_data['id']); ?></b>
                    <b><span class="label">Voornaam:</span> <?php echo htmlspecialchars($user_data['voornaam']); ?></b>
                    <b><span class="label">Achternaam:</span> <?php echo htmlspecialchars($user_data['achternaam']); ?></b>
                    <b><span class="label">Leeftijd:</span> <?php echo htmlspecialchars($user_data['leeftijd']); ?></b>
                    <b><span class="label">Woonadres:</span> <?php echo htmlspecialchars($user_data['woonadres']); ?></b>
                <?php else: ?>
                    <p>User data not found.</p>
                <?php endif; ?>       
            </div>
            <div class="line"><h4>Reizen</h4></div>
            <div class="user-info">
                <?php if ($bookings_data): ?>
                    <?php foreach ($bookings_data as $booking): ?>
                        <b><span class="label">ID:</span> <?php echo htmlspecialchars($booking['id']); ?></b>
                        <b><span class="label">Reis_id:</span> <?php echo htmlspecialchars($booking['reis_id']); ?></b>
                        <b><span class="label">Startdatum:</span> <?php echo htmlspecialchars($booking['startdatum']); ?></b>
                        <b><span class="label">Einddatum:</span> <?php echo htmlspecialchars($booking['einddatum']); ?></b>
                        <b><span class="label">User_id:</span> <?php echo htmlspecialchars($booking['user_id']); ?></b>
                        <b><span class="label">HuurAuto:</span> <?php echo htmlspecialchars($booking['huurAuto']); ?></b>
                        <div class="line"></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No bookings found.</p>
                <?php endif; ?>       
            </div>
            
        </div>
    </div>

    <?php if ($user_id && $user_id <= 5): ?>
        <div class="admin-panel">
            <h2>Admin Panel</h2>
            <div class="admin-panel-delete">
                
                <form method="POST" action="user_delete_logic.php" class="deleteform">
                    <input type="number" name="user_id" placeholder="User ID to delete" class="deleteid">
                    <input type="submit" value="Delete User" class = "searchButton">
                </form>
                <form method="POST" action="boeking_delete_logic.php" class="deleteform">
                    <input type="number" name="boeking_id" placeholder="Boeking ID to delete" class="deleteid">
                    <input type="submit" value="Delete Boeking" class = "searchButton">
                </form>
                <form method="POST" action="reis_delete_logic.php" class="deleteform">
                    <input type="number" name="reis_id" placeholder="reis ID to delete" class="deleteid">
                    <input type="submit" value="Delete Reis" class = "searchButton">
                </form>
            </div>
            <div class="admin-list">
                <div class="admin-user-list">
                    <?php
                    $sql = "SELECT id, voornaam, achternaam, leeftijd, woonadres FROM user_data";
                    $stmt = $connection->query($sql);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                    ?>
                        
                        <b><span class="label">ID:</span> <?php echo htmlspecialchars($row['id']); ?></b>
                        <b><span class="label">Voornaam:</span> <?php echo htmlspecialchars($row['voornaam']); ?></b>
                        <b><span class="label">Achternaam:</span> <?php echo htmlspecialchars($row['achternaam']); ?></b>
                        <b><span class="label">Leeftijd:</span> <?php echo htmlspecialchars($row['leeftijd']); ?></b>
                        <b><span class="label">Woonadres:</span> <?php echo htmlspecialchars($row['woonadres']); ?></b>
                        <div class = "line"></div>
                        <br>
                        
                    <?php endwhile; ?>
                </div>
                <div class="admin-user-list">
                    <?php
                    $sql = "SELECT id, reis_id, startdatum, einddatum, user_id, huurAuto FROM boekingen";
                    $stmt = $connection->query($sql);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                    ?>
                        
                        <b><span class="label">ID:</span> <?php echo htmlspecialchars($row['id']); ?></b>
                        <b><span class="label">Reis_id:</span> <?php echo htmlspecialchars($row['reis_id']); ?></b>
                        <b><span class="label">Startdatum:</span> <?php echo htmlspecialchars($row['startdatum']); ?></b>
                        <b><span class="label">Einddatum:</span> <?php echo htmlspecialchars($row['einddatum']); ?></b>
                        <b><span class="label">User_id:</span> <?php echo htmlspecialchars($row['user_id']); ?></b>
                        <b><span class="label">HuurAuto:</span> <?php echo htmlspecialchars($row['huurAuto']); ?></b>
                        <div class = "line"></div>
                        <br>
                        
                    <?php endwhile; ?>
                </div>
                <div class="admin-user-list">
                    <?php
                    $sql = "SELECT id, naam, prijs, bestemmingen_id, file FROM reizen";
                    $stmt = $connection->query($sql);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                    ?>
                        
                        <b><span class="label">ID:</span> <?php echo htmlspecialchars($row['id']); ?></b>
                        <b><span class="label">Naam:</span> <?php echo htmlspecialchars($row['naam']); ?></b>
                        <b><span class="label">Prijs:</span> <?php echo htmlspecialchars($row['prijs']); ?></b>
                        <b><span class="label">Bestemmingen_id:</span> <?php echo htmlspecialchars($row['bestemmingen_id']); ?></b>
                        <div class = "line"></div>
                        <br>
                        
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        
    <?php endif; ?>

    <?php
        include '../includes/footer.php';
        
    ?>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>