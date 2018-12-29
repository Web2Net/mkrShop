function col_cart_block_Y_N(id){
 
    if(id == "col_cart_cart_y"){
        document.getElementById('col_cart_cart_n').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
	if(id == "col_cart_cart_n"){
        document.getElementById('col_cart_cart_y').style.display = "none";
		document.getElementById(id).style.display = "block";
    }
    
 
}