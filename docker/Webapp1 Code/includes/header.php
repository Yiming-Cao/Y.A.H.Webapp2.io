<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main1.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>
<div class="header">
            <div class="headerRight">
                <div class="logo">
                    <img src="/image/logo-yeet.png" alt="" class="logo">
                </div>
            </div>
            <div class="headerLeft">
                <a href="../pages/menu.php">
                    <div class="menu">
                        <h1>MENU</h1>
                    </div>
                </a>
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <a href="../pages/logout_logic.php">
                        <div class="logout" type="button" >
                            <h1>LOGOUT</h1>
                        </div>
                    </a>
                <?php else: ?>
                    <a href="../pages/login.php">
                        <div class="login" type="button" >
                            <h1>LOGIN</h1>
                        </div>
                    </a>
                <?php endif; ?>
                <a href="../index.php">
                    <div class="go">
                        <svg width="82" height="10">
                            <line x1="10" y1="5" x2="72" y2="5" stroke="black" stroke-width="2" />
                        </svg>
                        <svg width="82" height="10">
                            <line x1="10" y1="4" x2="72" y2="4" stroke="black" stroke-width="2" />
                        </svg>
                        <svg width="82" height="10">
                            <line x1="10" y1="4" x2="72" y2="4" stroke="black" stroke-width="2" />
                        </svg>
                    </div>
                </a>
            </div>
</div>
</body>
</html>
