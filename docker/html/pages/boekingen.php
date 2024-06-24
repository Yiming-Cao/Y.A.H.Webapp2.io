<?php
include("conn.php");
echo $_POST['hvl_gasten'];

for($i = 0; $i < $_POST['hvl_gasten']; $i++){
    $sql = "INSERT INTO user_data(voornaam, achternaam, leeftijd, woonadres) VALUES (:voornaam, :achternaam, :leeftijd, :woonadres)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([
        'voornaam' => $_POST['voornaam'],
        'achternaam' => $_POST['achternaam'],
        'email' => $_POST['email'],
        'leeftijd' => $_POST['leeftijd'],
        'woonadres' => $_POST['woonadres'],
    ]);
}

?>