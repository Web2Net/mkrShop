function device(id) {
 
    if(id == "mfy"){
        document.getElementById('notebook').style.display = "none";
		document.getElementById('printer').style.display = "none";
		document.getElementById('monitor').style.display = "none";
		document.getElementById('plotter').style.display = "none";
		document.getElementById('ups').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
    if(id == "printer"){
        document.getElementById('mfy').style.display = "none";
		document.getElementById('notebook').style.display = "none";
		document.getElementById('monitor').style.display = "none";
		document.getElementById('plotter').style.display = "none";
		document.getElementById('ups').style.display = "none";
		document.getElementById(id).style.display = "block";
   }
   if(id == "notebook"){
        document.getElementById('mfy').style.display = "none";
		document.getElementById('printer').style.display = "none";
	    document.getElementById('monitor').style.display = "none";
	    document.getElementById('plotter').style.display = "none";
	    document.getElementById('ups').style.display = "none";
	    document.getElementById(id).style.display = "block";
    }
	if(id == "monitor"){
        document.getElementById('mfy').style.display = "none";
		document.getElementById('notebook').style.display = "none";
		document.getElementById('printer').style.display = "none";
		document.getElementById('plotter').style.display = "none";
		document.getElementById('ups').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "plotter"){
        document.getElementById('mfy').style.display = "none";
		document.getElementById('notebook').style.display = "none";
		document.getElementById('printer').style.display = "none";
		document.getElementById('monitor').style.display = "none";
        document.getElementById('ups').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "ups"){
        document.getElementById('mfy').style.display = "none";
		document.getElementById('notebook').style.display = "none";
		document.getElementById('printer').style.display = "none";
		document.getElementById('monitor').style.display = "none";
		document.getElementById('plotter').style.display = "none";
        document.getElementById(id).style.display = "block";
    }
 
}