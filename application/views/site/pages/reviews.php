<div class="page-content">
	<div class="container">
		<div class="page-top">
			<?=$this->breadcrumbs->create_links();?>
			<h1 class="page-title"><?=$pageinfo['title'];?></h1>
			<? if($pageinfo['brief']) { ?><div class="page-brief"><?=$pageinfo['brief'];?></div><? } ?>
		</div>
		
		<ul class="reviews-list">
		<? foreach($items as $item) { ?>
			<li>
				<div class="reviews-item">
					<div class="image">
						<?=check_img(PATH_UPLOADS.'/'.$this->page.'/thumb/'.$item['img'], ['alt' => $siteinfo['template_alt']], 'user.png');?>
					</div>
					<div class="description">
						<div class="title"><?=$item['name'];?></div>
						<div class="date">
							<?=fa5r('calendar-alt');?>
							<?=translate_date($item['pub_date']);?>
						</div>
						<div class="text">
							<div class="text-editor"><?=nl2br($item['text']);?></div>
						</div>
						<? if($item['link'] != '') { ?>
						<div class="link">
							<noindex>
								<?=anchor($item['link'], '', ['target' => '_blank', 'rel' => 'nofollow']);?>
							</noindex>
						</div>
						<? } ?>
					</div>
				</div>
			</li>
		<? } ?>
		</ul>
		
		<?=$this->pagination->create_links();?>

        <div class="contacts-content-right" style=" width:1200px;">
            <div class="contacts-title">Отправить отзыв</div>
            <?=form_open('reviews/ajaxFeedback', ['class' => 'contacts-form', 'data-toggle' => 'ajaxForm']);?>
            <ul class="inputs">
                <li>
                    <input type="text" name="name" class="form-input" placeholder="Ваше имя" />
                </li>
                <li>
                    <input type="tel" name="phone" class="form-input" placeholder="Ваш телефон *" data-rules="required" />
                </li>
                <li>
                    <input type="email" name="email" class="form-input" placeholder="Ваш email" />
                </li>
                <li>
                    <textarea name="text" class="form-input" placeholder="Текст сообщения" rows="3"></textarea>
                </li>
            </ul>
            <div class="actions">
                <div class="text">
                    Ваш данные не будут переданы третьим лицам.<br/>
                    <a href="<?=base_url('about/confidence');?>">Политика конфиденциальности.</a>
                </div>
                <button class="btn btn-xl">Отправить</button>
                <input type="hidden" name="title" value="Обратная связь: отзыв" />
            </div>
            <?=form_close();?>
        </div>

		<? if(strip_tags($pageinfo['text']) != '' && uri(2) == '') { ?>
		<div class="page-text">
			<div class="text-editor">
				<?=$pageinfo['text'];?>
			</div>
		</div>
		<? } ?>
	</div>
</div>
