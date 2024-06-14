<?php
session_start();
?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"> </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-mapael/2.2.0/js/jquery.mapael.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-mapael/2.2.0/maps/world_countries.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mapael/2.2.0/js/maps/world_countries.js" integrity="sha512-vkZusgUuROl1lIF5iB2UQosVzYiTbkAMKnPyDe53lqR/LEkW/+Gagnbalu/p3vM54E+7PR5UXEHYnvexmID2Bw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <?php
            include '../includes/header.php';
        
    ?>
    <div class="map-mid">

        <div class="container">
            <div class="map" href="">Alternative content</div>
        </div>

        <div class="search-bar">
            <div class="search-bar-left">
                <svg id="zoom-in" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120">
                    <!-- 放大镜的主体 -->
                    <circle cx="12" cy="12" r="8" stroke="black" stroke-width="2" fill="none" />

                    <!-- 放大镜的柄 -->
                    <line x1="18" y1="18" x2="30" y2="30" stroke="black" stroke-width="2" />

                    <!-- 加号 -->
                    <line x1="8" y1="12" x2="16" y2="12" stroke="black" stroke-width="2" />
                    <line x1="12" y1="8" x2="12" y2="16" stroke="black" stroke-width="2" />
                </svg>

                <svg id="zoom-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120">
                    <!-- 放大镜的主体 -->
                    <circle cx="12" cy="12" r="8" stroke="black" stroke-width="2" fill="none" />

                    <!-- 放大镜的柄 -->
                    <line x1="18" y1="18" x2="30" y2="30" stroke="black" stroke-width="2" />

                    <!-- 减号 -->
                    <line x1="8" y1="12" x2="16" y2="12" stroke="black" stroke-width="2" />
                </svg>

                <svg id="zoom-reset" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120">
                    <!-- 放大镜的主体 -->
                    <circle cx="12" cy="12" r="8" stroke="black" stroke-width="2" fill="none" />

                    <!-- 放大镜的柄 -->
                    <line x1="18" y1="18" x2="30" y2="30" stroke="black" stroke-width="2" />

                    <!-- 减号 -->
                    <path d="M8,12 l3,3 l7,-7" fill="none" stroke="black" stroke-width="2" />
                </svg>
            </div>
            <div class="search-bar-right">
                <div class = "search-in">
                    <input type="search" name="search" placeholder="search location..." id="searchBox" required>
                    <button id="search-button" class = "searchButton"><h1>Search</h1></button>
                </div>
                <div id="optionsContainer" class="options-container"></div>
            </div>
            
        </div>
    </div>
    <?php
        include '../includes/footer.php';
        
    ?>
    <script src='../js/worldmap.jsx'></script>
    
</body>
</html>

