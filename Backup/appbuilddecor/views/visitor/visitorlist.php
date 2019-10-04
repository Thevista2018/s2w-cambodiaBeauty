<?PHP if($result == 0){ ?>
	<tr>
		<td colspan="9" class="center"><strong>Data is Empty</strong></td>
	</tr>
<?PHP }else{ ?>
	<?PHP foreach($result as $col){ ?>
	<tr id="item-<?=$col->visitor_id?>">
		<td><?="MPR".str_pad($col->visitor_id,5,"0",STR_PAD_LEFT);?>.</td>
		<td><?=$col->visitor_title?>. <?=$col->visitor_firstname?> <?=$col->visitor_lastname?></td>
		<td><?=$col->visitor_company?></td>
		<td><?=$col->visitor_country?></td>
		<td><?=$col->visitor_phone1?> <?=$col->visitor_phone2?> <?=$col->visitor_phone3?></td>
		<td><?=$col->visitor_email?></td>
		<td class="text-center"><?=$col->visitor_datecreate?></td>
		<td>
		<div class="btn-group">
		<button class="btn btn-small">ดำเนินการ</button>
		<button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
		<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
		<li><a href="<?=BASE_HREF; ?>myanmin/visitoregis/updatevisitoregis/<?=$col->visitor_id?>"><i class="icon-line-cog"></i> แก้ไข</a></li>
		<li><a href="javascript:void(0);" onclick="deleteItem(<?=$col->visitor_id?>);"><i class="icon-trash"></i> ลบ</a></li>
		</ul>
		</div>
		</td>
	</tr>
<? $run++; ?>
<? } ?>
<? } ?>
#####
<?=$pagination ?>
#####
<?=$total ?>
