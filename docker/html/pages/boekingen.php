<?php
        include "./conn.php";
        echo $_POST['hvl_gasten'];

for($i = 0; $i < $_POST['hvl_gasten']; $i++){
    $sql = "INSERT INTO user_data (voornaam, achternaam, email, geslacht, geboortedatum, adres, booking_id) VALUES (:voornaam, :achternaam, :email, :geslacht, :geboortedatum, :adres, :booking_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'voornaam' => $_POST['voornaam'],
        'achternaam' => $_POST['achternaam'],
        'email' => $_POST['email'],
        'geslacht' => $_POST['geslacht'],
        'geboortedatum' => $_POST['geboortedatum'],
        'adres' => $_POST['adres'],
        'booking_id' => $_SESSION['booking_id'],
    ]);
}

?>