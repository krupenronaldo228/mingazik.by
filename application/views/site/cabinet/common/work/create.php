<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
    ->set_name('adres')
    ->set_label('Адрес')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('typework')
    ->set_label('Вид работ')
    ->create(); ?>

<hr class="mt30 mb30" />

<div class="h3 bold mb20">Дополнительные детали</div>

<?=$this->admincreator
    ->set_name('daywork')
    ->set_label('Желаемая дата выполнения работ')
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('timesvjazi')
    ->set_label('Желаемое время выполнения работ')
    ->set_required()
    ->input_info('Укажите время, когда вам будет удобнее')
    ->create(); ?>

<?=$this->admincreator
    ->set_name('status')
    ->set_label('Статус заказа')
    ->set_required()
    ->create(); ?>


<?=$this->admincreator
    ->set_name('visibility')
    ->set_type('checkbox')
    ->set_label('Отображать на сайте')
    ->set_value(true)
    ->create(); ?>

<hr class="mt30 mb30" />

<div class="btns-list">
    <?=btn_add();?>
    <?=btn_link_back($this->page);?>
</div>
<?=form_close();?>

