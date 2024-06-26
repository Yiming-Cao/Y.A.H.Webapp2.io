<?php
session_start();
include("conn.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    die("Error: User not logged in.");
}
$_SESSION['user_id'] = $_SESSION['id'];
$_SESSION['username'] = $_SESSION['username']; // Assuming the username is stored in the session

// Initialize variables
$review_successful = false;
$error_message = '';
$reis_id = isset($_GET['reis_id']) ? $_GET['reis_id'] : null;

// Check if POST data is set
if (isset($_POST['rating']) && isset($_POST['recensie']) && isset($_POST['reis_id'])) {
    // Trim input values to remove any extra spaces
    $rating = trim($_POST['rating']);
    $recensie = trim($_POST['recensie']);
    $reis_id = trim($_POST['reis_id']);
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    // Validate inputs
    if (empty($rating) || empty($recensie)) {
        $error_message = "Error: All fields are required.";
    } elseif (!preg_match('/^[1-5]$/', $rating)) {
        $error_message = "Error: Rating must be a number between 1 and 5.";
    } else {
        // Prepare and execute SQL statement
        try {
            $stmt = $connection->prepare("INSERT INTO recensies (reis_id, user_id, rating, recensie, username, post) VALUES (:reis_id, :user_id, :rating, :recensie, :username, NOW())");
            $stmt->bindParam(":reis_id", $reis_id);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":rating", $rating);
            $stmt->bindParam(":recensie", $recensie);
            $stmt->bindParam(":username", $username);

            if ($stmt->execute()) {
                $review_successful = true;
            } else {
                $errorInfo = $stmt->errorInfo();
                $error_message = "Error: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            $error_message = "Error: " . $e->getMessage();
        }
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $error_message = "Error: All fields must be set.";
    }
}

// Fetch reviews
$reviews = [];
if ($reis_id) {
    $stmt = $connection->prepare("SELECT recensie, rating, post, username FROM recensies WHERE reis_id = :reis_id");
    $stmt->bindParam(":reis_id", $reis_id);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <link rel="stylesheet" href="../../css/maincss.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
        <h1>Submit a Review</h1>
        <?php if ($review_successful): ?>
            <p>Review submitted successfully.</p>
        <?php elseif (!empty($error_message)): ?>
            <p><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <input type="hidden" name="reis_id" value="<?php echo htmlspecialchars($reis_id); ?>">
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
                    <p><small><strong>Submitted on:</strong> <?php echo htmlspecialchars($review['post']); ?></small></p>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No reviews yet.</p>
        <?php endif; ?>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
