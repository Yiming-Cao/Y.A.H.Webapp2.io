<?php
session_start();
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
            
    ?>

<section id="mail me">
        <div class="push5"></div>
        <div class="uitleg">
          <h1>Als je hier op het button klikt wordt je naar het mail gestuurd.</h1>
        </div>
       <div class="button-container">
        <a href="mailto:abdelilahbenhaddi024@gmail.com" class="button">
          <div class="streepje"></div>
          <h1>_________</h1>
          <span class="button-tekts">Mail ons</span>
          <div class="icon"></div>
          <h1>_________</h1>
        </a>f
       </div>
       <?php
        include '../includes/footer.php';
    ?>
</body>
</html>