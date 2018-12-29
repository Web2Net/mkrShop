<fieldset class="pole">
<legend>&nbsp;&nbsp;<?=SHOP_ADMIN_NOTE_FILTER?> :&nbsp;<!--<span style="color:red"><?=SHOP_ADMIN_NOTE_FILTER_ATTENTION?></span>-->&nbsp;&nbsp;</legend>
<style>
.filter_tag_off{padding:10px 35px;margin:12px;background-color:orangered;color:white;cursor:pointer;}
.filter_tag_off:hover, .filter_tag_on {padding:10px 35px;margin:12px;background-color:#81BB10;color:white;cursor:pointer;}
input:checked + img {
    background-color: #fff;
    border:3px solid #A9E338;
    border-color: rgba(129,187,16, .8);/**/  
  outline: 0;
  outline: thin dotted \9;
  /* IE6-9 */

  -webkit-box-shadow: inset 0 0px 0px rgba(0,0,0,.9), 0 0 8px rgba(129,187,16,.6);
  -moz-box-shadow: inset 0 0px 0px rgba(0,0,0,.9), 0 0 8px rgba(129,187,16,.6);
  box-shadow: inset 0 0px 0px rgba(0,0,0,.9), 0 0 8px rgba(129,187,16,.6);
}
</style>
<script>
var i=0;
var openx=[];
var parent_openx=[];
function showFilterValue(tag,mess){
$('#filter_messenger_'+tag).html(mess);
}

</script>
<?
$filter_con=explode(";",substr($item_data['filter_connect'],1,-1));
if($filter_con){foreach($filter_con as $key=>$val){
$filter_item_data[$val]=FilterItem::itemData($val);
$filter_tag_data[substr($filter_item_data[$val]["connect"],1,-1)]=FilterTag::tagData(substr($filter_item_data[$val]["connect"],1,-1));
}}
SYS::varDump($filter_tag_list,__FILE__,__LINE__,'filter_tag_list');


if($filter_tag_list){foreach($filter_tag_list as $key=>$val){?>

<script>$(document).ready(function(){

$('#filter_<?=$val['id']?>').click(function () {
	$('#filterList_<?=$val['id']?>').slideToggle(200);
	$('#filter_<?=$val['id']?>').toggleClass('filter_tag_on');
	
if($('#filter_<?=$val['id']?>').hasClass('filter_tag_on')){
i++;
//alert(i);
openx[i]='#filterList_<?=$val['id']?>';parent_openx[i]='#filter_<?=$val['id']?>';
if(i==300){
	$(openx[1]).slideToggle(200);
	$(parent_openx[1]).toggleClass('filter_tag_on');
	$(openx[1]+' input').removeAttr("checked");
    showFilterValue(<?=$val['id']?>,'<?=trim(str_replace(",",".",$val['desc_short']))?>');
	openx[1]=openx[2];openx[2]=openx[3];
	parent_openx[1]=parent_openx[2];parent_openx[2]=parent_openx[3];
//alert(openx[1]);
i=2;}

}else{
if($('#filter_<?=$val['id']?>').hasClass('filter_tag_off')){
$('#filterList_<?=$val['id']?> input').removeAttr("checked");
showFilterValue(<?=$val['id']?>,'<?=trim(str_replace(",",".",$val['desc_short']))?>');
}
i--;
var val = '#filter_<?=$val['id']?>';
var pos = jQuery.inArray(val,parent_openx); 
if(pos==1){
openx[1]=openx[2];parent_openx[1]=parent_openx[2];
//alert(pos);
}

}
})


if($('#filter_<?=$val['id']?>').hasClass('filter_tag_on')){
i++;
//alert(i);
openx[i]='#filterList_<?=$val['id']?>';parent_openx[i]='#filter_<?=$val['id']?>';
}

;});
</script> 

<div id="filter_<?=$val['id']?>" style="" class="filter_tag_off r10<?if($filter_tag_data[$val['id']]!=NULL){?> filter_tag_on<?}?>"><b><?=$val["caption"]?></b></div>
<div id="filterList_<?=$val['id']?>" style="<?if($filter_tag_data[$val['id']]==NULL){?>display:none;<?}?>padding:7px 15px 15px 15px;max-height:300px;overflow:auto;" class="r10">
<div align="center">
<div style="margin-bottom:15px;">
<b style="font-size:13px;color:#5A7EDC;"><span id="filter_messenger_<?=$val["id"]?>"><?=$val["desc_short"]?></span></b>
</div>
<?

$filter_item_list=FilterItem::itemShowListIdData($val["id"]);
//SYS::varDump($filter_item_list,__FILE__,__LINE__,'filter_item_list');
$filid=$val["id"];
if($filter_item_list){foreach($filter_item_list as $key=>$val2){
if($filter_item_data[$val2['id']]){$pa1[$val2['id']]=' checked="checked"';}

?>

<label for="filter_<?=$val2['id']?>" style="width: 35px;">
<?if($pa1[$val2['id']]!=''){?>
<input type="hidden" id="ffilter_<?=$filid?>" name="ffilter[<?=$filid?>]" value="<?=$filid?>">
<?}?>
<input style="display:none;" type="radio" id="filter_<?=$val2['id']?>" name="filter[<?=$filid?>]" value="<?=$val2['id']?>"<?=$pa1[$val2['id']]?>>
<!-- <img src="<?=str_replace(SITE_PATH,SITE_URL,FILTER_ITEM_IMG_PATH)?>/<?=$val2['id']?>/1.png?<?=time()?>" style="margin:0px;padding:4px;border:3px double #fff;" class="r5"  onClick="showFilterValue(<?=$filid?>,'<b style=color:#444><?=$val['caption']?>:</b> <?=$val2['caption']?>')" /></label>  -->
<?=$val2['caption']?>
<script>
//alert($('input#p1_<?=$val2['id']?>:checked').attr('value'));
if($('input#filter_<?=$val2['id']?>:checked').attr('value')=='<?=$filter_item_data[$val2['id']]['id']?>'){showFilterValue(<?=$parid?>,'<b style="color:#444"><?=$val["caption"]?>:</b> <?=$val2['caption']?>')}
</script>

<?}}?>
</div>
</div>



<?}}

//SYS::varDump($filter_tag_list,__FILE__,__LINE__,'filter_tag');

?>


</fieldset>