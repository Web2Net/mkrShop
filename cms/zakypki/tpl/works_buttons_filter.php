<style>
    .wrap_works_filter_butt{
	    padding:5px;
	}
	.works_filter_butt{
	    border: 1px solid #000;
		padding:5px;
	}
	
	.wrap_user_panel{
	    text-align:center;
		padding:1px;
		vertical-align:top;
	}
	.user_panel_butt{
	    border:1px solid #ccc;
		margin:2px; padding:2px;
		width:70px; height:65px;
	}
</style>

    <table>
	    <tr>
		    <td class="wrap_works_filter_butt">
			    <a href="?mod=<?=$mod?>&com=view&type=prioritet&ingener=<?=$_SESSION['ingener']?>" style="color:#fff;font-weight:900;">
				    <div class="works_filter_butt r5" style="background-color:#d91299;border:<?if($type=='prioritet'){?>5px solid #00FF00<?}else{?><?}?>;">Срочняковые!!!</div>
				</a>
                <div style="height:10px"></div>
	            <a href="?mod=<?=$mod?>&com=view&type=srochno_y&ingener=<?=$_SESSION['ingener']?>" style="color:#fff;font-size:14px;font-weight:900;">
				    <div class="works_filter_butt r5" style="background-color:#d91219;border:<?if($type=='srochno_y'){?>5px solid #00FF00<?}else{?><?}?>;">Нужны ДОКИ!!!</div>
				</a>
			</td>
			<td class="wrap_works_filter_butt">
			    <a href="?mod=<?=$mod?>&com=view&type=all&ingener=<?=$_SESSION['ingener']?>">
					<div class="works_filter_butt r5" style="background-color:#fff;border:<?if($type=='all'){?>5px solid #00FF00<?}else{?><?}?>;">Всё</div>
				</a>
				<div style="height:10px"></div>
				<a href="?mod=<?=$mod?>&com=view&type=pay_n&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($type=='pay_n'){?>5px solid #00FF00<?}else{?><?}?>;">Неоплачено</div></a>
			</td>
		    <td class="wrap_works_filter_butt">
			    <a href="?mod=<?=$mod?>&com=view&type=nworks&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($type=='nworks'){?>5px solid #00FF00<?}else{?><?}?>;">Не сделано</div></a>
                <div style="height:10px"></div>
                <a href="?mod=<?=$mod?>&com=view&type=yworks&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#C1FFC1;border:<?if($type=='yworks'){?>5px solid #00FF00<?}else{?><?}?>;">Сделано</div></a>
			</td>
		    <td class="wrap_works_filter_butt">
			    <a href="?mod=<?=$mod?>&com=view&type=ndoc&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($type=='ndoc'){?>5px solid #00FF00<?}else{?><?}?>;">Не выписано</div></a>
                <div style="height:10px"></div>
                <a href="?mod=<?=$mod?>&com=view&type=ydoc&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#C1FFC1;border:<?if($type=='ydoc'){?>5px solid #00FF00<?}else{?><?}?>;">Выписано</div></a>
			</td>
		    <td class="wrap_works_filter_butt">
			    <a href="?mod=<?=$mod?>&com=view&type=nal_n&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#fff;border:<?if($type=='nal_n'){?>5px solid #00FF00<?}else{?><?}?>;">Без/Нал</div></a>
                <div style="height:10px"></div>
                <a href="?mod=<?=$mod?>&com=view&type=nal_y&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#fff;border:<?if($type=='nal_y'){?>5px solid #00FF00<?}else{?><?}?>;">Нал</div></a>
			</td>
			<td class="wrap_works_filter_butt">
			    <a href="?mod=<?=$mod?>&com=view&type=n_otgryzka&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($type=='n_otgryzka'){?>5px solid #00FF00<?}else{?><?}?>;">Не отгружено</div></a>
				<div style="height:10px"></div>
				<a href="?mod=<?=$mod?>&com=view&type=sn&ingener=<?=$_SESSION['ingener']?>"><div class="works_filter_butt r5" style="background-color:#fff;border:<?if($type=='sn'){?>5px solid #00FF00<?}else{?><?}?>;">S/N</div></a>
			</td>
		    <td class="wrap_works_filter_butt">

<?if($type == "my_works"){?>

                <a href="?mod=<?=$mod?>&type=my_works&com=print&ingener=<?=$_GET['ingener']?>&display=print&print_variant=otchet" target="_blank">
				    <div class="works_filter_butt r5" style="background-color:#fff;border:5px solid #00FF00;">Отчет</div>
				</a>
				<div style="height:10px"></div>
				<a href="?mod=<?=$mod?>&type=my_works&com=print&ingener=<?=$_GET['ingener']?>&display=print&print_variant=begunok" target="_blank">
				    <div class="works_filter_butt r5" style="background-color:#fff;border:5px solid #00FF00;">Бегунок</div>
				</a>
				
<!--
				<div style="height:10px"></div>
<script>
function SubmitPrint(){
	$('#works_massiv_action').val('print');
	$("#works_massiv").submit();
}
</script>
				<a href="javascript:SubmitPrint()" id="print">
				    <div class="works_filter_butt r5" style="background-color:#fff;border:5px solid #00FF00;">Печать Выбранных</div>
                    <img src="design/print.png" style="padding:5px;border: 1px solid #ccc; cursor: pointer;width:50px;height:50px;" title="Печать Выбранных!!" onmouseover="this.style.background='#D8D8D8';" onmouseout="this.style.background=''">
-->
                
<?}?>				
			</td>
		</tr>
	</table>