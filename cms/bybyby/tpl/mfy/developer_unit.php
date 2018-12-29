<input name="form5__bybyby_id" value="<?=$id?>" type="hidden" />
<?
define('TABL_DEVELOPER_UNIT', 'tech_d_unit');

$query_1_1 = "SELECT * FROM `bybyby_in_d_unit` WHERE `bybyby_id` = '$id'";
$array_1_1 = mysql_query ($query_1_1);
$d_unit_in = mysql_fetch_array ($array_1_1);

// BLACK
if($d_unit_in['black_d_unit_presence'] == '0'){ // отсутствует
    $black_d_unit_presence_n = "checked";
    $black_d_unit_presence_y = ""; 
}
elseif($d_unit_in['black_d_unit_presence'] == '1'){ // присутствует
    $black_d_unit_presence_n = ""; 
    $black_d_unit_presence_y = "checked";
}
else{                             // левый
    $black_d_unit_presence_n = ""; 
    $black_d_unit_presence_y = "";
}
// CYAN
if($d_unit_in['cyan_d_unit_presence'] == '0'){ // отсутствует
    $cyan_d_unit_presence_n = "checked"; 
    $cyan_d_unit_presence_y = "";
}
elseif($d_unit_in['cyan_d_unit_presence'] == '1'){ // присутствует
    $cyan_d_unit_presence_n = ""; 
    $cyan_d_unit_presence_y = "checked";
}
else{                             // левый
    $cyan_d_unit_presence_n = ""; 
    $cyan_d_unit_presence_y = "";
}
// YELLOW
if($d_unit_in['yellow_d_unit_presence'] == '0'){ // отсутствует
    $yellow_d_unit_presence_n = "checked"; 
    $yellow_d_unit_presence_y = "";
}
elseif($d_unit_in['yellow_d_unit_presence'] == '1'){ // присутствует
    $yellow_d_unit_presence_n = ""; 
    $yellow_d_unit_presence_y = "checked";
}
else{                             // левый
    $yellow_d_unit_presence_n = ""; 
    $yellow_d_unit_presence_y = "";
}
// MAGENTA
if($d_unit_in['magenta_d_unit_presence'] == '0'){ // отсутствует
    $magenta_d_unit_presence_n = "checked"; 
    $magenta_d_unit_presence_y = "";
}
elseif($d_unit_in['magenta_d_unit_presence'] == '1'){ // присутствует
    $magenta_d_unit_presence_n = ""; 
    $magenta_d_unit_presence_y = "checked";
}
else{                             // левый
    $magenta_d_unit_presence_n = ""; 
    $magenta_d_unit_presence_y = "";
}

if($d_unit_in['black_d_unit_all'] == '1'){
    $black_d_unit_all = "checked";
}
if($d_unit_in['cyan_d_unit_all'] == '1'){
    $cyan_d_unit_all = "checked";
}
if($d_unit_in['yellow_d_unit_all'] == '1'){
    $yellow_d_unit_all = "checked";
}
if($d_unit_in['magenta_d_unit_all'] == '1'){
    $magenta_d_unit_all = "checked";
}

if($d_unit_in['black_d_unit_mval'] == '1'){
    $black_d_unit_mval = "checked";
}
if($d_unit_in['cyan_d_unit_mval'] == '1'){
    $cyan_d_unit_mval = "checked";
}
if($d_unit_in['yellow_d_unit_mval'] == '1'){
    $yellow_d_unit_mval = "checked";
}
if($d_unit_in['magenta_d_unit_mval'] == '1'){
    $magenta_d_unit_mval = "checked";
}

if($d_unit_in['black_d_unit_kolar'] == '1'){
    $black_d_unit_kolar = "checked";
}
if($d_unit_in['cyan_d_unit_kolar'] == '1'){
    $cyan_d_unit_kolar = "checked";
}
if($d_unit_in['yellow_d_unit_kolar'] == '1'){
    $yellow_d_unit_kolar = "checked";
}
if($d_unit_in['magenta_d_unit_kolar'] == '1'){
    $magenta_d_unit_kolar = "checked";
}

if($d_unit_in['black_d_unit_starter'] == '1'){
    $black_d_unit_starter = "checked";
}
if($d_unit_in['cyan_d_unit_starter'] == '1'){
    $cyan_d_unit_starter = "checked";
}
if($d_unit_in['yellow_d_unit_starter'] == '1'){
    $yellow_d_unit_starter = "checked";
}
if($d_unit_in['magenta_d_unit_starter'] == '1'){
    $magenta_d_unit_starter = "checked";
}

$query_1 = "SELECT * FROM `" . TABL_DEVELOPER_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'b'";
$array_1 = mysql_query ($query_1);

while ($d_unit_b = mysql_fetch_array ($array_1)) {
?>
<h2>Developer Unit</h2>
<div>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
            <legend>&nbsp;&nbsp;Black &nbsp;&nbsp;(<?=$d_unit_b['caption']?>)</legend>
	        <input type="radio" name="form5__black_d_unit_presence" value="0" <?=$black_d_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form5__black_d_unit_presence" value="1" <?=$black_d_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form5__black_d_unit_note" value="<?=$d_unit_in['black_d_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form5__black_d_unit_resyrs" value="<?=$d_unit_in['black_d_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form5__black_d_unit_all" value="1" type="checkbox" <?=$black_d_unit_all?>/>Весь (<?=$d_unit_b['caption']?>)<br />
                <input name="form5__black_d_unit_all_note" value="<?=$d_unit_in['black_d_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__black_d_unit_mval" value="1" type="checkbox" <?=$black_d_unit_mval?> />Магнитный вал<br />
                <input name="form5__black_d_unit_mval_note" value="<?=$d_unit_in['black_d_unit_mval_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__black_d_unit_kolar" value="1" type="checkbox" <?=$black_d_unit_kolar?> />Колары<br />
                <input name="form5__black_d_unit_kolar_note" value="<?=$d_unit_in['black_d_unit_kolar_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__black_d_unit_starter" value="1" type="checkbox" <?=$black_d_unit_starter?> />Стартер<br />
                <input name="form5__black_d_unit_starter_note" value="<?=$d_unit_in['black_d_unit_starter_note']?>" type="text" /> <br />
            </fieldset>    
            
        </fieldset>
    </div>
<?}?>


<?
$query_2 = "SELECT * FROM `" . TABL_DEVELOPER_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'c'";
$array_2 = mysql_query ($query_2);

while ($d_unit_c = mysql_fetch_array ($array_2)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:blue;">
            <legend>&nbsp;&nbsp;Cyan &nbsp;&nbsp;(<?=$d_unit_c['caption']?>)</legend>
            <input type="radio" name="form5__cyan_d_unit_presence" value="0" <?=$cyan_d_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form5__cyan_d_unit_presence" value="1" <?=$cyan_d_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form5__cyan_d_unit_note" value="<?=$d_unit_in['cyan_d_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form5__cyan_d_unit_resyrs" value="<?=$d_unit_in['cyan_d_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form5__cyan_d_unit_all" value="1" type="checkbox" <?=$cyan_d_unit_all?> />Весь (<?=$d_unit_c['caption']?>)<br />
                <input name="form5__cyan_d_unit_all_note" value="<?=$d_unit_in['cyan_d_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__cyan_d_unit_mval" value="1" type="checkbox" <?=$cyan_d_unit_mval?> />Магнитный вал<br />
                <input name="form5__cyan_d_unit_mval_note" value="<?=$d_unit_in['cyan_d_unit_mval_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__cyan_d_unit_kolar" value="1" type="checkbox" <?=$cyan_d_unit_kolar?> />Колары<br />
                <input name="form5__cyan_d_unit_kolar_note" value="<?=$d_unit_in['cyan_d_unit_kolar_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__cyan_d_unit_starter" value="1" type="checkbox" <?=$cyan_d_unit_starter?> />Стартер<br />
                <input name="form5__cyan_d_unit_starter_note" value="<?=$d_unit_in['cyan_d_unit_starter_note']?>" type="text" /> <br />
            </fieldset>
        </fieldset>
    </div>
<?}?>

<?
$query_3 = "SELECT * FROM `" . TABL_DEVELOPER_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'y'";
$array_3 = mysql_query ($query_3);

while ($d_unit_y = mysql_fetch_array ($array_3)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:yellow;">
            <legend>&nbsp;&nbsp;Yellow &nbsp;&nbsp;(<?=$d_unit_y['caption']?>)</legend>
	        <input type="radio" name="form5__yellow_d_unit_presence" value="0" <?=$yellow_d_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form5__yellow_d_unit_presence" value="1" <?=$yellow_d_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form5__yellow_d_unit_note" value="<?=$d_unit_in['yellow_d_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form5__yellow_d_unit_resyrs" value="<?=$d_unit_in['yellow_d_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form5__yellow_d_unit_all" value="1" type="checkbox" <?=$yellow_d_unit_all?> />Весь (<?=$d_unit_y['caption']?>)<br />
                <input name="form5__yellow_d_unit_all_note" value="<?=$d_unit_in['yellow_d_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__yellow_d_unit_mval" value="1" type="checkbox" <?=$yellow_d_unit_mval?> />Магнитный вал<br />
                <input name="form5__yellow_d_unit_mval_note" value="<?=$d_unit_in['yellow_d_unit_mval_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__yellow_d_unit_kolar" value="1" type="checkbox" <?=$yellow_d_unit_kolar?> />Колары<br />
                <input name="form5__yellow_d_unit_kolar_note" value="<?=$d_unit_in['yellow_d_unit_kolar_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__yellow_d_unit_starter" value="1" type="checkbox" <?=$yellow_d_unit_starter?> />Стартер<br />
                <input name="form5__yellow_d_unit_starter_note" value="<?=$d_unit_in['yellow_d_unit_starter_note']?>" type="text" /> <br />
            </fieldset>
        </fieldset>
    </div>
<?}?>

<?
$query_4 = "SELECT * FROM `" . TABL_DEVELOPER_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'm'";
$array_4 = mysql_query ($query_4);

while ($d_unit_m = mysql_fetch_array ($array_4)) {
?>

    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:red;">
            <legend>&nbsp;&nbsp;Magenta &nbsp;&nbsp;(<?=$d_unit_m['caption']?>)</legend>
	        <input type="radio" name="form5__magenta_d_unit_presence" value="0" <?=$magenta_d_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form5__magenta_d_unit_presence" value="1" <?=$magenta_d_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form5__magenta_d_unit_note" value="<?=$d_unit_in['magenta_d_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form5__magenta_d_unit_resyrs" value="<?=$d_unit_in['magenta_d_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form5__magenta_d_unit_all" value="1" type="checkbox" <?=$magenta_d_unit_all?> />Весь (<?=$d_unit_m['caption']?>)<br />
                <input name="form5__magenta_d_unit_all_note" value="<?=$d_unit_in['magenta_d_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__magenta_d_unit_mval" value="1" type="checkbox" <?=$magenta_d_unit_mval?> />Магнитный вал<br />
                <input name="form5__magenta_d_unit_mval_note" value="<?=$d_unit_in['magenta_d_unit_mval_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__magenta_d_unit_kolar" value="1" type="checkbox" <?=$magenta_d_unit_kolar?> />Колары<br />
                <input name="form5__magenta_d_unit_kolar_note" value="<?=$d_unit_in['magenta_d_unit_kolar_note']?>" type="text" /> <br />
                <hr>
                <input name="form5__magenta_d_unit_starter" value="1" type="checkbox" <?=$yellow_d_unit_starter?> />Стартер<br />
                <input name="form5__magenta_d_unit_starter_note" value="<?=$d_unit_in['magenta_d_unit_starter_note']?>" type="text" /> <br />
            </fieldset>

        </fieldset>
    </div>
</div>
<?}?>