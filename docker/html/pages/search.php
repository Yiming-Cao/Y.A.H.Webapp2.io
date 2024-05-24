<?php
    require 'conn.php';
    $search = $_POST['search'];
    $sql = "SELECT * FROM users_data WHERE naam LIKE '%$search%' OR reizen LIKE '%$search%'";
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