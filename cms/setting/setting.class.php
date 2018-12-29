<?
class Setting
{
    
	function admSetting() {
        include (SITE_PATH."/cms/inc/eval.php");
//$_SESSION['refresh_page']=str_replace("display=","",PAGE_URL);
//SYS::varDump($arr_value['caption'],__FILE__,__LINE__,'AAAAAAAAAAAAAAAAAAAAAAA');	    
		if($com == "change_kurs_usd_nb"){	
		
            $db = new mysql;
	        
			$table = "shop_setting";
			$kurs_usd_nb = str_replace(",", ".", $kurs_usd_nb);
            $arr_value['value'] = $kurs_usd_nb;			
            $where['description'] = "kurs_usd_nb";
			
			$res = $db->updateSQL ($table, $arr_value, $where);		
               
		}
		if($com == "change_kurs_euro_nb"){	
		
            $db = new mysql;
	        
			$table = "shop_setting";
			$kurs_euro_nb = str_replace(",", ".", $kurs_euro_nb);
            $arr_value['value'] = $kurs_euro_nb;			
            $where['description'] = "kurs_euro_nb";
			
			$res = $db->updateSQL ($table, $arr_value, $where);		
        }
		
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	
	static function getKyrsValut($function_name){
        $db = new mysql;
        
        $from="`shop_setting`";
        $where="`description` = '{$function_name}'";
        $row = $db->origSelectSQL("", $from, $where, "", "");
        if($row){
    		return $row['0']['value'];
        }       
        else{
            return FALSE;
        } 
    }
	
	static function setSetting($function_name){
        $db = new mysql;
        
        $from="`cfg_global`";
        $where="`function_name` = '{$function_name}' AND `enable`='1'";
        $row = $db->origSelectSQL("", $from, $where, "", "");
        if($row)
        {
            return TRUE;
        }       
        else
        {
            return FALSE;
        } 
    }
	
	
}
?>