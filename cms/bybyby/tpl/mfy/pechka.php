<?
$query_1_1 = "SELECT * FROM `bybyby_in_pechka` WHERE `bybyby_id` = '$id'";
$array_1_1 = mysql_query ($query_1_1);
$pechka_in = mysql_fetch_array ($array_1_1);

if($pechka_in['pechka_presence'] == '0'){ // отсутствует
    $pechka_presence_n = "checked";
    $pechka_presence_y = ""; 
}
else{                                     // присутствует
    $pechka_presence_n = ""; 
    $pechka_presence_y = "checked";
}

if($pechka_in['pechka_all'] == '1'){
    $pechka_all = "checked";
}
if($pechka_in['pechka_teflon'] == '1'){
    $pechka_teflon = "checked";
}
if($pechka_in['pechka_rval'] == '1'){
    $pechka_rval = "checked";
}
if($pechka_in['pechka_termo'] == '1'){
    $pechka_termo = "checked";
}
if($pechka_in['pechka_vtylka'] == '1'){
    $pechka_vtylka = "checked";
}
if($pechka_in['pechka_palci'] == '1'){
    $pechka_palci = "checked";
}
if($pechka_in['pechka_datchik'] == '1'){
    $pechka_datchik = "checked";
}
if($pechka_in['pechka_tdatchik'] == '1'){
    $pechka_tdatchik = "checked";
}


define('TABL_PECHKA', 'tech_pechka');

$query_1 = "SELECT * FROM `" . TABL_PECHKA . "` WHERE `model_id` LIKE '%;{$model["id"]};%'";
$array_1 = mysql_query ($query_1);
$pechka = mysql_fetch_array ($array_1);
?>

<fieldset class="pole" style="text-align:left;padding:5px;border-color:black;">
    <legend>&nbsp;&nbsp;Печка (<?=$pechka['article']?>)&nbsp;&nbsp;</legend>
    <input type="radio" name="form6__pechka_presence" value="0" <?=$pechka_presence_n?>>&nbsp;Отсутствует<br />
    <input type="radio" name="form6__pechka_presence" value="1" <?=$pechka_presence_y?>>&nbsp;Присутствует<br />
    Примечание : <br />
	<input name="form6__pechka_presence_note" value="<?=$pechka_in['pechka_presence_note']?>" type="text" /> <br />
    Ресурс : <br />
    <input name="form6__pechka_presence_resyrs" value="<?=$pechka_in['pechka_presence_resyrs']?>" type="text" /> <br />
    <fieldset class="pole" style="text-align:left;padding:5px;border-color:#ccc;">
        <legend>&nbsp;&nbsp;Требует замены &nbsp;&nbsp;</legend>
        <table>
            <tr>
                <td>
                    <input name="form6__pechka_all" value="1" type="checkbox" <?=$pechka_all?> />Вся (<?=$pechka['article']?>)<br />
        <input name="form6__pechka_all_note" value="<?=$pechka_in['pechka_all_note']?>" type="text" /> <br />
        <hr>
        <input name="form6__pechka_teflon" value="1" type="checkbox" <?=$pechka_teflon?> />Тефлоновый вал<br />
        <input name="form6__pechka_teflon_note" value="<?=$pechka_in['pechka_teflon_note']?>" type="text" /> <br />
        <hr>
        <input name="form6__pechka_rval" value="1" type="checkbox" <?=$pechka_rval?> />Резиновый вал<br />
        <input name="form6__pechka_rval_note" value="<?=$pechka_in['pechka_rval_note']?>" type="text" /> <br />
        <hr>
                </td>
                <td>
                    <input name="form6__pechka_termo" value="1" type="checkbox" <?=$pechka_termo?> />Термоэлемент<br />
        <input name="form6__pechka_termo_note" value="<?=$pechka_in['pechka_termo_note']?>" type="text" /> <br />
        <hr>
        <input name="form6__pechka_vtylka" value="1" type="checkbox" <?=$pechka_vtylka?> />Втулки<br />
        <input name="form6__pechka_vtylka_note" value="<?=$pechka_in['pechka_vtylka_note']?>" type="text" /> <br />
        <hr>
        <input name="form6__pechka_palci" value="1" type="checkbox" <?=$pechka_palci?> />Пальцы<br />
        <input name="form6__pechka_palci_note" value="<?=$pechka_in['pechka_palci_note']?>" type="text" /> <br />
        <hr>
                </td>
                <td>
                    <input name="form6__pechka_datchik" value="1" type="checkbox" <?=$pechka_datchik?> />Датчик<br />
        <input name="form6__pechka_datchik_note" value="<?=$pechka_in['pechka_datchik_note']?>" type="text" /> <br />
        <hr>
        <input name="form6__pechka_tdatchik" value="1" type="checkbox" <?=$pechka_tdatchik?> />Термодатчик<br />
        <input name="form6__pechka_tdatchik_note" value="<?=$pechka_in['pechka_tdatchik_note']?>" type="text" /> <br />
        <hr>
                </td>
            </tr>            
        </table>

	    
	    
	    
    </fieldset>	
</fieldset>	        