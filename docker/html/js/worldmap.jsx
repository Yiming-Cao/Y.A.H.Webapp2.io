$(".container").mapael({
    map : {
        name : "world_countries",
        defaultArea: {
            eventHandlers: {
                click: function (e, id, mapElem, textElem, elemOptions) {
                    if (id === "WS") { // Check if the clicked area is China (CN is the ISO code for China)
                        window.location.href = '../pages/eiland.php';
                    }
                }
            }
        },
        zoom: {
            enabled: true,
            maxLevel: 10
        },
        pan: {
            enabled: true,
            mode: 'xy', // allow panning in both x and y directions
            animDuration: 300
        }
    }

});

// Zoom In functionality
$('#zoom-in').on('click', function() {
    $(".container").trigger("zoom", { level: "+1", animDuration: 300 });
});

// Zoom Out functionality
$('#zoom-out').on('click', function() {
    $(".container").trigger("zoom", { level: -1, animDuration: 300 });
});

// Reset Zoom functionality
$('#zoom-reset').on('click', function() {
    $(".container").trigger("zoom", { level: 0, animDuration: 300 });
});

// Enable dragging (panning)
$(".container").on("mousedown touchstart", function(e) {
    var $this = $(this);
    var startX = e.pageX || e.originalEvent.touches[0].pageX;
    var startY = e.pageY || e.originalEvent.touches[0].pageY;
    var startPanX = $(".container").data('mapael').zoomData.panX;
    var startPanY = $(".container").data('mapael').zoomData.panY;

    $(document).on("mousemove touchmove", function(e) {
        var moveX = e.pageX || e.originalEvent.touches[0].pageX;
        var moveY = e.pageY || e.originalEvent.touches[0].pageY;
        var diffX = (moveX - startX) / $this.width();
        var diffY = (moveY - startY) / $this.height();

        $(".container").trigger("zoom", {
            level: $(".container").data('mapael').zoomData.zoomLevel,
            panX: startPanX - diffX,
            panY: startPanY - diffY,
            animDuration: 0
        });

        e.preventDefault();
    });

    $(document).on("mouseup touchend", function() {
        $(document).off("mousemove touchmove mouseup touchend");
    });

    e.preventDefault();
});

// 定义一个对象，将国家名称映射到对应的 data-id
var countryMapping = {
    "china": "CN",
    // 其他国家和data-id的映射关系
};


// 监听搜索框的输入事件
$(".search-vlak").on("input", function() {
    // 获取搜索框中的输入值，并转换为小写
    var searchTerm = $(this).val().toLowerCase();
    
    // 根据输入值在映射对象中查找对应的 data-id
    var areaId = countryMapping[searchTerm];
    
    // 如果找到了对应的 data-id，则触发地图定位到该区域
    if (areaId) {
        $(".container").trigger("zoom", {
            level: 300, // Zoom level (adjust as needed)
            area: areaId,
            animDuration: 300
        });
    }
});




 // Populate dropdown with country names
 var countryDropdown = $('#country-dropdown');
 var countries = world_countries_map.names;
 $.each(countries, function(code, name) {
     var item = $('<div class="dropdown-item">' + name + '</div>');
     item.on('click', function() {
         $(".container").trigger("zoom", {
             level: 5, // Zoom level (adjust as needed)
             area: code,
             animDuration: 300
         });
         $('.search-vlak').val(name);
         countryDropdown.hide();
     });
     countryDropdown.append(item);
 });

 // Show dropdown when search input is clicked
 $('.search-vlak').on('click', function() {
     countryDropdown.show();
 });

 // Hide dropdown when clicking outside of it
 $(document).on('click', function(e) {
     if (!$(e.target).closest('.search-bar-right').length) {
         countryDropdown.hide();
     }
 });