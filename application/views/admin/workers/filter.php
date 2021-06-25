<div class="entries-sort <?=!empty($_GET) ? 'open' : null;?>">
    <a href="javascript:void(0)" class="entries-sort-title">
        Поиск по записям
        <span class="toggle"><?=fa5s('angle-down');?></span>
    </a>
    <form action="<?=base_url('admin/'.$this->page)?>" method="GET" class="entries-sort-content">
        <div class="entries-sort-row row">
            <div class="col-md-12 col-lg-6">
                <input type="search" name="search" class="form-input" placeholder="Поиск" value="<?=$this->input->get('search');?>" style="width: 700px;" />
            </div>

            <div class="col-md-6 col-lg-3">
                <? $sorts = [
                    'phone DESC' => 'Номер телефона &darr;',
                    'phone ASC' => 'Номер телефона &uarr;',
                    'add_date DESC' => 'Дата добавления &darr;',
                    'add_date ASC' => 'Дата добавления &uarr;',
                    'name ASC' => 'ФИО &uarr;',
                    'name DESC' => 'ФИО &darr;',
                ]; ?>
                <select class="form-select" name="sort">
                    <? foreach ($sorts as $value => $label) { ?>
                        <option value="<?= $value; ?>" <?=$sort == $value ? 'selected' : null; ?>><?= $label; ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
        <ul class="entries-sort-actions">
            <li><button class="btn btn-info"><?=fa5s('search mr5');?> Поиск по записям</button></li>
            <? if(!empty($_GET)) { ?>
                <li><span class="form-label color-gray">Найдено записей: <strong><?=$count;?></strong></span></li>
                <li class="h6 semibold"><?=fa5s('times color-error mr5');?> <?=anchor('admin/'.$this->page, 'сбросить фильтр', ['class' => 'color-error']);?></li>
            <? } ?>
        </ul>
    </form>
</div>
