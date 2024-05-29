<?php
require 'conn.php'; // Ensure this file exists and has correct path

// Check if 'search' is set in POST request
$search = isset($_POST['search']) ? $_POST['search'] : '';

// Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users_data WHERE naam LIKE ? OR reizen LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </table>
    
</body>
</html>
<?php
// Close the statement and connection
$stmt->close();
$conn->close();
?>