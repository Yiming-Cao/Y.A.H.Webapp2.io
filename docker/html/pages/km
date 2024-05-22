<?php
session_start();

// 将会话变量重置为 false，并销毁会话
$_SESSION['loggedin'] = false;
unset($_SESSION['user']);
session_destroy();

// 重定向用户回到登录页面
header("Location: login.php");
exit();
?>
