var myMap;
ymaps.ready(init);
let coord1;
let coord2;
var dataAddress;
function init() {
    myMap = new ymaps.Map("map", {
        center: [53.88291824, 27.59734601],
        zoom: 11
    }, {
        balloonMaxWidth: 200,
        searchControlProvider: 'yandex#search'
    });

    // Обработка события, возникающего при щелчке
    // левой кнопкой мыши в любой точке карты.
    // При возникновении такого события откроем балун.
    myMap.events.add('click', function (e) {
        if (!myMap.balloon.isOpen()) {
            var coords = e.get('coords');
            coord1 = coords[0].toPrecision(6);
            coord2 = coords[1].toPrecision(6);
            $("#latitude").val(coord1);
            $("#longitude").val(coord2);

            var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/geolocate/address";
            var token = "30261aa9e32cecf13c10690ec57d24089a4ccf28";
            var query = { lat: coord1, lon: coord2, radius_meters: 50 };

            var options = {
                method: "POST",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Authorization": "Token " + token
                },
                body: JSON.stringify(query)
            }

            let address = "";
            fetch(url, options)
                .then(response => response.json())
                .then(data => {
                    dataAddress = data;
                    address = dataAddress.suggestions[0].value;
                    $("#address").val(address);
                })
                .then(() => console.log(dataAddress))
                .then(() => console.log(address))
                .catch(error => console.log("error", error));
            
        }
        else {
            myMap.balloon.close();
        }
    });

    // Обработка события, возникающего при щелчке
    // правой кнопки мыши в любой точке карты.
    // При возникновении такого события покажем всплывающую подсказку
    // в точке щелчка.
    myMap.events.add('contextmenu', function (e) {
        myMap.hint.open(e.get('coords'), 'Кто-то щелкнул правой кнопкой');
    });

    // Скрываем хинт при открытии балуна.
    myMap.events.add('balloonopen', function (e) {
        myMap.hint.close();
    });

}

//async function getAddress(coord1, coord2) {
//    const API_KEY = "30261aa9e32cecf13c10690ec57d24089a4ccf28";

//    var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/geolocate/address";
//    var token = API_KEY;
//    var query = { lat: coord1, lon: coord2, radius_meters: 5 };

//    var options = {
//        method: "POST",
//        mode: "cors",
//        headers: {
//            "Content-Type": "application/json",
//            "Accept": "application/json",
//            "Authorization": "Token " + token
//        },
//        body: JSON.stringify(query)
//    }

//    let dataAddress = []
//    await fetch(url, options)
//        .then(response => response.json())
//        .then(result => {
//            console.log(result.suggestions)
//        })
//        .catch(error => console.log("error", error));
//} 

