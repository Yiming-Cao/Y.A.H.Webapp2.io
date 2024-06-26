<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/maincss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include '../includes/header.php';
        include 'conn.php'; // Include your database connection file
        
        // Fetch recensies from database
        $stmt = $connection->query("SELECT * FROM recensies ORDER BY post DESC"); // Example query
        $recensies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    

    <div class="login-vlak">
        <!-- Form for submitting review -->
        <form action="recensies_logic.php" method="POST" class="vlak-login">
            <input type="text" name="username" placeholder="Username" class="input-vlak" required>
            
            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" required>
            
            <label for="recensie">Recensie:</label>
            <input type="text" name="recensie" placeholder="recensie" class="input-vlakresensie" required>
            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="recensies">
        <h2>Recensies</h2>
        <?php if (!empty($recensies)): ?>
            <?php foreach ($recensies as $recensie): ?>
                <div class="review">
                    <p><strong>Username:</strong> <?php echo htmlspecialchars($recensie['username']); ?></p>
                    <p><strong>Rating:</strong> <?php echo htmlspecialchars($recensie['rating']); ?>/5</p>
                    <p><strong>Review:</strong> <?php echo nl2br(htmlspecialchars($recensie['recensie'])); ?></p>
                    <p><small><strong>Submitted on:</strong> <?php echo htmlspecialchars($recensie['post']); ?></small></p>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No recensies yet.</p>
        <?php endif; ?>
    </div>

    <?php
        include '../includes/footer.php';
    ?>
</body>
</html>
