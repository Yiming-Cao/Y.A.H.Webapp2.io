<?php
session_start();
include("conn.php");

$userid = $_POST["user_id"];

try {
    // Start a transaction
    $connection->beginTransaction();

    // Prepare and execute the first delete statement
    $stmt1 = $connection->prepare("DELETE FROM user WHERE id=:userid");
    $stmt1->bindParam(":userid", $userid);
    $stmt1->execute();

    // Prepare and execute the second delete statement
    $stmt2 = $connection->prepare("DELETE FROM user_data WHERE id=:userid");
    $stmt2->bindParam(":userid", $userid);
    $stmt2->execute();

    

    // Commit the transaction
    $connection->commit();

    // Redirect after successful deletion
    header("Location: user-detail.php");
    exit();
} catch (Exception $e) {
    // Rollback the transaction if something failed
    $connection->rollBack();
    echo "Failed to delete user: " . $e->getMessage();
}
?>
