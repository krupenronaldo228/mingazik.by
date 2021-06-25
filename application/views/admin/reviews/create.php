<?=form_open_multipart('', ['class' => 'responsive-form', 'data-toggle' => 'entryform']);?>

<?=$this->admincreator
	->set_name('name')
	->set_label('Имя')
	->set_required()
	->create(); ?>
	
<?=$this->admincreator
	->set_name('text')
	->set_type('textarea')
	->set_label('Текст')
	->set_params(['rows' => '5'])
	->create(); ?>

<?=$this->admincreator
	->set_name('link')
	->set_label('Ссылка')
	->create(); ?>

<?=$this->admincreator
	->set_name('img')
	->set_type('file')
	->set_label('Изображение')
	->label_info('Рекомендуемый размер не меньше '.$size['x'].'x'.$size['y'])
	->create(); ?>

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