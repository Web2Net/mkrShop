<?

class mandatoryShopSetting
{
    static function mandatoryElements()
    {
        define('EMAIL_BOSS',      'you@mkr.com.ua');
        define('EMAIL_ADMIN',     'vitalyyou@gmail.com,you@mkr.com.ua,alex@mkr.com.ua');
        define('EMAIL_FEEDBACK',  'vitalyyou@gmail.com,you@mkr.com.ua,alex@mkr.com.ua');
        define('EMAIL_WEBMASTER', 'you@mkr.com.ua');
        define('EMAIL_OFFICE',    'you@mkr.com.ua');
        define('EMAIL_SHOP',      'shop@mkr.com.ua');
        define('EMAIL_UNSUBCRIBE','you@mkr.com.ua');

	define('KURS_ERC','30.65');
// Курс валюты НБУ

        $kyrs_euro_nby = mandatoryShopSetting::getKyrsValutNBY(date("Ymd"), "EUR");  // Евро по курсу НацБанка
        if($kyrs_euro_nby == ""){
            define('KURS_EURO_NAC_BANK', '33');
        }
        else{
            define('KURS_EURO_NAC_BANK', $kyrs_euro_nby);
        }

        $kurs_usd_nb = mandatoryShopSetting::getKyrsValutNBY(date("Ymd"), "USD");  // Долар по курсу НацБанка
        if($kurs_usd_nb == ""){
            define('KURS_USD_NAC_BANK', '33');
        }
        else{
            define('KURS_USD_NAC_BANK', $kurs_usd_nb);
        }

        $kurs_usd_erc = KURS_USD_NAC_BANK + (KURS_USD_NAC_BANK / 100 * 0.4);
        $kurs_usd_erc = round($kurs_usd_erc, 2);
        define('KURS_USD_ERC', $kurs_usd_erc);

//        define('KURS_EURO_NAC_BANK', '35.65');
//		define('KURS_DOLLAR_NAC_BANK', '28.87');
//		mandatoryShopSetting::getKyrsValutNBY_privat(date("d.m.Y"), $valuta);
//define('KURS_EURO_NAC_BANK', Setting::getKyrsValut("kurs_euro_nb"));
//define('KURS_DOLLAR_NAC_BANK', Setting::getKyrsValut("kurs_usd_nb"));

// /Курс валюты НБУ
/*
	define('PROCENT_NADBAVKI_0_50','7');
	define('PROCENT_NADBAVKI_50_100','5');
	define('PROCENT_NADBAVKI_100_200','4');
	define('PROCENT_NADBAVKI_200_500','3');
	define('PROCENT_NADBAVKI_500_1000','2');
	define('PROCENT_NADBAVKI_1000_','1');
*/
if($_SESSION['lang']=="en"){

	define('SITE_NAME', 'MKR');
	define('SITE_NAME_FULL', 'Мастерская комплексных решений');
    define('META_T_DEFAULT', 'Konica, minolta, bizhub, sale, repair, service '.RAZDELYALKA.' '.SITE_NAME_FULL.'');
    define('META_K_DEFAULT', 'Konica, minolta, bizhub, toner, drum, developer, starter, development unit, fixing unit, duplex, transfer, repair, sale, service, buy, used, spare parts, zip');
    define('META_D_DEFAULT', 'We build our work based on the interests and needs of customers by choosing the most suitable integrated solutions for you, with minimal waste of your time and finances.');

// Mandatory
    define('MANDATORY_BREAD_CRUMBS_FIRST', 'Main');

    define('MANDATORY_SAVE','Save');
    define('MANDATORY_SAVED','Saved');
    define('MANDATORY_BACK','Back');
    define('MANDATORY_EDIT','Edit');
    define('MANDATORY_ADD','Add');
    define('MANDATORY_OPEN','Open');
    define('MANDATORY_MOVE_UP','Move up');
    define('MANDATORY_MOVE_DOWN','Move down');
    define('MANDATORY_VIEW_ONLINE', 'View online');
    define('MANDATORY_CLICK_TO_ENLARGE','Click to enlarge');
    define('MANDATORY_VIEW_MORE', 'View more');
    define('MANDATORY_DELETE','Delete');
    define('MANDATORY_ATTANTION_DELETE','Are you sure, you want to delete the record ?');
// /Mandatory

    define('MANDATORY_NOTE_GOOD_PRICE','Good price');
    define('MANDATORY_NOTE_SALE','Sale');
    define('MANDATORY_NOTE_PRICE', 'Price');
    define('MANDATORY_NOTE_ON_REQUEST','O/R');
    define('MANDATORY_NOTE_IN_CART','Add to cart');


    define('CONTACT_ADRESS', '');
    define('NOTE_NO_PRICE', 'O/R');
    define('NOTE_APPLICATION', 'Application');
// /General




    define('FEEDBACK_TITLE', 'Feedback');
    define('FEEDBACK_OK_TITLE', 'Thank you');
    define('FEEDBACK_NAME', 'Your name');
    define('FEEDBACK_PHONE', 'Phone');
    define('FEEDBACK_MESS', 'Your message');
    define('FEEDBACK_MESS_SEND', 'Your message has been sent');
    define('FEEDBACK_ONLINE', 'Send');

    define('NOTE_ARTICLES','Articles');

        define('NOTE_CART','Cart');


        define('NOTE_CART_IS_EMPTY','We are sorry, but your cart is empty');
        define('NOTE_MY_CART','My cart');
        define('NOTE_REVIEW_CART','Cart review');
        define('NOTE_SHOPPING_LIST','Shopping list');
        define('NOTE_REFERENCE','Vendor code');

        define('NOTE_PRICE','Price');
        define('NOTE_OLD_PRICE','Old price');
        define('NOTE_SALE','Present');
        define('NOTE_GOOD_PRICE','Price lowered');


        define('NOTE_RELATED_ITEMS','Related products');
        define('NOTE_PACKAGE','Kit');
        define('NOTE_PACKING','Packaging');
        define('NOTE_PRICE_FOR_PACKAGE','Price per set');
        define('NOTE_KOD','Code');

        define('NOTE_READ_MORE','More');
        define('NOTE_MAIN','Main');
        define('NOTE_SHOP','Shop');
        define('MANDATORY_SEARCH_DEVIZ','The one who searches always..');
        define('NOTE_SEARCH_ON_SITE','Search');
        define('NOTE_BEST_PROPOSITION','Best deals');
        define('NOTE_SETS','Quick sets');
        define('NOTE_BRANCH','Sectors of application');
        define('NOTE_DELETE','Remove');
        define('NOTE_CHECKOUT','Drawing up of an order');
        define('NOTE_YOUR_NAME','Your name');
        define('NOTE_COMPANY','Company');
        define('NOTE_EMAIL','Email');
        define('NOTE_PHONE','Phone');
        define('NOTE_SEND_ORDER','Send an order');
        define('NOTE_FILL','Write in');
        define('NOTE_COUNT_ITEMS','Number of goods');
        define('NOTE_PRELIMINARY_COST','Preliminary cost');
        define('NOTE_ORDER_BEEN_SEND','The order has been sent');
        define('NOTE_ORDER_OK','Your order has been sent. <br /> Our managers will contact you for further details. <br /> Thank you for your purchase! <br />');
        define('NOTE_ATTANTION_DELETE','Do you really want to put the chosen goods in the cart?');
        define('NOTE_ITEMS_NA_SYMMY','goods worth');
        define('NOTE_ORDER_NUMBER','Order №'); // logic_cart_site
        define('NOTE_ADOPT','accepted'); // logic_cart_site
        define('NOTE_NEW_ORDER','New order'); // logic_cart_site
        define('NOTE_BEZPLATNAYA_DOSTAVKA','Free shipping');
        define('NOTE_DEVIZ_MAIN','Carry less, go further');
        define('NOTE_MESS','Message');




}
elseif($_SESSION['lang']=="ru"){
	define('SITE_NAME', 'МКР');
	define('SITE_NAME_FULL', 'Мастерская комплексных решений');
    define('META_T_DEFAULT', 'Konica, minolta, bizhub, продажа, ремонт, сервис '.RAZDELYALKA.' '.SITE_NAME_FULL.'');
    define('META_K_DEFAULT', 'konica, minolta, bizhub, тонер, драм, барабан, девелопер, стартер, блок проявки, блок закрепления,дуплекс, трансфер,ремонт,продажа,сервис,купить, б/у, запчасти, зип');
    define('META_D_DEFAULT', 'Мы строим свою работу основываясь на интересах и потребностях клиентов выбирая наиболее подходящие комплексные решения для Вас, при минимальных тратах Вашего времени и финансов.');

// Mandatory
    define('MANDATORY_BREAD_CRUMBS_FIRST', 'Главная');

    define('MANDATORY_SAVE','Сохранить');
    define('MANDATORY_SAVED','Данные сохранены');
    define('MANDATORY_BACK','Назад');
    define('MANDATORY_EDIT','Редактировать');
    define('MANDATORY_ADD','Добавить');
    define('MANDATORY_OPEN','Открыть');
    define('MANDATORY_MOVE_UP','Вверх');
    define('MANDATORY_MOVE_DOWN','Вниз');
    define('MANDATORY_VIEW_ONLINE', 'Посмотреть на сайте');
    define('MANDATORY_CLICK_TO_ENLARGE','Кликните для увеличения');
    define('MANDATORY_VIEW_MORE', 'Подробнее');
    define('MANDATORY_DELETE','Удалить');
    define('MANDATORY_ATTANTION_DELETE','Вы уверены, что хотите удалить запись ?');
// /Mandatory



    define('MANDATORY_NOTE_GOOD_PRICE','Хорошая цена');
    define('MANDATORY_NOTE_SALE','Распродажа');
    define('MANDATORY_NOTE_PRICE', 'Цена');
    define('MANDATORY_NOTE_ON_REQUEST','По запросу');
    define('MANDATORY_NOTE_IN_CART','В корзину');


    define('CONTACT_ADRESS', '');
    define('NOTE_NO_PRICE', 'По запросу');
    define('NOTE_APPLICATION', 'Варианты применения');
// /General


    define('FEEDBACK_TITLE', 'Обратная связь');
    define('FEEDBACK_OK_TITLE', 'Спасибо');
    define('FEEDBACK_NAME', 'Ваше имя');
    define('FEEDBACK_PHONE', 'Телефон');
    define('FEEDBACK_MESS', 'Ваше сообщение');
    define('FEEDBACK_MESS_SEND', 'Ваше сообщение отправлено');
    define('FEEDBACK_ONLINE', 'Отправить');

    define('NOTE_ARTICLES','Статьи');

        define('NOTE_CART','Корзина');

        define('NOTE_IN_CART','В корзину');
        define('NOTE_CART_IS_EMPTY','Сожалеем, но Ваша корзина пуста');
        define('NOTE_MY_CART','Моя корзина');
        define('NOTE_REVIEW_CART','Обзор корзины');
        define('NOTE_SHOPPING_LIST','Список покупок');
        define('NOTE_REFERENCE','Артикул');

        define('NOTE_PRICE','Цена');
        define('NOTE_OLD_PRICE','Старая цена');
        define('NOTE_SALE','Подарок');
        define('NOTE_GOOD_PRICE','Цена снижена');
        define('NOTE_CLICK_TO_ENLARGE','Кликните для увеличения');


        define('NOTE_PACKAGE','Комплект');
        define('NOTE_PACKING','Упаковка');
        define('NOTE_PRICE_FOR_PACKAGE','Цена за комплект');
        define('NOTE_KOD','Код');

        define('NOTE_READ_MORE','Подробнее');
        define('NOTE_MAIN','Главная');
        define('NOTE_SHOP','Магазин');
        define('MANDATORY_SEARCH_DEVIZ','Поиск..');
        define('NOTE_SEARCH_ON_SITE','Поиск по сайту');
        define('NOTE_BEST_PROPOSITION','Лучшие предложения');
        define('NOTE_SETS','Готовые наборы');
        define('NOTE_BRANCH','Отрасли применения');
        define('NOTE_DELETE','Удалить');
        define('NOTE_CHECKOUT','Оформление заказа');
        define('NOTE_YOUR_NAME','Ваше имя');
        define('NOTE_COMPANY','Компания');
        define('NOTE_EMAIL','Электро@почта');
        define('NOTE_PHONE','Телефон');
        define('NOTE_SEND_ORDER','Отправить заказ');
        define('NOTE_FILL','Заполните');
        define('NOTE_COUNT_ITEMS','Количество товаров');
        define('NOTE_PRELIMINARY_COST','Предварительная стоимость');
        define('NOTE_ORDER_BEEN_SEND','Заказ отправлен');
        define('NOTE_ORDER_OK','Ваш заказ отправлен. <br />Наши менеджеры свяжутся с Вами для уточнения деталей. <br />Спасибо за покупку! <br />');
        define('NOTE_ATTANTION_DELETE','Вы действительно хотите выложить выбраный товар из корзины?');
        define('NOTE_ITEMS_NA_SYMMY','товаров на сумму');
        define('NOTE_ORDER_NUMBER','Заказ №'); // logic_cart_site
        define('NOTE_ADOPT','принят'); // logic_cart_site
        define('NOTE_NEW_ORDER','Новый заказ'); // logic_cart_site
        define('NOTE_BEZPLATNAYA_DOSTAVKA','Бесплатная доставка');
        define('NOTE_DEVIZ_MAIN','Неси меньше, иди дальше');
        define('NOTE_MESS','Сообщение');





}else{
	define('SITE_NAME', 'MKR');
	define('SITE_NAME_FULL', 'Майстерня комплексних рішень');
    define('META_T_DEFAULT', 'Konica, minolta, bizhub, продаж, ремонт, сервіс '.RAZDELYALKA.' '.SITE_NAME_FULL.'');
    define('META_K_DEFAULT', 'konica, minolta, bizhub, тонер, драм, барабан, девелопер, стартер, блок проявлення, блок закріплення, дуплекс, трансфер, ремонт, продаж, сервіс, купити, б/у, запчастини, зіп');
    define('META_D_DEFAULT', 'Ми будуємо свою роботу грунтуючись на інтересах і потребах клієнтів вибираючи найбільш підходящі комплексні рішення для Вас, при мінімальних витратах Вашого часу та фінансів.');

// Mandatory

    define('MANDATORY_BREAD_CRUMBS_FIRST', 'Головна');

    define('MANDATORY_SAVE','Зберегти');
    define('MANDATORY_SAVED','Збережено');
    define('MANDATORY_BACK','Назад');
    define('MANDATORY_EDIT','Редагувати');
    define('MANDATORY_ADD','Додати');
    define('MANDATORY_OPEN','Відкрити');
    define('MANDATORY_MOVE_UP','Вгору');
    define('MANDATORY_MOVE_DOWN','Вниз');
    define('MANDATORY_VIEW_ONLINE', 'Подивитися на сайті');
    define('MANDATORY_CLICK_TO_ENLARGE','Натисніть для збільшення');
    define('MANDATORY_VIEW_MORE', 'Детальніше');
    define('MANDATORY_DELETE','Видалити');
    define('MANDATORY_ATTANTION_DELETE','Ви впевнені, що хочете видалити запис ?');
// /Mandatory

    define('MANDATORY_NOTE_GOOD_PRICE','Добра ціна');
    define('MANDATORY_NOTE_SALE','Розпродаж');
    define('MANDATORY_NOTE_PRICE', 'Ціна');
    define('MANDATORY_NOTE_ON_REQUEST','За запитом');
    define('MANDATORY_NOTE_IN_CART','У кошик');


    define('CONTACT_ADRESS', '');
    define('NOTE_NO_PRICE', 'За запитом');
    define('NOTE_APPLICATION', 'Варіанти застосування');
// /General


    define('FEEDBACK_TITLE', "Зворотній зв'язок");
    define('FEEDBACK_OK_TITLE', 'Дякуємо');
    define('FEEDBACK_NAME', "Ваше ім'я");
    define('FEEDBACK_PHONE', 'Телефон');
    define('FEEDBACK_MESS', 'Ваше повідомлення');
    define('FEEDBACK_MESS_SEND', 'Ваше повідомлення відправлено');
    define('FEEDBACK_ONLINE', 'Відправити');

    define('NOTE_ARTICLES','Статьи');

        define('NOTE_CART','Корзина');

        define('NOTE_IN_CART','В корзину');
        define('NOTE_CART_IS_EMPTY','Сожалеем, но Ваша корзина пуста');
        define('NOTE_MY_CART','Моя корзина');
        define('NOTE_REVIEW_CART','Обзор корзины');
        define('NOTE_SHOPPING_LIST','Список покупок');
        define('NOTE_REFERENCE','Артикул');

        define('NOTE_PRICE','Цена');
        define('NOTE_OLD_PRICE','Старая цена');
        define('NOTE_SALE','Подарок');
        define('NOTE_GOOD_PRICE','Цена снижена');



        define('NOTE_PACKAGE','Комплект');
        define('NOTE_PACKING','Упаковка');
        define('NOTE_PRICE_FOR_PACKAGE','Цена за комплект');
        define('NOTE_KOD','Код');

        define('NOTE_READ_MORE','Подробнее');
        define('NOTE_MAIN','Главная');
        define('NOTE_SHOP','Магазин');
        define('MANDATORY_SEARCH_DEVIZ','Хто шукає, той завжди..');
        define('NOTE_SEARCH_ON_SITE','Пошук по сайту');
        define('NOTE_BEST_PROPOSITION','Лучшие предложения');
        define('NOTE_SETS','Готовые наборы');
        define('NOTE_BRANCH','Отрасли применения');
        define('NOTE_DELETE','Удалить');
        define('NOTE_CHECKOUT','Оформление заказа');
        define('NOTE_YOUR_NAME','Ваше имя');
        define('NOTE_COMPANY','Компания');
        define('NOTE_EMAIL','Электро@почта');
        define('NOTE_PHONE','Телефон');
        define('NOTE_SEND_ORDER','Отправить заказ');
        define('NOTE_FILL','Заполните');
        define('NOTE_COUNT_ITEMS','Количество товаров');
        define('NOTE_PRELIMINARY_COST','Предварительная стоимость');
        define('NOTE_ORDER_BEEN_SEND','Заказ отправлен');
        define('NOTE_ORDER_OK','Ваш заказ отправлен. <br />Наши менеджеры свяжутся с Вами для уточнения деталей. <br />Спасибо за покупку! <br />');
        define('NOTE_ATTANTION_DELETE','Вы действительно хотите выложить выбраный товар из корзины?');
        define('NOTE_ITEMS_NA_SYMMY','товаров на сумму');
        define('NOTE_ORDER_NUMBER','Заказ №'); // logic_cart_site
        define('NOTE_ADOPT','принят'); // logic_cart_site
        define('NOTE_NEW_ORDER','Новый заказ'); // logic_cart_site
        define('NOTE_BEZPLATNAYA_DOSTAVKA','Бесплатная доставка');
        define('NOTE_DEVIZ_MAIN','Неси менше, йди далі');
        define('NOTE_MESS','Сообщение');


}

        mandatoryShopSetting::getShopSetting("shop_setting"); // Устанавливаем курс доллара и минимальную сумму бесплатной доставки


    }


	static function setSetting(){

	    $query = "SELECT * FROM `shop_setting`";
            $res = mysql_query($query);
	    mysql::queryError($res,$query);

            while ($row = mysql_fetch_assoc($res)){
                $setting[] = $row;
            }

            return $setting;
       }

    static function getShopSetting($file_name)
    {
        $GLOBALS["shop_setting"] = INI::Get($file_name);
        $shop_setting = $GLOBALS["shop_setting"];

        define('KURS_USD',$shop_setting[0]["value"]);
        define('MIN_SUMMA_DOSTAVKI',$shop_setting[1]['value']);
    }

    static function getKyrsValutNBY($exchangedate, $valuta){
        $valuta_nby = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode='.$valuta.'&date='.$exchangedate.'&json');
        $data_valut_nby = json_decode($valuta_nby, true); // преобразование строки в формате json в ассоциативный массив
SYS::varDump($data_valut_nby,__FILE__,__LINE__,"Курс НБУ");
        
        $value = round($data_valut_nby[0]['rate'], 2); // Округление до сотых
        mandatoryShopSetting::insertTodayKyrsValut($valuta, $value);

        return $value;
    }
	
	static function getKyrsValutNBY_privat($exchangedate, $valuta){
        $valuta_nby = file_get_contents('https://api.privatbank.ua/p24api/exchange_rates?json&date='.$exchangedate.'');
        $data_valut_nby = json_decode($valuta_nby, true); // преобразование строки в формате json в ассоциативный массив
SYS::varDump($data_valut_nby,__FILE__,__LINE__,"Курс НБУ ПриватБанк");
        //return $data_valut_nby[0]['rate'];
    }

    static function insertTodayKyrsValut($valuta, $value){
        $date_today = date("Y-m-d");
        
        $query = "SELECT * FROM `kyrs_valut` WHERE `caption` = '$valuta' && `date_` = '$date_today' LIMIT 1 ";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
        $count = mysql_num_rows($res);

SYS::varDump($count,__FILE__,__LINE__,"FFF");       
        if($count == 0){
            $query = "INSERT INTO kyrs_valut(caption, date_, nby) VALUES ('$valuta', '$date_today', '$value')";
            $res = mysql_query($query);
            Mysql::queryError($res,$query);
        }
        
    }

    static function getKyrsValutLastPeriod($valuta, $period){
            $select = "";
            $from = 'kyrs_valut';
            $where = "`caption` = '$valuta'";
            $sortby = "";

            $db = new mysql;
            $row = $db->origSelectSQL($select, $from, $where, $sortby, $period);
    SYS::varDump($row,__FILE__,__LINE__,"gdgdgd");
            return $row;
    }


}
?>
