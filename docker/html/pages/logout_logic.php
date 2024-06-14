<?php
session_start();

// 清除所有会话变量
$_SESSION = array();

// 如果存在会话cookie，则删除它
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 销毁会话
session_destroy();

// 重定向到登录页面或主页
$redirect_url = $_SERVER['HTTP_REFERER'];

// 重定向到来源页面
header("Location: " . $redirect_url);
exit;
?>