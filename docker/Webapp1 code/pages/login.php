<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main1.css">
    <title>Login</title>
</head>
<body>
    <div class="login-vlak">
        <form action="login_logic.php" name="login_logic" method="POST" class="vlak-login">
            <label for="">Username:</label>
            <input type="text" name="username" placeholder="Username" required>
            <label for="">Password: </label>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="login">
            
        </form>
    </div>
    
</body>
</html> 