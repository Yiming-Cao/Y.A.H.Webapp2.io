<?php
session_start();
include("conn.php");
?>
<?php
    $_SESSION['user_id'] = $_POST["user_id"];
    $_SESSION['reis_id'] = $_POST["reis_id"];
    $_SESSION['persoonen'] = $_POST["persoonen"];
    $_SESSION['deTotalePrijs'] = $_POST["deTotalePrijs"];
    $stmt = $connection->prepare("INSERT INTO boekingen (user_id, reis_id,persoonen,deTotalePrijs)  VALUES (:userid, :reisid, :persoonen, :totaleprijs)")
?>