<div class="contacts-content-right" style=" width:800px;">
    <div class="contacts-title">Отправить акт</div>
    <?=form_open('cabinet/aktrabot/ajaxFeedback', ['class' => 'contacts-form', 'data-toggle' => 'ajaxForm']);?>
    <ul class="inputs">
        <li>
            <div class="form-caption">Оборудование: <span class="required">*</span></div>
            <input id="equipment" type="text" name="equipment" class="form-input" placeholder="Введите текст" />
        </li>
        <li> <div class="form-caption">Марка: <span class="required">*</span></div>
            <input type="text" name="trade_mark" class="form-input" placeholder="Введите текст"/>
        </li>
        <li> <div class="form-caption">Модель: <span class="required">*</span></div>
            <input type="text" name="model" class="form-input" placeholder="Введите текст" />
        </li>
        <li>
            <div class="form-caption">Год производства: <span class="required">*</span></div>
            <textarea name="year_realyse" class="form-input" placeholder="Введите текст" ></textarea>
        </li>
        <li> <div class="form-caption">Производственный номер: <span class="required">*</span></div>
            <input type="text" name="factory_number" class="form-input" placeholder="Введите текст" />
        </li>
        <li>
            <div class="form-caption">Тип: <span class="required">*</span></div>
            <input id="type" name="type" type="text" name="equipment" class="form-input" placeholder="Введите текст" />
        </li>
        <li> <div class="form-caption">Остаточный срок службы: <span class="required">*</span></div>
            <input type="text" name="service_live" class="form-input" placeholder="Введите текст"/>
        </li>
        <li> <div class="form-caption">Выполненые работы: <span class="required">*</span></div>
            <input type="text" name="completed_works" class="form-input" placeholder="Введите текст" rows="3"/>
        </li>
        <li>
            <div class="form-caption">Статус: <span class="required">*</span></div>
            <textarea name="status" class="form-input" placeholder="Введите текст" rows="3"></textarea>
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
