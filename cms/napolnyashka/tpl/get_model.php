<?php

include("db.php");

$brand_divice = explode("_", $_POST["brand"]);
$device_id = $brand_divice[0];
$brand_id = $brand_divice[1];

$query = "SELECT * FROM `tech_models` WHERE `device_id` = '{$device_id}' AND `brand_id` = '{$brand_id}' ORDER BY `caption`";


$array = mysql_query ($query);
?>	
	<option value="">Выберете модель</option>
<?
while ($model = mysql_fetch_array ($array)) {
	if($model["color"] == "1"){
        $bg_row = "background-color:#98FB98;";
    }
    else{
	    $bg_row = "";
    }
?>
	<option value="<?=$model["id"]?>" style="<?=$bg_row?>"><?=$model["caption"]?></option>
<?
}
?>