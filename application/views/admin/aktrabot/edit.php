<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
    ->set_name('equipment')
    ->set_label('Оборудование')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('trade_mark')
    ->set_label('Марка')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('model')
    ->set_label('Модель')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('year_realyse')
    ->set_label('Год производства')
    ->set_required()
    ->input_info('Укажите время, когда вам будет удобнее')
    ->create(); ?>

<?=$this->admincreator
    ->set_name('factory_number')
    ->set_label('Производственный номер')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('type')
    ->set_label('Тип')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('service_live')
    ->set_label('Остаточный срок службы')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('completed_works')
    ->set_label('Выполненые работы')
    ->set_required()
    ->input_info('Перечислети список выполненых работ')
    ->create(); ?>

<?=$this->admincreator
    ->set_name('status')
    ->set_label('Статус выполнения')
    ->set_required()
    ->create(); ?>

    <hr class="mt30 mb30" />

    <div class="h3 bold mb20">Дополнительные детали</div>

<?=$this->admincreator
    ->set_name('visibility')
    ->set_type('checkbox')
    ->set_label('Отображать на сайте')
    ->set_value(true)
    ->create(); ?>

<hr class="mt30 mb30" />

<div class="btns-list">
    <?=btn_save();?>
    <?=btn_save_exit();?>
    <?=btn_link_back($this->page);?>
</div>

<?=form_close();?>