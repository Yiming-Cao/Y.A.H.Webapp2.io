
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>特别菜单</title>
       <style>
           /* 在这里添加CSS样式 */
           header{
            display: flex;
            justify-content: center;
            font-size: 30px;
           }
           .menu-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            flex-direction: column;
            width: 800px;
            margin: auto;
            }
            .menu-title {
                font-weight: bold;
                color: orange;
            }
            .menu-price {
                font-weight: bold;
            }
            .product-details {
                display: flex;
                justify-content: space-between;
            }
            .menu-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
       </style>
       <link rel="stylesheet" href="../css/main1.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

   </head>
   <body>
        <?php
            include '../includes/header.php';
            include("conn.php");
            
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $loggedIn = true;
        } else {
            $loggedIn = false;
        }

            $loggedIn = true;
        ?>
       <header>
           <h6 class="menu-title">Menu</h6>
           
       </header>
       <div class="menu-container">
        <?php
        include("conn.php");
        $stmt = $connection->prepare("SELECT * FROM products");
        $stmt->execute();
        $data = $stmt->fetchAll();

        foreach ($data as $row){
        ?>
            <div class="menu-item">
                <div class="product-details">
                    <div class="id"><?php echo $row['id']; ?></div>
                    <div class="naam"><?php echo $row['naam']; ?></div>
                    <div class="menu-price"><?php echo $row['prijs']; ?></div>
                </div>
                <div><?php echo $row['omschijving']; ?></div>
                <?php if($loggedIn): ?>
                    <a href='product_update.php?id=<?php echo $row['id']; ?>'>Update</a>
                    <a href='product_delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
                <?php endif; ?>
            </div>
        <?php
        }
        ?>
       </div>
   </body>
   </html>
   