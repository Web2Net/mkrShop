<?php

define('PATH_TO_PRICE','userfiles/prices');
define('PATH_TO_ITEM_IMG','userfiles/product-image');
	
define('TABLE_SHOP_TAG','shop_tag');
//    define('TABLE_ITEMS_FILTERS','items_filter');
define('TABLE_SHOP_ITEMS','shop_item');
define('TABLE_TEMP_SHOP_ITEMS','shop_item_temp');

define('TABLE_SHOP_ITEMS_MAIN','shop_item_main');


class Price
{
	
	
	
    static function admPrice(){


	    $tpl_item=new AdmModTpl;
        
        foreach ($_REQUEST as $key=>$val){
            $str="$".$key."=\$val;";
            eval($str);
        }
        
//mysql::dumpTable(TABLE_ITEMS); // Создаем копию таблицы - нет такого класса
//mysql::backupAllTables("/price/Dump_BD","dump_".date("Y-m-d_H-i").".sql""); // Создаем копию БД
        if($com == "dump_mkr"){
            mysql::dumpTableByField("shop_item","postavschik","mkr");
        }    


// ************* ERC ************* //
/*        
        if($com == "upload_erc_temp_table"){
           
            $postavschik = "erc";
            include ('erc/erc.price.cfg.php');  		
			
            $file = $_SERVER ['DOCUMENT_ROOT']."/".PATH_TO_PRICE."/price_".$postavschik.".csv"; // прайс
		
	        if(file_exists($file)){ 
                Price::decodeFile($file); // Декодим
                Price::checkFile($file); // Удаляем повторяющиеся строки из файла
//Price_erc::updateImgFromFile($file);  // сохранение изо с удаленного адреса 			
                Mysql::deleteAllFields(TABLE_TEMP_SHOP_ITEMS); // Удаление всех записей из временной таблицы
                $change_price = Price_erc::createTempTable(TABLE_TEMP_SHOP_ITEMS,$file,$postavschik);  // Записываем данные из файла во временную таблицу
                $tpl_item->assign('change_price',$change_price);
                $mess = "Обновленна временная таблица. Поставщик ERC.";
                $tpl_item->assign('mess',$mess);
                Price::deleteSomeFilds(TABLE_TEMP_SHOP_ITEMS); // Удаление из таблицы записей с некоторыми пустыми полями

	        }
	        else{
	            exit("{$file} - нету такого..");
	        }  
	    }
//Price_erc::updateImgFromFile($file);  // сохранение изо с удаленного адреса 
//$img_arr = Price_erc::getNewImgItemsFromTempTable(TABLE_SHOP_ITEMS,TABLE_TEMP_SHOP_ITEMS); // Получение новых изо товаров из нового прайса          
//Price_erc::updateImgFromArray($img_arr, PATH_TO_ITEM_IMG);   // Закачиваем новые изо        
        elseif($com == "upload_erc_update"){
            $postavschik = "erc";
	        Price::setStatysArch(TABLE_SHOP_ITEMS,$postavschik); // Переводим весь товар поставщика в статус "архивный"
            $change_price = Price::updateExistenceItems(TABLE_SHOP_ITEMS,TABLE_TEMP_SHOP_ITEMS,$postavschik); // Перезаписываем товар, который уже существует в TABLE_SHOP_ITEMS из TABLE_TEMP_SHOP_ITEMS
            $tpl_item->assign('change_price',$change_price);
            $mess = "Обновили старые товары. Поставщик ERC.";
            $tpl_item->assign('mess',$mess);
            Mysql::optimazeTable(TABLE_SHOP_ITEMS);  // Оптимизация таблицы
	    }
        elseif($com == "upload_erc_insert"){ 
            $postavschik = "erc";
	        $change_price = Price::insNewItems(TABLE_SHOP_ITEMS,TABLE_TEMP_SHOP_ITEMS,$postavschik); // Добавляем новый товар из временной таблицы (из TABLE_TEMP_SHOP_ITEMS в TABLE_SHOP_ITEMS)
	        $tpl_item->assign('change_price',$change_price);
            $mess = "Добавили новые товары. Поставщик ERC.";
            $tpl_item->assign('mess',$mess);
            Mysql::optimazeTable(TABLE_SHOP_ITEMS);  // Оптимизация таблицы
        }
*/        
// ************* /ERC ************* //        
// ************* NEW ERC ************* //
        if($com == "upload_erc_temp_table"){
           
            $postavschik = "erc";
            include ('erc/erc.price.cfg.php');          
            
            $file = $_SERVER ['DOCUMENT_ROOT']."/".PATH_TO_PRICE."/price_".$postavschik.".csv"; // прайс
        
            if(file_exists($file)){ 
                Price::decodeFile($file); // Декодим
                Price::checkFile($file); // Удаляем повторяющиеся строки из файла
//Price_erc::updateImgFromFile($file);  // сохранение изо с удаленного адреса           
                Mysql::deleteAllFields(TABLE_TEMP_SHOP_ITEMS); // Удаление всех записей из временной таблицы
                $change_price = Price_erc::createTempTable(TABLE_TEMP_SHOP_ITEMS,$file,$postavschik);  // Записываем данные из файла во временную таблицу
                $tpl_item->assign('change_price',$change_price);
                $mess = "Обновленна временная таблица. Поставщик ERC.";
                $tpl_item->assign('mess',$mess);
                Price::deleteSomeFilds(TABLE_TEMP_SHOP_ITEMS); // Удаление из таблицы записей с некоторыми пустыми полями

            }
            else{
                exit("{$file} - нету такого..");
            }  
        }
        elseif($com == "upload_erc_update"){  // Изменение позиций
            $postavschik = "erc";
            Price::setStatysArch(TABLE_SHOP_ITEMS,$postavschik); // Переводим весь товар поставщика в статус "архивный"
            $change_price = Price::updateExistenceItems(TABLE_SHOP_ITEMS,TABLE_TEMP_SHOP_ITEMS,$postavschik); // Перезаписываем товар, который уже существует в TABLE_SHOP_ITEMS из TABLE_TEMP_SHOP_ITEMS
            $tpl_item->assign('change_price',$change_price);
            $mess = "Обновили старые товары. Поставщик ERC.";
            $tpl_item->assign('mess',$mess);
            Mysql::optimazeTable(TABLE_SHOP_ITEMS);  // Оптимизация таблицы
        }
        elseif($com == "upload_erc_insert"){ // Добавление новых позиций
            $postavschik = "erc";
            
            $brand_id = Price::getBrandIdByBrandCaption("shop_item_brand", "Kon"); // Получаем id-бренда
            $currency = Price::getCurrencyBySomeField("shop_item_currency", "1"); // Получаем id-валюты


           // $tpl_item->assign('change_price',$change_price);
           // $mess = "Добавили новые товары. Поставщик ERC.";
           // $tpl_item->assign('mess',$mess);
           // Mysql::optimazeTable(TABLE_SHOP_ITEMS);  // Оптимизация таблицы
        }
// ************* /NEW ERC ************* //          
// ************* MTI ************* //
        if($com == "upload_mti_temp_table"){
            
            $postavschik = "mti";
            include ('mti/mti.price.cfg.php');  		
			
            $file = SITE_PATH."/".PATH_TO_PRICE."/price_{$postavschik}.xml"; // прайс
		
	        if(file_exists($file)){
//Price::decodeFile($file); // Декодим
//Price::checkFile($file); // Удаляем повторяющиеся строки из файла
                Mysql::deleteAllFields(TABLE_TEMP_SHOP_ITEMS); // Удаление всех записей из временной таблицы
                $change_price = Price_mti::createTempTable(TABLE_TEMP_SHOP_ITEMS,$file,$postavschik);  // Записываем данные из файла во временную таблицу
                $tpl_item->assign('change_price',$change_price);
                $mess = "Обновленна временная таблица. Поставщик MTI.";
                $tpl_item->assign('mess',$mess);
//                Price::deleteSomeFilds(TABLE_TEMP_SHOP_ITEMS); // Удаление из таблицы записей с некоторыми пустыми полями
	        }
	    }
        elseif($com == "upload_mti_update"){
            $postavschik = "mti";
	    Price::setStatysArch(TABLE_SHOP_ITEMS,$postavschik); // Переводим весть товар поставщика в статус "архивный"
            $change_price = Price::updateExistenceItems(TABLE_SHOP_ITEMS,TABLE_TEMP_SHOP_ITEMS,$postavschik); // Перезаписываем товар, который уже существует в TABLE_SHOP_ITEMS из TABLE_TEMP_SHOP_ITEMS
            $tpl_item->assign('change_price',$change_price);
            $mess = "Обновили старые товары. Поставщик MTI.";
            $tpl_item->assign('mess',$mess);
            Mysql::optimazeTable(TABLE_SHOP_ITEMS);  // Оптимизация таблицы
	    }
        elseif($com == "upload_mti_insert"){ 
            $postavschik = "mti";
	    $change_price = Price::insNewItems(TABLE_SHOP_ITEMS,TABLE_TEMP_SHOP_ITEMS,$postavschik); // Добавляем новый товар из временной таблицы (из TABLE_TEMP_SHOP_ITEMS в TABLE_SHOP_ITEMS)
	    $tpl_item->assign('change_price',$change_price);
            $mess = "Добавили новые товары. Поставщик MTI.";
            $tpl_item->assign('mess',$mess);
            Mysql::optimazeTable(TABLE_SHOP_ITEMS);  // Оптимизация таблицы
        }
// ************* /MTI ************* //
        
// ************* MINOLTA ************* //  
	    elseif($com == "upload_minolta"){ //?mod=price&com=upload_minolta
	
	        $postavschik = "mkr";
	        
	        include ('minolta/minolta.price.cfg.php');
	        
//                $file = SITE_PATH."/".PATH_TO_PRICE."/price_toner_minolta.csv"; // прайс ТОНЕР
                $file = SITE_PATH."/".PATH_TO_PRICE."/price_starter_minolta.csv"; // прайс СТАРТЕР
                if(file_exists($file)){
                    Price::decodeFile($file); // Декодим
                    Price::checkFile($file); // Удаляем повторяющиеся строки из файла
                    Mysql::deleteAllFields(TABLE_TEMP_SHOP_ITEMS); // Удаление всех записей из временной таблицы
                    $change_price = Price_minolta::createTempTable(TABLE_TEMP_SHOP_ITEMS,$file,$postavschik);  // Записываем данные из файла во временную таблицу
                    $tpl_item->assign('change_price',$change_price);
                    $mess = "Обновленна временная таблица. Поставщик Minolta.";
                    $tpl_item->assign('mess',$mess);
//                    Price::deleteSomeFilds(TABLE_TEMP_SHOP_ITEMS); // Удаление из таблицы записей с некоторыми пустыми полями
                }
            }
            elseif($com == "insert_minolta"){ //?mod=price&com=insert_minolta
                $postavschik = "mkr";
	        $change_price = Price::insNewItems(TABLE_SHOP_ITEMS,TABLE_TEMP_SHOP_ITEMS,$postavschik); // Добавляем новый товар из временной таблицы (из TABLE_TEMP_SHOP_ITEMS в TABLE_SHOP_ITEMS)
	        $tpl_item->assign('change_price',$change_price);
                $mess = "Добавили новые товары. Поставщик MKR (Minolta).";
                $tpl_item->assign('mess',$mess);
//                Mysql::optimazeTable(TABLE_SHOP_ITEMS);  // Оптимизация таблицы
            }
// ************* /MINOLTA ************* // 
	    else{
	        $c_cont=$tpl_item->get("price-uploaded");
	    }
		
/*        
        elseif($com == "upload_south"){
            $postavschik = "south";
        }
        elseif($com == "upload_mti"){
            $postavschik = "mti";
	}
        elseif($com == "upload_mkr"){
            $postavschik = "mkr";
        }
        elseif($com == "upload_dtr"){
            $postavschik = "dtr";
        }
        elseif($com == "upload_mti"){
            $postavschik = "mti";
	}
        elseif($com == "upload_KancMaster"){
            $postavschik = "km";
        }
        else{
            $c_cont=$tpl_item->get("price");
        }
*/
//var_dump($c_cont);
        
        return $c_cont;
    }
  
    static function getPercentNadbavki($ddp, $price_diler){

        if($ddp == 1){ //если цена в uah
            $price_diler = Price::priceUahToUsd($price_diler); // переводим цену в usd
        }
        
        if($price_diler <= 50){$nadbavka = 7;}
        elseif($price_diler >= 51 && $price_diler <= 100){$nadbavka = 5;}
        elseif($price_diler >= 101 && $price_diler <= 200){$nadbavka = 4;}
        elseif($price_diler >= 201 && $price_diler <= 500){$nadbavka = 3;}
        elseif($price_diler >= 501 && $price_diler <= 1000){$nadbavka = 2;}
        else{$nadbavka = 1;}

        if($ddp == 1){ //если цена в uah
            $nadbavka = ($price_diler * KURS_USD_NAC_BANK) / 100 * $nadbavka ;
        }
        else{
            $nadbavka = $price_diler / 100 * $nadbavka;
        }

        return round($nadbavka, 2);
    }

 
    static function priceUsdToUah($price_diler){
        $price = $price_diler * KURS_USD_ERC;
        return round($price, 2);          
    }

   
    static function priceUahToUsd($price_diler){
        $price = $price_diler / KURS_USD_ERC;
        return round($price, 2);         
    }

    static function getBrandIdByBrandCaption($table, $keyword){

        //$query = "SELECT id FROM $table WHERE `caption_short` LIKE '%$keyword%'LIMIT 1";

        $select = "id";
        $from = $table;
        $where = "`caption_full` LIKE '%" . $keyword . "%'";
        $sortby = "";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby,"1");
SYS::varDump($row,__FILE__,__LINE__,"BrandId");
        return $row;
    }

    static function getCurrencyBySomeField($table, $keyword){

        if($keyword == 1){
            $currency = "UAH"; 
        }
        elseif($keyword == 0){
            $currency = "USD"; 
        }
        else{
            $currency = "EUR";
        }

        $select = "id";
        $from = $table;
        $where = "`caption_short` = '" . $currency . "'";
        $sortby = "";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby,"1");
SYS::varDump($row,__FILE__,__LINE__,"CurrencyId");
        return $row;
    }

    static function decodeFile($file){
    
        header('Content-type: text/html; charset=utf-8');
        if(!setlocale(LC_ALL, 'ru_RU.utf8')) setlocale(LC_ALL, 'en_US.utf8');
        //if(setlocale(LC_ALL, 0) == 'C') die('Не поддерживается ни одна из перечисленных локалей (ru_RU.utf8, en_US.utf8)');

        $handle = fopen('php://memory', 'w+');
        fwrite($handle, iconv('windows-1251', 'utf-8', file_get_contents($file)));
        rewind($handle);        //while (($row = @fgetcsv($handle, 1024, ';')) !== false) //print_r($row);
        fclose($handle);        
    }
	
    static function checkFile($file){  // Проверка файла на повторяющиеся строки
        file_put_contents($file, array_unique(file($file)));
    }	
	
    static function deleteSomeFilds($table){ // Удаление пустых, нулевых и "битых" строк в таблице
    
        $query = "DELETE FROM `{$table}` WHERE `1Cid` = '' OR `price_diler` = '0.00' OR `price_roznica` = '0.00' OR `connect` = '' OR `connect` = ';;'"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
    }
	
    static function setStatysArch($table,$postavschik){  // Переводим весть товар поставщика в статус "архивный"
        $query = "UPDATE `{$table}` SET `nalichie`='arch' WHERE `postavschik`='{$postavschik}'";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
    }
	
    static function updateExistenceItems($table_1, $table_2, $postavschik){  // Перезаписываем товар, который уже существует в TABLE_ITEMS из TABLE_TEMP_ITEMS
        $last_update = date("Y-m-d H:i:s");
		
		$query = "UPDATE {$table_1} t1,{$table_2} t2 
		          SET t1.connect=t2.connect, 
                      t1.desc_full=t2.desc_full, 
		              t1.price_diler=t2.price_diler, 
					  t1.price_roznica=t2.price_roznica, 
					 /* t1.last_update=t2.last_update,  */
					  t1.nalichie=t2.nalichie,
					  t1.p1=t2.p1, /* DDP */
					  t1.p2=t2.p2,  /* MONITOR */
					  t1.filter_connect=t2.filter_connect 
				  WHERE t1.1Cid=t2.1Cid AND t2.postavschik='{$postavschik}'";
/*
        $query = "UPDATE Table2
                  SET razmer = Table1.razmer
                  FROM Table1 JOIN Table2 ON Table1.id = Table2.id";
*/
/*		
		$query = "UPDATE {$table_2} t2
                  INNER JOIN {$table_1} t1 ON t1.1Cid = t2.1Cid
                  SET t2.connect=t1.connect, 
				      t2.price_diler=t1.price_diler, 
					  t2.price_roznica=t1.price_roznica, 
					  t2.last_update=t1.last_update, 
					  t2.nalichie=t1.nalichie,
					  t2.p1=t1.p1,
					  t2.p2=t1.p2,
					  t2.filter_connect=t1.filter_connect
                  WHERE t2.1Cid IS NULL";
*/				  
/*		
		$query = "UPDATE {$table_2} t2, {$table_1} t1
                  SET t2.connect=t1.connect, 
				      t2.price_diler=t1.price_diler, 
					  t2.price_roznica=t1.price_roznica, 
					  t2.last_update=t1.last_update, 
					  t2.nalichie=t1.nalichie
					  t2.p1=t1.p1,
					  t2.p2=t1.p2,
					  t2.filter_connect=t1.filter_connect
                  WHERE t1.1Cid=t2.1Cid
                  SELECT * FROM {$table_2};";
*/
	    
/*	
		$query = "UPDATE {$table_1},{$table_2} SET 
		          {$table_1}.price_diler={$table_2}.price_diler, 
		          {$table_1}.price_roznica={$table_2}.price_roznica,
		          {$table_1}.last_update='{$last_update}',
		          {$table_1}.nalichie={$table_2}.nalichie,		
		      {$table_1}.p1={$table_2}.p1,		
		      {$table_1}.p2={$table_2}.p2,		
		      {$table_1}.filter_connect={$table_2}.filter_connect		
		          WHERE {$table_1}.1Cid={$table_2}.1Cid;"; 
*/
		$res = mysql_query($query);
		Mysql::queryError($res,$query);
	}
	
	static function insNewItems($table_1, $table_2, $postavschik){  // Добавляем новый товар из временной таблицы

	
		$query = "INSERT INTO {$table_1} (
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
		          SELECT 
{$table_2}.1Cid,
{$table_2}.connect,
{$table_2}.caption,
{$table_2}.seolink,
{$table_2}.desc_full,
{$table_2}.desc_short,
{$table_2}.showing,
{$table_2}.flagman,
{$table_2}.good_price,
{$table_2}.sell_out,
{$table_2}.on_main,		 	 	 
{$table_2}.price_diler,	 	 
{$table_2}.price_roznica,	 	 	 
{$table_2}.first_update,		 	 
{$table_2}.last_update,
{$table_2}.img, 
{$table_2}.article,	 	 
{$table_2}.ordering,	 	 
{$table_2}.hit,	 	 
{$table_2}.garantiya,
{$table_2}.nalichie,	 	 
{$table_2}.package, 
{$table_2}.param_connect,	 	 	 
{$table_2}.branch_connect,	 	 	 
{$table_2}.gallery_connect,	 	 	 
{$table_2}.companion_connect,	 	 	 
{$table_2}.p1,		 	 	 
{$table_2}.p2,	 	 	 	 
{$table_2}.p3,		 	 	 
{$table_2}.p4,		 	 	 
{$table_2}.p5,	 	 
{$table_2}.p6,	 	 	 
{$table_2}.postavschik, 	 	 
{$table_2}.brand, 	 	 
{$table_2}.meta_t, 	 	 
{$table_2}.meta_k, 	 	 
{$table_2}.meta_d, 	 	 
{$table_2}.see,	 	 	 
{$table_2}.print,
{$table_2}.pos
		          FROM {$table_2} LEFT JOIN {$table_1} ON {$table_1}.1Cid = {$table_2}.1Cid WHERE {$table_1}.postavschik <> 'mkr' AND  {$table_1}.1Cid IS NULL";


     			$res = mysql_query($query);
                Mysql::queryError($res,$query);
				
				

		$query2 = "INSERT INTO shop_item_ru (
pid,
caption,
desc_full,
desc_short,
meta_t,	 	 	 
meta_k,	 	 	 
meta_d	 	 	 
) 
		          SELECT 
{$table_1}.id,
{$table_1}.caption,
{$table_1}.desc_full,
{$table_1}.desc_short,
{$table_1}.meta_t,	 	 	 
{$table_1}.meta_k,	 	 	 
{$table_1}.meta_d	 	 	 

		          FROM {$table_1} LEFT JOIN shop_item_ru ON shop_item_ru.pid = {$table_1}.id  WHERE shop_item_ru.pid IS NULL";
		$res2 = mysql_query($query2);
		Mysql::queryError($res2,$query2);
		
		
	} 

    static function insNewItems_Main($table_1, $table_2, $postavschik){  // Добавляем новый товар из временной таблицы

    
        $query = "INSERT INTO {$table_1} (
article,
tag_0_id,
tag_1_id,
tag_2_id,
brand_id,
price_id,
description_id,
postavschik_id,
other_id,
caption_short,
caption_full,
first_update,
last_update,
flagman,
seolink,
showing,
see,
pos) 
                  SELECT 
{$table_2}.article,
{$table_2}.connect,
{$table_2}.caption,
{$table_2}.seolink,
{$table_2}.desc_full,
{$table_2}.desc_short,
{$table_2}.showing,
{$table_2}.flagman,
{$table_2}.good_price,
{$table_2}.sell_out,
{$table_2}.on_main,              
{$table_2}.price_diler,      
{$table_2}.price_roznica,            
{$table_2}.first_update,             
{$table_2}.last_update,
{$table_2}.img, 
{$table_2}.article,      
{$table_2}.ordering,         
{$table_2}.hit,      
{$table_2}.garantiya,
{$table_2}.nalichie,         
{$table_2}.package, 
{$table_2}.param_connect,            
{$table_2}.branch_connect,           
{$table_2}.gallery_connect,          
{$table_2}.companion_connect,            
{$table_2}.p1,               
{$table_2}.p2,               
{$table_2}.p3,               
{$table_2}.p4,               
{$table_2}.p5,       
{$table_2}.p6,           
{$table_2}.postavschik,          
{$table_2}.brand,        
{$table_2}.meta_t,       
{$table_2}.meta_k,       
{$table_2}.meta_d,       
{$table_2}.see,          
{$table_2}.print,
{$table_2}.pos
                  FROM {$table_2} LEFT JOIN {$table_1} ON {$table_1}.1Cid = {$table_2}.1Cid WHERE {$table_1}.postavschik <> 'mkr' AND  {$table_1}.1Cid IS NULL";


                $res = mysql_query($query);
                Mysql::queryError($res,$query);
                
                

        $query2 = "INSERT INTO shop_item_ru (
pid,
caption,
desc_full,
desc_short,
meta_t,          
meta_k,          
meta_d           
) 
                  SELECT 
{$table_1}.id,
{$table_1}.caption,
{$table_1}.desc_full,
{$table_1}.desc_short,
{$table_1}.meta_t,           
{$table_1}.meta_k,           
{$table_1}.meta_d            

                  FROM {$table_1} LEFT JOIN shop_item_ru ON shop_item_ru.pid = {$table_1}.id  WHERE shop_item_ru.pid IS NULL";
        $res2 = mysql_query($query2);
        Mysql::queryError($res2,$query2);
        
        
    } 

    static function getPrice($postavschik,$price_rozn,$price_diler,$ddp, $monitor){  // Добавляет к цене поставщика определенный % и формирует цену в зависимости от курса у.е., поставщика и прочих шняг
        

        if($price_diler == "0,00" || $price_diler == "0.00"){
            $price_final = "0,00";
        }
        else{
            if($postavschik == "erc"){
                $price_final = Price::checkPrice($ddp, $monitor, $price_diler, $price_rozn);
                //$price_final = $price_rozn;
            }
            elseif($postavschik == "mti"){
                $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI)*KURS_USD;
            }
            elseif($postavschik == "dtr"){
                    $price_final = ($price_diler + $price_diler/100*PROCENT_NADBAVKI)*KURS_USD;
            }
            elseif($postavschik == "mkr"){
                if($ddp == "1"){
                    $price_final = $price_diler;
                }
                else{
                    $price_final = $price_diler * KURS_EURO_NAC_BANK;
                }
            }
            else{
                $price_final = $price_rozn;   
            }
        }
        
//SYS::varDump($price_final,__FILE__,__LINE__,"PRICE_FINAL");
        return round($price_final, 2);
    }

    static function checkPrice($ddp, $monitor, $price_diler, $price_roznica){ // Проверка на соответствие цены по входу и рекомендованой
        
        if(!isset($price_diler) || !is_numeric($price_diler) || $price_diler == "" || $price_diler == NULL || $price_diler == "0" ){ // проверяем входящую цену 
            $price_diler = "0,00"; // и устанавливаем "0,00" 
        }
        if(!isset($price_roznica) || !is_numeric($price_roznica) || $price_roznica == "" || $price_roznica == NULL || $price_roznica == "0" ){ // проверяем рекомендованую цену 
            $price_roznica = "0,00"; // и устанавливаем "0,00" 
        }

        if($price_diler == "0,00" || $price_diler == "0.00"){
            $price_final = "0,00";
        }
        else{

            $nadbavka = Price::getPercentNadbavki($ddp, $price_diler); // формируем надбавку в зависимости от цены

            if($ddp == 0){ // Если товар по входу в уе
            
                $price_proverka = Price::priceUsdToUah($price_diler); // переводим входящую цену в грн 
                if($price_roznica <= $price_proverka){ // Если рекомендованная цена меньше или равна входной 
                    $price_final = $price_proverka + $nadbavka; // конечная цена будет равна входной цене + надбавка
                }
                else{
                    if($monitor == 1){ // если поставщик мониторит цены
                        $price_final = $price_roznica; //конечная цена будет равна рекомендованой
                    }
                    else{
                        $price_final = $price_roznica + $nadbavka; // конечная цена будет равна рекомендованная + надбавка
                    }
                }
            }
            else{ // если цена в грн
                if($price_roznica <= $price_diler){ // если рекомендованная цена меньше или равна входящей
                    $price_final = $price_diler + $nadbavka; // конечная цена будет равна входящей + надбавка
                }
                else{
                    if($monitor == 1){ // если поставщик мониторит цены
                        $price_final = $price_roznica; //конечная цена будет равна рекомендованой
                    }
                    else{
                        $price_final = $price_roznica + $nadbavka; // конечная цена будет равна рекомендованная + надбавка
                    }
                }
                
            }
        }
        return $price_final;
    }

    
///////////////////////////////////    
    
    
    
    

    static function updateAllFields($postavschik)
    {
        $query = "UPDATE `".TABLE_ITEMS."` SET `style`='arch', `volume`='arch' WHERE `postavschik`='{$postavschik}'";
        $res = mysql_query($query);
    }

    static function getOldKodFromDB($val)
    {
        $select="1Cid";
        $from="shop_product";
        $where = "`postavschik` = '{$val}'";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, "", "");
//SYS::varDump($row,__FILE__,__LINE__);
        return $row;
            
    }

    static function newFileAboutEmptyConnect($item_kod,$item_caption)
    {
	$folder = "/home/tov-sov/data/www/mkr.kiev.ua/price/stek/".date("Y_m_d");
	if(!file_exists($folder))
	{
            mkdir($folder, 0755);		    
	}
	$file_new = "{$folder}/new_items.html";
        if(!file_exists($file_new))
	{
            $fn = fopen($file_new, "w");		    
	}
        else
        {  
	    $fn = fopen($file_new, "a");
        }
        fwrite($fn, "<div style='border:1px solid #eee;padding:5px;'><a href='http://mkr.kiev.ua/cms/?mod=shop&com=product&prodid={$item_kod}' target='_blank'>{$item_kod}</a> - {$item_caption}</div><div style='height:5px'></div>");
        
        fclose ($fn);
    }


    
}

?>
