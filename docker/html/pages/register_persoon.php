<?php
include("conn.php");

if (isset($_POST['hvl_gasten'])) {
    $hvl_gasten = ($_POST['hvl_gasten']); // Convert to integer if needed

    for ($i = 0; $i < $hvl_gasten; $i++) {
        // Assuming you have other fields like voornaam, achternaam, leeftijd, woonadres in your form
        $voornaam = $_POST['voornaam'][$i];
        $achternaam = $_POST['achternaam'][$i];
        $leeftijd = $_POST['leeftijd'][$i];
        $woonadres = $_POST['woonadres'][$i];

        // Insert data into database
        $sql = "INSERT INTO user_data (voornaam, achternaam, leeftijd, woonadres) VALUES (:voornaam, :achternaam, :leeftijd, :woonadres)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'voornaam' => $voornaam,
            'achternaam' => $achternaam,
            'leeftijd' => $leeftijd,
            'woonadres' => $woonadres
        ]);
    }

    echo "Data successfully inserted for $hvl_gasten guests.";
} else {
    echo "Error: Number of guests not provided.";
}
?>
