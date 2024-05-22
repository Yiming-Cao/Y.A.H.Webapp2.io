<?php
session_start();

if (!isset($_SESSION["user"])) {
	header("Location: login.php");
	exit();
}


if (isset($_GET['logout'])) {
	session_destroy();
	header("Location: login.php");
	exit();
}


?>

<a href="?logout=true">Logout</a>