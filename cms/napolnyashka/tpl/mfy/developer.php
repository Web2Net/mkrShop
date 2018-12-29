
 <input name="form4__bybyby_id" value="<?=$id?>" type="hidden" />

<?
$query_1_1 = "SELECT * FROM `bybyby_in_developer` WHERE `bybyby_id` = '$id'";
$array_1_1 = mysql_query ($query_1_1);
$developer_in = mysql_fetch_array ($array_1_1);

// BLACK
if($developer_in['black_developer_presence'] == '0'){ // отсутствует
    $black_developer_presence_n = "checked"; 
    $black_developer_presence_y = "";
    $black_developer_presence_alter = "";   
}
elseif($developer_in['black_developer_presence'] == '1'){ // присутствует
    $black_developer_presence_n = ""; 
    $black_developer_presence_y = "checked";
    $black_developer_presence_alter = "";
}
else{                             // левый
    $black_developer_presence_n = ""; 
    $black_developer_presence_y = "";
    $black_developer_presence_alter = "checked";    
}
// CYAN
if($developer_in['cyan_developer_presence'] == '0'){ // отсутствует
    $cyan_developer_presence_n = "checked"; 
    $cyan_developer_presence_y = "";
    $cyan_developer_presence_alter = "";   
}
elseif($developer_in['cyan_developer_presence'] == '1'){ // присутствует
    $cyan_developer_presence_n = ""; 
    $cyan_developer_presence_y = "checked";
    $cyan_developer_presence_alter = "";
}
else{                             // левый
    $cyan_developer_presence_n = ""; 
    $cyan_developer_presence_y = "";
    $cyan_developer_presence_alter = "checked";    
}
// YELLOW
if($developer_in['yellow_developer_presence'] == '0'){ // отсутствует
    $yellow_developer_presence_n = "checked"; 
    $yellow_developer_presence_y = "";
    $yellow_developer_presence_alter = "";   
}
elseif($developer_in['yellow_developer_presence'] == '1'){ // присутствует
    $yellow_developer_presence_n = ""; 
    $yellow_developer_presence_y = "checked";
    $yellow_developer_presence_alter = "";
}
else{                             // левый
    $yellow_developer_presence_n = ""; 
    $yellow_developer_presence_y = "";
    $yellow_developer_presence_alter = "checked";    
}
// MAGENTA
if($developer_in['magenta_developer_presence'] == '0'){ // отсутствует
    $magenta_developer_presence_n = "checked"; 
    $magenta_developer_presence_y = "";
    $magenta_developer_presence_alter = "";   
}
elseif($developer_in['magenta_developer_presence'] == '1'){ // присутствует
    $magenta_developer_presence_n = ""; 
    $magenta_developer_presence_y = "checked";
    $magenta_developer_presence_alter = "";
}
else{                             // левый
    $magenta_developer_presence_n = ""; 
    $magenta_developer_presence_y = "";
    $magenta_developer_presence_alter = "checked";    
}


$query_1 = "SELECT * FROM `tech_developer` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'b'";
$array_1 = mysql_query ($query_1);

while ($developer_b = mysql_fetch_array ($array_1)) {
    
?>
<h2>Девелопер (стартер)</h2>
<div>
    <div class="block_color">
        <fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
            <legend>&nbsp;&nbsp;Black &nbsp;&nbsp;(<?=$developer_b['caption']?>)</legend>
            <input type="radio" name="form4__black_developer_presence" value="0" <?=$black_developer_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form4__black_developer_presence" value="1" <?=$black_developer_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form4__black_developer_presence" value="2" <?=$black_developer_presence_alter?>>&nbsp;Левый<br />
            Примечание : <br />
            <input name="form4__black_developer_note" value="<?=$developer_in['black_developer_note']?>" type="text" /> <br />
        </fieldset>
    </div>
<?}?>


<?
$query_2 = "SELECT * FROM `tech_developer` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'c'";
$array_2 = mysql_query ($query_2);

while ($developer_c = mysql_fetch_array ($array_2)) {
?>
    <div class="block_color">
        <fieldset class="pole" style="text-align:left;padding:5px;border-color:blue;">
            <legend>&nbsp;&nbsp;Cyan &nbsp;&nbsp;(<?=$developer_c['caption']?>)</legend>
            <input type="radio" name="form4__cyan_developer_presence" value="0" <?=$cyan_developer_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form4__cyan_developer_presence" value="1" <?=$cyan_developer_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form4__cyan_developer_presence" value="2" <?=$cyan_developer_presence_alter?>>&nbsp;Левая<br />
            Примечание : <br />
            <input name="form4__cyan_developer_note" value="<?=$developer_in['cyan_developer_note']?>" type="text" /> <br />
        </fieldset>
    </div>
<?}?>

<?
$query_3 = "SELECT * FROM `tech_developer` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'y'";
$array_3 = mysql_query ($query_3);

while ($developer_y = mysql_fetch_array ($array_3)) {
?>
    <div class="block_color">
        <fieldset class="pole" style="text-align:left;padding:5px;border-color:yellow;">
            <legend>&nbsp;&nbsp;Yellow &nbsp;&nbsp;(<?=$developer_y['caption']?>)</legend>
            <input type="radio" name="form4__yellow_developer_presence" value="0" <?=$yellow_developer_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form4__yellow_developer_presence" value="1" <?=$yellow_developer_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form4__yellow_developer_presence" value="2" <?=$yellow_developer_presence_alter?>>&nbsp;Левая<br />
            Примечание : <br />
            <input name="form4__yellow_developer_note" value="<?=$developer_in['yellow_developer_note']?>" type="text" /> <br />
        </fieldset>
    </div>
<?}?>

<?
$query_4 = "SELECT * FROM `tech_developer` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'm'";
$array_4 = mysql_query ($query_4);

while ($developer_m = mysql_fetch_array ($array_4)) {
?>

    <div class="block_color">
        <fieldset class="pole" style="text-align:left;padding:5px;border-color:red;">
            <legend>&nbsp;&nbsp;Magenta &nbsp;&nbsp;(<?=$developer_m['caption']?>)</legend>
            <input type="radio" name="form4__magenta_developer_presence" value="0" <?=$magenta_developer_presence_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form4__magenta_developer_presence" value="1" <?=$magenta_developer_presence_y?>>&nbsp;Присутствует<br />
            <input type="radio" name="form4__magenta_developer_presence" value="2" <?=$magenta_developer_presence_alter?>>&nbsp;Левая<br />
            Примечание : <br />
            <input name="form4__magenta_developer_note" value="<?=$developer_in['magenta_developer_note']?>" type="text" /> <br />
        </fieldset>
    </div>
</div>
<?}?>