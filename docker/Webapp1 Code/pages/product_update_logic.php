<?php
    include 'conn.php';
    $data = [
        'naam' => $_POST['naam'],
        'prijs' => $_POST['prijs'],
        'id' => $_POST['id_product']
    ];
    $sql = "UPDATE products SET naam=:naam, prijs=:prijs WHERE id=:id";
    $stmt = $connection->prepare($sql);
    $stmt->execute($data);

    header('Location: ../index.php');


?>