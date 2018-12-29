
<?
// Если есть потроха - выводим, если нет - пустое поле..
//var_dump($model);
$query_1 = "SELECT * FROM `tech_i_unit` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'b'";
$array_1 = mysql_query ($query_1);

while ($i_unit_b = mysql_fetch_array ($array_1)) {
?>
<h2>Imaging Unit</h2>
<div>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
            <legend>&nbsp;&nbsp;Black &nbsp;&nbsp;</legend>
	        Модель : <strong><?=$i_unit_b['caption']?></strong><br />
	        <input type="radio" name="form__i_unit_b_n" value="N" <?=$i_unit_b_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__i_unit_b_y" value="Y" <?=$i_unit_b_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__i_unit_b_note" value="" type="text" /> <br />
            Тут и по всем цветам галочками перечень ливера..
        </fieldset>
    </div>
<?}?>


<?
$query_2 = "SELECT * FROM `tech_i_unit` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'c'";
$array_2 = mysql_query ($query_2);

while ($i_unit_c = mysql_fetch_array ($array_2)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:blue;">
            <legend>&nbsp;&nbsp;Cyan &nbsp;&nbsp;</legend>
            Модель : <strong><?=$i_unit_c['caption']?></strong><br />
	        <input type="radio" name="form__i_unit_c_n" value="N" <?=$i_unit_c_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__i_unit_c_y" value="Y" <?=$i_unit_c_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__i_unit_c_note" value="" type="text" /> <br />
        </fieldset>
    </div>
<?}?>

<?
$query_3 = "SELECT * FROM `tech_i_unit` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'y'";
$array_3 = mysql_query ($query_3);

while ($i_unit_y = mysql_fetch_array ($array_3)) {
?>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:yellow;">
            <legend>&nbsp;&nbsp;Yellow &nbsp;&nbsp;</legend>
	        Модель : <strong><?=$i_unit_y['caption']?></strong><br />
	        <input type="radio" name="form__i_unit_y_n" value="N" <?=$i_unit_y_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__i_unit_y_y" value="Y" <?=$i_unit_y_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__i_unit_y_note" value="" type="text" /> <br />
        </fieldset>
    </div>
<?}?>

<?
$query_4 = "SELECT * FROM `tech_i_unit` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'm'";
$array_4 = mysql_query ($query_4);

while ($i_unit_m = mysql_fetch_array ($array_4)) {
?>

    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:red;">
            <legend>&nbsp;&nbsp;Magenta &nbsp;&nbsp;</legend>
	         Модель : <strong><?=$i_unit_m['caption']?></strong><br />
	        <input type="radio" name="form__i_unit_m_n" value="N" <?=$i_unit_m_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__i_unit_m_y" value="Y" <?=$i_unit_m_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__i_unit_m_note" value="" type="text" /> <br />

        </fieldset>
    </div>
</div>
<?}?>