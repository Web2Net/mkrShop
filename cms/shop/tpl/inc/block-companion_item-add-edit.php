<fieldset style="padding-bottom:7px;">
<legend>&nbsp;<?=SHOP_ADMIN_NOTE_RELATED_PRODUCT?> :&nbsp;</legend>
<div align="center">
<div id="companionItemList" style="display:table;width:763px;" align="center"></div></div>

<?if($item_data['companion_connect']!=""){
$companion_con=explode(";",substr($item_data['companion_connect'],1,-1));}

if($companion_con){foreach($companion_con as $key=>$val){?>
<script>
$(document).ready(function(){
companionItem(<?=$val?>);
;});
</script>
<?}}?>
<style>
.companion_off {padding:10px 35px;margin:12px;background-color:blue;color:white;cursor:pointer;}
.companion_off:hover, .companion_on{padding:10px 35px;margin:12px;background-color:#81BB10;color:white;cursor:pointer;}
</style>
<script>

function delCompanion(id){
	$('#companionItem-'+id+'').remove();	
}


function companionItem(id){
$('#companionItemList').append('<span id="companionItem-'+id+'"><img src="/design/img/loadingbar.gif" border="0" /></span>');
$("#companionItem-"+id+"").load("/cms/?mod=shop&type=item&com=look&id="+id+"&display=ajax");

//alert(id);

}

$(document).ready(function(){

$('#companion').click(function () {
	$('#companionList').slideToggle(200);
	$('#companion').toggleClass('companion_on');
	if($('#companion').hasClass('companion_on')){
	$('#companionList').html('<div align="center"><img src="/design/img/loadingbar.gif" border="0" /></div>');	
	$('#companionList').html('<iframe src="/cms/?mod=shop&type=tag&com=list&display=companion" style="width:100%;height:450px;overflow:auto;" frameborder="0"></iframe>');	
    }
})
;});
</script> 
<div id="companion" class="companion_off r10"><b><?=SHOP_ADMIN_NOTE_OVERVIEW_PRODUCTS?></b></div>
<div id="companionList" style="display:none;padding:0px 7px 0px 7px;" class="r10">
<div align="center"><img src="/design/img/loadingbar.gif" border="0" /></div>
</div>
</fieldset>