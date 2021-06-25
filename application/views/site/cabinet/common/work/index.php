<?/* $this->load->view('mingazik.by/'.$this->page.'/filter');*/?>

<? if(empty($items)) { ?>

    <? if(!empty($_GET)) { ?>
        <?=action_result('info', 'Поиск не дал результатов');?>
    <? } else { ?>
        <?=action_result('info', 'Нету заказов. Просьба уточнить у администратора ');?>
    <? } ?>

<? } else { ?>

    <table class="table table-hover entries-table">
        <thead>
        <tr>
            <th>Информация</th>
            <th>Дата и время выполнения работ</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <? foreach($items as $item) { ?>
            <tr data-entries="item">
                <td class="entries-table-mobile">
                    <div class="entries-title" data-entries="title"><?=$item['adres'];?></div>
                    <div class="entries-brief"><?=$item['typework'];?></div>
                </td>
                <td class="entries-td-hide-sm" nowrap>
                    <?=entries_date($item['daywork']);?>
                </td>
                <!-- <td class="entries-td-hide-sm" nowrap>
                    <?/*=entries_date($item['status']);*/?>
                </td>-->
                <td class="entries-td-icons entries-td-hide-xs text-right">
                    <?=visibility($item['timesvjazi']);?>
                </td>

                <td class="entries-td-actions w150">
                    <?=btn_icon_view($this->page.'/view/'.$item['id']);?>
                    <!-- --><?/*=btn_icon_edit($this->page.'/edit/'.$item['id']);*/?>
                </td>
            </tr>
        <? } ?>
        </tbody>
    </table>

    <?=$this->pagination->create_links(); ?>

<? } ?>