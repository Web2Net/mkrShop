<?
if($values[1] == "Ноутбуки"){   
    
	if(substr_count($values[3],"10.1") > 0 || 
	   substr_count($values[3],"10,1") > 0 || 
	   substr_count($values[3],"11.6") > 0 || 
	   substr_count($values[3],"11,6") > 0 || 
//	   substr_count($values[3],"12") > 0 || 
	   substr_count($values[3],"12.2") > 0 || 
	   substr_count($values[3],"12,2") > 0 || 
	   substr_count($values[3],"12.5") > 0 ||
	   substr_count($values[3],"12,5") > 0){
	   $filtr = ";1;"; // 9-12.5
	}
	elseif(substr_count($values[3],"13.1") > 0 ||
	   substr_count($values[3],"13,1") > 0 ||
	   substr_count($values[3],"13.3") > 0 || 
	   substr_count($values[3],"13,3") > 0){
	   $filtr = ";2;"; // 13
	}
    elseif(substr_count($values[3],"14") || 
	   substr_count($values[3],"15.4") > 0 || 
	   substr_count($values[3],"15,4") > 0 || 
	   substr_count($values[3],"15.6") > 0 || 
	   substr_count($values[3],"15,6") > 0){
	   $filtr = ";3;";
	}
    elseif(substr_count($values[3],"17.3") > 0 || 
	   substr_count($values[3],"17,3") > 0){
	   $filtr = ";4;";
	}

    else{$filtr = "";}
        
		if(($values[2] == "Нетбуки" || 
		    $values[2] == "Ноутбуки Бизнес" || 
			$values[2] == "Ноутбуки Потребительские" || 
			$values[2] == "MacBook Air" || 
			$values[2] == "MacBook Pro") && $filtr !== ""){
			$filter_connect = $filtr;
		}
        else{$filter_connect = "";}
}

else{
	$filter_connect = "";
}
?>