<?php
session_start();
include("conn.php");

$boekingid = $_POST["boeking_id"];

try {
    // Start a transaction
    $connection->beginTransaction();

    // Prepare and execute the first delete statement
    $stmt = $connection->prepare("DELETE FROM boekingen WHERE id=:boekingid");
    $stmt->bindParam(":boekingid", $boekingid);
    $stmt->execute();


    // Commit the transaction
    $connection->commit();

    // Redirect after successful deletion
    header("Location: user-detail.php");
    exit();
} catch (Exception $e) {
    // Rollback the transaction if something failed
    $connection->rollBack();
    echo "Failed to delete boeking: " . $e->getMessage();
}
?>