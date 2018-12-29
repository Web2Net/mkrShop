<script language="javascript" src="<?=$path_bybyb_js?>/pr_color_cartridge_system.js"></script>

<div><img src="img/color-mixing.png" style="width:50px;" />
	 <span style="font-size:32px;">Полноцветный</span>
</div>


<br />

<div style="text-align:center">Система</div>
	<label>Блочная: <input type=radio name="pr_col_cartr_system" value="cart" onClick="pr_color_cartridge_system('pr_color_cartridge_cart')"></label>
    <label>Револьверная:<input type=radio name="pr_col_cartr_system" value="revolt" onClick="pr_color_cartridge_system('pr_color_cartridge_revolt')"></label>
	
    <div id="pr_color_cartridge_cart" style="display:none;">
<?php include("color_cartridge_cart.php") ?>
	</div>
	<div id="pr_color_cartridge_revolt" style="display:none;">
<?php include("color_cartridge_revolt.php") ?>
	</div>








		