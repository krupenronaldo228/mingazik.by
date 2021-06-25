<div data-entries="item">
	<div class="entries-view">
		<div class="entries-view-left">
			<h4 class="mb15" data-entries="title">
				<span data-entries="title"><?=$item['adres'];?></span>
			</h4>
			<?=iconlist([
                ['text' => $item['equipment'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $userid['trade_mark'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['model'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $userid['year_realyse'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['factory_number'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
				['text' => $item['type'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['service_life'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['completed_works'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['status'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
			]);?>
        </div>
		</div>

	
	<hr class="mt30 mb30" />
	
	<div class="btns-list">
		<?=btn_link_edit($this->page.'/edit/'.$item['id'])?>
		<? if($item['id'] != $userid) { ?>
			<?=btn_link_delete($this->page.'/delete/'.$item['id'])?>
		<? } ?>
		<?=btn_link_back($this->page)?>
	</div>
</div>