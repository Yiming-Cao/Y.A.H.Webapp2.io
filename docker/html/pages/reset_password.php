<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/maincss.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

    <title>Reset Password</title>
</head>
<body>
    <?php
        include '../includes/header.php';
    ?>
    <div class="login-vlak">
        <form action="reset_password_logic.php" name="reset_password_logic" method="POST" class="vlak-login">
            <label for="">Username:</label>
            <input type="text" name="username" placeholder="Username" class="input-vlak" required>
            
            <label for="password">New Password:</label>
            <input type="password" name="password" placeholder="New Password" class="input-vlak" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="input-vlak" required>
            
            <input type="submit" value="Reset Password" class="register2">
        </form>
    </div>
    <?php
        include '../includes/footer.php';
    ?>
</body>
</html>
