<?
class Byby
{
    static function admByby(){
		
	include (SITE_PATH."/cms/inc/eval.php");
        $tpl_item = new AdmModTpl;

// Удаление файла..	        
        if(isset($_POST['del_file'])){Dir::deleteFile($_POST['del_file']);}
// /Удаление файла..

//SYS::varDump($_POST,__FILE__, __LINE__, "POST");
        if(isset($ext) && $ext=="ajax"){
	        if(isset($_FILES["file"]) && trim($_FILES["file"]["name"])!= ""){	
                $mess=$_FILES["file"]["name"];
                $testName = explode( ".",$_FILES["file"]["name"] );
                $file_name=$id.".".$testName[1];
                $mess=By::loadFile($_FILES["file"]);
                if($mess=="OK")
                {
	                $file_dir = "/cms/by/doc/";
                        $GLOBALS['_RESULT'] = array(
                                                "file" => $file_dir.$file_name,
                                                "mess" => $mess,
                                                ); 
                }
            }
        }
        else{
            
	        if($com == "view"){
	            if(!isset($_SESSION['ingener']) || $_SESSION['ingener'] == ""){
					$_SESSION['ingener'] = "mkr";
				}
	            if(isset($_SESSION['ingener']) && $_SESSION['ingener'] == "mkr"){
	                $ingener_privyazka = "";
			    }
	            else{
		            $ingener_privyazka = " AND `ingener` = '".$_SESSION['ingener']."'";
	            }
				
                if($type == "all"){
				    $row=Byby::getList();
			    }
//SYS::varDump($row,__FILE__,__LINE__,"Byby");            
				
                $now_year = date("Y");
                $now_month = date("m");
                $now_date = date("d");
            

// Поиск по Клиенту	
                if(isset($_GET['client'])){			
		            $get_client = $_GET['client'];
    	        }
                if($type == "client"){
                    $row=Byby::getList("`client` LIKE '%{$get_client}%' OR `id` LIKE '%{$get_client}%'");
                }
// /Поиск по Клиенту	              
             
                $tpl_item->assign('listing',$row);
			
                $c_cont=$tpl_item->get("byby-list");
        
                }
                elseif($com=="add"){
	                $row=Byby::getByby($id);
                    $tpl_item->assign('art_data',$row);
	                $c_cont=$tpl_item->get("byby-add-edit");
	            }
                elseif($com=="edit"){
	                $row=Byby::getByby($id);
                    $tpl_item->assign('art_data',$row);
                    $c_cont=$tpl_item->get("byby-add-edit");	
//SYS::varDump($c_cont,__FILE__,__LINE__,"c_cont");		   
                }
                elseif($com=="update"){
                    foreach($_REQUEST as $key=>$val){
                        $var = explode("__",$key);
                        if($var['0'] == "form"){
                            $arr_value[$var['1']] = Text::cut($val);
                        }
                    }
		   
// Работа с БД Клиентов клиента
	                if(isset($arr_value["client"]) && $arr_value["client"] !== ""){  // Если прилетело заполненное поле Клиент
	                    $is_client = mysql::checkUniqRow("user_item", "short_caption", $arr_value["client"]); // Проверяем на уникальность "Кодового Имени Клиента" (short_caption) в табл. user_item
							
	                    if(!isset($is_client) || $is_client == NULL){ // Если совпадение не обнаружено
	                        Works::addNewClientByWorks($arr_value["client"]); // Добавляем нового Клиента в табл. user_item
		                    $arr_value['client_id'] = mysql_insert_id(); // Получаем ID нового клиента
	                    }
	                    else{  // Если совпадение обнаружено
	                        $client_is = Works::getIdClientByShortCaption($arr_value["client"]);  // Получаем ID существующего клиента
		                    $arr_value['client_id'] = $client_is['id']; 
	                    }
	               }     
// /Работа с БД Клиентов клиента
           
                  $arr_value['date_in']=isset($arr_value['date_in']) && $arr_value['date_in']!=""?$arr_value['date_in']:date("Y-m-d")." ".$_SESSION['user_login'];
            
       
//SYS::varDump($arr_value,__FILE__,__LINE__);
                  $table="byby";
                  if($arr_value['id']!=""){
                      
//unset($arr_value['creator_in']);
	                  $where['id']=$arr_value['id'];
                      $db = new mysql;
                      $res = $db->updateSQL ($table, $arr_value, $where);
                  }
                  else{
                      $db = new mysql;
//		              $arr_value['ingener'] = $_SESSION['user_login'];
		              $arr_value['date_in'] = date("Y-m-d")." ".$_SESSION['user_login'];
					  
					  $arr_value['date_out'] = date("Y-m-d")." ".$_SESSION['user_login'];
					  
//		              $arr_value['month_create'] = date("Y-m");
                      $id = $db->insertSQL ($arr_value, $table);
//Works::sendSimplyMail($id,"0",$content_letter);	
	             }
//exit(var_dump($_POST));
    		     $loc_url=str_replace("com=update","com=view",PAGE_URL);
                 $loc_url=$loc_url."&type=all&upd=ok";
                 header("Location: ".$loc_url."");

//header("Location: ".PAGE_URL."");
                 }
                 elseif($com=="delete"){
	                 $from="byby";	
                     $where['id']=$id;	
                     $db = new mysql;
                     $res = $db->deleteSQL ($from, $where);
                     $loc_url=str_replace("com=delete","com=view",PAGE_URL);
                     $loc_url=$loc_url."&type=all&upd=ok";
//Works::sendSimplyMail($id,"-0");
//header("Location: ".$loc_url."");
                }
/*            
                $table="byby";
                $where['id']=$id;
            
                $c_cont=$tpl_item->get("byby-list");
*/
            }
//SYS::varDump($_SESSION['ingener'],__FILE__,__LINE__,"SESSION");
			
        return $c_cont;
		
    }
    
    
    static function getList($var)
    {
        $select="";
        $from="byby";
        //$where["parent_id"]=$parent;
        if(isset($var) && $var !== ""){
		    $where = "{$var}";
		}
		else{
			$where = "1=1";
		}
        if($var == "`doc` = 'N' AND `archiv` = 'N'" || $var == "`srochno` = 'Y' AND `doc` = 'N' AND `archiv` = 'N'"){
            $sortby="`client`";
        }
		else{
            $sortby="`id` DESC";
        }

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
        
SYS::varDump($row,__FILE__,__LINE__,"getList()");
        return $row;       
    }
	
	static function getList2($var){
/*		
		$query = "SELECT * FROM `works` 
              LEFT JOIN `user_item` ON works.client_id=`user_item`.id 
              WHERE ".$var." ORDER BY works.id DESC";
*/			  
		$query = "SELECT * FROM `byby` 
              LEFT JOIN user_item ON user_item.id=by.client_id 
              WHERE ".$var."";
			  
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
	
	    while ($row = mysql_fetch_assoc($res))
        {
        	   $list_byby[] = $row;
        }
SYS::varDump($list_byby,__FILE__,__LINE__,"getList2()");    
        return $list_byby;
	}
    
    static function getByby($id)
    {
        $select="";
        $from="byby";
        $where = "`id` = '{$id}'";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, "");
SYS::varDump($row,__FILE__,__LINE__,"getByby()"); 
        return $row[0];       
    }
    
    static function getClients($id)
    {
        $select="";
        $from="user_item";
        $where = "`id` = '{$id}' && `connect` = ';8;'";
        $sortby="`short_caption`";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row[0];
    }
	
	static function getIdClientByShortCaption($val) // 
    {
        $select="";
        $from="user_item";
        $where = "`short_caption` = '{$val}' && `connect` = ';8;'";
        $sortby="`short_caption`";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row[0];
    }
	
	static function getClientList($caption) // Выборка клиентов по именам, названиям
    {
        $select="";
        $from="byby";
        $where = "`client` LIKE '%{$caption}%'";
        //$sortby="`client`";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row);
        return $row[0];
    }
    
    static function getWorkListByClientID($id){ // Выборка 
    
        $select="";
        $from="byby";
        $where = "`client_id`='{$id}'";
        $sortby="`id` DESC";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row);
        return $row;
    }
    
    static function decodeCalendar($str){ 

    $arr = array( 
    'Янв' => '01', 
    'Фев' => '02', 
    'Мар' => '03', 
    'Апр' => '04', 
    'Май' => '05', 
    'Июн' => '06', 
    'Июл' => '07', 
    'Авг' => '08', 
    'Сен' => '09', 
    'Окт' => '10', 
    'Ноя' => '11', 
    'Дек' => '12'
    ); 
    $key = array_keys($arr);
    $val = array_values($arr);
    $transl = str_replace($key,$val,trim($str)); 

    return strtolower($transl); 
    }
    
    function loadFile($arr)
    {
        foreach ($_REQUEST as $key=>$val)
        {
            $str="$".$key."=\"".$val."\";";
            eval($str);
        }

        $error="";

        if($arr['error']>0)
        {
	    $error.="РџСЂРѕР±Р»РµРјР° СЃ Р·Р°РіСЂСѓР·РєРѕР№ С„Р°Р№Р»Р° $name<br>";
            switch($arr['error'])
            {
                case 1: $error.="Р Р°Р·РјРµСЂ С„Р°Р№Р»Р° Р±РѕР»СЊС€Рµ РІРѕР·РјРѕР¶РЅРѕРіРѕ<br>"; break;
                case 2: $error.="Р Р°Р·РјРµСЂ С„Р°Р№Р»Р° Р±РѕР»СЊС€Рµ РѕР±РѕР·РЅР°С‡РµРЅРЅРѕРіРѕ РІ С„РѕСЂРјРµ<br>"; break;
                case 3: $error.="Р—Р°РіСЂСѓР¶РµРЅР° С‚РѕР»СЊРєРѕ С‡Р°СЃС‚СЊ С„Р°Р№Р»Р°<br>"; break;
                case 4: $error.="Р¤Р°Р№Р» РЅРµ Р·Р°РіСЂСѓР¶РµРЅ<br>"; break;
            }
            return false;
        }

        $testName = explode( ".",$arr["name"] );
        $cur=array("jpg","bmp","gif","png");
        if($testName[1]!="jpg")
        {
            $mess="РџСЂРѕР±Р»РµРјР°: Р¤Р°Р№Р» ".$arr["name"]." РЅРµ СЂР°Р·СЂРµС€С‘РЅРЅС‹Р№ С‚РёРї (jpg, bmp, gif, png)";
            return $mess;
        }
        if($arr['type']=="")	
        {
            $mess="РџСЂРѕР±Р»РµРјР°: Р¤Р°Р№Р» РЅРµ С„Р°Р№Р» РёР·РѕР±СЂР°Р¶РµРЅРёСЏ: ".$arr['type']."<br>";
            return $mess;
        }

        //$real=SITE_PATH."/product-image/".$prodid.".".$testName[1];

        $uploaddir = SITE_PATH."/cms/work/doc/";
        $imfile=Text::cirilToLatin($testName[0]).".$testName[1])";
        $smallimfile="small-".$imfile;
        @mkdir($uploaddir);
        $uploadfile = $uploaddir.$imfile;
        $smalluploadfile = $uploaddir.$smallimfile;


    //if (copy($arr['tmp_name'], $uploadfile)){
	    
    //GD::imageResize($uploadfile,$arr['tmp_name'],300,200,85);
    //GD::imageResize($smalluploadfile,$arr['tmp_name'],150,100,85);
    //var_dump($arr);

    return "OK";
    //}
    }
    
    static function sendSimplyMail($id,$mess,$cont)
    {
        $to  = "Виталий <you@mkr.com.ua>, " ; 
        $to .= "Александр <alex@mkr.com.ua>, " ;
//        $to .= "Ирина <irina@mkr.com.ua>, " ; 


        if($mess == "0")
        {
            $subject = "Заявка № {$id}";
            $title = "Создана новая заявка № {$id}";
            $content = "Создана новая заявка № {$id}.<br />{$_SESSION['username']}.<br />{$cont}";
        }
        elseif($mess == "-0")
        {
            $subject = "Заявка № {$id}";
            $title = "Заявка № {$id} УДАЛЕНА";
            $content = "Заявка № {$id} УДАЛЕНА.<br />{$_SESSION['username']}.";
        }
        elseif($mess == "1")
        {
            $subject = "Заявка № {$id}";
            $title = "Заявка № {$id} сделана";
            $content = "Урааа! Закончил работу над заявкой № {$id}.<br />{$_SESSION['username']}.<br />{$cont}";
            $to .= "Ирина <irina@mkr.com.ua>, " ;
        }
        elseif($mess == "-1")
        {
            $subject = "Заявка № {$id}";
            $title = "Заявка № {$id} переведена в рязряд НЕ СДЕЛАНО";
            $content = "Заявка № {$id} переведена в рязряд НЕ СДЕЛАНО.<br />{$_SESSION['username']}.";
        }
        elseif($mess == "2")
        {
            $subject = "Заявка № {$id}";
            $title = "Документы по заявке № {$id} выписаны";
            $content = "Документы по заявке № {$id} выписаны.<br />{$_SESSION['username']}.<br />{$cont}";
        }
        elseif($mess == "-2")
        {
            $subject = "Заявка № {$id}";
            $title = "Документы по заявке № {$id} переведены в рязряд НЕ ВЫПИСАНЫ";
            $content = "Документы по заявке № {$id} переведены в рязряд НЕ ВЫПИСАНЫ.<br />{$_SESSION['username']}.";
        }
        elseif($mess == "3")
        {
            $subject = "Заявка № {$id}";
            $title = "Заявка № {$id} отгружена";
            $content = "Заявка № {$id} отгружена.<br />{$_SESSION['username']}.<br />{$cont}";
        }
        elseif($mess == "-3")
        {
            $subject = "Заявка № {$id}";
            $title = "Заявка № {$id} переведена в рязряд НЕ ОТГРУЖЕНА";
            $content = "Заявка № {$id} переведена в рязряд НЕ ОТГРУЖЕНА.<br />{$_SESSION['username']}.";
        }
        elseif($mess == "4")
        {
            $subject = "Заявка № {$id}";
            $title = "Проплатили заявку № {$id}";
            $content = "Проплатили заявку № {$id}.<br />{$_SESSION['username']}.<br />{$cont}";
        }
        elseif($mess == "-4")
        {
            $subject = "Заявка № {$id}";
            $title = "Оплата заявки № {$id} переведена в рязряд НЕ ОПЛАЧЕНО";
            $content = "Оплата заявки № {$id} переведена в рязряд НЕ ОПЛАЧЕНО.<br />{$_SESSION['username']}.";
        }
        elseif($mess == "5")
        {
            $subject = "Заявка № {$id}";
            $title = "Всем спасибо. Заявка № {$id} отправилась в архив";
            $content = "Всем спасибо. Заявка № {$id} отправилась в архив.<br />{$_SESSION['username']}.<br />{$cont}";
        }
        elseif($mess == "-5")
        {
            $subject = "Заявка № {$id}";
            $title = "Заявка № {$id} отправилась из архива в работу";
            $content = "Заявка № {$id} отправилась из архива в работу.<br />{$_SESSION['username']}.";
        }
        else
        {
            $subject = "{$_SESSION['username']} ковыряется в заявках № {$id}";
            $title = "{$_SESSION['username']} ковыряется в заявках № {$id}";
            $content = "{$_SESSION['username']} ковыряется в заявке № {$id}.";
        }
         

        $message = " 
        <html> 
            <head> 
                <title>{$title}</title> 
            </head> 
            <body> 
                <p>{$content}</p> 
            </body> 
       </html>"; 

       $headers  = "Content-type: text/html; charset=utf8 \r\n"; 
       $headers .= "From: МКР-Сервис. <service@mkr.com.ua>\r\n"; 

       mail($to, $subject, $message, $headers);
    }

	static function getKeyWordsForLiveSearchClients()
    {
		$query = "SELECT id, short_caption FROM `user_item` WHERE `connect` = ';8;'"; // Клиенты модуль Works

        $res = mysql_query($query);
		mysql::queryError($res,$query);
        while ($row = mysql_fetch_assoc($res)){
           $key_words[] = $row;
        }
//SYS::varDump($key_words,__FILE__,__LINE__,"Live_Search");
        return $key_words;	
    }
	
	static function addNewClientByWorks($val){ // Добавление в таблицу user_item нового клиента в категорию Клиенты, через форму Заказа в модуле Works
	    $date_creat = date("Y-m-d H:i:s");
		$query = "INSERT INTO `user_item` (`short_caption`,`connect`,`date`,`ban`) VALUES ('{$val}',';8;','{$date_creat}','1')";

        $res = mysql_query($query);
		mysql::queryError($res,$query);
	}
    
}

?>
