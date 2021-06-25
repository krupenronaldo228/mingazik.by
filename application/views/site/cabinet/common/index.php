<div class="cabinet-top">
	<?=$this->breadcrumbs->create_links();?>
	<div class="cabinet-title">
		<h1 class="title" ><?=$pageinfo['title'];?></h1>
		<? if($pageinfo['brief']) { ?><div class="brief" style="padding-bottom: 50px;"><?=$pageinfo['brief'];?></div><? } ?>
	</div>
</div>


<? if(strip_tags($pageinfo['text']) != '') { ?>
<div class="cabinet-bottom">
	<div class="text-editor">
		<?=$pageinfo['text'];?>
	</div>
</div>
<? } ?>

<?php
if ($userinfo['access'] !== 'user') {
     $this->load->view('site/cabinet/common/work/index');
    $this->load->view('site/cabinet/common/aktrabot');
} else
{
    $this->load->view('site/cabinet/common/request');
}
?>

