<?php
if($_SESSION['lang']=="en"){
    define('SHOP_SITE_MOD_NAME','Shop');
    
    define('SHOP_SITE_CHARACTER','Characteristics');
    define('SHOP_SITE_DESCRIPTION','Description');
    define('SHOP_SITE_PRESENT','Present');
    
// Price & cart
    define('SHOP_SITE_NOTE_PRICE', 'Price');
    define('SHOP_SITE_NOTE_GOOD_PRICE', 'Good price');
    define('SHOP_SITE_NOTE_SALE', 'Sale');
    define('SHOP_SITE_NOTE_ON_REQUEST', 'O/R');
    
    define('SHOP_SITE_NOTE_IN_CART','Add to cart');
    define('SHOP_SITE_NOTE_ITEM_IN_CART','Item in the cart');
// /Price & cart
    
    define('SHOP_SITE_NOTE_APPLICATION','Applications');
    define('SHOP_SITE_NOTE_GALLERY','Gallery');
    define('SHOP_SITE_NOTE_RELATED_ITEMS','Options');
    
    define('SHOP_SITE_ATTENTION_COLOR','Specifications and appearance may differ from, or are subject to change without reflection on the site.');
    
}
elseif($_SESSION['lang']=="ru"){
    define('SHOP_SITE_MOD_NAME','Магазин');
    
    define('SHOP_SITE_CHARACTER','Характеристики');
    define('SHOP_SITE_DESCRIPTION','Описание');
    define('SHOP_SITE_PRESENT','Подарок');
    
// Price & cart
    define('SHOP_SITE_NOTE_PRICE', 'Цена');
    define('SHOP_SITE_NOTE_GOOD_PRICE', 'Хорошая цена');
    define('SHOP_SITE_NOTE_SALE', 'Распродажа');
    define('SHOP_SITE_NOTE_ON_REQUEST', 'По запросу');
    
    define('SHOP_SITE_NOTE_IN_CART','В корзину');
    define('SHOP_SITE_NOTE_ITEM_IN_CART','Товар в корзине');
// /Price & cart

    define('SHOP_SITE_NOTE_APPLICATION','Варианты применения');
    define('SHOP_SITE_NOTE_GALLERY','Галерея');
    define('SHOP_SITE_NOTE_RELATED_ITEMS','Опции');
    
    define('SHOP_SITE_ATTENTION_COLOR','Xарактеристики и внешний вид товара могут отличаться от указанных или могут быть изменены производителем без отражения на сайте.');
      
}else{
	define('SHOP_SITE_MOD_NAME','Магазин');
	
	define('SHOP_SITE_CHARACTER','Характеристики');
	define('SHOP_SITE_DESCRIPTION','Опис');
	define('SHOP_SITE_PRESENT','Подарунок');

// Price & cart
    define('SHOP_SITE_NOTE_PRICE', 'Ціна');
    define('SHOP_SITE_NOTE_GOOD_PRICE', 'Гарна ціна');
    define('SHOP_SITE_NOTE_SALE', 'Розпродаж');
    define('SHOP_SITE_NOTE_ON_REQUEST', 'За запитом');
        
    define('SHOP_SITE_NOTE_IN_CART','У візок');
    define('SHOP_SITE_NOTE_ITEM_IN_CART','Товар у візку');
// /Price & cart

    define('SHOP_SITE_NOTE_APPLICATION','Варіанти застосування');
    define('SHOP_SITE_NOTE_GALLERY','Галерея');
    define('SHOP_SITE_NOTE_RELATED_ITEMS','Опції');
    	
	define('SHOP_SITE_ATTENTION_COLOR','Xарактеристики і зовнішній вигляд товару можуть відрізнятися від вказаних або можуть бути змінені виробником без відображення на сайті.');
	
}
?>
