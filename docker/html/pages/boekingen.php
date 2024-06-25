<?php 
require 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
<button onclick="setAmountOfGuests()">add guests</button>

<form action='register_persoon.php' method="POST" id='registerform'>
    <label>Hoeveel gasten?</label>

    <input  type="number" id='amountGuests' name="aantal_gasten" placeholder="1">
    <input type="text" name="voornaam" placeholder="Voornaam">
    <input type="text" name="achternaam" placeholder="Achternaam">
    <input type="text" name="leeftijd" placeholder="leeftijd">
    <input type="text" name="woonadres" placeholder="woonadres">
    <input type="button" name="submit" value="submit">
</form>
<br>




<script src='js/main.jsx'></script>
</body>
</html>