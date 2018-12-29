<?
class Price_minolta
{ 
    static function createTempTable($table,$file,$postavschik){ // Записываем данные из файла во временную таблицу
// Не забыть Sys::deleteEmptyFiles($dir);
//       $file = Dir::isFile($file);

        $fd = fopen($file, "r");
        unset($values);
		
        while (($values = fgetcsv($fd, 524288, ",")) !== FALSE){                                                        
	    		
	     
		
            if(isset($values) && $values !== ""){
                $values = str_replace("`","\"",$values);
                $values = str_replace("'","\"",$values);  
            }
           
/* формат файла скаченного в csv с сайта поставщика
0  - Код	
1  - Наименование	
2  - Цена
3  - Цветник или нет (c/b)	
*/
            $brand = "Konica Minolta";

// Для заливки прайса с тонерами //
/*
            if($values[3] == "b"){
                $category_id = "398"; // Тонер для монохромных
            }else{
                $category_id = "433"; // Тонер для полноцветных
            }
*/
// /Для заливки прайса с тонерами //   

// Для заливки прайса с девелоперами //         
            if($values[3] == "b"){
                $category_id = "435"; // Девелопер для монохромных
            }else{
                $category_id = "434"; // Девелопер для полноцветных
            }
// /Для заливки прайса с девелоперами // 
            
            if(isset($values[0]) && $values[0] !== ""){   //  Код и артикул (одно из полей лишнее, нужно убрать)
                $article = $item_1Cid = str_replace("/", "_", $values[0]);
            }
            if(isset($values[1]) && $values[1] !== ""){   //  Наименование 
                $caption_full = strip_tags(addslashes($values[1]));
                $caption_full = Text::repTN($caption_full);
            }
            if(isset($values[2]) && $values[2] !== ""){   // Цена Дилер (одно из полей лишнее, нужно убрать)
                $values[2]=str_replace(",",'.',$values[2]); 
                $values[2]=preg_replace("/[^x\d|*\.]/","",$values[2]);
                $price_roznica = $price_diler = $values[2]; 
            }
            $p1 = $ddp = "0"; // 0 - цена в валюте, 1 - цена в грн
            $nalichie = "+"; // Наличие
            $seolink = Text::cutStringToSeolink($caption_full);
            $showing = "1";
            $flagman = "1";
            $good_price = "0";
            $sell_out = "0";
            $on_main = "0";
            $meta_t = strip_tags($caption_full);
            $meta_d = "";
            $meta_k = "";
            $print = "1";
            $last_update = "";
            $first_update = date("Y-m-d H:i");
            $showing = "1";
            $showing_admin = "1";




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
                    $in[] = "{$item_1Cid} - {$caption_full} - {$seolink} - {$category_id}";
//Price::newFileAboutEmptyConnect($item_kod,$item_caption);                
                
           

//}   
		}   
//var_dump($arr);
        fclose($fd);
        return $in;
}

////////////////////////////////////////////////////////////////////////////////

    static function getArchItemsFromConstTable($table_const,$table_temp){ // Получение товаров из старого прайса, которых уже нет в новом прайсе. 
    
        $query = "SELECT * FROM {$table_const} WHERE `1Cid` NOT IN (SELECT `1Cid` FROM {$table_temp})"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
        
        while ($row = mysql_fetch_assoc($res))
        {
        	   $items[] = $row;
        }
//SYS::varDump($items,__FILE__,__LINE__);
        return $items;    
    }
   
    static function getExistingItemsFromConstTable($table_const,$table_temp){ // Получение товаров из старого прайса, которые есть и в новом прайсе. (Обновление цен)
    
        $query = "SELECT * FROM {$table_const} WHERE `1Cid` IN (SELECT `1Cid` FROM {$table_temp})"; 
        $res = mysql_query($query);
        mysql::queryError($res,$query);
        
        while ($row = mysql_fetch_assoc($res))
        {
        	   $items[] = $row;
        }
//SYS::varDump($items,__FILE__,__LINE__);
        return $items;    
    }
    
	static function getNewItemsFromTempTable($table_const,$table_temp){ // Получение новых товаров из нового прайса (Добавление новых товаров)
    
        $query = "SELECT * FROM {$table_temp} WHERE `1Cid` NOT IN (SELECT `1Cid` FROM {$table_const})"; 
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
