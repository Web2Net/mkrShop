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
	.both{
		clear: both;
	}
	.both_5{
		clear: both;
		height: 5px;
	}
</style>

<div><img src="/design/img/color-mixing.png" style="width:50px;" />
	 <span style="font-size:32px;"><?=$device["caption"]?> <?=$brand["caption"]?> <?=$model["caption"]?> (<?=$model["device_format"]?>)</span>
</div>
<br />


<?include "bybyby/tpl/mfy/toner.php";?>
<div class="both_5"></div>
<?include "bybyby/tpl/mfy/drum_unit.php";?>
<div class="both_5"></div>
<?include "bybyby/tpl/mfy/developer.php";?>
<div class="both_5"></div>
<?include "bybyby/tpl/mfy/developer_unit.php";?>
<div class="both_5"></div>
<?//include "bybyby/tpl/mfy/imaging_unit.php";?>
<div class="both_5"></div>
<table style="vertical-align: top;">
	<tr>
		<td class="block">
<?include "bybyby/tpl/mfy/pechka.php";?>			
		</td>
		<td class="block">
<?include "bybyby/tpl/mfy/bynker.php";?>
        </td>
        <td class="block">	
<?include "bybyby/tpl/mfy/lenta.php";?>		
		</td>
	</tr>
</table>

