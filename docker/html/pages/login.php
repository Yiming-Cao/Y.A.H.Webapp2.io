<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/maincss.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    <?php
            include '../includes/header.php';
        
    ?>
    <div class="login-vlak">
        <form action="login_logic.php" name="login_logic" method="POST" class="vlak-login">
            <label for="">Username:</label>
            <input type="text" name="username" placeholder="Username" class="input-vlak" required>
            <label for="">Password: </label>
            <input type="password" name="password" placeholder="Password" class="input-vlak" required>
            <input type="submit" value="login" class="login">
            <a href="register.php">
                <input type="button" value="register" class="register">
            </a>
            
        </form>
    </div>
    <?php
        include '../includes/footer.php';
            
    ?>
</body>
</html> 