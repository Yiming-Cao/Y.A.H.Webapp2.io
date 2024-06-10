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
    }

});