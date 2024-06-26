<?php
session_start();
include("conn.php");

$reisid = $_POST["reis_id"];

try {
    // Start a transaction
    $connection->beginTransaction();

    // Prepare and execute the first delete statement
    $stmt = $connection->prepare("DELETE FROM reizen WHERE id=:reisid");
    $stmt->bindParam(":reisid", $reisid);
    $stmt->execute();


    // Commit the transaction
    $connection->commit();

    // Redirect after successful deletion
    header("Location: user-detail.php");
    exit();
} catch (Exception $e) {
    // Rollback the transaction if something failed
    $connection->rollBack();
    echo "Failed to delete reis: " . $e->getMessage();
}
?>