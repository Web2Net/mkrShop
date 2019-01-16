<?
class Works{
    static function admWorks(){
/*	
SYS::varDump($_POST, __FILE__, __LINE__, "POST"); 

if($_POST !== ""){
	$f = array();
	foreach($_POST as $pk => $pv){
		$_SESSION['fdffd'] = $f[$pk] = $pv;
	}
} 
*/      

        
        Works::getWorksYear($_GET['year']); // Загоняем в сессию год. Либо текущий, либо какой выбрал юзер при фильтре заявок

	    include (SITE_PATH . "/cms/inc/eval.php");
        $tpl_item = new AdmModTpl;

// Удаление файла..	        
        if(isset($_POST['del_file'])){
            Dir::deleteFile($_POST['del_file']);
        }
// /Удаление файла..


        if(isset($ext) && $ext == "ajax"){
	        if(isset($_FILES["file"]) && trim($_FILES["file"]["name"]) != ""){	
                $mess = $_FILES["file"]["name"];
                $testName = explode( ".",$_FILES["file"]["name"] );
                $file_name = $id.".".$testName[1];
                $mess = Work::loadFile($_FILES["file"]);
                if($mess == "OK"){
	                $file_dir = "/cms/work/doc/";
                    $GLOBALS['_RESULT'] = array(
                                                "file" => $file_dir.$file_name,
                                                "mess" => $mess,
                                                ); 
                }
            }
        }
        else{
            if(isset($_POST['works_massiv_action']) && $_POST['works_massiv_action'] !== ""){ // Передача массива id-шек списка работ (works_list.tpl.htm)
		        $works_list = $_POST['works_list'];
		        $works_today = date("Y-m-d");
		        $works_author = $_SESSION['user_login'];
                foreach($works_list as $works_k => $works_val){
		            $table="works";
            
                    if($_POST['works_massiv_action'] == "printCheckBox"){
			            $com = "print";
			            $print_variant = "checked";
                    }
                    else{ // Подвязка списка работ под конкреного инженера (юзера)
                        if($_POST['works_massiv_action'] == "alex" || $_POST['works_massiv_action'] == "ssergey" || $_POST['works_massiv_action'] == "rsergey" || $_POST['works_massiv_action'] == "web2net" || $_POST['works_massiv_action'] == "irina" || $_POST['works_massiv_action'] == "slyfox"){
			                    $arr_value['ingener'] = $_POST['works_massiv_action'];
			                    $arr_value['responsible_ingener'] = $works_today." ".$works_author;
			            }
			            else{ // Изменение статуса списка работ (сделано, оплачено, отгружено..)
			                $arr_value[$_POST['works_massiv_action']] = "Y";
			                $arr_value['date_'.$_POST['works_massiv_action']] = $works_today." ".$works_author;
			            }
                        
     	                $where['id']=$works_val;
                        $db = new mysql;
                        $res = $db->updateSQL ($table, $arr_value, $where);
		            }
	            }
            }

	    if($com == "view"){
	        
            $now_year = date("Y");
            $now_month = date("m");
            $now_date = date("d");

            if($type == "my_works" && isset($ingener) && $ingener !== ""){
                if($ingener == "mkr"){
                    $row=Works::getList("`archiv` = 'N' AND `trash` = 'N'");
                }
                else{
                    $row=Works::getList("(`ingener` = '".$ingener."' AND `responsible_ingener` <> '' AND `trash` = 'N') AND (`archiv` = 'N' AND `trash` = 'N')");   
                }
            }

            if($type == "my_works" && isset($ingener) && $ingener !== ""){
                $_SESSION['ingener'] = $ingener;
            }
            if(!isset($_SESSION['ingener']) || $_SESSION['ingener'] == ""){
                $_SESSION['ingener'] = "mkr";
            }
	        
            if(isset($_SESSION['ingener']) && $_SESSION['ingener'] == "mkr"){
	            $ingener_privyazka = "";
	        }
	        else{
		        $ingener_privyazka = " AND `ingener` = '".$_SESSION['ingener']."'";
	        }
				
            if($type == "all"){$row=Works::getList("`archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "nworks"){$row=Works::getList("`zdelano` = 'N' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "yworks"){$row=Works::getList("`zdelano` = 'Y' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "ydoc"){$row=Works::getList("`doc` = 'Y' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "ndoc"){$row=Works::getList("`doc` = 'N' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "sn"){$row=Works::getList("`sn` <> '' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "trash"){$row=Works::getList("`trash` = 'Y'");}
            if($type == "nal_y"){$row=Works::getList("`nal` = 'Y' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "nal_n"){$row=Works::getList("`nal` = 'N' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "pay_n"){$row=Works::getList("`pay` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "n_otgryzka"){$row=Works::getList("`otgryzka` = 'N' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "prioritet"){$row=Works::getList("`prioritet` = 'Y' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "srochno_y"){$row=Works::getList("`srochno` = 'Y' AND `doc` = 'N' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");}
            if($type == "archiv"){
                if(isset($_GET['year']) && $_GET['year'] !== ""){
                    $archiv_year = " AND `date_create` LIKE '%{$_GET['year']}%'";
                }
                else{
                    $archiv_year = "";
                } 

                $row=Works::getListArchiv("`archiv` = 'Y' {$archiv_year}");
            }
			if($type == "month"){
                $row=Works::getList("`month_create` = '".$year."-".$month_n."' AND `archiv` = 'N' AND `trash` = 'N'".$ingener_privyazka."");
            }

// Поиск по Клиенту	
            if(isset($_GET['client'])){			
		        $get_client = Works::setClientName($_GET['client']);
	        }
	        
            if($type == "client"){
                $row = Works::clientSearch($get_client);
            }
// /Поиск по Клиенту	              
            /*
                        if($type == "calendar"){
                            $calend = explode(" ",$calendar_date);
                            if(strlen($calend[0]) == 1){
                                $calend[0] = "0".$calend[0];
                            }
                            $d = $calend[0]; $m = $calend[1]; $y = $calend[2];
                            $cal_date = $y."-".$m."-".$d;
                            
                            $calend_1 = explode(" ",$calendar_date_1);
                            if(strlen($calend_1[0]) == 1){
                                $calend_1[0] = "0".$calend_1[0];
                            }
                            $d_1 = $calend_1[0]; $m_1 = $calend_1[1]; $y_1 = $calend_1[2];
                            $cal_date_1 = $y_1."-".$m_1."-".$d_1;
                            
                            $row=Works::getList("`date_create` = '{$cal_date}'");
                        } 
            */               
            
            $tpl_item->assign('listing',$row);

            if($type == "archiv"){
	            $c_cont=$tpl_item->get("works-archiv-list");
	        }  
            else{
	            $c_cont=$tpl_item->get("works-list");
	        } 
				

        }
        elseif($com == "print"){ // Печать
	        if($print_variant == "checked"){ // Печать выделенных (checkbox) заявок
                $type = "my_works";
		        $com = "print";
		        $_SESSION['display'] = "print";
		        $ingener = $_SESSION['user_name'];
		        $display = "print";
		        $arr_id = $works_list;
					
		        foreach($arr_id as $id_k => $id_v){
	                $arrPrintChecked[] = Works::getList("`id` = '{$id_v}'");
                }					  
		        $tpl_item->assign('works_print_list',$arrPrintChecked);	
                    $c_cont = $tpl_item->get("works-print-checkBox");
	        }
	        if($print_variant == "otchet"){
		        $row=Works::getList("(`ingener` = '".$ingener."' AND `responsible_ingener` <> '' AND `trash` = 'N' AND `archiv` = 'N') AND (`zdelano` = 'Y' OR `otgryzka` = 'Y')");
				
		        $tpl_item->assign('works_print_list',$row);	
                $c_cont=$tpl_item->get("works-print-otchet");
	        }
	        if($print_variant == "begunok"){
		        $row=Works::getList("(`ingener` = '".$ingener."' AND `responsible_ingener` <> '' AND `trash` = 'N') AND (`zdelano` = 'N' OR `otgryzka` = 'N')");
				
		        $tpl_item->assign('works_print_list',$row);	
                $c_cont=$tpl_item->get("works-print-begunok");
	        }
	    }
        elseif($com=="add"){
	        $row=Works::getWork($id);
            $tpl_item->assign('art_data',$row);
            if($type == "duble"){
	           $c_cont=$tpl_item->get("works-add-edit-duble"); // Создает новую запись на основании существующей, меняя id и дату
	        }
	        else{
	            $c_cont=$tpl_item->get("works-add-edit");
		    }
        }
        elseif($com=="edit"){
	        $row=Works::getWork($id);
            $tpl_item->assign('art_data',$row);
            $c_cont=$tpl_item->get("works-add-edit");	
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
	           //$arr_value = Works::clientData($arr_value["client"]);



	           $is_client = mysql::checkUniqRow("user_item", "short_caption", $arr_value["client"]); // Проверяем на уникальность "Кодового Имени Клиента" (short_caption) в табл. user_item
//exit("update");							
	            if(!isset($is_client) || $is_client == NULL){ // Если совпадение не обнаружено
	                Works::addNewClientByWorks($arr_value["client"]); // Добавляем нового Клиента в табл. user_item
		            $arr_value['client_id'] = mysql_insert_id(); // Получаем ID нового клиента
	            }
	            else{  // Если совпадение обнаружено
	                $client_is = Works::getIdClientByShortCaption($arr_value["client"]);  // Получаем ID существующего клиента
		            $arr_value['client_id'] = $client_is['id']; // id-шка клиента
                    $arr_value['client_edrpoy'] = $client_is['edrpoy']; // ЕДРПОУ клиента
	            }
	            
	        }


// /Работа с БД Клиентов клиента
            
// $content_letter = $arr_value['client']."<br />".$arr_value['content']."<br />".$arr_value['neispravnost'];             

            $arr_value['date_create']=isset($arr_value['date_create']) && $arr_value['date_create']!=""?$arr_value['date_create']:date("Y-m-d")." ".$_SESSION['user_login'];
            



            if(isset($_POST['form__prioritet'])){            
	    	    $arr_value['prioritet'] = Text::checkBoxProcess($arr_value['prioritet']);
		        $arr_value['date_prioritet'] = date("Y-m-d")." ".$_SESSION['user_login'];
// Works::sendSimplyMail($arr_value['id'],"1",$content_letter);
		    }
		    if(isset($_POST['form__zdelano'])){ 
		        $arr_value['zdelano'] = Text::checkBoxProcess($arr_value['zdelano']);
		        $arr_value['date_zdelano'] = date("Y-m-d")." ".$_SESSION['user_login'];
//Works::sendSimplyMail($arr_value['id'],"1",$content_letter);
            }
		    if(isset($_POST['form__doc'])){ 
		        $arr_value['doc'] = Text::checkBoxProcess($arr_value['doc']);
		        $arr_value['date_doc'] = date("Y-m-d")." ".$_SESSION['user_login'];
//Works::sendSimplyMail($arr_value['id'],"2",$content_letter);
		    }
		    if(isset($_POST['form__srochno'])){ 
		        $arr_value['srochno'] = Text::checkBoxProcess($arr_value['srochno']);
		        $arr_value['date_srochno'] = date("Y-m-d")." ".$_SESSION['user_login'];
//Works::sendSimplyMail($arr_value['id'],"2",$content_letter);
		    }
		    if(isset($_POST['form__otgryzka'])){ 
		        $arr_value['otgryzka'] = Text::checkBoxProcess($arr_value['otgryzka']);
 		        $arr_value['date_otgryzka'] = date("Y-m-d")." ".$_SESSION['user_login'];
//Works::sendSimplyMail($arr_value['id'],"3",$content_letter);
            }
            if(isset($_POST['form__doci_zakriti'])){ 
		        $arr_value['doci_zakriti'] = Text::checkBoxProcess($arr_value['doci_zakriti']);
 		        $arr_value['date_doci_zakriti'] = date("Y-m-d")." ".$_SESSION['user_login'];
//Works::sendSimplyMail($arr_value['id'],"3",$content_letter);
            }
		    if(isset($_POST['form__pay'])){ 
		        $arr_value['pay'] = Text::checkBoxProcess($arr_value['pay']);
		        $arr_value['date_pay'] = date("Y-m-d")." ".$_SESSION['user_login'];
//Works::sendSimplyMail($arr_value['id'],"4",$content_letter);
            }
		    if(isset($_POST['form__archiv'])){ 
		        $arr_value['archiv'] = Text::checkBoxProcess($arr_value['archiv']);
		        $arr_value['date_archiv'] = date("Y-m-d")." ".$_SESSION['user_login'];
//Works::sendSimplyMail($arr_value['id'],"4",$content_letter);
            }
//SYS::varDump($arr_value,__FILE__,__LINE__);
            
            $table="works";
           
            if($arr_value['id']!=""){
/*           
                if($arr_value['zdelano'] == ""){$arr_value['zdelano'] = "N"; $arr_value['date_zdelano'] = ""; Works::sendSimplyMail($arr_value['id'],"-1");}
                if($arr_value['doc'] == ""){$arr_value['doc'] = "N"; $arr_value['date_doc'] = ""; Works::sendSimplyMail($arr_value['id'],"-2");}
                if($arr_value['otgryzka'] == ""){$arr_value['otgryzka'] = "N"; $arr_value['date_otgryzka'] = ""; Works::sendSimplyMail($arr_value['id'],"-3");}
                if($arr_value['pay'] == ""){$arr_value['pay'] = "N"; $arr_value['date_pay'] = ""; Works::sendSimplyMail($arr_value['id'],"-4");}
 */           
//unset($arr_value['ingener']);
	            $where['id']=$arr_value['id'];

                $db = new mysql;
                $res = $db->updateSQL ($table, $arr_value, $where);
            }
            else{
                $db = new mysql;
		        $arr_value['ingener'] = $_SESSION['user_login'];
		        $arr_value['responsible_ingener'] = date("Y-m-d")." ".$_SESSION['user_login'];
		        $arr_value['month_create'] = date("Y-m");
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
	        $from="works";	
            $where['id']=$id;	
            $db = new mysql;
            $res = $db->deleteSQL ($from, $where);
            $loc_url=str_replace("com=delete","com=view",PAGE_URL);
            $loc_url=$loc_url."&type=all&upd=ok";
//Works::sendSimplyMail($id,"-0");
//header("Location: ".$loc_url."");
        }
        elseif($com == "archiv" || $com == "otgryzka" || $com == "doci_zakriti" || $com == "doc" || $com == "doci_email" || $com == "pay" || $com == "zdelano" || $com == "nal" || $com == "viezd" || $com == "srochno" || $com == "prioritet" || $com == "trash"){
		    if($resultat == "y"){
                $arch[$com] = "Y";

 
///////////////////// NEW Паровозик /////////////////////////    
/*
Что-бы не застаивались выполненные заявки с невыписанными документами, при переводе статуса заявки в "выполнена", чухаем все базу на наличие выполненных но не выписанных заявок. Поиск идет по ЕДРПОУ клиента.. Если таковые есть, то переводим их статус в "Срочно на выписку"..
*/  
$id_zayavki = $_GET['id'];
$client_edrpoy = Works::getEdrpoyByWorkId($id_zayavki); // Получаем ЕДРПОУ заказчика по id-заявки
Works::parovozik($work_data['client'], $client_edrpoy, $id_zayavki); 

///////////////////// /NEW Паровозик /////////////////////////  


             
                }
		        if($resultat == "n"){
                    $arch[$com] = "N";
                }
             


		        $table="works";
                $where['id']=$id;
            
                if($com !== "nal" && $com !== "viezd"){
                    $arch['date_'.$com] = date("Y-m-d")." ".$_SESSION['user_login'];
                }

//$work_datas = Works::getWork($_GET['id']); // Получаем данные заявки по id-заявке
//$clnt_name = Works::getClientName($work_datas['client_id']);

                $arr_up_do_do = Works::getWork($id); // Выборка данных заявки до апдейта для записи в лог-файл
 
                $db = new mysql;
                $res = $db->updateSQL ($table, $arch, $where);	// Апдейтим заявку

                $arr_up_do_posle = Works::getWork($id); // Выборка данных заявки после апдейта для записи в лог-файл

                $raznica = array_diff_assoc($arr_up_do_posle, $arr_up_do_do); // Сравнение двух массивов
                foreach($raznica as $k => $v){
                    // Формируем строку для записи в лог-файл
                    $str = date("Y-m-d H:i:s") . "||" . $_SESSION['user_login'] . "||" . "Update" . "||" .  "Заявка № $id (" . $clnt_name . ")" . "||" . $k . "=" . $v . "\r\n";
                }
                Auth::writeLog($str); // Дописываем в конец лог-фала ($_SESSION['user_login']_do.log)

                header("Location: ".PAGE_REF."");
            }
            else{
                $c_cont=$tpl_item->get("works-list");
            }
        }
//SYS::varDump($_SESSION['ingener'],__FILE__,__LINE__,"SESSION");			
        return $c_cont;
    }


///////////////////////////////////////// CLIENT ///////////////////////////////////
    function getClientData($cl_id = "", $cl_edrpoy = "", $cl_name = "", $works_id = ""){
        
        if($cl_id !== ""){
            $clientDatas = Works::getClientById($cl_id);
        }
        elseif($cl_edrpoy !== ""){
            $clientDatas = Works::getClientByEdrpoy($cl_edrpoy);
        }
        elseif($cl_name !== ""){
            $clientDatas = Works::getClientByName($cl_name);
        }
        elseif($works_id !== ""){
            $clientDatas = Works::getClientByWorkId($works_id);
        }
        else{
            $clientDatas = "Нет исходных данных для выборки данных клиента";
        }
        return $clientDatas;
    }

    static function getClientById($id){ // Получаем данные клиента по его id
        $select = "";
        $from = "user_item";
        $where = "`id` = '{$id}'";
        $sortby = "";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row;
    }
    static function getClientByEdrpoy($edrpoy){ // Получаем данные клиента по его ЕДРПОУ
        $select = "";
        $from = "user_item";
        $where = "`edrpoy` = '{$edrpoy}'";
        $sortby = "";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row;
    }
    static function getClientByName($name){ // Получаем данные клиента по его name
        $select = "";
        $from = "user_item";
        $where = "`caption` = '{$name}'";
        $sortby = "";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row;
    }
//////////////////////////////////// /CLIENT //////////////////////////////////////////    

    static function getWorksYear($works_year){
    	if(isset($works_year) && $works_year !== ""){
            $_SESSION['works_year'] = $works_year;
        }
        else{
            $_SESSION['works_year'] = date("Y");
        }
    }

    static function setClientName($client){
    	return $client = $client;
    }

    static function clientSearch($get_client){
    	return $row = Works::getList("`client` LIKE '%{$get_client}%' OR `id` LIKE '%{$get_client}%'");
    }
/*
    static function clientData($client]){
    	$is_client = mysql::checkUniqRow("user_item", "short_caption", $client); // Проверяем на уникальность "Кодового Имени Клиента" (short_caption) в табл. user_item
    	if(!isset($is_client) || $is_client == NULL){ // Если совпадение не обнаружено
            Works::addNewClientByWorks($client); // Добавляем нового Клиента в табл. user_item
            $arr_value['client_id'] = mysql_insert_id(); // Получаем ID нового клиента
        }
        else{  // Если совпадение обнаружено
            $client_is = Works::getIdClientByShortCaption($client);  // Получаем ID существующего клиента
            $arr_value['client_id'] = $client_is['id']; // id-шка клиента
            $arr_value['client_edrpoy'] = $client_is['edrpoy']; // ЕДРПОУ клиента
        }
        return $arr_value[];
    }
*/
    static function getClientName($id){
    	$select="short_caption";
        $from="user_item";
        $where = "`id` = '{$id}'";
        $sortby="";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row,__FILE__,__LINE__,"client_name");
        return $row;
    }

    static function getUploadFilesById($id){
        $item_dir = "/userfiles/works/";
        $upload_dir = SITE_PATH.$item_dir;
        $doc_dir = $id;
        $full_dir = $upload_dir.$doc_dir;

        $dir  = $full_dir;
        $files = scandir($dir); // Получаем доки, если есть, по id-заявки
        foreach ($files as $file){
            if($file == "." || $file == ".."){}
            else{
                $info = pathinfo($file);
                $filename[] = $info['basename'];
            }
        }
        return $filename;
    }

    static function getEdrpoyByWorkId($work_id){ // // Получаем ЕДРПОУ заказчика по id-заявки
        $work_data = Works::getWork($_GET['id']); // Получаем данные заявки по id-заявке

        if($work_data['client_edrpoy'] !== "" && $work_data['client_edrpoy'] !== "0"){ // Если поле client_edrpoy заполнено верно 
            $client_edrpoy  =  $work_data['client_edrpoy'];
        }
        else{ // Если поле client_edrpoy НЕзаполнено
            $zakazchik = Works::getClients($work_data['client_id']); // Получаем данные клиента по client_id из таблицы user_item
            if($zakazchik['edrpoy'] !== "" && $zakazchik['edrpoy'] !== "0"){ // Если у клиента заполнено полу edrpoy
                $client_edrpoy  =  $zakazchik['edrpoy']; // Выковыриваем ЕДРПОУ 
            }
            else{ // Если НЕТ
                $client_edrpoy = "";
            }
        }
        return $client_edrpoy;
    }

/*
Что-бы не застаивались выполненные заявки с невыписанными документами, при переводе статуса заявки в "выполнена", чухаем все таблицу works на наличие выполненных, но не выписанных заявок. 
По id-заявки получаем ЕДРПОУ клиента из таблицы user_item.. Затем в таблице works ищем заявки по ЕДРПОУ клиента.. Если таковые есть, то переводим их статус "ОЧЕНЬ срочно на выписку"..
*/ 
    static function parovozik($client_name, $client_edrpoy, $id_zayavki){
    if($client_edrpoy !== ""){
// Получаем лист работ сделанных работ c невыписанными документами и без отметки "ОЧЕНЬ cрочно на выписку" по ЕДРПОУ клиента. Только безнал.        
//        $works_list_by_edrpoy = Works::getWorksByEDRPOY("`client_edrpoy`='" . $client_edrpoy . "' AND `zdelano`='Y' AND `nal`='N' AND `doc`='N' AND `srochno` <> 'YY' AND `id`<>'" . $id_zayavki . "'");

// Получаем лист работ сделанных работ c невыписанными документами  по ЕДРПОУ клиента. Только безнал.
        $works_list_by_edrpoy = Works::getWorksByEDRPOY("`client_edrpoy`='" . $client_edrpoy . "' AND `nal`='N' AND `doc`='N' AND `trash` <> 'Y' AND `srochno` <> 'YY' AND `id`<>'" . $id_zayavki . "'");

// Если кол-во заявок больше или равно 2, меняем их статус на "ОЧЕНЬ cрочно на выписку"        
        if(count($works_list_by_edrpoy) >= 2){ 
            foreach($works_list_by_edrpoy as $ke=>$va){
                $work_id = $va['id'];
 
                $table = "works"; 
                $da['date_srochno'] = date("Y-m-d") . " " . $_SESSION['user_login'] . " Локомотивчик";
                $da['srochno'] = "YY";
                $da['client_edrpoy'] = $client_edrpoy;
                $where['id'] =  $work_id;

                $parovozik_id .= $work_id . ", "; 

                mysql::updateMysql($table, $da, $where); 
            }
// В текущей заявке тоже меняем статус на "ОЧЕНЬ cрочно на выписку"           
            $table = "works"; 
            $da['date_srochno'] = date("Y-m-d") . " " . $_SESSION['user_login'] . " Локомотивчик";
            $da['srochno'] = "YY";
            $da['client_edrpoy'] = $client_edrpoy;
            $where['id'] =  $id_zayavki;

            mysql::updateMysql($table, $da, $where);
            
            Works::sendSimplyMail($parovozik_id,"1",$work_data['client']);

            header("Location: ".PAGE_REF."");
        }
    }
    else{
        if($work_data['nal'] == "N"){
            Works::sendSimplyMail($id_zayavki,"0",$work_data['client']);
        }    
    }
}

    static function getList_Zdelano_Y($var){
/*      
        $query = "SELECT * FROM `works` 
              LEFT JOIN `user_item` ON works.client_id=`user_item`.id 
              WHERE ".$var." ORDER BY works.id DESC";
*/            
        $query = "SELECT * FROM `works` 
              LEFT JOIN user_item ON user_item.id=works.client_id 
              WHERE ".$var."";
              
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
    
        while ($row = mysql_fetch_assoc($res))
        {
               $list_works[] = $row;
        }
//SYS::varDump($list_works,__FILE__,__LINE__,"getList2()");    
        return $list_works;
    }
    
    static function getWorksByEDRPOY($var)
    {
        $select="";
        $from="works";
        //$where["parent_id"]=$parent;
        $where = "{$var}";
//        $sortby="`id` LIMIT 2";
        $sortby="`id`";
        
        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
        
//SYS::varDump($row,__FILE__,__LINE__,"getList()");
        return $row;       
    }
    
    static function getList($var)
    {
        $select="";
        $from="works";
        //$where["parent_id"]=$parent;
        $where = "{$var}";
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

    static function getListClient($var){
        $select="";
        $from="user_item";
        //$where["parent_id"]=$parent;
        $where = "{$var}";
        $sortby="`id` DESC";
        
        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
        
SYS::varDump($row,__FILE__,__LINE__,"getList()");
        return $row;       
    }

    static function getListArchiv($var)
    {
        $select = "id,date_create,client,client_id,content,nal";
        $from="works";
        //$where["parent_id"]=$parent;
        $where = "{$var}";
        $sortby="`id` DESC";
        

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
		$query = "SELECT * FROM `works` 
              LEFT JOIN user_item ON user_item.id=works.client_id 
              WHERE ".$var."";
			  
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
	
	    while ($row = mysql_fetch_assoc($res))
        {
        	   $list_works[] = $row;
        }
SYS::varDump($list_works,__FILE__,__LINE__,"getList2()");    
        return $list_works;
	}

    
    
    static function getWork($id)
    {
        $select="";
        $from="works";
        $where = "`id` = '{$id}'";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, "");
//SYS::varDump($row);
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
	
	static function getIdClientByShortCaption($val){ // ID Юзеров по имени
/*    
        $query = "SHOW COLUMNS FROM user_item;";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
        while ($row = mysql_fetch_assoc($res)){
               $fields_names[] = $row;
        }
        foreach($fields_names as $field => $field_name){
//            echo $field_name['Field'] . "<br>";
        }
SYS::varDump($fields_names,__FILE__,__LINE__,"getIdUserByAnySing"); 
*/       

        $select="";
        $from="user_item";
        $where = "`short_caption` LIKE '%{$val}%' OR `id` LIKE '%{$val}%'";
        //$sortby="`short_caption`";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
SYS::varDump($row,__FILE__,__LINE__,"users_id-s");
        return $row[0];
    }
	
	static function getClientList($caption) // Выборка клиентов по именам, названиям
    {
        $select="";
        $from="works";
        $where = "`client` LIKE '%{$caption}%'";
        //$sortby="`client`";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
//SYS::varDump($row);
        return $row[0];
    }
    
    static function getWorkListByClientID($id){ // Выборка 
    
        $select="";
        $from="works";
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
	    $error.="Проблема с загрузкой файла° $name<br>";
            switch($arr['error'])
            {
                case 1: $error.="Размер файла больше возможного<br>"; break;
                case 2: $error.="Размер файла больше обозначенного в форме<br>"; break;
                case 3: $error.="Загружена только часть файла<br>"; break;
                case 4: $error.="Файл не загружен<br>"; break;
            }
            return false;
        }

        $testName = explode( ".",$arr["name"] );
        $cur=array("jpg","bmp","gif","png");
        if($testName[1]!="jpg")
        {
            $mess="Проблема: Файл ".$arr["name"]." не разрешённый тип (jpg, bmp, gif, png)";
            return $mess;
        }
        if($arr['type']=="")	
        {
            $mess="Проблема: Файл не файл изображения:".$arr['type']."<br>";
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
    
    static function sendSimplyMail($id,$mess,$cont){
        $to  = "Виталий <vitalyyou@gmail.com>, " ; 
        $to .= "Александр <alex@mkr.com.ua>, " ;
        $to .= "Ирина <irina@mkr.com.ua>, " ; 


        if($mess == "0"){
            $subject = "Заявка № {$id}";
            $title = "У клиента из заявки № {$id} отсутствует ЕДРПОУ";
            $content = "Камрад <strong>{$_SESSION['user_login']}</strong> закончил заявку № <strong>{$id}</strong> и выяснилось, что у Заказчика <strong>{$cont}</strong> отсутствует ЕДРПОУ.<br />Надобно исправить сие упущение..))<br />С уважением, Администрация.";
        }
        if($mess == "1"){
            $subject = "Локомотивчик № {$_GET['id']}";
            $title = "Сработал Локомотивчик по заявке № {$_GET['id']}";
            $content = "Камрад <strong>{$_SESSION['user_login']}</strong> закончил заявку № <strong>{$_GET['id']}</strong> и выяснилось, что у Заказчика <strong>{$cont}</strong> есть невыписанные документы по заявкам №№ {$id}.<br />Надобно исправить сие упущение..))<br />С уважением, Администрация.";
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
