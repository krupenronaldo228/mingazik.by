<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
    ->set_name('name')
    ->set_label('Название')
    ->set_value($item['name'])
    ->set_required()
    ->create(); ?>

<?=$this->admincreator
    ->set_name('structure')
    ->set_type('textarea')
    ->set_label('Состав')
    ->set_value($item['structure'])
    ->set_required()
    ->create(); ?>

<ul class="row">
    <?php  foreach ($users as $parent) { ?>
        <?php if ($parent['access'] = 'workers'){
            $reletions[] = $parent['id'];
        }  ?>
        <li class="col-xl-3 col-lg-4 col-md-6 mb-15 ">
            <label class="checkers-label">
                <input type="checkbox" name="parent[]" value="<?=$parent['id']?>" <?=in_array($parent['id'], $reletions) ? 'checked' : null;?> data-toggle="checker"/>
                <?=$parent['name'];?>
            </label>
        </li>
    <? } ?>
</ul>

<?=$this->admincreator
	->set_name('img')
	->set_type('file')
	->set_label('Изображение')
    ->set_value($item['img'])
	->label_info('Рекомендуемый размер не меньше '.$size['x'].'x'.$size['y'])
	->file_origin($item['img'], PATH_UPLOADS.'/'.$folder.'/thumb')
	->file_delete('admin/'.$this->page.'/ajaxImageDelete/'.$item['id'])
	->create(); ?>

<div class="h3 bold mb20">Настройки</div>

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
						<input type="text" class="form-input" name="date" readonly data-toggle="datepicker" value="<?=set_value('date', date('d.m.Y', strtotime($item['pub_date'])));?>" placeholder="Дата" id="admin_input_date" />
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
						<input type="text" class="form-input" name="time" value="<?=set_value('time', date('H:i', strtotime($item['pub_date'])));?>" placeholder="Время" />
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
    ->set_value($item['visibility'])
    ->set_value(true)
	->create(); ?>

<hr class="mt30 mb30" />

<div class="btns-list">
    <?=btn_save();?>
    <?=btn_save_exit();?>
    <?=btn_link_back($this->page);?>
</div>

<?=form_close();?>

<script>
	$('[data-toggle="datepicker"]').datepicker();
	$('[name="time"]').inputmask('99:99');
</script>
