<?php

include("db.php");

$device_id = $_POST["device"];
$query = "SELECT * FROM `tech_brands` WHERE `device_id` LIKE '%;{$device_id};%'";


$array = mysql_query ($query);
?>

	<option value="">Выберете бренд</option>
<?
while ($br = mysql_fetch_array ($array)) {
?>
	<option value="<?=$device_id?>_<?=$br["id"]?>"><?=$br["caption"]?></option>
<?}
?>
