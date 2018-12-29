<style>
.works_line{
	float: left; 
	width: 100px;
	padding:5px; margin:5px;
	border:1px solid #ccc;
	text-align:center;
	font-weight:700;
}
</style>
<div style="width:95%;">

<?if ($art_data['zdelano']=='Y'){$bg = "#85fd7c";}else{$bg = "#fd7c7c";}?>
    <div class="works_line r5" style="background-color:<?=$bg?>;">Работа 
        <br /><br /><input name="form__zdelano" type="checkbox" <?if ($art_data['zdelano']=='Y'){?> checked=""<?}?>value="1" />
	</div>					

<?if ($art_data['otgryzka']=='Y'){$bg = "#85fd7c";}else{$bg = "#fd7c7c";}?>
    <div class="works_line r5" style="background-color:<?=$bg?>;">Отгрузка 
	    <br /><br /><input name="form__otgryzka" type="checkbox" <?if ($art_data['otgryzka']=='Y'){?> checked=""<?}?>value="1" />
	</div>					

<?if ($art_data['doc']=='Y'){$bg = "#85fd7c";}else{$bg = "#fd7c7c";}?>	
    <div class="works_line r5" style="background-color:<?=$bg?>;">Документы
	    <br /><br /><input name="form__doc" type="checkbox" <?if ($art_data['doc']=='Y'){?> checked=""<?}?>value="1" />
	</div>
	
<?if ($art_data['srochno']=='Y'){$bg = "#85fd7c";}else{$bg = "#fd7c7c";}?>	
    <div class="works_line r5" style="background-color:<?=$bg?>;">Срочно выписать доки
	    <br /><br /><input name="form__srochno" type="checkbox" <?if ($art_data['srochno']=='Y'){?> checked=""<?}?>value="1" />
	</div>	

<?if ($art_data['pay']=='Y'){$bg = "#85fd7c";}else{$bg = "#fd7c7c";}?>
    <div class="works_line r5" style="background-color:<?=$bg?>;">Оплата<br /><br />


<?
if($_SESSION["user_level"] >= "6"){ // При безналичном расчете кнопка "Оплатили" активна только для уровней 6 и выше  
?>   
			    <input name="form__pay" type="checkbox" <?if ($art_data['pay']=='Y'){?> checked=""<?}?>value="1" />
<?
}
elseif($art_data['nal'] == "Y" && $_SESSION["user_level"] <= "6"){?>
                            <input name="form__pay" type="checkbox" <?if ($art_data['pay']=='Y'){?> checked=""<?}?>value="1" />
<?}
else{?>
                
<?}?>

	</div>
	
	
</div>
<div class="both br_5"></div>
