<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/maincss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="headerRight">

        </div>
        <div class="headerMid">
            <a href="../../index.php">
                <div class="logo">
                    <img src="/images/logo.png" alt="" class="logo">
                </div>
            </a>
        </div>
        <div class="headerLeft">
            <?php if (isset($_SESSION['user'])): ?>
                <!-- 如果用户已登录，显示用户名 -->
                <a href="../pages/user-detail.php">
                    <div class="register" type="button" ><h1><?php echo htmlspecialchars($_SESSION['user']); ?></h1></div>
                </a>
                <a href="logout_logic.php">
                    <div class="login" type="button" >
                        <h2>loguit</h2>
                    </div>
                </a>
                
            <?php else: ?>
                <!-- 如果用户未登录，显示注册和登录按钮 -->
                <a href="../../pages/register.php">
                    <div class="register" type="button" >
                        <h1>register</h1>
                    </div>
                </a>
                <a href="../../pages/login.php">
                    <div class="login" type="button" >
                        <h2>login</h2>
                    </div>
                </a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>