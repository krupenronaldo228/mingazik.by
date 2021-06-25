<div data-entries="item">
	<div class="entries-view">
		<div class="entries-view-left">
			<h4 class="mb15" data-entries="title">
				<span data-entries="title"><?=$item['adres'];?></span>
			</h4>
			<?=iconlist([
                ['text' => date('d.m.Y H:i', strtotime($item['add_date'])), 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['adres'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $userid['name'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['phone'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $userid['email'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['text'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
				['text' => $item['daywork'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['timesvjazi'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
                ['text' => $item['typework'] ?? EMPTY_TEXT, 'icon' => fa5s('phone'.ICON_SUFFIX)],
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