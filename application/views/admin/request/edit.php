<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
    ->set_name('adres')
    ->set_label('Адрес')
    ->set_value($item['adres'])
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('typework')
    ->set_label('Вид работ')
    ->set_value($item['typework'])
    ->create(); ?>

    <hr class="mt30 mb30" />

    <div class="h3 bold mb20">Дополнительные детали</div>

<?=$this->admincreator
    ->set_name('daywork')
    ->set_label('Желаемая дата выполнения работ')
    ->set_value($item['daywork'])
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('timesvjazi')
    ->set_label('Желаемое время выполнения работ')
    ->set_value($item['timesvjazi'])
    ->set_required()
    ->input_info('Укажите время, когда вам будет удобнее')
    ->create(); ?>

<?=$this->admincreator
    ->set_name('status')
    ->set_label('Статус заказа')
    ->set_value($item['status'])
    ->set_required()
    ->create(); ?>

<hr class="mt30 mb30" />

<div class="btns-list">
    <?=btn_save();?>
    <?=btn_save_exit();?>
    <?=btn_link_back($this->page);?>
</div>

<?=form_close();?>