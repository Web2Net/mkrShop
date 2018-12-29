<?
class Price_mti
{ 
    static function createTempTable($table,$file,$postavschik){ // Записываем данные из файла во временную таблицу

$price_file = SITE_PATH."/userfiles/prices/price_mti_1.xml";
$xml = simplexml_load_file($price_file);

/*
brand              Бренд    
group              Группа - не используется
mticode            Артикул
idsupplier         Артикул
model              Название
prodname           Полное описание
prodname_invoice   Краткое описание
partnum            Код (1Cid)
partno             Код (1Cid)
reserved           Резерв
guarantee          Гарантия
price_usd          Цена уе
price_uah          Цена грн
price_uah_fdp      Цена рекомендованная грн
price_uah_order    Цена по входу
purchase
rrp
rrp_control
tnved              ТНВЕД
barcode            Штрихкод
country            Страна производитель
store              Наличие
*/

foreach ($xml as $v1){ 
    foreach ($v1 as $v2){
        foreach ($v2 as $v3){
//var_dump($v3);
            $category_id = "";				
            
//exit("Stop.class Price_mti_40");
// Бренд  Избавиться от точки           
            if(isset($v3->brand) && $v3->brand !== ""){   
                $brand = str_replace(".",'',$v3->brand);
            }             
// Категория ($category_id) 
            if(isset($v3->productgroup_id) && $v3->productgroup_id !== ""){   
                include SITE_PATH."/cms/price/mti/mti_category_id.php"; 
            }
// Код (1Cid) 
            if(isset($v3->partno) && $v3->partno !== ""){   
                $item_1Cid = str_replace("/", "_", $v3->partno);
            }
// Название 
            if(isset($v3->model) && $v3->model !== ""){   
                $caption_full = $v3->model;
            }
// Seolink            
            if(isset($caption_full) && $caption_full !== ""){   
                $seolink = Text::cirilToLatin2($caption_full);
                $seolink = Text::cutStringToSeolink($seolink);
            }
// Полное описание 
            if(isset($v3->prodname) && $v3->prodname !== ""){   
                $description_full = strip_tags(addslashes($v3->prodname));
                $description_full = htmlspecialchars($description_full);
                $description_full = mysql_escape_string($description_full);
                //$description_full = strip_tags($description_full);
                //$description_full = ereg_replace("&bull;","<br />",$description_full);
            }
// Краткое описание 
            if(isset($v3->prodname_invoice) && $v3->prodname_invoice !== ""){   
                $description_short = strip_tags(addslashes($v3->prodname_invoice));
                //$description_short = ereg_replace("&bull;","<br />",$description_short);
            }
// Мета тайтл            
            if(isset($caption_full) && $caption_full !== ""){
                $meta_t = strip_tags($caption_full);
            }
// Мета дескрипшион            
            if(isset($v3->prodname)){
                if($v3->prodname !== ""){
                    $meta_d = Text::cut($v3->prodname);
                }
                else{
                    $meta_d = META_D_DEFAULT;
                }
            }
// Мета кейворд            
            if(isset($v3->prodname)){
                $v3->prodname = Text::deleteShortWords($v3->prodname,"2");
                if($v3->prodname !== ""){
                    $arr = explode(" ",$v3->prodname);
                    foreach($arr as $k=>$v){
                        $meta_k .= Text::cut($v).", ";
                        $meta_k = str_replace(", ,"," ",$meta_k);
                    }    
                }
	            else{
		            $meta_k = META_K_DEFAULT;
	            }
            }                        
            


            
            

            
// Цены
if(isset($values[6]) && $values[6] !== ""){   //Розница
    $values[6]=str_replace(",",'.',$values[6]); 
    $values[6]=preg_replace("/[^x\d|*\.]/","",$values[6]);  
    $price_roznica = $values[6];  
}
if(isset($values[8]) && $values[8] !== ""){   // Дилер
    $values[8]=str_replace(",",'.',$values[8]); 
    $values[8]=preg_replace("/[^x\d|*\.]/","",$values[8]);
    $price_diler = $values[8]; 
}

//Монитор
            if(isset($v3->rrp_control) && $v3->rrp_control !== ""){   
                $monitor = $v3->rrp_control;
            }
// DDP 
            if(isset($v3->rrp) && $v3->rrp !== ""){   
                $ddp = $v3->rrp;
            }
// Наличие
            if(isset($v3->store) && $v3->store !== ""){    
                if($v3->store !== ""){
                    $nalichie = $v3->store;
                }
                else{
                    $nalichie = "r";
                }
            } 
//Гарантия (мес.)
            if(isset($v3->guarantee) && $v3->guarantee !== ""){ 
                $garantiya = $v3->guarantee;
            }
            
$showing = "1";
$flagman = "1";
$good_price = "0";
$sell_out = "0";
$on_main = "0";
        $img = str_replace("/", "_", $item_1Cid); 
        $img = str_replace("%5e", "_", $img); // Такие же замены есть в GD::saveImageFromRemoteUrl($img_url,$home_dir)

$article = $item_1Cid;
$ordering = "";
$hit = "";
$package = "";
$param_connect = "";
$branch_connect = "";
$gallery_connect = "";
$companion_connect = "";
//$p1 = $ddp; // DDP
$p2 = $monitor; // MONITOR
$p3 = "";
$p4 = "";
$p5 = "";
$p6 = "";


$see = "";
$print = "1";
$pos = "";


$last_update = "";
$first_update = date("Y-m-d H:i");
$showing = "1";
$showing_admin = "1";            
 
//$values[19] = preg_replace('#<a href=(?:.*)(?=</a>)#Usi', '', $values[18]);  //Описание - удаляем все ссылки 
/*
if(isset($values[19]) && $values[19] !== ""){     //Описание
    $description_full = strip_tags(addslashes($values[19]));
    $description_full = htmlspecialchars($description_full);
    $description_full = mysql_escape_string($description_full);
    //$description_full = strip_tags($description_full);
    //$description_full = ereg_replace("&bull;","<br />",$description_full);
}
else{
	$description_full = "";
}
if(isset($values[20]) && $values[20] !== ""){ // Краткое описание (Комплектация)
    $description_short = strip_tags(addslashes($values[20]));
    //$description_short = ereg_replace("&bull;","<br />",$description_short);
}
else{
	$description_short = "";
} 
*/ 

$query = "INSERT INTO ".TABLE_TEMP_SHOP_ITEMS." (
 	 	 
1Cid,
connect,
caption,
seolink,
desc_full,
desc_short,
showing,
flagman,
good_price,
sell_out,
on_main,		 	 	 
price_diler,	 	 
price_roznica,	 	 	 
first_update,		 	 
last_update,
img, 
article,	 	 
ordering,	 	 
hit,	 	 
garantiya,
nalichie,	 	 
package, 
param_connect,	 	 	 
branch_connect,	 	 	 
gallery_connect,	 	 	 
companion_connect,	 	 	 
filter_connect,	 	 	 
p1,		 	 	 
p2,	 	 	 	 
p3,		 	 	 
p4,		 	 	 
p5,	 	 
p6,	 	 	 
postavschik, 	 	 
brand, 	 	 
meta_t,	 	 	 
meta_k,	 	 	 
meta_d,	 	 	 
see,	 	 	 
print,
pos)
                    VALUES (
                              '{$item_1Cid}',
							  ';{$category_id};',
							  '{$caption_full}',
							  '{$seolink}',
							  '{$description_full}',
							  '{$description_short}',
							  '{$showing}',
							  '{$flagman}',
							  '{$good_price}',
							  '{$sell_out}',
							  '{$on_main}',
							  '{$price_diler}',
							  '{$price_roznica}',
							  '{$first_update}',
							  '{$last_update}',
							  '{$img}',
							  '{$article}',
							  '{$ordering}',
							  '{$hit}',
							  '{$garantiya}',
							  '{$nalichie}',
							  '{$package}',
							  '{$param_connect}',
							  '{$branch_connect}',
							  '{$gallery_connect}',
							  '{$companion_connect}',
							  '{$filter_connect}',
							  '{$p1}', 
							  '{$p2}',
							  '{$p3}',
							  '{$p4}',
							  '{$p5}',
							  '{$p6}',
							  '{$postavschik}',
							  '{$brand}',
							  '{$meta_t}',
							  '{$meta_k}',
							  '{$meta_d}',
							  '{$see}',
							  '{$print}',
							  '{$pos}'					  
							  )";                     
   
                    
                    $res = mysql_query($query);
                    mysql::queryError($res,$query); // описывает ошибку запроса к БД
                    $in[] = "<div style='text-align:left'>Новое: {$meta_d}</div>";

            
        }           
    }
}


        fclose($fd);
        return $in;
}

////////////////////////////////////////////////////////////////////////////////
    
    static function getArchItemsFromConstTable($table_const,$table_temp){ // Получение товаров из старого прайса, которых уже нет в новом прайсе. 
    
        $query = "SELECT * FROM {$table_const} WHERE `1Cid` NOT IN (SELECT `1Cid` FROM {$table_temp})"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
        
        while ($row = mysql_fetch_assoc($res)){
        	   $items[] = $row;
        }
//SYS::varDump($items,__FILE__,__LINE__);
        return $items;    
    }
   
    static function getExistingItemsFromConstTable($table_const,$table_temp){ // Получение товаров из старого прайса, которые есть и в новом прайсе. (Обновление цен)
    
        $query = "SELECT * FROM {$table_const} WHERE `1Cid` IN (SELECT `1Cid` FROM {$table_temp})"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
        
        while ($row = mysql_fetch_assoc($res)){
        	   $items[] = $row;
        }
//SYS::varDump($items,__FILE__,__LINE__);
        return $items;    
    }
    
	static function getNewItemsFromTempTable($table_const,$table_temp){ // Получение новых товаров из нового прайса (Добавление новых товаров)
    
        $query = "SELECT * FROM {$table_temp} WHERE `1Cid` NOT IN (SELECT `1Cid` FROM {$table_const})"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
        
        while ($row = mysql_fetch_assoc($res)){
        	   $items[] = $row;
        }
//SYS::varDump($items,__FILE__,__LINE__);
        return $items;    
    }
	
    static function getNewImgItemsFromTempTable($table_const,$table_temp){ // Получение новых изо товаров из нового прайса 
        $query = "SELECT `img` FROM {$table_temp} WHERE `1Cid` NOT IN (SELECT `1Cid` FROM {$table_const})"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
        
        while ($row = mysql_fetch_assoc($res)){
        	   $items[] = $row;
        }
//SYS::varDump($items,__FILE__,__LINE__,"NOT IN");
        return $items;    
    } 
	
    static function getImgItemsFromTempTable($table_const,$table_temp){ // Получение новых товаров из нового прайса (Добавление новых товаров)
    
        $query = "SELECT `img` FROM {$table_temp} WHERE `img`<>''"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
        
        while ($row = mysql_fetch_assoc($res))
        {
        	   $items[] = $row;
        }
//SYS::varDump($items,__FILE__,__LINE__);
        return $items;    
    }
    

////////////////////////////////////////////////////////////////////////////////

    static function changeSomeFields($table,$postavschik){
        $query = "UPDATE `{$table}` SET `style`='arch', `volume`='arch' WHERE `postavschik`='{$postavschik}'";
        $res = mysql_query($query);
    }
    
    static function changeRecordsInDB($table,$file,$postavschik){    
            $fd = fopen($file, "r");
        
        while (($values = fgetcsv($fd, 2048, ",")) !== FALSE)                        
        {                                                        
            if($values[4] == "" || $values[4] == "Код" || $values[6] == "0,00" || $values[8] == "0,00"){unset($values);} // удаление полей с пустым кодом товара (код производителя), нулевой ценой
            else
            {
                if($values[0] == "3M Telecom" || $values[0] == "Cooler Master")
                {
                    $brand = strtolower($values[0]);
                }
                elseif($values[0] == "!Распродажа")
                {
                    $brand = "sale";
                }
                elseif($values[0] == "")
                {
                    $brand = "noname";
                }
                else
                {
                    $brand = explode(" ",$values[0]);
                    $brand = strtolower($brand['0']);
                }
            $category_id =  "-".$item_brand."-";
            //$filter_more =  $values[18];                                                                              

 
            if($values[1] == "Аксессуары")
            {
                if($values[2] == "Аккумуляторы и универсальные батареи"){$category_id = "batterie_and_universal_battery";}
                if($values[2] == "Батарейки"){$category_id = "batteries";}
                if($values[2] == "Док-станции и подставки"){$category_id = "docks_and_stands";}
                if($values[2] == "Зарядные устройства и адаптеры питания"){$category_id = "chargers_and_adapters";}
                if($values[2] == "Защитные пленки и чистящие средства"){$category_id = "protectors_and_cleaners";}
                if($values[2] == "Источники света, вспышки, фонари"){$category_id = "lights_and_flash_lights";}
                if($values[2] == "Кабели, разветвители, переходники аудио-видео"){$category_id = "cables_and_splitters_and_adapters_av";}
                if($values[2] == "Кабели, разветвители, переходники компьютерные"){$category_id = "cables_and_splitters_and_connectors_computer";}
                if($values[2] == "Перчатки"){$category_id = "el_gloves";}
                if($values[2] == "Чехлы для жестких дисков"){$category_id = "covers_for_hard_drives";}
                if($values[2] == "Чехлы для мобильных телефонов и MP3 плееров"){$category_id = "cases_for_mobile_phones_and_mp3_players";}
                if($values[2] == "Чехлы для планшетов"){$category_id = "covers_for_tablets";}
                if($values[2] == "Чехлы, сумки, рюкзаки для нетбуков и планшетов"){$category_id = "covers_bags_backpacks_for_netbooks_and_tablets";}
                if($values[2] == "Чехлы, сумки, рюкзаки для ноутбуков"){$category_id = "covers_bags_backpacks_for_laptops";}
                if($values[2] == "Чехлы, сумки, рюкзаки, боксы для фото-видео камер"){$category_id = "covers_bags_backpacks_boxes_for_photo_and_video_cameras";}
                if($values[2] == "Штативы и принадлежности"){$category_id = "tripods_and_accessories";}
            }
            elseif($values[1] == "Акустика")
            {
            
            }
            elseif($values[1] == "АТС и Системные телефоны")
            {
                if($values[2] == "АТС: Базовые блоки"){$category_id = "ats_mainframes";}
                elseif($values[2] == "АТС: Принадлежности"){$category_id = "ats_accessories";}
                elseif($values[2] == "АТС: Системные телефоны"){$category_id = "ats_system_phones";}
                elseif($values[2] == "Видеотерминалы"){$category_id = "video_terminals";}
                elseif($values[2] == "Дистрибутивы и документация: Приложения"){$category_id = "ats_program_doc_apps";}
                elseif($values[2] == "Корпоративные лицензии: Серверные продукты"){$category_id = "ats_program_korporatus";}
                elseif($values[2] == "Опции"){$category_id = "ats_opinions";}
                elseif($values[2] == "Серверы видеоконференцсвязи"){$category_id = "video_conferencing_servers";}
            }
            elseif($values[1] == "Бытовая техника крупная")
            {
                if($values[2] == "Морозильники"){$category_id = "consumer_electronics_large_freezers";}
                elseif($values[2] == "Плиты"){$category_id = "consumer_electronics_large_cookers";}
                elseif($values[2] == "Посудомоечные машины"){$category_id = "consumer_electronics_large_dishwashers";}
                elseif($values[2] == "Стиральные машины"){$category_id = "consumer_electronics_large_washers";}
                elseif($values[2] == "Холодильники"){$category_id = "consumer_electronics_large_refrigerators";}
            }
            elseif($values[1] == "Бытовая техника мелкая")
            {
                if($values[2] == "Кофеварки"){$category_id = "consumer_electronics_small_coffee_makers";}
                elseif($values[2] == "Микроволновые печи"){$category_id = "consumer_electronics_small_microwaves";}
                elseif($values[2] == "Пылесосы"){$category_id = "consumer_electronics_small_vacuum_cleaners";}
                elseif($values[2] == "Тостеры"){$category_id = "consumer_electronics_small_toasters";}
                elseif($values[2] == "Утюги"){$category_id = "consumer_electronics_small_flatiron";}
                elseif($values[2] == "Чайники"){$category_id = "consumer_electronics_small_kettles";}
            }
            elseif($values[1] == "Встраиваемая техника")
            {
                if($values[2] == "Варочные поверхности"){$category_id = "integrated_appliances_cooktops";}
                elseif($values[2] == "Встраиваемые духовки"){$category_id = "integrated_appliances_built_in_oven";}
                elseif($values[2] == "Встраиваемые посудомоечные машины"){$category_id = "integrated_appliances_built_in_dishwashers";}
                elseif($values[2] == "Вытяжки"){$category_id = "integrated_appliances_hoods";}
            }
            elseif($values[1] == "Источники и системы бесперебойного питания")
            {
                if($values[2] == "Батареи дополнительные"){$category_id = "ibp_batteries_more";}
                elseif($values[2] == "Батареи заменяемые"){$category_id = "ibp_replaceable_battery";}
                elseif($values[2] == "ИБП компьютеров"){$category_id = "ibp_ups_computers";}
                elseif($values[2] == "ИБП серверов"){$category_id = "ibp_ups_servers";}
                elseif($values[2] == "ИБП центров информации"){$category_id = "ibp_ups_information_centres";}
                elseif($values[2] == "Коммуникационные шкафы и опции к ним"){$category_id = "ibp_communication_cabinets_and_options";}
                elseif($values[2] == "Опции"){$category_id = "ibp_options";}
                elseif($values[2] == "Системы охлаждения и кондиционирования"){$category_id = "ibp_refrigeration_and_air_conditioning_systems";}
                elseif($values[2] == "Фильтры и стабилизаторы"){$category_id = "ibp_filters_and_regulators";}
            }
            elseif($values[1] == "Климатическая техника") // не добавлено
            {
                if($values[2] == "Вентиляторы"){$category_id = "climate_fan";}
                elseif($values[2] == "Водонагреватели"){$category_id = "climate_water_heaters";}
                elseif($values[2] == "Конвекторы"){$category_id = "climate_convectors";}
                elseif($values[2] == "Кондиционеры"){$category_id = "climate_air_conditioner";}
                elseif($values[2] == "Обогреватели"){$category_id = "climate_heaters";}
                elseif($values[2] == "Очистители воздуха"){$category_id = "climate_air_purifiers";}
                elseif($values[2] == "Увлажнители воздуха"){$category_id = "climate_humidifiers";}
            }
            elseif($values[1] == "Компьютерная периферия")
            {
                if($values[2] == "Веб-камеры"){$category_id = "web_cam";}
                elseif($values[2] == "Графические планшеты"){$category_id = "graphic_tablets";}
                elseif($values[2] == "Кардридеры"){$category_id = "card_readers";}
                elseif($values[2] == "Клавиатуры"  && $values[0] == "Apple CPU"){$category_id = "apple_keyboards";}
                elseif($values[2] == "Клавиатуры"){$category_id = "keyboards";}
                elseif($values[2] == "Клавиатуры к планшетам"){$category_id = "keyboard_plates";}
                elseif($values[2] == "Коврики для мышей"){$category_id = "mouse_pads";}
                elseif($values[2] == "Комплекты беспроводные (клавиатура + мышь)"){$category_id = "wireless_kits_keyboard_mouse";}
                elseif($values[2] == "Комплекты проводные (клавиатура + мышь)"){$category_id = "wire_kits_keyboard_mouse";}
                elseif($values[2] == "Манипуляторы игровые"){$category_id = "gaming_hardware";}
                elseif($values[2] == "Мыши беспроводные"  && $values[0] == "Apple CPU"){$category_id = "apple_wireless_mouse";}
                elseif($values[2] == "Мыши беспроводные"){$category_id = "wireless_mouse";}
                elseif($values[2] == "Мыши проводные"  && $values[0] == "Apple CPU"){$category_id = "apple_wire_mouse";}
                elseif($values[2] == "Мыши проводные"){$category_id = "wire_mouse";}
                elseif($values[2] == "Опции"  && $values[0] == "Apple CPU"){$category_id = "apple_comp_options";}
                elseif($values[2] == "Опции"){$category_id = "comp_options";}
                elseif($values[2] == "Презенторы"){$category_id = "presenters";}
            }
            elseif($values[1] == "Компьютерные компоненты")
            {
            
            }
            elseif($values[1] == "Компьютеры")
            {
                if($values[2] == "Компьютеры Бизнес"){$category_id = "computer_business";}
                elseif($values[2] == "Компьютеры Потребительские" && $values[0] == "Apple CPU"){$category_id = "apple_computer_consumer";}
                elseif($values[2] == "Компьютеры Потребительские"){$category_id = "computer_consumer";}
                elseif($values[2] == "Моноблоки" && $values[0] == "Apple CPU"){$category_id = "apple_computer_monoblock";}
                elseif($values[2] == "Моноблоки"){$category_id = "computer_monoblock";}
                elseif($values[2] == "Графические рабочие станции" && $values[0] == "Apple CPU"){$category_id = "apple_computer_graphic_workstation";}
                elseif($values[2] == "Графические рабочие станции"){$category_id = "computer_graphic_workstation";}
                elseif($values[2] == "Опции"){$category_id = "computer_options";}
                elseif($values[2] == "Тонкие клиенты"){$category_id = "computer_thin";}
            }
            elseif($values[1] == "Лампы")
            {
            
            }
            elseif($values[1] == "Медиа-носители и книги")
            {
            
            }
            elseif($values[1] == "Мобильная связь")
            {
                if($values[2] == "Мобильные телефоны"){$category_id = "mobile_phones_appar";}
                elseif($values[2] == "СМАРТФОНЫ"){$category_id = "smartphones_appar";}
            }
            elseif($values[1] == "Мониторы")
            {
                if($values[2] == "Мониторы" && $values[0] == "Apple CPU"){$category_id = "apple_monitor";}
                elseif($values[2] == "Мониторы"){$category_id = "monitors";}
                elseif($values[2] == "Мониторы с ТВ-тюнером (MFM)"){$category_id = "monitor_with_tv_tuner";}
            }
            elseif($values[1] == "Накопители и Flash память")
            {
                if($values[2] == "Карманы для жестких дисков"){$category_id = "case_hdd";}
                elseif($values[2] == "Карты памяти Flash"){$category_id = "flash_memory_cards";}
                elseif($values[2] == "Накопители HDD внешние"){$category_id = "hdd_external_drives";}
                elseif($values[2] == "Накопители HDD для компьютеров"){$category_id = "hdd_drives_for_computers";}
                elseif($values[2] == "Накопители HDD для ноутбуков"){$category_id = "hdd_drives_for_laptops";}
                elseif($values[2] == "Накопители HDD для серверов"){$category_id = "hdd_drives_for_servers";}
                elseif($values[2] == "Накопители HDD портативные"){$category_id = "hdd_drives_portable";}
                elseif($values[2] == "Накопители SSD"){$category_id = "ssd_drives";}
                elseif($values[2] == "Накопители USB"){$category_id = "usb_drives";}
                elseif($values[2] == "Накопители оптические"){$category_id = "optical_drives";}
            }
            elseif($values[1] == "Ноутбуки")
            {
                if($values[2] == "Нетбуки"){$category_id = "notebook_netbook";}
                elseif($values[2] == "Ноутбуки Бизнес"){$category_id = "notebook_business";}
                elseif($values[2] == "Ноутбуки Потребительские"){$category_id = "notebook_consumer";}
                elseif($values[2] == "MacBook Air"){$category_id = "notebook_macbook_air";}
                elseif($values[2] == "MacBook Pro"){$category_id = "notebook_macbook_pro";}
                elseif($values[2] == "Опции"){$category_id = "notebook_options";}
            }
            elseif($values[1] == "Офисное и кассовое оборудование")
            {
            
            }
            elseif($values[1] == "Пассивное сетевое оборудование")
            {
                if($values[2] == "Инструменты"){$category_id = "lan_tools";}
                elseif($values[2] == "Кабель медный и патч-корды (витая пара, телефонный)"){$category_id = "cable_and_patchcords";}
                elseif($values[2] == "Оптические компоненты СКС"){$category_id = "optical_components_scs";}
                elseif($values[2] == "Опции"){$category_id = "lan_options";}
                elseif($values[2] == "Пассивные сетевые компоненты, системы прокладки и крепеж"){$category_id = "passive_network_components_gaskets_and_hardware_systems";}
                elseif($values[2] == "Системы распределения питания PDU"){$category_id = "pdu_power_distribution_system";}
                elseif($values[2] == "Телекоммуникационные стойки"){$category_id = "telecommunication_racks";}
            }
            elseif($values[1] == "Планшеты")
            {
                if($values[2] == "Планшеты"){$category_id = "comp_tech_tablet";}
                elseif($values[2] == "iPad 2"){$category_id = "tablet_ipad_2";}
                elseif($values[2] == "iPad 3"){$category_id = "tablet_ipad_3";}
                elseif($values[2] == "iPad 4"){$category_id = "tablet_ipad_4";}
                elseif($values[2] == "iPad mini"){$category_id = "tablet_ipad_mini";}
                elseif($values[2] == "iPad mini  Retina"){$category_id = "tablet_ipad_mini_retina";}
                elseif($values[2] == "iPad Air"){$category_id = "tablet_ipad_air";}
            }
            elseif($values[1] == "Программное обеспечение")
            {
                if($values[2] == "Коробочное ПО: Приложения" && $values[0] == "Apple CPU"){$category_id = "apple_program_box_po_apps";}
                elseif($values[2] == "Коробочное ПО: Приложения"){$category_id = "program_box_po_apps";}
                elseif($values[2] == "Коробочное ПО: Операционные системы"){$category_id = "program_box_os";}
                elseif($values[2] == "Коробочное ПО: Серверные продукты"){$category_id = "program_box_server";}
                elseif($values[2] == "Продукты OEM: Операционные системы"){$category_id = "program_oem_os";}
                elseif($values[2] == "Продукты OEM: Серверные продукты"){$category_id = "program_oem_server";}
                elseif($values[2] == "Дистрибутивы и документация: Серверные продукты"){$category_id = "program_doc_server_product";}
                elseif($values[2] == "Дистрибутивы и документация: Приложения"){$category_id = "program_doc_apps";}
            }
            elseif($values[1] == "Программное обеспечение: Корпоративные лицензии")
            {
                $category_id = "program_korporatus";
            }
            elseif($values[1] == "Расходные материалы")
            {
                if($values[2] == "Бумага для принтеров" || $values[2] == "Бумага офисная"){$category_id = "expendable_paper_office";}
                elseif($values[2] == "Бумага и носители специализированные"){$category_id = "expendable_paper_special";}
                elseif($values[2] == "Бумага широкоформатная"){$category_id = "expendable_paper_large";}
                elseif($values[2] == "Картриджи для копиров"){$category_id = "expendable_cartridges_copier";}
                elseif($values[2] == "Картриджи для ленточных накопителей"){$category_id = "expendable_cartridges_tape_drives";}
                elseif($values[2] == "Картриджи для специализированных принтеров"){$category_id = "expendable_cartridges_printer_special";}
                elseif($values[2] == "Картриджи для факсов"){$category_id = "expendable_cartridges_fax";}
                elseif($values[2] == "Картриджи лазерные монохромные"){$category_id = "expendable_cartridges_laser_mono";}
                elseif($values[2] == "Картриджи лазерные цветные"){$category_id = "expendable_cartridges_laser_color";}
                elseif($values[2] == "Картриджи матричные"){$category_id = "expendable_cartridges_ribbon";}
                elseif($values[2] == "Картриджи струйные"){$category_id = "expendable_cartridges_ink";}
                elseif($values[2] == "Картриджи струйные для широкоформатных устройств"){$category_id = "expendable_cartridges_ink_wide";}
                elseif($values[2] == "Ресурсные узлы и материалы"){$category_id = "expendable_resource_nodes_materials";}
            }
            elseif($values[1] == "Рекламные материалы")
            {
            
            }
            elseif($values[1] == "Серверы")
            {
            
            }
            elseif($values[1] == "Сетевое оборудование")
            {
                if($values[2] == "IP-видеорегистраторы"){$category_id = "ip_dvr";}
                elseif($values[2] == "IP-камеры"){$category_id = "ip_cameras";}
                elseif($values[2] == "IP-камеры корпусные"){$category_id = "ip_camera_housing";}
                elseif($values[2] == "IP-камеры купольные фиксированные"){$category_id = "ip_camera_fixed_dome";}
                elseif($values[2] == "IP-камеры роботизированные"){$category_id = "ip_camera_robotic";}
                elseif($values[2] == "Антенны"){$category_id = "antennas";}
                elseif($values[2] == "Беспроводное оборудование"){$category_id = "wireless_appar";}
                elseif($values[2] == "Интернет-шлюзы"){$category_id = "internet_gateways";}
                elseif($values[2] == "Кабели, удлинители, адаптеры, переходники"){$category_id = "cables_extension_cords_adapters";}
                elseif($values[2] == "Коммутаторы"){$category_id = "switches_appar";}
                elseif($values[2] == "Коммутаторы настраиваемые (Smart)"){$category_id = "configurable_switches_smart";}
                elseif($values[2] == "Коммутаторы неуправляемые"){$category_id = "unmanaged_switches";}
                elseif($values[2] == "Коммутаторы управляемые"){$category_id = "managed_switches_appar";}
                elseif($values[2] == "Маршрутизаторы"){$category_id = "routers_appar";}
                elseif($values[2] == "Медиаконвертеры"){$category_id = "media_converters_appar";}
                elseif($values[2] == "Модемы"){$category_id = "modems_appar";}
                elseif($values[2] == "Модули для коммутаторов"){$category_id = "modules_for_switches";}
                elseif($values[2] == "Модули для маршрутизаторов"){$category_id = "modules_for_routers";}
                elseif($values[2] == "Опции"){$category_id = "options_for_routers";}
                elseif($values[2] == "Переключатели-KVM, Разветвители, Переходники"){$category_id = "switch_kvm_hubs_adapters";}
                elseif($values[2] == "Принт-серверы"){$category_id = "print_servers";}
                elseif($values[2] == "Продукты VoIP"){$category_id = "voip_products";}
                elseif($values[2] == "Продукты xDSL"){$category_id = "products_xdsl";}
                elseif($values[2] == "Расширение гарантии"){$category_id = "warranty_extension";}
                elseif($values[2] == "Сетевые карты"){$category_id = "network_cards_appar";}
                elseif($values[2] == "Устройства Ethernet-to-Powerline"){$category_id = "device_ethernet_to_powerline";}
                elseif($values[2] == "Устройства сетевой безопасности"){$category_id = "network_security_devices";}
            }
            elseif($values[1] == "Системы отображения информации")
            {
                if($values[2] == "Информационные дисплеи"){$category_id = "information_displays";}
                elseif($values[2] == "Крепления"){$category_id = "ids_fixing";}
                elseif($values[2] == "Крепления для мониторов, ТВ и панелей"){$category_id = "monitor_arms_tv_and_panels";}
                elseif($values[2] == "Крепления для проекторов"){$category_id = "mounts_for_projectors";}
                elseif($values[2] == "Опции"){$category_id = "ids_options";}
                elseif($values[2] == "Плееры Blu-ray,DVD,CD"){$category_id = "players_blu_ray_dvd_cd";}
                elseif($values[2] == "Проекторы"){$category_id = "ids_projectors";}
                elseif($values[2] == "Проекционные экраны"){$category_id = "projection_screens";}
                elseif($values[2] == "Электронные доски"){$category_id = "electronic_whiteboards";}
            }
            elseif($values[1] == "Системы хранения данных")
            {
            
            }
            elseif($values[1] == "Телевизоры")
            {
                if($values[2] == "Опции для телевизоров"){$category_id = "tv_options";}
                elseif($values[2] == "Телевизоры"){$category_id = "televisions";}
            }
            elseif($values[1] == "Телефоны и Факсы")
            {
                if($values[2] == "Телефоны беспроводные"){$category_id = "wireless_phones_appar";}
                elseif($values[2] == "Телефоны проводные"){$category_id = "phones_appar";}
                elseif($values[2] == "Факсы"){$category_id = "fax_appar";}
            }
            elseif($values[1] == "Техника для кухни")
            {
                if($values[2] == "Блендеры"){$category_id = "blenders";}
                elseif($values[2] == "Весы"){$category_id = "libra";}
                elseif($values[2] == "Кухонные комбайны"){$category_id = "food_processors";}
                elseif($values[2] == "Миксеры"){$category_id = "mixers";}
                elseif($values[2] == "Мороженицы, йогуртницы"){$category_id = "ice_cream_for_yogurt";}
                elseif($values[2] == "Мультиварки,Пароварки, Фритюрницы"){$category_id = "multicookings_steamers_fryers";}
                elseif($values[2] == "Мясорубки"){$category_id = "meat_grinder";}
                elseif($values[2] == "Соковыжималки"){$category_id = "juicers";}
                elseif($values[2] == "Хлебопечи"){$category_id = "breadmaker";}
                elseif($values[2] == "Электрические термопоты"){$category_id = "electric_airpots";}
                elseif($values[2] == "Электропечи и грили"){$category_id = "electric_oven_and_grills";}
                elseif($values[2] == "Электрочайники"){$category_id = "electric_kettles";}
            }
            elseif($values[1] == "Техника для личного пользования")
            {
                if($values[2] == "Весы напольные"){$category_id = "self_scales";}
                elseif($values[2] == "Домашняя терапия"){$category_id = "self_home_therapy";}
                elseif($values[2] == "Машинки для стрижки"){$category_id = "self_clippers";}
                elseif($values[2] == "Товары для здоровья"){$category_id = "self_health_products";}
                elseif($values[2] == "Фены"){$category_id = "self_hairdryers";}
                elseif($values[2] == "Щипцы для укладки волос"){$category_id = "self_hair_iron";}
                elseif($values[2] == "Электрические бритвы"){$category_id = "self_electric_shaver";}
                elseif($values[2] == "Электронная косметика"){$category_id = "self_e_cosmetics";}
                elseif($values[2] == "Эпиляторы"){$category_id = "self_shavers";}
            }
            elseif($values[1] == "Устройства печати и сканирования")
            {
                if($values[2] == "Многофункциональные струйные устройства"){$category_id = "mfy_ink";}
                elseif($values[2] == "Многофункциональные лазерные устройства"){$category_id = "mfy_laser";}
                elseif($values[2] == "Принтеры лазерные цветные"){$category_id = "printer_laser_col";}
                elseif($values[2] == "Принтеры лазерные монохромные"){$category_id = "printer_laser_mono";}
                elseif($values[2] == "Принтеры струйные"){$category_id = "printer_ink";}
                elseif($values[2] == "Принтеры матричные"){$category_id = "printer_matr";}
                elseif($values[2] == "Принтеры специализированные"){$category_id = "printer_spec";}
                elseif($values[2] == "Широкоформатные струйные устройства"){$category_id = "printer_ink_wide";}
                elseif($values[2] == "Широкоформатные лазерные устройства"){$category_id = "printer_laser_wide";}
                elseif($values[2] == "Многофункциональные копировальные аппараты"){$category_id = "printer_copier";}
                elseif($values[2] == "Опции"){$category_id = "printer_apps";}
                elseif($values[2] == "Сканеры"){$category_id = "printer_scaner";}
                elseif($values[2] == "Сканеры документные"){$category_id = "printer_scaner_bond";}
                elseif($values[2] == "Сканеры широкоформатные"){$category_id = "printer_scaner_wide";}
            }
            elseif($values[1] == "Фото-видео устройства")
            {
                if($values[2] == "Видеорегистраторы"){$category_id = "dvrs";}
                elseif($values[2] == "Объективы и фильтры к цифровым камерам"){$category_id = "lenses_and_filters_to_digital_cameras";}
                elseif($values[2] == "Опции"){$category_id = "photo_video_opinions";}
                elseif($values[2] == "Светофильтры"){$category_id = "photo_video_filters";}
                elseif($values[2] == "Цифровые видеокамеры"){$category_id = "digital_camcorder";}
                elseif($values[2] == "Цифровые камеры со сменной оптикой"){$category_id = "digital_cameras_with_interchangeable_lenses";}
                elseif($values[2] == "Цифровые фотокамеры"){$category_id = "digital_cameras";}
            }
            elseif($values[1] == "Цифровые персональные устройства")
            {
                if($values[2] == "GPS навигаторы и карты"){$category_id = "gps_navigation_and_maps";}
                elseif($values[2] == "MP3 плееры"){$category_id = "mp3_players";}
                elseif($values[2] == "Кабели, удлинители, адаптеры, переходники"){$category_id = "cables_extension_cords_adapters";}
                elseif($values[2] == "Медиаплееры и ТВ-приставки"){$category_id = "mediaplayers_and_tv_boxes";}
                elseif($values[2] == "Опции"){$category_id = "dpd_options";}
                elseif($values[2] == "Спортивные часы"){$category_id = "dpd_sports_watches";}
                elseif($values[2] == "Цифровые фоторамки и фотоальбомы"){$category_id = "digital_photo_frames_and_photo_albums";}
                elseif($values[2] == "Эхолоты"){$category_id = "dpd_sonars";}
            }
            elseif($values[1] == "Электронные книги")
            {
            
            }
            else{unset($values);}


            $category_id = explode("-",$category_id);
            $category_id = array_unique($category_id);
            $category_id = implode("-",$category_id);
            
            $values = str_replace("`","\"",$values);
            $values = str_replace("'","\"",$values);  
            $values = str_replace("`","",$values);
            //$values = Text::cutPriceBrandToDBBrand($values);
             
            $seolink = str_replace(" ","_",$item_caption);
            $seolink = str_replace("-","_",$seolink);
            $seolink = str_replace("/","_",$seolink);
            $seolink = str_replace("\"","",$seolink); 
            $caption = $values[3];   

$item_description = htmlspecialchars($item_description);

$item_brand = $item_brand;
$item_category = $values[1];
$item_subcategory = $values[2];
$item_caption = $values[3];
$item_kod = str_replace("/", "_", $values[4]);
//$item_tnved = $values[5];
$item_price_rozn = str_replace(",",'.',$values[6]);
    $item_price_rozn = preg_replace("/[^x\d|*\.]/","",$item_price_rozn);
//$item_monitor = $values[7];
$item_price_diler = str_replace(",",'.',$values[8]);
    $item_price_diler = preg_replace("/[^x\d|*\.]/","",$item_price_diler);
$item_ddp = $values[9];
$item_garantiya = $values[10];
$item_lvov = "+";
if($values[11] == "Есть"){$item_kiev = "+";}
elseif($values[11] == "Нет"){$item_kiev = "-";}
else{$item_kiev = "r";}
//$item_v_ypakovke = $values[12];
$item_description = $values[18];
$item_harakter = $values[14];
$item_instruction = $values[15];
$path = "../product-image/{$item_kod}.jpg";
if(!file_exists($path) || filesize($path) == "0")
{
    if($values[16] !== "")
    {
        $url = trim($values[16]);
        file_put_contents($path, file_get_contents($url)); // Сохраняем изо в ../product-image/
    }
}

$item_price_orig = $item_price_diler;
$item_newprice_orig = $item_price_rozn;

$item_last_update = date("Y-m-d H:i");



                $uniq_kod = mysql::checkUniqRow($tab,"1Cid",$item_kod,"postavschik",$postavschik);
//SYS::varDump($uniq_kod);
// Поиск уцененных товаров

                if(!$uniq_kod)
                {
                    if($filter_more !== "")
                    { 
                        $query = "UPDATE `{$table}` SET
                        `category`='{$item_category}',
                        `name`='{$item_caption}', 
                        `connect`='86-{$category_id}',
                        `instruction`='{$item_instruction}',
                        `picture`='{$item_kod}.jpg',
                        `price`='{$item_price_diler}',
                        `newprice` = '{$item_price_rozn}',
                        `price_orig` = '{$item_price_orig}',
                        `newprice_orig` = '{$item_newprice_orig}',
                        `ddp` = '{$item_ddp}', 
                        `style` = '{$item_lvov}',
                        `volume` = '{$item_kiev}',
                        `last_update` = '{$item_last_update}',
                        `disabled` = '{$disabled}'                   
                        WHERE `1Cid` = '{$item_kod}'
                        ";
                    }
                    else
                    {                    
                        $query = "UPDATE `{$table}` SET
			`category`='{$item_category}',
                        `name`='{$item_caption}',
                        `instruction`='{$item_instruction}',
                        `picture`='{$item_kod}.jpg',
                        `price`='{$item_price_diler}',
                        `newprice` = '{$item_price_rozn}',
                        `price_orig` = '{$item_price_orig}',
                        `newprice_orig` = '{$item_newprice_orig}',
                        `ddp` = '{$item_ddp}',
                        `style` = '{$item_lvov}',
                        `volume` = '{$item_kiev}',
                        `last_update` = '{$item_last_update}',
                        `disabled` = '{$disabled}' 
                        WHERE `1Cid` = '{$item_kod}'
                        ";
                    }                   
                    $res = mysql_query($query);
                    if(!$res)
                    {
                       echo mysql_error();
                       //exit("Что-то с Query. (Файл - ".__FILE__.". Строка - ".__LINE__.")");
                    }
                    //$in[] = "Обновлено : {$item_group} - {$item_brand} - {$item_kod}";
                    $in[] = "";

                }
                else
                {
  
                    // Новая позиция
                    $query = "INSERT INTO `{$table}` (
                              postavschik,
                              1Cid,
			      category,
                              name_short,
                              brand,
                              serial,
                              name,
                              description,
                              full_text,
                              harakter,
                              instruction,
                              picture,
                              price,
                              newprice,
                              price_orig,
                              newprice_orig,
                              ddp,
                              style,
                              volume,
                              edizm,
                              connect,
                              last_update,
                              disabled)
                    VALUES (
                    '{$postavschik}', 
                    '{$item_kod}',
                    '{$item_category}', 					
                    '{$item_caption}', 
                    '{$item_brand}',
                    '{$item_subcategory}',
                    '{$caption}',
                    '{$item_caption}',
                    '{$item_description}',
                    '{$item_harakter}',
                    '{$item_instruction}',
                    '{$item_kod}.jpg', 
                    '{$item_price_diler}', 
                    '{$item_price_rozn}',
                    '{$item_price_orig}',
                    '{$item_newprice_orig}',
                    '{$item_ddp}',
                    '{$item_lvov}',
                    '{$item_kiev}', 
                    '{$item_garantiya}',
                    '86-{$category_id}',
                    '$item_last_update',
                    '$disabled' 
                    )";   
                    
                    $res = mysql_query($query);
                    if(!$res)
                    {
                       echo mysql_error();
                       exit("Что-то с Query. (Файл - ".__FILE__.". Строка - ".__LINE__.")");
                    }
                    $in[] = "Новое - {$item_category} - {$item_brand} - {$item_kod}";
Price::newFileAboutEmptyConnect($item_kod,$item_caption);

                }
                
            }

        }       
        //var_dump($arr);
        fclose($fd);
        //unset($category_id);
        return $in;
    }

     static function preparationFileToFileByCategory($file,$name,$postavschik){
	    $category = Text::cirilToLatin($name);
        $fd = fopen($file, "r");
        $folder = SITE_PATH."/price/{$postavschik}/".date("Y_m_d");
	if(!file_exists($folder))
	{
            mkdir($folder, 0755);		    
	}
	
//$file_new = "{$folder}/{$category}.csv";
	$file_new = "{$folder}/all.csv";
	
	
	$fn = fopen($file_new, "w");
        while (($values = fgetcsv($fd, 2048, ",")) !== FALSE) 
        {
            if($values[4] == "" || $values[4] == "Код"){unset($values);} // удаление полей с пустым кодом товара (код производителя)
            else
            {
            if($values[0] == "3M Telecom" || $values[0] == "Cooler Master")
            {
    $brand = strtolower($values[0]);
}
                elseif($values[0] == "!Распродажа")
                {
                    $brand = "sale";
                }
                elseif($values[0] == "")
                {
                    $brand = "noname";
                }
                else
                {
                    $brand = explode(" ",$values[0]);
                    $brand = strtolower($brand['0']);
                }
         }
            $values[6]=str_replace(",",'.',$values[6]);
            $values[6]=preg_replace("/[^x\d|*\.]/","",$values[6]);
            $values[7]=str_replace(",",'.',$values[7]);
            $values[7]=preg_replace("/[^x\d|*\.]/","",$values[7]);
            $values[4] = str_replace("/", "_", $values[4]);
            $values[4] = str_replace("\"", "", $values[4]);
            $values[3] = str_replace("\"", "", $values[3]);

            fwrite($fn, "\"{$brand}\",\"{$values[1]}\",\"{$values[2]}\",\"{$values[3]}\",\"{$values[4]}\",\"{$values[5]}\",\"{$values[6]}\",\"{$values[7]}\",\"{$values[8]}\",\"{$values[9]}\",\"{$values[10]}\",\"{$values[11]}\",\"{$values[12]}\",\"{$values[13]}\",\"{$values[14]}\",\"{$values[15]}\",\"{$values[16]}\"\n");  
        }
        fclose ($fn);
        return  $file_new;
    }

    static function getFileCategory($file){

        $f_all = fopen($file, "r");
        while (($values = fgetcsv($f_all, 2048, ",")) !== FALSE) 
        {
            $file_category = $values[1];
        }
        fclose ($f_all);
        return $file_category;
    }
    
////////////////////////////////////   
   
    
}
?>
