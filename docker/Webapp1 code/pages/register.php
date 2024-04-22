<?php
    if ($_POST["leeftijd"] < 18) {
        header("Loction ../index.php");
    } else {
        echo"legal";
    }
    
?>