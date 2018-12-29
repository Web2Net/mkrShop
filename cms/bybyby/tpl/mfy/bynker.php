<?
$query_1_1 = "SELECT * FROM `bybyby_in_bynker` WHERE `bybyby_id` = '$id'";
$array_1_1 = mysql_query ($query_1_1);
$bynker_in = mysql_fetch_array ($array_1_1);

if($bynker_in['bynker_presence'] == '0'){ // отсутствует
    $bynker_presence_n = "checked"; 
    $bynker_presence_y = "";
}
else{                             // присутствует
    $bynker_presence_n = ""; 
    $bynker_presence_y = "checked";
}

$query_1 = "SELECT * FROM `tech_bynker` WHERE `model_id` LIKE '%;{$model["id"]};%'";
$array_1 = mysql_query ($query_1);
$bynker = mysql_fetch_array ($array_1);
if(isset($bynker['article'])){
?>
<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
    <legend>&nbsp;&nbsp;Бункер (<?=$bynker['article']?>)&nbsp;&nbsp;</legend>
    <input type="radio" name="form7__bynker_presence" value="0" <?=$bynker_presence_n?>>&nbsp;Отсутствует<br />
    <input type="radio" name="form7__bynker_presence" value="1" <?=$bynker_presence_y?>>&nbsp;Присутствует<br />
    Примечание : <br />
	<input name="form7__bynker_presence_note" value="<?=$bynker_in['bynker_presence_note']?>" type="text" /> <br />
</fieldset>	        
<?}?>