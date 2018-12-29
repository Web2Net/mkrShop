<?include SITE_PATH."/cms/works/tpl/works_butt_archiv.php";?>


				<table valign="top">
				    <tr>

<?if($art_data['ingener'] !== "" && $art_data['responsible_ingener']){
	if($art_data['ingener'] == "alex"){$ingener_id = "8";}
	if($art_data['ingener'] == "rsergey"){$ingener_id = "163";}
	if($art_data['ingener'] == "ssergey"){$ingener_id = "164";}
	if($art_data['ingener'] == "web2net"){$ingener_id = "1";}
	if($art_data['ingener'] == "irina"){$ingener_id = "165";}
?>
	      				<td class="wrap_user_panel">
                          <div class="user_panel_butt r5">
                            <img src="/image/user/item/<?=$ingener_id?>/1s.png" style="width:60px" />
                        </td>
<?}?>
					
<?// ************** GORYASCHAYA ******************?>
<?
$create_prioritet = explode(" ",$art_data['date_prioritet']);
$prioritet_date = $create_prioritet['0'];
$prioritet_author = $create_prioritet['1'];
?>					
					    <td class="wrap_user_panel">
						  <div class="user_panel_butt r5">
<?if($art_data['prioritet'] == "N"){?>
                            <a href="?mod=<?=$mod?>&com=prioritet&resultat=y&id=<?=$art_data['id']?>"<!-- onclick="if (confirm('Вы уверенны, что сделали работу?')) location=this.href; return false;-->">
                                <img src="<?=PATH_IMG_ADMIN?>/prioritet_n.png" style="width:30px" />
								<br /><span style="font-size:11px"><?=$prioritet_date?><br /><?=ucfirst($prioritet_author);?></span>
                            </a>
<?}
else
{?>
                            <a href="?mod=<?=$mod?>&com=prioritet&resultat=n&id=<?=$art_data['id']?>" onclick="if (confirm('Вы уверенны, работа НЕ срочная?')) location=this.href; return false;">
                                <img src="<?=PATH_IMG_ADMIN?>/prioritet_y.gif" style="width:50px" />
                                <br /><span style="font-size:11px"><?=$prioritet_date?><br /><?=ucfirst($prioritet_author);?></span>
							</a>
<?}?>
                          </div>
						</td>
<?// ************** /GORYASCHAYA ******************?>					
						

<?// ************** DOCI SROCHNO ******************?>
<?
$srochno = explode(" ",$art_data['date_srochno']);
$srochno_date = $srochno['0'];
$srochno_author = $srochno['1'];
?>
					    <td class="wrap_user_panel">
						  <div class="user_panel_butt r5">
<?if($art_data['srochno'] == 'Y' && $art_data['doc'] == "N"){?>
                            <a href="?mod=<?=$mod?>&com=srochno&resultat=n&id=<?=$art_data['id']?>"<!-- onclick="if (confirm('Вы уверенны, что сделали работу?')) location=this.href; return false;-->">
                                <img src="<?=PATH_IMG_ADMIN?>/ico_doc_Y.png" style="width:30px" />
								<br /><span style="font-size:11px"><?=$srochno_date?><br /><?=ucfirst($srochno_author);?></span>
                            </a>
<?}
elseif(($art_data['srochno'] == 'Y' && $art_data['doc'] == "Y") || $art_data['doc'] == "Y")
{?>
                            <a href="?mod=<?=$mod?>&com=srochno&resultat=n&id=<?=$art_data['id']?>" onclick="if (confirm('Вы уверенны, документы НЕ НУЖНО выписать?')) location=this.href; return false;">
                                <img src="<?=PATH_IMG_ADMIN?>/ico_doc_YY.png" style="width:30px" />
                                <br /><span style="font-size:11px"><?=$srochno_date?><br /><?=ucfirst($srochno_author);?></span>
							</a>
<?}
else
{?>
                            <a href="?mod=<?=$mod?>&com=srochno&resultat=y&id=<?=$art_data['id']?>" >
                                <img src="<?=PATH_IMG_ADMIN?>/ico_doc_N.png" style="width:30px" />
                                <br /><span style="font-size:11px"><?=$srochno_date?><br /><?=ucfirst($srochno_author);?></span>
							</a>
							 
<?}
?>
                          </div>
						</td>
<?// ************** /DOCI SROCHNO ******************?>							  
						  

					
<?// ************** ZDELANO ******************?>
<?
$zdelano = explode(" ",$art_data['date_zdelano']);
$zdelano_date = $zdelano['0'];
$zdelano_author = $zdelano['1'];

if($art_data['zdelano'] == "N"){
    $zdelano_img = "zdelano_n.jpg";
	$zdelano_res = "y";
	$zdelano_mes = "";
}else{
    $zdelano_img = "zdelano_y.jpg";
	$zdelano_res = "n";
	$zdelano_mes = "onclick=\"if (confirm('Вы уверенны, работа НЕ сделана?')) location=this.href; return false;\"";
}  
?>
					    <td class="wrap_user_panel">
						  <div class="user_panel_butt r5">
                            <a href="?mod=<?=$mod?>&com=zdelano&resultat=<?=$zdelano_res?>&id=<?=$art_data['id']?>" <?=$zdelano_mes?>>
                                <img src="<?=PATH_IMG_ADMIN?>/<?=$zdelano_img?>" style="width:30px" />
                                <br /><span style="font-size:11px"><?=$zdelano_date?><br /><?=ucfirst($zdelano_author);?></span>
							</a>

                          </div>
						</td>
<?// ************** /ZDELANO ******************?>
<?// ************** DOCI ******************?>

<?
$doci = explode(" ",$art_data['date_doc']);
$doci_date = $doci['0'];
$doci_author = $doci['1'];
?>
					    <td class="wrap_user_panel">
						  <div class="user_panel_butt r5">
<?if($art_data['nal'] == "N"){?>
    <?if($art_data['doc'] == "N"){?>
                            <a href="?mod=<?=$mod?>&com=doc&resultat=y&id=<?=$art_data['id']?>"<!-- onclick="if (confirm('Вы уверенны, что сделали работу?')) location=this.href; return false;-->">
                                <img src="<?=PATH_IMG_ADMIN?>/ndoc.jpg" style="width:30px" />
								<br /><span style="font-size:11px"><?=$doci_date?><br /><?=ucfirst($doci_author);?></span>
                            </a>
    <?}else{?>
                            <a href="?mod=<?=$mod?>&com=doc&resultat=n&id=<?=$art_data['id']?>" onclick="if (confirm('Вы уверенны, что документы НЕ выписаны?')) location=this.href; return false;">
                                <img src="<?=PATH_IMG_ADMIN?>/ydoc.jpg" style="width:30px" />
                                <br /><span style="font-size:11px"><?=$doci_date?><br /><?=ucfirst($doci_author);?></span>
							</a>
    <?}?>
<?}elseif($art_data['nal'] == "Y"){?>
    <?if($art_data['doc'] == "N"){?>
                            <a href="?mod=<?=$mod?>&com=doc&resultat=y&id=<?=$art_data['id']?>"<!-- onclick="if (confirm('Вы уверенны, что сделали работу?')) location=this.href; return false;-->">
                                <img src="<?=PATH_IMG_ADMIN?>/ndoc.jpg" style="width:30px" />
								<br /><span style="font-size:11px"><?=$doci_date?><br /><?=ucfirst($doci_author);?></span>
                            </a>
    <?}else{?>
                            <a href="?mod=<?=$mod?>&com=doc&resultat=n&id=<?=$art_data['id']?>" onclick="if (confirm('Вы уверенны, что документы НЕ выписаны?')) location=this.href; return false;">
                                <img src="<?=PATH_IMG_ADMIN?>/ydoc.jpg" style="width:30px" />
                                <br /><span style="font-size:11px"><?=$doci_date?><br /><?=ucfirst($doci_author);?></span>
							</a>
    <?}?>
<?}?>
                          </div>
						</td>
						
<?// ************** /DOCI ******************?>						

<?// ************** OTGRUZKA ******************?>
<?
$otgryzka = explode(" ",$art_data['date_otgryzka']);
$otgryzka_date = $otgryzka['0'];
$otgryzka_author = $otgryzka['1'];

if($art_data['otgryzka'] == "N"){
    $otgryzka_img = "otgryzka_n.gif";
	$otgryzka_res = "y";
	$otgryzka_mes = "";
}else{
    $otgryzka_img = "otgryzka_y.png";
	$otgryzka_res = "n";
	$otgryzka_mes = "onclick=\"if (confirm('Вы уверенны, что товар НЕ отгружен?')) location=this.href; return false;\"";
}  
?>					
					    <td class="wrap_user_panel">
						  <div class="user_panel_butt r5">
                            <a href="?mod=<?=$mod?>&com=otgryzka&resultat=<?=$otgryzka_res?>&id=<?=$art_data['id']?>" <?=$otgryzka_mes?>>
                                <img src="<?=PATH_IMG_ADMIN?>/<?=$otgryzka_img?>" style="width:30px" />
                                <br /><span style="font-size:11px"><?=$otgryzka_date?><br /><?=ucfirst($otgryzka_author);?></span>
							</a>
                          </div>
						</td>
<?// ************** /OTGRUZKA ******************?>						

<?// ************** PAY ******************?>
<?
$pay = explode(" ",$art_data['date_pay']);
$pay_date = $pay['0'];
$pay_author = $pay['1'];
?>
<?
if($art_data['pay'] == "N"){
    $pay_img = "pay_n.jpg";
	$pay_res = "y";
	$pay_mes = "";
}else{
    $pay_img = "pay_y.jpg";
	$pay_res = "n";
	$pay_mes = "onclick=\"if (confirm('Вы уверенны, что заявка НЕ оплачена?')) location=this.href; return false;\"";
}  
?>					
					    <td class="wrap_user_panel">
						  <div class="user_panel_butt r5">
<?
if($_SESSION["user_level"] >= "6"){ // При безналичном расчете кнопка "Оплатили" активна только для уровней 6 и выше  
?>   
			    <a href="?mod=<?=$mod?>&com=pay&resultat=<?=$pay_res?>&id=<?=$art_data['id']?>" <?=$pay_mes?>>
                    <img src="<?=PATH_IMG_ADMIN?>/<?=$pay_img?>" style="width:20px" />
			    	<div style="font-size:10px;"><?=$pay_author?></div>
				</a>
<?
}
elseif($art_data['nal'] == "Y" && $_SESSION["user_level"] <= "6"){?>
                            <a href="?mod=<?=$mod?>&com=pay&resultat=<?=$pay_res?>&id=<?=$art_data['id']?>" <?=$pay_mes?>>
                    <img src="<?=PATH_IMG_ADMIN?>/<?=$pay_img?>" style="width:20px" />
			    	<div style="font-size:10px;"><?=$pay_author?></div>
				</a>
<?}
else{?>
                <img src="<?=PATH_IMG_ADMIN?>/<?=$pay_img?>" style="width:20px" />
				<div style="font-size:10px;"><?=$pay_author?>...</div>
<?}?>						
                          </div>
						</td>
<?// ************** /PAY ******************?>						

<?// ************** ARCHIVE ******************?>						
<?if($_SESSION["user_level"] >= "8"){
      if($archive_field == "1"){
?>						
                        <td class="wrap_user_panel">
						  <div class="user_panel_butt r5">
                            <?=$butt_arch?>
                          </div>
						</td>
<?}}?>
<?// ************** /ARCHIVE ******************?>
						
					</tr>
                </table>
