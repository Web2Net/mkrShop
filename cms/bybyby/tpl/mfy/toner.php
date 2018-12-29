
 <input name="form2__bybyby_id" value="<?=$id?>" type="hidden" />

<?
$query_1_1 = "SELECT * FROM `bybyby_in_toner` WHERE `bybyby_id` = '$id'";
$array_1_1 = mysql_query ($query_1_1);
$toner_in = mysql_fetch_array ($array_1_1);

// BLACK
if($toner_in['black_toner_presence'] == '0'){ // отсутствует
    $black_toner_presence_n = "checked"; 
    $black_toner_presence_y = "";
    $black_toner_presence_alter = "";   
}
elseif($toner_in['black_toner_presence'] == '1'){ // присутствует
    $black_toner_presence_n = ""; 
    $black_toner_presence_y = "checked";
    $black_toner_presence_alter = "";
}
else{                             // левый
    $black_toner_presence_n = ""; 
    $black_toner_presence_y = "";
    $black_toner_presence_alter = "checked";    
}
// CYAN
if($toner_in['cyan_toner_presence'] == '0'){ // отсутствует
    $cyan_toner_presence_n = "checked"; 
    $cyan_toner_presence_y = "";
    $cyan_toner_presence_alter = "";   
}
elseif($toner_in['cyan_toner_presence'] == '1'){ // присутствует
    $cyan_toner_presence_n = ""; 
    $cyan_toner_presence_y = "checked";
    $cyan_toner_presence_alter = "";
}
else{                             // левый
    $cyan_toner_presence_n = ""; 
    $cyan_toner_presence_y = "";
    $cyan_toner_presence_alter = "checked";    
}
// YELLOW
if($toner_in['yellow_toner_presence'] == '0'){ // отсутствует
    $yellow_toner_presence_n = "checked"; 
    $yellow_toner_presence_y = "";
    $yellow_toner_presence_alter = "";   
}
elseif($toner_in['yellow_toner_presence'] == '1'){ // присутствует
    $yellow_toner_presence_n = ""; 
    $yellow_toner_presence_y = "checked";
    $yellow_toner_presence_alter = "";
}
else{                             // левый
    $yellow_toner_presence_n = ""; 
    $yellow_toner_presence_y = "";
    $yellow_toner_presence_alter = "checked";    
}
// MAGENTA
if($toner_in['magenta_toner_presence'] == '0'){ // отсутствует
    $magenta_toner_presence_n = "checked"; 
    $magenta_toner_presence_y = "";
    $magenta_toner_presence_alter = "";   
}
elseif($toner_in['magenta_toner_presence'] == '1'){ // присутствует
    $magenta_toner_presence_n = ""; 
    $magenta_toner_presence_y = "checked";
    $magenta_toner_presence_alter = "";
}
else{                             // левый
    $magenta_toner_presence_n = ""; 
    $magenta_toner_presence_y = "";
    $magenta_toner_presence_alter = "checked";    
}


$query_1 = "SELECT * FROM `tech_toner` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'b'";
$array_1 = mysql_query ($query_1);

while ($toner_b = mysql_fetch_array ($array_1)) {
    
?>
<h2>Тонер</h2>
<div>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
            <legend>&nbsp;&nbsp;Black &nbsp;&nbsp;(<?=$toner_b['caption']?>)</legend>
	        <input type="radio" name="form2__black_toner_presence" value="0" <?=$black_toner_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form2__black_toner_presence" value="1" <?=$black_toner_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form2__black_toner_presence" value="2" <?=$black_toner_presence_alter?>>&nbsp;Левый<br />
	        Примечание : <br />
	        <input name="form2__black_toner_note" value="<?=$toner_in['black_toner_note']?>" type="text" /> <br />
        </fieldset>
    </div>
<?}?>


<?
$query_2 = "SELECT * FROM `tech_toner` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'c'";
$array_2 = mysql_query ($query_2);

while ($toner_c = mysql_fetch_array ($array_2)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:blue;">
            <legend>&nbsp;&nbsp;Cyan &nbsp;&nbsp;(<?=$toner_c['caption']?>)</legend>
            <input type="radio" name="form2__cyan_toner_presence" value="0" <?=$cyan_toner_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form2__cyan_toner_presence" value="1" <?=$cyan_toner_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form2__cyan_toner_presence" value="2" <?=$cyan_toner_presence_alter?>>&nbsp;Левый<br />
	        Примечание : <br />
	        <input name="form2__cyan_toner_note" value="<?=$toner_in['cyan_toner_note']?>" type="text" /> <br />
        </fieldset>
    </div>
<?}?>

<?
$query_3 = "SELECT * FROM `tech_toner` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'y'";
$array_3 = mysql_query ($query_3);

while ($toner_y = mysql_fetch_array ($array_3)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:yellow;">
            <legend>&nbsp;&nbsp;Yellow &nbsp;&nbsp;(<?=$toner_y['caption']?>)</legend>
	        <input type="radio" name="form2__yellow_toner_presence" value="0" <?=$yellow_toner_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form2__yellow_toner_presence" value="1" <?=$yellow_toner_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form2__yellow_toner_presence" value="2" <?=$yellow_toner_presence_alter?>>&nbsp;Левый<br />
	        Примечание : <br />
	        <input name="form2__yellow_toner_note" value="<?=$toner_in['yellow_toner_note']?>" type="text" /> <br />
        </fieldset>
    </div>
<?}?>

<?
$query_4 = "SELECT * FROM `tech_toner` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'm'";
$array_4 = mysql_query ($query_4);

while ($toner_m = mysql_fetch_array ($array_4)) {
?>

    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:red;">
            <legend>&nbsp;&nbsp;Magenta &nbsp;&nbsp;(<?=$toner_m['caption']?>)</legend>
	        <input type="radio" name="form2__magenta_toner_presence" value="0" <?=$magenta_toner_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form2__magenta_toner_presence" value="1" <?=$magenta_toner_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form2__magenta_toner_presence" value="2" <?=$magenta_toner_presence_alter?>>&nbsp;Левый<br />
	        Примечание : <br />
	        <input name="form2__magenta_toner_note" value="<?=$toner_in['magenta_toner_note']?>" type="text" /> <br />
        </fieldset>
    </div>
</div>
<?}?>