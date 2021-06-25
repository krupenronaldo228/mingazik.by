<script src="https://api-maps.yandex.ru/2.1/?apikey=3d1d4871-f4ee-46a5-b4f2-8d42ba48ab7e&lang=ru_RU" type="text/javascript">
</script>
<div id="map" class="yMaps" style="width: 800px; height: 500px">
    <script type="text/javascript">
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
                    myMap.geoObjects.removeAll();
                    myMap.geoObjects.add(new ymaps.Placemark([coord1, coord2], {
                        balloonContent: 'цвет <strong>воды пляжа бонди</strong>'
                       /* balloonContent: 'координаты <strong>'alert(coord1,coord2)'</strong>'*/
                    }, {
                        preset: 'islands#icon',
                        iconColor: '#0095b6'
                    }))
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
    </script>
</div>

<div class="contacts-content-right" style=" width:800px;">
    <div class="contacts-title">Отправить заявку</div>
    <?=form_open('cabinet/request/ajaxFeedback', ['class' => 'contacts-form', 'data-toggle' => 'ajaxForm']);?>
    <ul class="inputs">
        <li>
            <div class="form-caption">Адрес объекта: <span class="required">*</span></div>
            <input id="address" type="text" name="adres" class="form-input" placeholder="Введите текст" />
        </li>
        <li> <div class="form-caption">Желаемая дата выполнения работ: <span class="required">*</span></div>
            <input type="date" name="daywork" class="form-input" placeholder="Введите текст"/>
        </li>
        <li> <div class="form-caption">Желаемое время связи: <span class="required">*</span></div>
            <input type="time" name="timesvjazi" class="form-input" placeholder="Введите текст" />
        </li>
        <!--<li> <div class="form-caption">Номер телефона для связи: <span class="required">*</span></div>
            <input type="tel" name="phone" class="form-input" placeholder="Введите текст" />
        </li>-->
        <li>
            <div class="form-caption">Комментарий к заказу: <span class="required">*</span></div>
            <textarea name="text" class="form-input" placeholder="Введите текст" rows="3"></textarea>
        </li>
        <li> <div class="form-caption">Bид работ: <span class="required">*</span></div>
            <input type="text" name="typework" class="form-input" placeholder="Введите текст" />
        </li>
    </ul>
    <div class="actions">
        <div class="text">
            Ваш данные не будут переданы третьим лицам.<br/>
            <a href="<?=base_url('about/confidence');?>">Политика конфиденциальности.</a>
        </div>
        <button class="btn btn-xl">Отправить</button>
        <!--<input type="hidden" name="title" value="Обратная связь: Заявка" />-->
    </div>
    <?=form_close();?>
</div>
