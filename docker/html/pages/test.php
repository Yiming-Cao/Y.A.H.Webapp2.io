<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Fuggles&family=Lato:wght@700&family=Montserrat:wght@500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/maincss.css">
</head>

<body>


  </div>
  <header>
    <div class="singleReis">';
      <section class='productenRow'>
        <?php
        // Variable statement is het resultaat van connectie & de query
        $stmt = $connection->query("SELECT * FROM reizen");

        // Loop voor alles wat we vinden
        while ($row = $stmt->fetch()) {
          echo '<div class="singleReis">';
          echo '<img class="menu-fotos" src="../images/Tahiti.jpg" alt="">';
          echo $row['naam'];
          echo $row['prijs'];
          echo $row['beschrijving'];
          echo $row['imgslanden'];

          echo '</div>';
        }
        ?>
      </section>
</body>
</header>

<!-- Footer -->


</html>