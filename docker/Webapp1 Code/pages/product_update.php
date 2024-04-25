<?php
session_start();
include 'conn.php';


$stmt = $connection->prepare("SELECT * FROM products WHERE id=:id");
$stmt->execute(['id' => $_GET['id']]);
$product = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main1.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>
    <?php
        include '../includes/header.php';
    
    ?>
    <div class="login-vlak">
        <form action="product_update_logic.php" name="product_update_logic" method="POST" class="vlak-login">
            <label for="">Id van product: </label>
            <input type="text" name="id_product" value="<?php echo $product['id'];?>" required>
            <label for="">Naam van product: </label>
            <input type="text" name="naam" value="<?php echo $product['naam'];?>" required>
            <label for="">Prijs van product: </label>
            <input type="text" name="prijs" value="<?php echo $product['prijs'];?>" required>
            <input type="submit" value="update product">
            
        </form>
    </div>
</body>
</html>