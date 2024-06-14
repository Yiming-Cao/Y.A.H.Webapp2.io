<?php

$target_dir = "uploads/";

// Zorg ervoor dat de uploads-directory bestaat en schrijfbaar is
if (!is_dir($target_dir) && !mkdir($target_dir, 0755, true)) {
    die("Maken van upload-directory mislukt.");
}

if (!is_writable($target_dir)) {
    die("Upload-directory is niet schrijfbaar.");
}

// maakt een unieke bestandsnaam om conflicten te voorkomen
$target_file = $target_dir . uniqid() . "-" . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Controleer of het bestand een echte afbeelding is of een nep-afbeelding
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "Bestand is een afbeelding - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Bestand is geen afbeelding.";
        $uploadOk = 0;
    }
}

// Controleer of het bestand al bestaat
if (file_exists($target_file)) {
    echo "Sorry, bestand bestaat al.";
    $uploadOk = 0;
}

// Controleer de bestandsgrootte (limiet van 500KB)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, uw bestand is te groot.";
    $uploadOk = 0;
}

// Sta alleen bepaalde bestandsformaten toe
$toegestane_types = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $toegestane_types)) {
    echo "Sorry, alleen JPG, JPEG, PNG & GIF bestanden zijn toegestaan.";
    $uploadOk = 0;
}

// Controleer of $uploadOk op 0 is gezet door een fout
if ($uploadOk == 0) {
    echo "Sorry, uw bestand is niet geüpload.";
} else {
    // Probeer het geuploade bestand naar de map te verplaatsen
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Het bestand " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " is geüpload.";
    } else {
        echo "Sorry, er was een fout bij het uploaden van uw bestand.";
    }
}
?>
