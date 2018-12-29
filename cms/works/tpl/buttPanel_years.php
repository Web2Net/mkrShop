<?
if($_GET['year'] == "2014"){
    $year_2014 = "style='border-bottom: 2px solid #d91219;'";
} 
if($_GET['year'] == "2015"){
    $year_2015 = "style='border-bottom: 2px solid #d91219;'";
} 
if($_GET['year'] == "2016"){
    $year_2016 = "style='border-bottom: 2px solid #d91219;'";
}
if($_GET['year'] == "2017"){
    $year_2017 = "style='border-bottom: 2px solid #d91219;'";
}
if($_GET['year'] == "2018"){
    $year_2018 = "style='border-bottom: 2px solid #d91219;'";
}
if($_GET['year'] == "2019"){
    $year_2019 = "style='border-bottom: 2px solid #d91219;'";
}

?>
<div>
    <a href="?mod=<?=$mod?>&com=view&type=<?=$type?>&year=2014" <?=$year_2014?>>2014</a> *
	<a href="?mod=<?=$mod?>&com=view&type=<?=$type?>&year=2015" <?=$year_2015?>>2015</a> * 	
	<a href="?mod=<?=$mod?>&com=view&type=<?=$type?>&year=2016" <?=$year_2016?>>2016</a> * 
	<a href="?mod=<?=$mod?>&com=view&type=<?=$type?>&year=2017" <?=$year_2017?>>2017</a> * 
	<a href="?mod=<?=$mod?>&com=view&type=<?=$type?>&year=2018" <?=$year_2018?>>2018</a> *
	<a href="?mod=<?=$mod?>&com=view&type=<?=$type?>&year=2019" <?=$year_2019?>>2019</a> *
</div>