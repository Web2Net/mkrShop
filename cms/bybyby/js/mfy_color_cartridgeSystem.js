function mfy_color_cartridgeSystem(id) {
 
    if(id == "mfy_color_cartridgeSystem_block"){
        document.getElementById('pr_color_cartridgeSystem_revolt').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "mfy_color_cartridgeSystem_revolt"){
        document.getElementById('mfy_color_cartridgeSystem_block').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
    
 
}