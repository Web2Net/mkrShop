<input name="form3__bybyby_id" value="<?=$id?>" type="hidden" />
<?
define('TABL_DRUM_UNIT', 'tech_dr_unit');

$query_1_1 = "SELECT * FROM `bybyby_in_dr_unit` WHERE `bybyby_id` = '$id'";
$array_1_1 = mysql_query ($query_1_1);
$dr_unit_in = mysql_fetch_array ($array_1_1);

// BLACK
if($dr_unit_in['black_dr_unit_presence'] == '0'){ // отсутствует
    $black_dr_unit_presence_n = "checked"; 
}
elseif($dr_unit_in['black_dr_unit_presence'] == '1'){ // присутствует
    $black_dr_unit_presence_n = ""; 
    $black_dr_unit_presence_y = "checked";
}
else{                             // левый
    $black_dr_unit_presence_n = ""; 
    $black_dr_unit_presence_y = "";
}
// CYAN
if($dr_unit_in['cyan_dr_unit_presence'] == '0'){ // отсутствует
    $cyan_dr_unit_presence_n = "checked"; 
    $cyan_dr_unit_presence_y = "";
}
elseif($dr_unit_in['cyan_dr_unit_presence'] == '1'){ // присутствует
    $cyan_dr_unit_presence_n = ""; 
    $cyan_dr_unit_presence_y = "checked";
}
else{                             // левый
    $cyan_dr_unit_presence_n = ""; 
    $cyan_dr_unit_presence_y = "";
}
// YELLOW
if($dr_unit_in['yellow_dr_unit_presence'] == '0'){ // отсутствует
    $yellow_dr_unit_presence_n = "checked"; 
    $yellow_dr_unit_presence_y = "";
}
elseif($dr_unit_in['yellow_dr_unit_presence'] == '1'){ // присутствует
    $yellow_dr_unit_presence_n = ""; 
    $yellow_dr_unit_presence_y = "checked";
}
else{                             // левый
    $yellow_dr_unit_presence_n = ""; 
    $yellow_dr_unit_presence_y = "";
}
// MAGENTA
if($dr_unit_in['magenta_dr_unit_presence'] == '0'){ // отсутствует
    $magenta_dr_unit_presence_n = "checked"; 
    $magenta_dr_unit_presence_y = "";
}
elseif($dr_unit_in['magenta_dr_unit_presence'] == '1'){ // присутствует
    $magenta_dr_unit_presence_n = ""; 
    $magenta_dr_unit_presence_y = "checked";
}
else{                             // левый
    $magenta_dr_unit_presence_n = ""; 
    $magenta_dr_unit_presence_y = "";
}

if($dr_unit_in['black_dr_unit_all'] == '1'){
    $black_dr_unit_all = "checked";
}
if($dr_unit_in['cyan_dr_unit_all'] == '1'){
    $cyan_dr_unit_all = "checked";
}
if($dr_unit_in['yellow_dr_unit_all'] == '1'){
    $yellow_dr_unit_all = "checked";
}
if($dr_unit_in['magenta_dr_unit_all'] == '1'){
    $magenta_dr_unit_all = "checked";
}

if($dr_unit_in['black_dr_unit_drum'] == '1'){
    $black_dr_unit_drum = "checked";
}
if($dr_unit_in['cyan_dr_unit_drum'] == '1'){
    $cyan_dr_unit_drum = "checked";
}
if($dr_unit_in['yellow_dr_unit_drum'] == '1'){
    $yellow_dr_unit_drum = "checked";
}
if($dr_unit_in['magenta_dr_unit_drum'] == '1'){
    $magenta_dr_unit_drum = "checked";
}

if($dr_unit_in['black_dr_unit_rakel'] == '1'){
    $black_dr_unit_rakel = "checked";
}
if($dr_unit_in['cyan_dr_unit_rakel'] == '1'){
    $cyan_dr_unit_rakel = "checked";
}
if($dr_unit_in['yellow_dr_unit_rakel'] == '1'){
    $yellow_dr_unit_rakel = "checked";
}
if($dr_unit_in['magenta_dr_unit_rakel'] == '1'){
    $magenta_dr_unit_rakel = "checked";
}

if($dr_unit_in['black_dr_unit_koronator'] == '1'){
    $black_dr_unit_koronator = "checked";
}
if($dr_unit_in['cyan_dr_unit_koronator'] == '1'){
    $cyan_dr_unit_koronator = "checked";
}
if($dr_unit_in['yellow_dr_unit_koronator'] == '1'){
    $yellow_dr_unit_koronator = "checked";
}
if($dr_unit_in['magenta_dr_unit_koronator'] == '1'){
    $magenta_dr_unit_koronator = "checked";
}

$query_1 = "SELECT * FROM `" . TABL_DRUM_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'b'";
$array_1 = mysql_query ($query_1);

while ($dr_unit_b = mysql_fetch_array ($array_1)) {
?>
<h2>Drum Unit</h2>
<div>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
            <legend>&nbsp;&nbsp;Black &nbsp;&nbsp;(<?=$dr_unit_b['caption']?>)</legend>
	        <input type="radio" name="form3__black_dr_unit_presence" value="0" <?=$black_dr_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form3__black_dr_unit_presence" value="1" <?=$black_dr_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form3__black_dr_unit_note" value="<?=$dr_unit_in['black_dr_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form3__black_dr_unit_resyrs" value="<?=$dr_unit_in['black_dr_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form3__black_dr_unit_all" value="1" type="checkbox" <?=$black_dr_unit_all?>/>Весь (<?=$dr_unit_b['caption']?>)<br />
                <input name="form3__black_dr_unit_all_note" value="<?=$dr_unit_in['black_dr_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__black_dr_unit_drum" value="1" type="checkbox" <?=$black_dr_unit_drum?> />Drum<br />
                <input name="form3__black_dr_unit_drum_note" value="<?=$dr_unit_in['black_dr_unit_drum_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__black_dr_unit_rakel" value="1" type="checkbox" <?=$black_dr_unit_rakel?> />Ракель<br />
                <input name="form3__black_dr_unit_rakel_note" value="<?=$dr_unit_in['black_dr_unit_rakel_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__black_dr_unit_koronator" value="1" type="checkbox" <?=$black_dr_unit_koronator?> />Корона заряда<br />
                <input name="form3__black_dr_unit_koronator_note" value="<?=$dr_unit_in['black_dr_unit_koronator_note']?>" type="text" /> <br />
            </fieldset>    
            
        </fieldset>
    </div>
<?}?>


<?
$query_2 = "SELECT * FROM `" . TABL_DRUM_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'c'";
$array_2 = mysql_query ($query_2);

while ($dr_unit_c = mysql_fetch_array ($array_2)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:blue;">
            <legend>&nbsp;&nbsp;Cyan &nbsp;&nbsp;(<?=$dr_unit_c['caption']?>)</legend>
            <input type="radio" name="form3__cyan_dr_unit_presence" value="0" <?=$cyan_dr_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form3__cyan_dr_unit_presence" value="1" <?=$cyan_dr_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form3__cyan_dr_unit_note" value="<?=$dr_unit_in['cyan_dr_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form3__cyan_dr_unit_resyrs" value="<?=$dr_unit_in['cyan_dr_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form3__cyan_dr_unit_all" value="1" type="checkbox" <?=$cyan_dr_unit_all?> />Весь (<?=$dr_unit_c['caption']?>)<br />
                <input name="form3__cyan_dr_unit_all_note" value="<?=$dr_unit_in['cyan_dr_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__cyan_dr_unit_drum" value="1" type="checkbox" <?=$cyan_dr_unit_drum?> />Drum<br />
                <input name="form3__cyan_dr_unit_drum_note" value="<?=$dr_unit_in['cyan_dr_unit_drum_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__cyan_dr_unit_rakel" value="1" type="checkbox" <?=$cyan_dr_unit_rakel?> />Ракель<br />
                <input name="form3__cyan_dr_unit_rakel_note" value="<?=$dr_unit_in['cyan_dr_unit_rakel_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__cyan_dr_unit_koronator" value="1" type="checkbox" <?=$cyan_dr_unit_koronator?> />Корона заряда<br />
                <input name="form3__cyan_dr_unit_koronator_note" value="<?=$dr_unit_in['cyan_dr_unit_koronator_note']?>" type="text" /> <br />
            </fieldset>
        </fieldset>
    </div>
<?}?>

<?
$query_3 = "SELECT * FROM `" . TABL_DRUM_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'y'";
$array_3 = mysql_query ($query_3);

while ($dr_unit_y = mysql_fetch_array ($array_3)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:yellow;">
            <legend>&nbsp;&nbsp;Yellow &nbsp;&nbsp;(<?=$dr_unit_y['caption']?>)</legend>
	        <input type="radio" name="form3__yellow_dr_unit_presence" value="0" <?=$yellow_dr_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form3__yellow_dr_unit_presence" value="1" <?=$yellow_dr_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form3__yellow_dr_unit_note" value="<?=$dr_unit_in['yellow_dr_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form3__yellow_dr_unit_resyrs" value="<?=$dr_unit_in['yellow_dr_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form3__yellow_dr_unit_all" value="1" type="checkbox" <?=$yellow_dr_unit_all?> />Весь (<?=$dr_unit_y['caption']?>)<br />
                <input name="form3__yellow_dr_unit_all_note" value="<?=$dr_unit_in['yellow_dr_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__yellow_dr_unit_drum" value="1" type="checkbox" <?=$yellow_dr_unit_drum?> />Drum<br />
                <input name="form3__yellow_dr_unit_drum_note" value="<?=$dr_unit_in['yellow_dr_unit_drum_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__yellow_dr_unit_rakel" value="1" type="checkbox" <?=$yellow_dr_unit_rakel?> />Ракель<br />
                <input name="form3__yellow_dr_unit_rakel_note" value="<?=$dr_unit_in['yellow_dr_unit_rakel_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__yellow_dr_unit_koronator" value="1" type="checkbox" <?=$yellow_dr_unit_koronator?> />Корона заряда<br />
                <input name="form3__yellow_dr_unit_koronator_note" value="<?=$dr_unit_in['yellow_dr_unit_koronator_note']?>" type="text" /> <br />
            </fieldset>
        </fieldset>
    </div>
<?}?>

<?
$query_4 = "SELECT * FROM `" . TABL_DRUM_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'm'";
$array_4 = mysql_query ($query_4);

while ($dr_unit_m = mysql_fetch_array ($array_4)) {
?>

    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:red;">
            <legend>&nbsp;&nbsp;Magenta &nbsp;&nbsp;(<?=$dr_unit_m['caption']?>)</legend>
	        <input type="radio" name="form3__magenta_dr_unit_presence" value="0" <?=$magenta_dr_unit_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form3__magenta_dr_unit_presence" value="1" <?=$magenta_dr_unit_presence_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form3__magenta_dr_unit_note" value="<?=$dr_unit_in['magenta_dr_unit_note']?>" type="text" /> <br />
            Ресурс : <br />
            <input name="form3__magenta_dr_unit_resyrs" value="<?=$dr_unit_in['magenta_dr_unit_resyrs']?>" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form3__magenta_dr_unit_all" value="1" type="checkbox" <?=$magenta_dr_unit_all?> />Весь (<?=$dr_unit_m['caption']?>)<br />
                <input name="form3__magenta_dr_unit_all_note" value="<?=$dr_unit_in['magenta_dr_unit_all_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__magenta_dr_unit_drum" value="1" type="checkbox" <?=$magenta_dr_unit_drum?> />Drum<br />
                <input name="form3__magenta_dr_unit_drum_note" value="<?=$dr_unit_in['magenta_dr_unit_drum_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__magenta_dr_unit_rakel" value="1" type="checkbox" <?=$magenta_dr_unit_rakel?> />Ракель<br />
                <input name="form3__magenta_dr_unit_rakel_note" value="<?=$dr_unit_in['magenta_dr_unit_rakel_note']?>" type="text" /> <br />
                <hr>
                <input name="form3__magenta_dr_unit_koronator" value="1" type="checkbox" <?=$yellow_dr_unit_koronator?> />Корона заряда<br />
                <input name="form3__magenta_dr_unit_koronator_note" value="<?=$dr_unit_in['magenta_dr_unit_koronator_note']?>" type="text" /> <br />
            </fieldset>

        </fieldset>
    </div>
</div>
<?}?>