<?
$gallery_tag_list1=GalleryTag::tagListShowConnectId(1);
$branch_con=explode(";",substr($item_data['branch_connect'],1,-1));
?>
<fieldset class="branch">
<legend>&nbsp;<?=SHOP_ADMIN_NOTE_BRANCH?> :&nbsp;</legend>
<div align="center">
<?if($gallery_tag_list1){foreach($gallery_tag_list1 as $key=>$valb){?>

<label style="margin:1px 7px 1px 7px;" id="branch_label_<?=$valb['seolink']?>">
<style>
#branch_label_<?=$valb['seolink']?> input + span{
background: url('/design/branch/<?=$valb['seolink']?>.png') no-repeat -6px 0 transparent;
color:#999;
}
#branch_label_<?=$valb['seolink']?> input:checked + span{
background: url('/design/branch/<?=$valb['seolink']?>_active.png') no-repeat -6px 0 transparent;
color:black;

}
</style>
<input type="checkbox" value="<?=$valb['id']?>" name="branch[]" id="branch_<?=$valb['id']?>" style="display:none;"<?if(strstr($item_data['branch_connect'],";".$valb['id'].";")){?> checked="checked"<?}?>>
<span style="line-height: 55px;padding-left: 50px;display: inline-block;">
<?=$valb['caption']?>
</span>
</label>

<?}}?>
</div>
</fieldset>