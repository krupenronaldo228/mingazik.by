<div data-entries="item">
	<div class="entries-view">
		<div class="entries-view-left">
			<div class="entries-view-img">
				<?=check_img(PATH_UPLOADS.'/'.$folder.'/thumb/'.$item['img']);?>
			</div>
		</div>
		<div class="entries-view-right">
			<h4 class="mb15" data-entries="title"><?=$item['name'];?></h4>
		</div>
	</div>

	<hr class="mt30 mb30" />

	<h3 class="mb20">Информация:</h3>

	<hr class="mt30 mb30" />

	<h3 class="mb20">Состав:</h3>

	<div class="text-editor">
		<?=$item['structure'] != '' ? $item['structure'] : EMPTY_TEXT;?>
	</div>

	<hr class="mt30 mb30" />
	
	<div class="btns-list">
		<?=btn_link_edit($this->page.'/edit/'.$item['id'])?>
		<?=btn_link_delete($this->page.'/delete/'.$item['id'])?>
		<?=btn_link_back($this->page)?>
	</div>
</div>