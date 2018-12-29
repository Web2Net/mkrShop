function pr_color_cartridge_system(id) {
 
    if(id == "pr_color_cartridge_cart"){
        document.getElementById('pr_color_cartridge_revolt').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "pr_color_cartridge_revolt"){
        document.getElementById('pr_color_cartridge_cart').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
    
 
}