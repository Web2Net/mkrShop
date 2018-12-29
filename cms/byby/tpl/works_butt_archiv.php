<?
$bg_zayavki = "background-color:#fff;";
$butt_arch = "";
$archive_field = "0";
if($art_data['archiv'] == "Y"){$archive_ico = "icons_archive_y.gif";}else{$archive_ico = "icons_archive.gif";}

if($art_data['nal'] == "N"){ // Безнал
    if($art_data['zdelano'] == "Y" && $art_data['otgryzka'] == "Y" && $art_data['pay'] == "Y" && $art_data['doc'] == "Y"){
        $bg_zayavki = "background-color:#def5e7;";
        $butt_arch = "<a title='В архив' href='?mod={$mod}&com=archiv&resultat=y&id={$art_data['id']}' onclick=\"if (confirm('Вы уверены, что хотите отправить запись в архив?')) location=this.href; return false;\">
		              <img src='design/{$archive_ico}' alt='В архив' vspace='1' border='0' hspace='1' width='50'></a>";
		$butt_arch_small = "<a title='В архив' href='?mod={$mod}&com=archiv&resultat=y&id={$art_data['id']}' onclick=\"if (confirm('Вы уверены, что хотите отправить запись в архив?')) location=this.href; return false;\">
		              <img src='design/{$archive_ico}' alt='В архив' vspace='1' border='0' hspace='1' width='30'></a>";
		$archive_field = "1";
    }
}
if($art_data['nal'] == "Y"){ // Нал
    if($art_data['zdelano'] == "Y" && $art_data['otgryzka'] == "Y" && $art_data['pay'] == "Y"){
        $bg_zayavki = "background-color:#def5e7;";
        $butt_arch = "<a title='В архив' href='?mod={$mod}&com=archiv&resultat=y&id={$art_data['id']}' onclick=\"if (confirm('Вы уверены, что хотите отправить запись в архив?')) location=this.href; return false;\">
		              <img src='design/{$archive_ico}' alt='В архив' vspace='1' border='0' hspace='1' width='50'></a>";
		$butt_arch_small = "<a title='В архив' href='?mod={$mod}&com=archiv&resultat=y&id={$art_data['id']}' onclick=\"if (confirm('Вы уверены, что хотите отправить запись в архив?')) location=this.href; return false;\">
		              <img src='design/{$archive_ico}' alt='В архив' vspace='1' border='0' hspace='1' width='30'></a>";
		$archive_field = "1";
    }
}
if($art_data['nal'] == "W" || $art_data['nal'] == "Z"){ // Гарантийно или На Шару
    if($art_data['zdelano'] == "Y" && $art_data['otgryzka'] == "Y"){
        $bg_zayavki = "background-color:#def5e7;";
        $butt_arch = "<a title='В архив' href='?mod={$mod}&com=archiv&resultat=y&id={$art_data['id']}' onclick=\"if (confirm('Вы уверены, что хотите отправить запись в архив?')) location=this.href; return false;\">
		              <img src='design/{$archive_ico}' alt='В архив' vspace='1' border='0' hspace='1' width='50'></a>";
		$butt_arch_small = "<a title='В архив' href='?mod={$mod}&com=archiv&resultat=y&id={$art_data['id']}' onclick=\"if (confirm('Вы уверены, что хотите отправить запись в архив?')) location=this.href; return false;\">
		              <img src='design/{$archive_ico}' alt='В архив' vspace='1' border='0' hspace='1' width='30'></a>";
		$archive_field = "1";
    }
}


?>
