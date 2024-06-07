
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>
    
    <?php
        include 'includes/header.php';
        
    ?>
    <div class="mid">
        <div class="vlak-1">
            <div class="vlak-1-left">
                <div class="vlak-1-text">
                    <h2>
                        Geniet van Aziatische smaken
                    </h2>
                </div>
                <div class="vlak-1-bottom">
                    <a href="pages/menu.php">
                        <div class="login" type="button">
                            <h1>MENU</h1>
                        </div>
                    </a>
                </div>
            </div>
            <div class="vlak-1-right">
                <img src="image/Star 1.png" alt="">
            </div>
        </div>
        <div class="vlak-2">
            <div class="vlak-2-in">
                <div class="vlak-2-img1">
                    <h3>Het beste chief op het wereld</h3>
                </div>
                <div class="vlak-2-img2">
                    <h3>Je kan samen met jouw vrienden eten</h3>
                </div>
                <div class="vlak-2-img3">
                    <h3>Wij heb thuisbezorg naar jouw huis</h3>
                </div>
            </div>
            <div class="vlak-2-end">
                <div class="vlak-2-text">
                    <h4>Open uren</h4>
                    <h4>Ma  12:00 tot 21:30</h4>
                    <h4>Di  12:00 tot 21:30</h4>
                    <h4>Wo  12:00 tot 21:30</h4>
                    <h4>Do  12:00 tot 21:30</h4>
                    <h4>Fr  12:00 tot 21:30</h4>
                    <h4>Sa  12:00 tot 21:30</h4>
                    <h4>Zo  12:00 tot 21:30</h4>
                </div>
                <div class="vlak-2-text2">
                    <h5>Yeet</h5>
                    <h4>
                        Heyendaalseweg 22
                    </h4>
                    <h4>
                        6542 XX Nijmegen
                    </h4>
                    <h4>
                        +31 6 42 12 09 88
                    </h4>
                    <h4>
                        info@yeet-nijmegen.nl
                    </h4>
                </div>
            </div>
        </div>
        
    </div>
    <footer>
            <div class="footer-vlak">
                Follow US
            </div>
            <div class="footer-vlak2">
                <div class="footer-vlak-in">
                    instagram
                </div>
                <div class="footer-vlak-in">
                    Facebook
                </div>
                <div class="footer-vlak-in">
                    Tripadvisor
                </div>
            </div>
        </footer>
</body>
</html>



<div class="image-container">
            <img src="../images/map.png" usemap="#worldMap" alt="" class="map-img">
            <map name="worldMap">
                <area shape="poly" coords="1001,191" href="#" alt="中国" id="chinaArea">
                <!-- 其他国家的区域 -->
            </map>
            <div id="tooltip" class="tooltip">
                <img id="tooltip-image" src="" alt="Tooltip Image">
                <p id="tooltip-text"></p>
            </div>
        </div>