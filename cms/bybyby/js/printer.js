function printer(id) {
 
    if(id == "printer_col"){
        document.getElementById('printer_bl').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "printer_bl"){
        document.getElementById('printer_col').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
    
 
}