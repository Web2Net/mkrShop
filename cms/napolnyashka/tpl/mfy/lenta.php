<?
$query_1_1 = "SELECT * FROM `bybyby_in_lenta` WHERE `bybyby_id` = '$id'";
$array_1_1 = mysql_query ($query_1_1);
$lenta_in = mysql_fetch_array ($array_1_1);

if($lenta_in['lenta_presence'] == '0'){ // отсутствует
    $lenta_presence_n = "checked"; 
    $lenta_presence_y = "";
}
else{                             // присутствует
    $lenta_presence_n = ""; 
    $lenta_presence_y = "checked";
}

$query_1 = "SELECT * FROM `tech_lenta` WHERE `model_id` LIKE '%;{$model["id"]};%'";
$array_1 = mysql_query ($query_1);
$lenta = mysql_fetch_array ($array_1);
if(isset($lenta['article'])){
?>
<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
    <legend>&nbsp;&nbsp;Лента (<?=$lenta['article']?>)&nbsp;&nbsp;</legend>
    <input type="radio" name="form8__lenta_presence" value="0" <?=$lenta_presence_n?>>&nbsp;Отсутствует<br />
    <input type="radio" name="form8__lenta_presence" value="1" <?=$lenta_presence_y?>>&nbsp;Присутствует<br />
    Примечание : <br />
	<input name="form8__lenta_presence_note" value="<?=$lenta_in['lenta_presence_note']?>" type="text" /> <br />
</fieldset>	        
<?}?>      