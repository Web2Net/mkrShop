
<style>
    .wrap_works_filter_butt{
	    padding:5px;
	}
	.works_filter_butt{
	    border: 1px solid #000;
		padding:5px;margin:1px;
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

#tab2 {position: fixed; }

.menu1 > a,
.menu1 #tab2:target ~ a:nth-of-type(1),

.menu1 > div { padding: 5px; border: 1px solid #aaa; }

.menu1 > a { line-height: 28px; background: #fff; text-decoration: none; }

#tab2,
.menu1 > div,
.menu1 #tab2:target ~ div:nth-of-type(1),
.menu1 #tab3:target ~ div:nth-of-type(1) {display: none; }


.menu1 > div:nth-of-type(1),
.menu1 #tab2:target ~ div:nth-of-type(2),
.menu1 #tab3:target ~ div:nth-of-type(3) { display: block; }


.menu1 > a:nth-of-type(1),
.menu1 #tab2:target ~ a:nth-of-type(2),
.menu1 #tab3:target ~ a:nth-of-type(3) { border-bottom: 2px solid #fff; }

</style>
<div class="menu1">
    <br id="tab2"/>
    <a href="#tab1" style="font-weight:900">2017</a>
    <a href="#tab2" style="font-weight:900">2018</a>
    
  
  <div>
        <table>
	<tr>
	    <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=01&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='01'){?>5px solid #00FF00<?}else{?><?}?>;">Январь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=02&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='02'){?>5px solid #00FF00<?}else{?><?}?>;">Февраль</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=03&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='03'){?>5px solid #00FF00<?}else{?><?}?>;">Март</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=04&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='04'){?>5px solid #00FF00<?}else{?><?}?>;">Апрель</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=05&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='05'){?>5px solid #00FF00<?}else{?><?}?>;">Май</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=06&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='06'){?>5px solid #00FF00<?}else{?><?}?>;">Июнь</div>
			</a>
		</td>		
	</tr>
	<tr>
	    <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=07&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='07'){?>5px solid #00FF00<?}else{?><?}?>;">Июль</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=08&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='08'){?>5px solid #00FF00<?}else{?><?}?>;">Август</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=09&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='09'){?>5px solid #00FF00<?}else{?><?}?>;">Сентябрь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=10&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='10'){?>5px solid #00FF00<?}else{?><?}?>;">Октябрь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=11&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='11'){?>5px solid #00FF00<?}else{?><?}?>;">Ноябрь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=12&year=2017">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='12'){?>5px solid #00FF00<?}else{?><?}?>;">Декабрь</div>
			</a>
		</td>		
	</tr>
		
</table>
    
  </div>
  <div>
     <table>
	<tr>
	    <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=01&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='01'){?>5px solid #00FF00<?}else{?><?}?>;">Январь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=02&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='02'){?>5px solid #00FF00<?}else{?><?}?>;">Февраль</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=03&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='03'){?>5px solid #00FF00<?}else{?><?}?>;">Март</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=04&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='04'){?>5px solid #00FF00<?}else{?><?}?>;">Апрель</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=05&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='05'){?>5px solid #00FF00<?}else{?><?}?>;">Май</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=06&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='06'){?>5px solid #00FF00<?}else{?><?}?>;">Июнь</div>
			</a>
		</td>		
	</tr>
	<tr>
	    <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=07&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='07'){?>5px solid #00FF00<?}else{?><?}?>;">Июль</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=08&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='08'){?>5px solid #00FF00<?}else{?><?}?>;">Август</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=09&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='09'){?>5px solid #00FF00<?}else{?><?}?>;">Сентябрь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=10&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='10'){?>5px solid #00FF00<?}else{?><?}?>;">Октябрь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=11&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='11'){?>5px solid #00FF00<?}else{?><?}?>;">Ноябрь</div>
			</a>
		</td>
        <td>
		    <a href="?mod=<?=$mod?>&com=view&type=month&month_n=12&year=2018">
			    <div class="works_filter_butt r5" style="background-color:#FFC1C1;border:<?if($month_n=='12'){?>5px solid #00FF00<?}else{?><?}?>;">Декабрь</div>
			</a>
		</td>		
	</tr>
		
</table>
  </div>
  
    
  </div>

