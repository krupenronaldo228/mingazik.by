<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('name')
	->set_label('Название')
	->set_required()
	->create(); ?>

<?=$this->admincreator
	->set_name('structure')
    ->set_type('textarea')
	->set_label('Состав')
    ->label_info('Выберети сотрудников для добавления в данную бригаду')
	->set_required()
	->create(); ?>

<?/*=$this->admincreator
    ->set_name('structure')
    ->set_label('Состав')
    ->set_type('select')
    ->set_options($users)
    ->set_value('')
    ->set_required()
    ->create(); */?>

<ul class="row">
    <?php  foreach ($users as $parent) { ?>
        <li class="col-xl-3 col-lg-4 col-md-6 mb-15 ">
            <label class="checkers-label">
                <input type="checkbox" name="parent[]" value="<?=$parent['id']?>" data-toggle="checker"/>
                <?=$parent['name'];?>
            </label>
        </li>
    <? } ?>
</ul>


<!--<div class="h3 bold mb20">Выберети сотрудников для добавления в данную бригаду</div>
<form action="checkbox-form.php" method="post">
    <?php /*if (is_array($users) || is_object($users)) {
    foreach ($users as $parent){
    */?>
        <li class="col-xl-3 col-lg-4 col-md-6 mb-15">
            <label class="checkers-label">
                <input type="checkbox" name="parent" value="<?/*=$user['id']*/?>" <?/*=in_array($parent['id'], $reletions) ? 'checked' : null;*/?> data-toggle="checker"/>
                <?/*=$parent['name'];*/?>
            </label>
        </li>
        <?php
/*    }
    }
    */?>
</form>

</div>-->

<?=$this->admincreator
	->set_name('img')
	->set_type('file')
	->set_label('Изображение')
	->label_info('Рекомендуемый размер не меньше '.$size['x'].'x'.$size['y'])
	->create(); ?>


<div class="h3 bold mb20">Настройки

<div class="row">
    <div class="col-xl-3 col-lg-3">
        <label class="form-labelblock" for="admin_input_date">
            Дата
        </label>
    </div>
    <div class="col-xl-9 col-lg-9">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><?=fa5r('calendar-alt fa-fw');?></span>
						</span>
                        <input type="text" class="form-input" name="date" readonly data-toggle="datepicker" value="<?=set_value('date', date('d.m.Y'));?>" placeholder="Дата" id="admin_input_date" />
                    </div>
                    <?=form_error('date'); ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><?=fa5r('clock fa-fw');?></span>
						</span>
                        <input type="text" class="form-input" name="time" value="<?=set_value('time', date('H:i'));?>" placeholder="Время" />
                    </div>
                    <?=form_error('time'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

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

<script>
    $('[data-toggle="datepicker"]').datepicker();
    $('[name="time"]').inputmask('99:99');
</script>
