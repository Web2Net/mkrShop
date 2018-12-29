<div><img src="/design/img/znak_toner_black.png" style="width:30px;" />
	 <span style="font-size:32px;"><?=$device["caption"]?> <?=$brand["caption"]?> <?=$model["caption"]?> (<?=$model["device_format"]?>)</span>
</div>
<br />

<style type="text/css">
	table tr{
		vertical-align: top;
	}
	.block{
        margin:0 2px ; 
        padding:0 2px ;
    }
    .block_color{
		float: left;
		width: 24%; 
		margin:0 2px ; 
	}
</style>
<script language="javascript" src="<?=$path_bybyb_js?>/pr_col_cart_block_Y_N.js"></script>
<script language="javascript" src="<?=$path_bybyb_js?>/pr_pechka_Y_N.js"></script>

<script type="text/javascript">

function mfy_color_cartridgeBlock_YN(id){
 
    if(id == "mfy_color_cartridgeBlock_y"){
        document.getElementById('mfy_color_cartridgeBlock_n').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "mfy_color_cartridgeBlock_n"){
        document.getElementById('mfy_color_cartridgeBlock_y').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
}	

function pr_pechka_Y_N(id){
 
    if(id == "pechka_y"){
        document.getElementById('pechka_n').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "pechka_n"){
        document.getElementById('pechka_y').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
    
 
}

</script>


<br />

<?include "bybyby/tpl/mfy/toner.php";?>
<div style="clear: both; height: 5px;"></div>
<?include "bybyby/tpl/mfy/drum_unit.php";?>
<div style="clear: both; height: 5px;"></div>
<?include "bybyby/tpl/mfy/developer.php";?>
<div style="clear: both; height: 5px;"></div>
<?include "bybyby/tpl/mfy/developer_unit.php";?>

<?////////////// CARTRIDGE ///////////////////////////?>
<!--
		<div>
			<div style="text-align:center;font-size:24px;padding:5px;">Туба</div>
			<label>Присутствует: <input type=radio name="col_cart_block_YN" value="q" onClick="mfy_color_cartridgeBlock_YN('mfy_color_cartridgeBlock_y')"></label>
            <label>Отсутствует:<input type=radio name="col_cart_block_YN" value="q" onClick="mfy_color_cartridgeBlock_YN('mfy_color_cartridgeBlock_n')"></label>
			
			<div id="mfy_color_cartridgeBlock_y" style="display:none;">
<?//include "bybyby/tpl/mfy/mfy_color_cartridgeBlock_cartidgeY.php";?>
			</div>
			<div id="mfy_color_cartridgeBlock_n" style="display:none;">
<?//include "bybyby/tpl/mfy/mfy_color_cartridgeBlock_cartidgeN.php";?>
			</div>
		</div>
-->		
<?////////////// /CARTRIDGE ///////////////////////////?>
 
        <div style="clear: both;"></div>
<table style="vertical-align: top;">
	<tr>
		<td class="block">
<?php include("bybyby/tpl/mfy/pechka.php") ?>			
		</td>
		<td class="block">
<?php include("bybyby/tpl/mfy/bynker.php") ?>
        </td>	
        <td class="block">
<?php include("bybyby/tpl/mfy/lenta.php") ?>		
		</td>
	</tr>
</table>

<!--
<table>
	<tr style="vertical-align:top;">		
		<td style="width:20%;">
			<div style="text-align:center;font-size:24px;padding:5px;">Печка</div>
			<label>Присутствует: <input type=radio name="pr_pechka_YN" value=q onClick="pr_pechka_Y_N('pechka_y')"></label>
            <label>Отсутствует:<input type=radio name="pr_pechka_YN" value=q onClick="pr_pechka_Y_N('pechka_n')"></label>
			<div id="pechka_y" style="display:none;">
<?php //include("pechka_Y.php") ?>
			</div>
			<div id="pechka_n" style="display:none;">
<?php //include("pechka_N.php") ?>
			</div>
		</td>
		<td style="width:20%;">
			<div style="text-align:center;font-size:24px;padding:5px;">Еще что-то??</div>
		</td>
	</tr>
</table>
-->

