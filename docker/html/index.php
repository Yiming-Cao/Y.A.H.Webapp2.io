<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/maincss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include 'includes/header.php';
            
    ?>

    <div class="mid">
        <div class="midup">
            <div class="midup-left">
                <img src="images/plane.png" alt="" class="planeimg">
            </div>
            <div class="midup-right">
                <div class="midup-right-1">
                    <h3>Welkom, Bonjour, </h3>
                    <h3>Hola, aloha!</h3>
                </div>
                <div class="midup-right-2">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim  veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea  commodo consequat. Duis aute irure dolor in reprehenderit in voluptate  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint  occaecat cupidatat non proident, sunt in culpa qui officia deserunt  mollit anim id est laborum</h4>
                </div>
                <div class="midup-right-3">
                    <h1>learn more about YAHI</h1>
                </div>
            </div>
        </div>
        <div class="middown">
            <div class="middown-left">
                <div class="middown-left-1">
                    <h3>Plan your trip </h3>
                    <h3>using our smart </h3>
                    <h3>map!</h3>
                </div>
                <div class="middown-left-2">
                    <img src="images/mapsmall.jpg" alt="" id="image" class="mapsmall">
                    <a href="../pages/map.php">
                        <div class="naarMapButton" type="button" >
                            <h2>view the map</h2>
                        </div>
                    </a>
                </div>
            </div>
            <script src="javascript.jsx"></script>
            <div class="middown-right">
                <img src="images/wereldbol.png" alt="" class="wereldbolimg">
            </div>
        </div>
    </div>
    <?php
        include 'includes/footer.php';
            
    ?>
</body>
</html>