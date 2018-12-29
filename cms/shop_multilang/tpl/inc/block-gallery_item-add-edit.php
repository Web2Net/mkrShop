<?
$gallery_tag_list2=GalleryTag::tagListShowConnectId(2);
//$gallery_item_list=GalleryItem::itemListId($tag);
?>
<fieldset class="pole">
<legend>&nbsp;<?=SHOP_ADMIN_NOTE_PHOTO_APPLICATION?> :&nbsp;</legend>
<style>
#galleryImgList img{margin:7px;}
</style>
<script>
function delGal(id){
	$('#gallery_item_'+id+'').remove();
	$('.gallery_img_'+id+'').toggleClass('gallery_img_on');
	$('#galleryImgList').append('<span id="gistyle_'+id+'"><style>.gallery_img_'+id+'{width:123px!important;border:0px solid #52A8EC!important;cursor:pointer!important;}</style></span>');
	
}

</script> 
<div align="center">
<div id="galleryImgList" align="center" style="width:780px;">
<?if($item_data['gallery_connect']!=""){
$gallery_con=explode(";",substr($item_data['gallery_connect'],1,-1));}
if($gallery_con){foreach($gallery_con as $key=>$val){?>
<table cellpadding="0" cellspacing="0" style="float:left" id="gallery_item_<?=$val?>"><tr><td valign="top">
<img src="/image/gallery/item/<?=$val?>/1m.png?<?=time()?>" width="240" border="0" align="left" />
<img src="/design/icon/Delete1_32x32.png" border="0" onClick="delGal(<?=$val?>)" width="32" style="margin:12px 0px 0px -45px;cursor:pointer"/>
<style>.gallery_img_<?=$val?>{width:117px!important;border:3px solid #52A8EC;cursor:default!important;}</style>
<input type="checkbox" value="<?=$val?>" name="gallery[]" id="gcheck_<?=$val?>" style="display:none;" checked="checked">
</td></tr></table>
<?}}?>
</div>
</div>
<style>
.gallery_tag_off{padding:10px 35px;margin:12px 7px;background-color:#F1F1F1;color:#3256B4;cursor:pointer;}
.gallery_tag_off:hover, .gallery_tag_on{padding:10px 35px;margin:12px 7px;background-color:#81BB10;color:white;cursor:pointer;}
</style>
<?
$hmgt = count($gallery_tag_list2)/2;
$i=1;
?>
<table width="99%" cellpadding="0" cellspacing="0" style="margin:1px 5px;"><tr><td width="50%" valign="top">
<?if($gallery_tag_list2){foreach($gallery_tag_list2 as $key=>$valt){?>
<script>$(document).ready(function(){
$('#gallery_<?=$valt['id']?>').click(function () {
	$('#galleryList_<?=$valt['id']?>').slideToggle(200);
	$('#gallery_<?=$valt['id']?>').toggleClass('gallery_tag_on');
	if($('#gallery_<?=$valt['id']?>').hasClass('gallery_tag_on')){
	$('#galleryList_<?=$valt['id']?>').html('<div align="center"><img src="/design/img/loadingbar.gif" border="0" /></div>');	
    }
    $("#galleryList_<?=$valt['id']?>").load("/cms/?mod=gallery&type=item&com=list&tag=<?=$valt['id']?>&display=ajax");
})
;});
</script> 
<div id="gallery_<?=$valt['id']?>" style="" class="gallery_tag_off r10"><b><?=$valt['caption']?></b></div>
<div id="galleryList_<?=$valt['id']?>" style="display:none;padding:0px 7px 0px 7px;" class="r10">
<div align="center"><img src="/design/img/loadingbar.gif" border="0" /></div>
</div>
<?if($i>=$hmgt){$i=0;?></td><td valign="top"><?}?>
<?
$i++;
}}?>
</td></tr></table>
</fieldset>