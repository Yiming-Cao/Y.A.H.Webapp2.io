<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="../../css/maincss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include '../includes/header.php';
        include "./conn.php";
 ?>
 <div class="naam2">
 <h6>Over Ons - Y.A.H.I Reizen</h6>
 </div>
 <div class=" revieuw-container">
 <div class="revieuw-containertext">
<h1 >Y.A.H.I Reizen staat voor Yiming & Youthful, 
Abdelilah & Avontuur, en Harm & Holiday. Wij bieden gepersonaliseerde avonturen en ontspannende vakanties, met een focus op kwaliteit en unieke ervaringen. Ontdek de wereld met ons en maak uw droomreis werkelijkheid.
</h1>
</div>
</div>
</body>
<div class="revieuw-container">
<div class="revieuw-button">
 <a href="http://localhost:8000/pages/recensiescopy.php">Recensies
    </div>
    </div>
</a>
    <div class="revieuw-container">
<div class="revieuw-button">
 <a href="http://localhost:8000/pages/contact.php">Hulp nodig?
    </div>
    </div>
    </a>
</html>
<?php
    include '../includes/footer.php';
?>