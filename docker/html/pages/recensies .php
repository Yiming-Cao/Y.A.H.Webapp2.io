<?php
session_start();
if (!isset($_SESSION['id'])) {
    die("Error: User not logged in.");
}
include "../conn.php";

$reis_id = $_GET['reis_id'] ?? null;

if (!$reis_id) {
    die("Error: 'reis_id' must be set");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rating'], $_POST['recensie'])) {
    $user_id = $_SESSION['id'];
    $rating = $_POST['rating'];
    $recensie = $_POST['recensie'];

    // Validate inputs
    if (empty($rating) || empty($recensie)) {
        $error_message = "All fields are required.";
    } elseif (!preg_match('/^[1-5]$/', $rating)) {
        $error_message = "Rating must be a number between 1 and 5.";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO reviews (reis_id, user_id, rating, recensie, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("iiis", $reis_id, $user_id, $rating, $recensie);

        if ($stmt->execute()) {
            $success_message = "Review submitted successfully.";
        } else {
            $error_message = "Error: Could not submit review.";
        }

        $stmt->close();
    }
}

// Fetch reviews
$stmt = $conn->prepare("SELECT r.rating, r.recensie, r.created_at, username FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.reis_id = ?");
$stmt->bind_param("i", $reis_id);
$stmt->execute();
$result = $stmt->get_result();
$reviews = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <link rel="stylesheet" href="../../css/maincss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../../includes/header.php'; ?>

    <div class="container">
        <h1>Submit a Review</h1>
        <form action="" method="POST">
            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" required>
            <br>
            <label for="recensie">Review:</label>
            <textarea name="recensie" required></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>

        <h2>Reviews</h2>
        <?php if ($reviews): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="review">
                    <p><strong>Username:</strong> <?php echo htmlspecialchars($review['username']); ?></p>
                    <p><strong>Rating:</strong> <?php echo htmlspecialchars($review['rating']); ?>/5</p>
                    <p><strong>Review:</strong> <?php echo nl2br(htmlspecialchars($review['recensie'])); ?></p>
                    <p><small><strong>Submitted on:</strong> <?php echo htmlspecialchars($review['created_at']); ?></small></p>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No reviews yet.</p>
        <?php endif; ?>
    </div>

    <?php include '../../includes/footer.php'; ?>
</body>
</html>
