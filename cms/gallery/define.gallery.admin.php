<?php
if($_SESSION['lang']=="en"){
    define('GALLERY_ADMIN_MOD_NAME','Gallery');
    
    
}
elseif($_SESSION['lang']=="ru"){
    define('GALLERY_ADMIN_MOD_NAME','Галерея');
    
    
}else{
	define('GALLERY_ADMIN_MOD_NAME','Галерея');
	
	
}
?>
