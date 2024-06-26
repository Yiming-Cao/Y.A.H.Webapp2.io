<?php
session_start();
include("conn.php"); // Ensure this file contains your database connection settings

// Check if required fields are empty
if(empty($_POST["username"]) || empty($_POST["rating"]) || empty($_POST["recensie"])) {
    header("Location: recensiescopy.php");
    exit();
}

// Assign values from POST data
$username = $_POST["username"];
$rating = $_POST["rating"];
$recensie = $_POST["recensie"];
$post = date('Y-m-d H:i:s'); // Assuming you want to use current timestamp for 'post'

// Ensure user_id is set in session and assign it
if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    // Redirect or handle error if user_id is not set in session
    header("Location: recensiescopy.php");
    exit();
}

// Prepare and execute SQL statement
$stmt = $connection->prepare("INSERT INTO recensies (username, user_id, rating, recensie, post) VALUES (:username, :user_id, :rating, :recensie, :post)");
$stmt->bindParam(":username", $username);
$stmt->bindParam(":user_id", $user_id);
$stmt->bindParam(":rating", $rating);
$stmt->bindParam(":recensie", $recensie);
$stmt->bindParam(":post", $post);

// Execute the statement
try {
    $stmt->execute();
    
    // Redirect to registerB.php or another appropriate page
    header("Location: ../index.php");
    exit();
} catch (PDOException $e) {
    // Handle database error gracefully (e.g., log the error, display a user-friendly message)
    echo "Error: " . $e->getMessage();
}
?>
