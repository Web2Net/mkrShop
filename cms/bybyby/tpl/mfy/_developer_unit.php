<?
define('TABL_DEVELOPER_UNIT', 'tech_d_unit');
// Если есть потроха - выводим, если нет - пустое поле..
//var_dump($model);
$query_1 = "SELECT * FROM `" . TABL_DEVELOPER_UNIT . "` WHERE `model_id` LIKE '%;{$model["id"]};%' AND `color` = 'b'";
$array_1 = mysql_query ($query_1);

while ($d_unit_b = mysql_fetch_array ($array_1)) {
?>
<h2>Developer Unit</h2>
<div>
    <div class="block_color">
    	<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
            <legend>&nbsp;&nbsp;Black &nbsp;&nbsp;(<?=$d_unit_b['caption']?>)</legend>
	        <input type="radio" name="form__black_d_unit_presence" value="0" <?=$d_unit_b_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__black_d_unit_presence" value="1" <?=$d_unit_b_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__d_unit_b_note" value="" type="text" /> <br />
            Ресурс : <br />
            <input name="form__d_unit_b_resyrs" value="" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form__d_unit_b_all" value="" type="checkbox" />Весь (<?=$d_unit_b['caption']?>)<br />
                <input name="form__d_unit_b_all_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_b_starter" value="" type="checkbox" />Стартер<br />
                <input name="form__d_unit_b_starter_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_b_magnval" value="" type="checkbox" />Магнитный вал<br />
                <input name="form__d_unit_b_magnval_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_b_kolari" value="" type="checkbox" />Колары<br />
                <input name="form__d_unit_b_kolari_note" value="" type="text" /> <br />
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
            <input type="radio" name="form__d_unit_c" value="N" <?=$d_unit_c_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__d_unit_c" value="Y" <?=$d_unit_c_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__d_unit_c_note" value="" type="text" /> <br />
            Ресурс : <br />
            <input name="form__d_unit_c_resyrs" value="" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form__d_unit_c_all" value="" type="checkbox" />Весь (<?=$d_unit_c['caption']?>)<br />
                <input name="form__d_unit_c_all_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_c_starter" value="" type="checkbox" />Стартер<br />
                <input name="form__d_unit_c_starter_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_c_magnval" value="" type="checkbox" />Магнитный вал<br />
                <input name="form__d_unit_c_magnval_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_c_kolari" value="" type="checkbox" />Колары<br />
                <input name="form__d_unit_c_kolari_note" value="" type="text" /> <br />
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
	        <input type="radio" name="form__d_unit_y" value="N" <?=$d_unit_y_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__d_unit_y" value="Y" <?=$d_unit_y_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__d_unit_y_note" value="" type="text" /> <br />
            Ресурс : <br />
            <input name="form__d_unit_y_resyrs" value="" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form__d_unit_y_all" value="" type="checkbox" />Весь (<?=$d_unit_y['caption']?>)<br />
                <input name="form__d_unit_y_all_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_y_starter" value="" type="checkbox" />Стартер<br />
                <input name="form__d_unit_y_starter_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_y_magnval" value="" type="checkbox" />Магнитный вал<br />
                <input name="form__d_unit_y_magnval_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_y_kolari" value="" type="checkbox" />Колары<br />
                <input name="form__d_unit_y_kolari_note" value="" type="text" /> <br />
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
	        <input type="radio" name="form__d_unit_m" value="N" <?=$d_unit_m_n?>>&nbsp;Отсутствует<br />
            <input type="radio" name="form__d_unit_m" value="Y" <?=$d_unit_m_y?>>&nbsp;Присутствует<br />
            Примечание : <br />
	        <input name="form__d_unit_m_note" value="" type="text" /> <br />
            Ресурс : <br />
            <input name="form__d_unit_m_resyrs" value="" type="text" /> <br />
            <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
                <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
                <input name="form__d_unit_m_all" value="" type="checkbox" />Весь (<?=$d_unit_m['caption']?>)<br />
                <input name="form__d_unit_m_all_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_m_starter" value="" type="checkbox" />Стартер<br />
                <input name="form__d_unit_m_starter_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_m_magnval" value="" type="checkbox" />Магнитный вал<br />
                <input name="form__d_unit_m_magnval_note" value="" type="text" /> <br />
                <hr>
                <input name="form__d_unit_m_kolari" value="" type="checkbox" />Колары<br />
                <input name="form__d_unit_m_kolari_note" value="" type="text" /> <br />
            </fieldset>
        </fieldset>
    </div>
</div>
<?}?>