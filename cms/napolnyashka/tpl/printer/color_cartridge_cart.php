<script language="javascript" src="<?=$path_bybyb_js?>/pr_col_cart_block_Y_N.js"></script>
<script language="javascript" src="<?=$path_bybyb_js?>/pr_pechka_Y_N.js"></script>





<hr />
<!--<div>Формат: "Выпадающий список"</div>-->
<br />



<table>
	<tr style="vertical-align:top;">
		<td style="width:20%;">
			<div style="text-align:center;font-size:24px;padding:5px;">Картридж</div>
			<label>Присутствует: <input type=radio name="col_cart_block_YN" value=q onClick="col_cart_block_Y_N('col_cart_cart_y')"></label>
            <label>Отсутствует:<input type=radio name="col_cart_block_YN" value=q onClick="col_cart_block_Y_N('col_cart_cart_n')"></label>
			<div id="col_cart_cart_y" style="display:none;">
<?php include("col_cart_Y.php") ?>
			</div>
			<div id="col_cart_cart_n" style="display:none;">
<?php include("col_cart_N.php") ?>
			</div>
		</td>
		<td style="width:20%;">
			<div style="text-align:center;font-size:24px;padding:5px;">Печка</div>
			<label>Присутствует: <input type=radio name="pr_pechka_YN" value=q onClick="pr_pechka_Y_N('pechka_y')"></label>
            <label>Отсутствует:<input type=radio name="pr_pechka_YN" value=q onClick="pr_pechka_Y_N('pechka_n')"></label>
			<div id="pechka_y" style="display:none;">
<?php include("pechka_Y.php") ?>
			</div>
			<div id="pechka_n" style="display:none;">
<?php include("pechka_N.php") ?>
			</div>
		</td>
		<td style="width:20%;">
			<div style="text-align:center;font-size:24px;padding:5px;">Еще что-то??</div>
		</td>
	</tr>
</table>