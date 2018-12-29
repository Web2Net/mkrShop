<fieldset class="pole">
<legend>&nbsp;&nbsp;<?=SHOP_ADMIN_NOTE_PARAMETERS?> :&nbsp;<span style="color:red"><?=SHOP_ADMIN_NOTE_PARAMETERS_ATTENTION?></span>&nbsp;&nbsp;</legend>
<style>
.param_tag_off{padding:10px 35px;margin:12px;background-color:orangered;color:white;cursor:pointer;}
.param_tag_off:hover, .param_tag_on {padding:10px 35px;margin:12px;background-color:#81BB10;color:white;cursor:pointer;}
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
function showParamValue(tag,mess){
$('#param_messenger_'+tag).html(mess);
}

</script>
<?
$param_con=explode(";",substr($item_data['param_connect'],1,-1));
if($param_con){foreach($param_con as $key=>$val){
$param_item_data[$val]=ParamItem::itemData($val);
$param_tag_data[substr($param_item_data[$val]["connect"],1,-1)]=ParamTag::tagData(substr($param_item_data[$val]["connect"],1,-1));
}}
SYS::varDump($param_tag_data,__FILE__,__LINE__,'param_tag');


if($param_tag_list){foreach($param_tag_list as $key=>$val){?>

<script>$(document).ready(function(){

$('#param_<?=$val['id']?>').click(function () {
	$('#paramList_<?=$val['id']?>').slideToggle(200);
	$('#param_<?=$val['id']?>').toggleClass('param_tag_on');
	
if($('#param_<?=$val['id']?>').hasClass('param_tag_on')){
i++;
//alert(i);
openx[i]='#paramList_<?=$val['id']?>';parent_openx[i]='#param_<?=$val['id']?>';
if(i==300){
	$(openx[1]).slideToggle(200);
	$(parent_openx[1]).toggleClass('param_tag_on');
	$(openx[1]+' input').removeAttr("checked");
    showParamValue(<?=$val['id']?>,'<?=trim(str_replace(",",".",$val['desc_short']))?>');
	openx[1]=openx[2];openx[2]=openx[3];
	parent_openx[1]=parent_openx[2];parent_openx[2]=parent_openx[3];
//alert(openx[1]);
i=2;}

}else{
if($('#param_<?=$val['id']?>').hasClass('param_tag_off')){
$('#paramList_<?=$val['id']?> input').removeAttr("checked");
showParamValue(<?=$val['id']?>,'<?=trim(str_replace(",",".",$val['desc_short']))?>');
}
i--;
var val = '#param_<?=$val['id']?>';
var pos = jQuery.inArray(val,parent_openx); 
if(pos==1){
openx[1]=openx[2];parent_openx[1]=parent_openx[2];
//alert(pos);
}

}
})


if($('#param_<?=$val['id']?>').hasClass('param_tag_on')){
i++;
//alert(i);
openx[i]='#paramList_<?=$val['id']?>';parent_openx[i]='#param_<?=$val['id']?>';
}

;});
</script> 

<div id="param_<?=$val['id']?>" style="" class="param_tag_off r10<?if($param_tag_data[$val['id']]!=NULL){?> param_tag_on<?}?>"><b><?=$val["caption"]?></b></div>
<div id="paramList_<?=$val['id']?>" style="<?if($param_tag_data[$val['id']]==NULL){?>display:none;<?}?>padding:7px 15px 15px 15px;max-height:300px;overflow:auto;" class="r10">
<div align="center">
<div style="margin-bottom:15px;">
<b style="font-size:13px;color:#5A7EDC;"><span id="param_messenger_<?=$val["id"]?>"><?=$val["desc_short"]?></span></b>
</div>
<?

$param_item_list=ParamItem::itemShowListIdData($val["id"]);
$parid=$val["id"];
if($param_item_list){foreach($param_item_list as $key=>$val2){
if($param_item_data[$val2['id']]){$pa1[$val2['id']]=' checked="checked"';}
?>

<label for="p1_<?=$val2['id']?>" style="width: 35px;">
<?if($pa1[$val2['id']]!=''){?>
<input type="hidden" id="pp1_<?=$parid?>" name="pp1[<?=$parid?>]" value="<?=$parid?>">
<?}?>
<input style="display:none;" type="radio" id="p1_<?=$val2['id']?>" name="p1[<?=$parid?>]" value="<?=$val2['id']?>"<?=$pa1[$val2['id']]?>>
<img src="<?=str_replace(SITE_PATH,SITE_URL,PARAM_ITEM_IMG_PATH)?>/<?=$val2['id']?>/1.png?<?=time()?>" style="margin:0px;padding:4px;border:3px double #fff;" class="r5"  onClick="showParamValue(<?=$parid?>,'<b style=color:#444><?=$val['caption']?>:</b> <?=$val2['caption']?>')" /></label>

<script>
//alert($('input#p1_<?=$val2['id']?>:checked').attr('value'));
if($('input#p1_<?=$val2['id']?>:checked').attr('value')=='<?=$param_item_data[$val2['id']]['id']?>'){showParamValue(<?=$parid?>,'<b style="color:#444"><?=$val["caption"]?>:</b> <?=$val2['caption']?>')}
</script>

<?}}?>
</div>
</div>



<?}}

//SYS::varDump($param_tag_list,__FILE__,__LINE__,'param_tag');

?>


</fieldset>