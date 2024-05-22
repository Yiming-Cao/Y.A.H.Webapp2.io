<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

//if ($_SESSION['rol'] < 2) {
    
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main1.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

    <title>Delete</title>
</head>
<body>
    <?php
        include '../includes/header.php';
    
    ?>
    <div class="login-vlak">
        <form action="user_delete_logic.php" name="user_delete_logic" method="POST" class="vlak-login">
            <label for="">Id van user: </label>
            <input type="text" name="id_user" placeholder="Username" required>
            <input type="submit" value="delete_user">
            
        </form>
    </div>
    
</body>
</html> 