<?php
session_start();
include("conn.php");
if(empty($_POST["username"]) || empty($_POST["password"])){
    header("Location: register.php");
    exit();
}

$target_dir = "uploads/";

// Zorg ervoor dat de uploads-directory bestaat en schrijfbaar is
if (!is_dir($target_dir) && !mkdir($target_dir, 0755, true)) {
    die("Maken van upload-directory mislukt.");
}

if (!is_writable($target_dir)) {
    die("Upload-directory is niet schrijfbaar.");
}

// maakt een unieke bestandsnaam om conflicten te voorkomen
$target_file = $target_dir . uniqid() . "-" . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Controleer of het bestand een echte afbeelding is of een nep-afbeelding
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
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
if ($_FILES["file"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "Het bestand " . htmlspecialchars(basename($_FILES["file"]["name"])) . " is geüpload.";
    } else {
        echo "Sorry, er was een fout bij het uploaden van uw bestand.";
    }
}




$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$image = $_POST["image"];

$stmt = $connection->prepare("INSERT INTO reizen(username,password, email, image)  VALUES(:user, :pass, :mail :afbeelding)");
$stmt->bindParam(":user", $username);
$stmt->bindParam(":pass", $password);
$stmt->bindParam(":mail", $email);
$stmt->bindParam(":afbeelding", $target_file,);
$stmt->execute();


header("Location: login.php");
?>  