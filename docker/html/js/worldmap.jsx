$(".container").mapael({
    map : {
        name : "world_countries",
        defaultArea: {
            eventHandlers: {
                click: function (e, id, mapElem, textElem, elemOptions) {
                    if (id === "US") { // Check if the clicked area is China (CN is the ISO code for China)
                        window.location.href = '../pages/landen/Amerika.php';
                    }
                    if (id === "CN") { // Check if the clicked area is China (CN is the ISO code for China)
                        window.location.href = '../pages/landen/China.php';
                    }
                    if (id === "JP") { // Check if the clicked area is China (CN is the ISO code for China)
                        window.location.href = '../pages/landen/Japan.php';
                    }
                    if (id === "FR") { // Check if the clicked area is China (CN is the ISO code for China)
                        window.location.href = '../pages/landen/Frankrijk.php';
                    }
                    if (id === "IT") { // Check if the clicked area is China (CN is the ISO code for China)
                        window.location.href = '../pages/landen/Italië.php';
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

 // Search button click event
 $("#search-button").on("click", function() {
    var countryName = $("#searchBox").val().toLowerCase();
    var countryID = getCountryIDByName(countryName);

    if (countryID) {
        // Zoom and highlight the country

        $(".container").trigger('update', [{
            mapOptions: {
                areas: {
                    [countryID]: {
                        attrs: {
                            fill: "#ff0000"
                        }
                    }
                }
            }
        }]);
    } else {
        alert("Country not found!");
    }
});

// Function to get the country ID by its name
function getCountryIDByName(name) {
    var countries = {
        "china": ["CN"],
        "amerika": ["US"],
        "japan": ["JP"],
        "frankrijk": ["FR"],
        "italië": ["IT"],
        // Add more countries as needed
    };
    var lowerCaseName = name.toLowerCase();
    
    return countries[lowerCaseName];
}





// script.js
document.getElementById('searchBox').addEventListener('focus', function() {
    document.getElementById('optionsContainer').style.display = 'block';
});

const options = ['China', 'Amerika', 'Frankrijk', 'Italië', 'Japan'];

function createOptions() {
    const optionsContainer = document.getElementById('optionsContainer');
    options.forEach(option => {
        const optionElement = document.createElement('div');
        optionElement.className = 'option';
        optionElement.innerText = option;
        optionElement.addEventListener('click', function() {
            document.getElementById('searchBox').value = option;
            optionsContainer.style.display = 'none';
        });
        optionsContainer.appendChild(optionElement);
    });
}

createOptions();

document.addEventListener('click', function(event) {
    if (!event.target.closest('.search-bar-right')) {
        document.getElementById('optionsContainer').style.display = 'none';
    }
});
