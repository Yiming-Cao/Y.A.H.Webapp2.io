<?php
session_start();
include 'conn.php';

// Fetch user data based on session user_id
$user_id = $_SESSION['id'] ?? null;
$user_data = null;

if ($user_id) {
    $sql = "SELECT id, voornaam, achternaam, leeftijd, woonadres FROM user_data WHERE id = :user_id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
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
        </div>
    </div>

    <?php if ($user_id && $user_id <= 5): ?>
        <div class="admin-panel">
            <h2>Admin Panel</h2>
            <form method="POST" action="add_user.php">
                <input type="text" name="new_user" placeholder="New User Name">
                <input type="submit" value="Add User">
            </form>
            <form method="POST" action="delete_user.php">
                <input type="number" name="user_id" placeholder="User ID to delete">
                <input type="submit" value="Delete User">
             </form>
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
                    <br>
                <?php endwhile; ?>
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