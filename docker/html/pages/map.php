<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/maincss.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

    <title>Map</title>
</head>
<body>
    <?php
            include '../includes/header.php';
        
    ?>
    <div class="map-mid">
        <div class="image-container">
            <img src="../images/map.png" alt="" class="map-img">
            <div id="tooltip" class="tooltip">
                <img id="tooltip-image" src="" alt="Tooltip Image">
                <p id="tooltip-text"></p>
            </div>
        </div>
        <div class="search-bar">
            <div class="search-bar-left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120">
                    <!-- 放大镜的主体 -->
                    <circle cx="12" cy="12" r="8" stroke="black" stroke-width="2" fill="none" />

                    <!-- 放大镜的柄 -->
                    <line x1="18" y1="18" x2="30" y2="30" stroke="black" stroke-width="2" />

                    <!-- 加号 -->
                    <line x1="8" y1="12" x2="16" y2="12" stroke="black" stroke-width="2" />
                    <line x1="12" y1="8" x2="12" y2="16" stroke="black" stroke-width="2" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120">
                    <!-- 放大镜的主体 -->
                    <circle cx="12" cy="12" r="8" stroke="black" stroke-width="2" fill="none" />

                    <!-- 放大镜的柄 -->
                    <line x1="18" y1="18" x2="30" y2="30" stroke="black" stroke-width="2" />

                    <!-- 减号 -->
                    <line x1="8" y1="12" x2="16" y2="12" stroke="black" stroke-width="2" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120">
                    <!-- 放大镜的主体 -->
                    <circle cx="12" cy="12" r="8" stroke="black" stroke-width="2" fill="none" />

                    <!-- 放大镜的柄 -->
                    <line x1="18" y1="18" x2="30" y2="30" stroke="black" stroke-width="2" />

                    <!-- 减号 -->
                    <path d="M8,12 l3,3 l7,-7" fill="none" stroke="black" stroke-width="2" />
                </svg>
            </div>
            <div class="search-bar-right">
                
                <input type="search" name="search" placeholder="search location..." class="search-vlak" required>
                
            </div>
            
        </div>
    </div>
    <?php
        include '../includes/footer.php';
        
    ?>
    <script src="/js/mapscript.jsx"></script>
</body>
</html>