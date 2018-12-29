<?
class Reminder
{
    static function admReminder(){
		
	    include (SITE_PATH."/cms/inc/eval.php");
        $tpl_item = new AdmModTpl;

SYS::varDump($_REQUEST,__FILE__, __LINE__, "POST");
		
        if(isset($ext) && $ext=="ajax"){
	        if(isset($_FILES["file"]) && trim($_FILES["file"]["name"])!= ""){	
                $mess=$_FILES["file"]["name"];
                $testName = explode( ".",$_FILES["file"]["name"] );
                $file_name=$id.".".$testName[1];
                $mess=Reminder::loadFile($_FILES["file"]);
                if($mess=="OK")
                {
	                $file_dir = "/cms/work/doc/";
                        $GLOBALS['_RESULT'] = array(
                                                "file" => $file_dir.$file_name,
                                                "mess" => $mess,
                                                ); 
                }
            }
        }
        else{
            if($com == "view"){
	            
		        $now_year = date("Y");
                $now_month = date("m");
                $now_date = date("d");
                $list = Reminder::getList();
				$tpl_item->assign('art_data',$list);
                $c_cont=$tpl_item->get("reminder-list");
//SYS::varDump($list,__FILE__,__LINE__,"list");
			
            }
            elseif($com == "print"){ // Печать
	            if($print_variant == "checked"){ // Печать выделенных (checkbox) заявок
                    $type = "my_reminder";
		            $com = "print";
		            $_SESSION['display'] = "print";
		            $ingener = $_SESSION['user_name'];
		            $display = "print";
		            $arr_id = $reminder_list;
					
		            foreach($arr_id as $id_k => $id_v){
	                    $arrPrintChecked[] = Reminder::getList("`id` = '{$id_v}'");
                    }					  
		            $tpl_item->assign('reminder_print_list',$arrPrintChecked);	
                    $c_cont=$tpl_item->get("reminder-print-checkBox");
	            }
	        }
            elseif($com=="add"){
	            $row=Reminder::getReminder($id);
                $tpl_item->assign('art_data',$row);
                
	            $c_cont=$tpl_item->get("reminder-add-edit");
		    
            }
            elseif($com=="edit"){
	            $row=Reminder::getReminder($id);
                $tpl_item->assign('art_data',$row);
                $c_cont=$tpl_item->get("reminder-add-edit");	
            }
            elseif($com=="update"){
               foreach($_REQUEST as $key=>$val){
                    $var = explode("__",$key);
                    if($var['0'] == "form"){
                        $arr_value[$var['1']] = Text::cut($val);
                    }
				   if($var['0'] == "poluchatel"){
					   $poluchateli .= $val.";";
					   $poluchatel_email = Reminder::getClients2($val);
					   $poluchateli_emails .= $poluchatel_email['email'].",";
				   }
                }
                $arr_value['date_create']=isset($arr_value['date_create']) && $arr_value['date_create']!=""?$arr_value['date_create']:date("Y-m-d");
                $arr_value['connect'] = ";".$_SESSION['user_id'].";".$poluchateli;
				
				$arr_value['author'] = $_SESSION['user_id'];
				//unset($arr_value['my_id']);
                
                $table="reminder";
                if($arr_value['id']!=""){

	                $where['id']=$arr_value['id'];
                    $db = new mysql;
                    $res = $db->updateSQL ($table, $arr_value, $where);
                }
                else{
                    $db = new mysql;
		            $id = $db->insertSQL ($arr_value, $table);
					
					$content_letter = $arr_value['content'];
					$to = $poluchateli_emails;
//$to = "you@mkr.com.ua,vitalyyou@gmail.com,vitaly@berloga.in.ua,";
//$_SESSION['poluchateli_email_list']	= $to;				
                    Email::sendSimplyMail($id,$to,$content_letter);	
	            }
//exit(var_dump($_POST));
    		    $loc_url=str_replace("com=update","com=view",PAGE_URL);
                $loc_url=$loc_url."&type=all&upd=ok";
                header("Location: ".$loc_url."");

//header("Location: ".PAGE_URL."");
            }
            elseif($com=="delete"){
	            $from="reminder";	
                $where['id']=$id;	
                $db = new mysql;
                $res = $db->deleteSQL ($from, $where);
                $loc_url=str_replace("com=delete","com=view",PAGE_URL);
                $loc_url=$loc_url."&type=all&upd=ok";
//Works::sendSimplyMail($id,"-0");
//header("Location: ".$loc_url."");
            }
            elseif($com=="archiv"){
		        
			$cleverUsersID = Reminder::getArchivById($id);	// Получаем данные ячейки Archiv по $id 
			if($cleverUsersID['archiv'] !== ""){
				$arr_value['archiv'] = $cleverUsersID['archiv'].$_SESSION['user_id'].";";
			}
			else{
			    $arr_value['archiv'] = ";".$_SESSION['user_id'].";";
			}
/*
				if($resultat == "y"){
                    $arr_value['archiv'] = $cleverUsersID['archiv'].";".$_SESSION['user_id'].";";
                }
		        if($resultat == "n"){
                    $arr_value['archiv'] = "N";
                }
*/
				
				$table="reminder";
                $where['id']=$id;

                $db = new mysql;
                $res = $db->updateSQL ($table, $arr_value, $where);	
                header("Location: ".PAGE_REF."");
            }
            else{
                $c_cont=$tpl_item->get("reminder-list");
            }
        }
//SYS::varDump($_SESSION['ingener'],__FILE__,__LINE__,"SESSION");

        return $c_cont;
    }
    
    
    static function getList(){
        $select="";
        $from="reminder";
        if($_SESSION['user_level'] >= "8"){
			$where = "`connect` LIKE '%;%' && `archiv` NOT LIKE '%;{$_SESSION['user_id']};%'";
		}
		else{
		    $where = "`connect` LIKE '%;{$_SESSION['user_id']};%' && `archiv` NOT LIKE '%;{$_SESSION['user_id']};%'";
		}
		$sortby = "`id` DESC";
		
		$db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"getList()");
        return $row;  
	}
	
	static function getStatusForOtherUser($reminder_id, $poluchatel_id){ // Проверка прочитал ли адресат сообщение
        $select="";
        $from="reminder";
        $where = "`connect` LIKE '%;{$poluchatel_id};%' && `archiv` LIKE '%;{$poluchatel_id};%' && `id` = '$reminder_id'";
		
		$db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
        
//SYS::varDump($row,__FILE__,__LINE__,"getList()");
        return $row;  
	}
        
    static function getArchivById($id){ // Получаем поле Archiv по id
        $select="archiv";
        $from="reminder";
        
		$where = "`id` = '$id'";
		        
        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where);
//SYS::varDump($row,__FILE__,__LINE__,"getList()");
        return $row[0];       
    }
	
	static function checkStatusReminder(){
        $select="";
        $from="reminder";
        
        $where = "`connect` LIKE '%;{$_SESSION['user_id']};%' && `archiv` NOT LIKE '%;{$_SESSION['user_id']};%'";
        
        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"getList()");
        return $row;       
    }
	
	
	
	
	
	
	
	static function getList2($var){
		$query = "SELECT * FROM `reminder` 
              LEFT JOIN user_item ON user_item.id=works.client_id 
              WHERE ".$var."";
			  
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
	
	    while ($row = mysql_fetch_assoc($res)){
        	   $list_reminder[] = $row;
        }
//SYS::varDump($list_works,__FILE__,__LINE__,"getList2()");    
        return $list_reminder;
	}
    
    static function getReminder($id){
        $select="";
        $from="reminder";
        $where = "`id` = '{$id}'";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, "");
//SYS::varDump($row);
        return $row[0];       
    }
    
    static function getClients($id){
        $select="";
        $from="user_item";
        $where = "`id` = '{$id}' && `connect` = ';8;'";
        $sortby="`short_caption`";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row[0];
    }
	
	static function getClients2($id){
        $select = "email";
        $from = "user_item";
        
		$where = "`id` = '$id'";
		        
        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where);
//SYS::varDump($row[0],__FILE__,__LINE__,"getClients2");
        return $row[0];
    }
	
	static function getIdClientByShortCaption($val){
        $select="";
        $from="user_item";
        $where = "`short_caption` = '{$val}' && `connect` = ';8;'";
        $sortby="`short_caption`";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row[0];
    }
	
    static function getWorkListByClientID($id){ // Выборка 
    
        $select="";
        $from="reminder";
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
    
    function loadFile($arr){
        foreach ($_REQUEST as $key=>$val){
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
        if($testName[1]!="jpg"){
            $mess="РџСЂРѕР±Р»РµРјР°: Р¤Р°Р№Р» ".$arr["name"]." РЅРµ СЂР°Р·СЂРµС€С‘РЅРЅС‹Р№ С‚РёРї (jpg, bmp, gif, png)";
            return $mess;
        }
        if($arr['type']==""){
            $mess="РџСЂРѕР±Р»РµРјР°: Р¤Р°Р№Р» РЅРµ С„Р°Р№Р» РёР·РѕР±СЂР°Р¶РµРЅРёСЏ: ".$arr['type']."<br>";
            return $mess;
        }

        $uploaddir = SITE_PATH."/cms/reminder/doc/";
        $imfile=Text::cirilToLatin($testName[0]).".$testName[1])";
        $smallimfile="small-".$imfile;
        @mkdir($uploaddir);
        $uploadfile = $uploaddir.$imfile;
        $smalluploadfile = $uploaddir.$smallimfile;
        return "OK";
    //}
    }
    
    static function sendSimplyMail($id,$mess,$cont){
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

		
	static function addNewClientByReminder($val){ // Добавление в таблицу user_item нового клиента в категорию Клиенты, через форму Заказа в модуле Works
	    $date_creat = date("Y-m-d H:i:s");
		$query = "INSERT INTO `user_item` (`short_caption`,`connect`,`date`,`ban`) VALUES ('{$val}',';8;','{$date_creat}','1')";

        $res = mysql_query($query);
		mysql::queryError($res,$query);
	}
    
}

?>
