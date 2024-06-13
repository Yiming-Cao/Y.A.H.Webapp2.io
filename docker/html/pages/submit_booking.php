<?php
include './conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch form data
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $price = $_POST['price'];

    // Prepare and execute the insert statement
    $stmt = $connection->prepare("INSERT INTO boekingen (start_date, end_date, price) VALUES (:start_date, :end_date, :price)");
    $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
    $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: index.php?message=Booking successful');
        exit();
    } else {
        header('Location: index.php?message=Booking failed. Please try again.');
        exit();
    }
}
