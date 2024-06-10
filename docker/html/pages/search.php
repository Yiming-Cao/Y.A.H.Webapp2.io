<?php

    require 'conn.php';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM reizen WHERE name LIKE '%$search%'";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
    } else {
        echo "Not found";
    }

    $sql = "SELECT naam, reizen_id, prijs, startDatum, eindDatum FROM reizen";

    $stmt = $connection->prepare($sql);
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
    <label>Y.A.H.I</label>
    <input type="checkbox" id="isY.A.H.I">

    <button onclick="filter()">filter</button>
    <table id="reizen_results">
        <tr>
            <th>naam</th>
            <th>prijs</th>
            <th>startDatum</th>
            <th>eindDatum</th>
        </tr>

        <?php foreach($result as $row):?>
            <tr class="reizen">
                <td><?php echo $row['naam'];?></td>
                <td><?php echo $row['prijs'];?></td>
                <td><?php echo $row['startDatum'];?></td>
                <td><?php echo $row['eindDatum'];?></td>
            </tr>
        <?php endforeach; ?>

    </table>
    
</body>
</html>
<?php
// Close the statement and connection

?>