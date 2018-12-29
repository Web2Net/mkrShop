function pr_pechka_Y_N(id){
 
    if(id == "pechka_y"){
        document.getElementById('pechka_n').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "pechka_n"){
        document.getElementById('pechka_y').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
    
 
}