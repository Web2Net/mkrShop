<?php
	
include_once("define.shop.site.php");	
	
define('SHOP_ITEM_TABLE','shop_item');
define('SHOP_ITEM_TABLE_LANG','shop_item_'.$_SESSION['lang']);
define('SHOP_TAG_TABLE','shop_tag');
define('SHOP_TAG_TABLE_LANG','shop_tag_'.$_SESSION['lang']);

define('PARAM_ITEM_TABLE','param_item');
define('PARAM_ITEM_TABLE_LANG','param_item_'.$_SESSION['lang']);
define('PARAM_TAG_TABLE','param_tag');
define('PARAM_TAG_TABLE_LANG','param_tag_'.$_SESSION['lang']);

define('SHOP_ITEM_IMG_PATH', "/image/shop/item");
define('SHOP_TAG_IMG_PATH', "/image/shop/tag");

define('SHOP_NAME', NOTE_SHOP);

class Shop{	

    function siteShop(){

    	if(isset($_SERVER['REQUEST_URI'])){
            $seodata = explode("/",$_SERVER['REQUEST_URI']);
            $mod = $seodata[1];
            $tag0 = $seodata[2];
            $tag1 = $seodata[3];
            $tag2 = $seodata[4];    
            $param = $seodata[5];  
            $print = $seodata[6];

        }

        $tpl=new SiteModTpl;

        if(INI::Life('site_shop_tag_list')>100){
            $all_tag_list=Shop::tagListShowLevel();

            INI::SetXXL($all_tag_list,'site_shop_tag_list');
        }
        $all_tag_list=INI::Get('site_shop_tag_list');

        $tpl->assign('all_tag_list',$all_tag_list);

        if($tag0==""){
            $tag0_list=Shop::tagListShowLevel('0');
            $tpl->assign('tag0_list',$tag0_list);
            $c_cont["content"]=$tpl->get("tag0-list");

            $metatitle=SHOP_NAME;
            $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
            $c_cont["meta"]["description"]=SITE_NAME_FULL;
            $c_cont["meta"]["keywords"]=$item_data["meta_k"];
        }
		
	else if($tag0!=="" && $tag1==""){
            $tag0_data=Shop::tagDataSeolink($tag0);
            $tag1_list=Shop::tag1List($tag0_data['id']);
//SYS::varDump($tag1_list,__FILE__,__LINE__,"tag1_list");
            $tpl->assign('tag0_data',$tag0_data);
            $tpl->assign('tag1_list',$tag1_list);
            $c_cont["content"]=$tpl->get("tag1-list");

            $metatitle=$tag1_data["caption"];	
            $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
            $c_cont["meta"]["description"]=$tag1_data["meta_d"];
            $c_cont["meta"]["keywords"]=$item_data["meta_k"];
        }
		
	else if($tag0!=="" && $tag1!=="" && $tag2==""){
			$tag0_data=Shop::tagDataSeolink($tag0);
            $tag1_data=Shop::tagDataSeolink($tag1);
//SYS::varDump($tag1_data,__FILE__,__LINE__,"tag1_data");
            $tag2_list=Shop::tag2List($tag1_data['id']);
//SYS::varDump($tag2_list,__FILE__,__LINE__,"tag2_list");
            $tpl->assign('tag0_data',$tag0_data);
            $tpl->assign('tag1_data',$tag1_data);
            $tpl->assign('tag2_list',$tag2_list);
            $c_cont["content"]=$tpl->get("tag2-list");

            $metatitle=$tag1_data["caption"];	
            $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
            $c_cont["meta"]["description"]=$tag1_data["meta_d"];
            $c_cont["meta"]["keywords"]=$item_data["meta_k"];
        }

        else if($tag0!=="" && $tag1!="" && $tag2!="" && $param==""){
            $tag0_data=Shop::tagDataSeolink($tag0);
	    $tag1_data=Shop::tagDataSeolink($tag1);
	    $tag2_data=Shop::tagDataSeolink($tag2,$tag1);
            $item_list=Shop::itemListShowFlagman($tag2_data['id']);
//SYS::varDump($item_list,__FILE__,__LINE__,"item_list");
            $tpl->assign('tag0_data',$tag0_data);
            $tpl->assign('tag1_data',$tag1_data);
            $tpl->assign('tag2_data',$tag2_data);
            $tpl->assign('item_list',$item_list);

	
            $tpl->assign('item_list',$item_list);
            $c_cont["content"]=$tpl->get("item-list");

            $metatitle=$tag2_data["caption"];
            $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
            $c_cont["meta"]["description"]=$tag2_data["meta_d"];
            $c_cont["meta"]["keywords"]=$item_data["meta_k"];
        }

	else if($param!=""){
            $wa=explode("-",$param);
            $item_id=$wa[0];
           
            if($item_id == "brand"){ // Сортировка по брэнду
            
                $ppp=explode("-",$param);
                $item_brand=$ppp[1];
            
                $tag0_data=Shop::tagDataSeolink($tag0);
	        $tag1_data=Shop::tagDataSeolink($tag1);
	        $tag2_data=Shop::tagDataSeolink($tag2,$tag1);
                $item_list=Shop::itemListShowFlagmanByBrand($tag2_data['id'],$item_brand);
//SYS::varDump($item_list,__FILE__,__LINE__,"item_list");
                $tpl->assign('tag0_data',$tag0_data);
                $tpl->assign('tag1_data',$tag1_data);
                $tpl->assign('tag2_data',$tag2_data);
                $tpl->assign('item_list',$item_list);

	
                $tpl->assign('item_list',$item_list);
                $c_cont["content"]=$tpl->get("item-list");

                $metatitle=$tag2_data["caption"];
                $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
                $c_cont["meta"]["description"]=$tag2_data["meta_d"];
                $c_cont["meta"]["keywords"]=$item_data["meta_k"];
            }
            else{
                $item_data=Shop::itemDataId($item_id);
                $tpl->assign('item_data',$item_data);

                $c_cont["content"]=$tpl->get("item-look");

                $metatitle=$item_data["caption"];
                $c_cont["meta"]["title"]=SITE_NAME." ".RAZDELYALKA." ".$metatitle;
                $c_cont["meta"]["description"]=strip_tags($item_data["meta_d"]);
                $c_cont["meta"]["keywords"]=$item_data["meta_k"];
            }
//SYS::varDump($item_data,__FILE__,__LINE__,"item_data");
        }
        
        if(isset($print) && $print == "print"){
            $_SESSION['print'] = "print";
            $c_cont["content"]=$tpl->get("item-look_print");
        }
        
        return $c_cont;
    }

    static function siteShopMenu(){

        $tpl=new SiteShopTpl;

        $tag0_list=Shop::tagListShowLevel('0');
        $tag1_list=Shop::tagListShowLevel('1');
        $tag2_list=Shop::tagListShowLevel('2');

//include_once("tagzero.multilang.php");
//SYS::varDump($tag0_list,__FILE__,__LINE__,"tag0_list");

        $tpl->assign('tag0_list',$tag0_list);
        $tpl->assign('tag1_list',$tag1_list);
        $tpl->assign('tag2_list',$tag2_list);

        $shop_menu=$tpl->get("tag-menu");

        return $shop_menu;
    }

    static function tagListShowLevel($level=''){
	
        if($level!=""){$levelz="`level`='".$level."'";}else{$levelz="1=1";}

        $query = "SELECT * FROM ".SHOP_TAG_TABLE." 
                  LEFT JOIN ".SHOP_TAG_TABLE_LANG." ON ".SHOP_TAG_TABLE.".id=".SHOP_TAG_TABLE_LANG.".pid 
                  WHERE `showing`='1' AND ".$levelz." ORDER BY `pos`";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
    
	    if (mysql_num_rows($res) > 0){
		    while ($result = mysql_fetch_assoc ($res)){
		        $result["caption"]=stripslashes($result["caption"]);
	            $result["desc_short"]=stripslashes($result["desc_short"]);
	            $result["desc_full"]=stripslashes($result["desc_full"]);
	            $result["meta_t"]=stripslashes($result["meta_t"]);
	            $result["meta_d"]=stripslashes($result["meta_d"]);
	            $result["meta_k"]=stripslashes($result["meta_k"]);
	
		        $itog[] = $result;
		    }
		}
		
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }
//SYS::varDump($arrcat,__FILE__,__LINE__,"Shop::tagListShowLevel");
        return $arrcat;
    } 

    function tag2List($id){
	
        $query = "SELECT * FROM ".SHOP_TAG_TABLE." 
                  LEFT JOIN ".SHOP_TAG_TABLE_LANG." ON ".SHOP_TAG_TABLE.".id=".SHOP_TAG_TABLE_LANG.".pid 
                  WHERE `connect` LIKE '%;".$id.";%' AND `showing`='1' ORDER BY `pos` DESC";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
    
    	if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
								
	            $result["caption"]=stripslashes($result["caption"]);
	            $result["desc_short"]=stripslashes($result["desc_short"]);
	            $result["desc_full"]=stripslashes($result["desc_full"]);
	            $result["meta_t"]=stripslashes($result["meta_t"]);
	            $result["meta_d"]=stripslashes($result["meta_d"]);
	            $result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}
		
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }
//SYS::varDump($arrcat,__FILE__,__LINE__,"tagListShowConnect");
        return $arrcat;
    }    
	
	function tag1List($id){ // для связи тэгов используется поле hit, а не connect (только tag1 -> tag0)
	
        $query = "SELECT * FROM ".SHOP_TAG_TABLE." 
                  LEFT JOIN ".SHOP_TAG_TABLE_LANG." ON ".SHOP_TAG_TABLE.".id=".SHOP_TAG_TABLE_LANG.".pid 
                  WHERE `hit` LIKE '%".$id."%' AND `showing`='1' ORDER BY `pos` DESC";

        $res = mysql_query($query);
        Mysql::queryError($res,$query);
    
    	if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
								
	            $result["caption"]=stripslashes($result["caption"]);
	            $result["desc_short"]=stripslashes($result["desc_short"]);
	            $result["desc_full"]=stripslashes($result["desc_full"]);
	            $result["meta_t"]=stripslashes($result["meta_t"]);
	            $result["meta_d"]=stripslashes($result["meta_d"]);
	            $result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}
		
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }
//SYS::varDump($arrcat,__FILE__,__LINE__,"tagListShowConnect");
        return $arrcat;
    }

    function tagDataSeolink($seolink){

        $query = "SELECT * FROM ".SHOP_TAG_TABLE." 
                  LEFT JOIN ".SHOP_TAG_TABLE_LANG." ON ".SHOP_TAG_TABLE.".id=".SHOP_TAG_TABLE_LANG.".pid 
                  WHERE `seolink`='".$seolink."' LIMIT 1";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
        $result = mysql_fetch_array($res); 
				
	    $result["caption"]=stripslashes($result["caption"]);
	    $result["desc_short"]=stripslashes($result["desc_short"]);
	    $result["desc_full"]=stripslashes($result["desc_full"]);
	    $result["meta_t"]=stripslashes($result["meta_t"]);
	    $result["meta_d"]=stripslashes($result["meta_d"]);
	    $result["meta_k"]=stripslashes($result["meta_k"]);
	
//SYS::varDump($result,__FILE__,__LINE__,"tagDataSeolink");
        return $result;

    }




function itemListShow($tag){ //Выборка всех видимых итемов (show)

    $query = "SELECT * FROM ".SHOP_ITEM_TABLE." 
              LEFT JOIN ".SHOP_ITEM_TABLE_LANG." ON ".SHOP_ITEM_TABLE.".id=".SHOP_ITEM_TABLE_LANG.".pid 
              WHERE `connect` LIKE '%;".$tag.";%' AND `showing`='1' ORDER BY `pos` DESC";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
  //  $row = mysql_fetch_array($res);
		if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
				
	$result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}

		
    if($itog!=NULL){
        foreach($itog as $key=>$val){
            $arrcat[$val["id"]]=$val;
        }
    }
//SYS::varDump($arrcat,__FILE__,__LINE__,"ARRCAT");
    return $arrcat;


}

    function itemListShowFlagman($tag){
	
        $query = "SELECT * FROM ".SHOP_ITEM_TABLE." 
                  LEFT JOIN ".SHOP_ITEM_TABLE_LANG." ON ".SHOP_ITEM_TABLE.".id=".SHOP_ITEM_TABLE_LANG.".pid 
                  WHERE `connect` LIKE '%;".$tag.";%' AND `showing`='1' AND `flagman`='1' ORDER BY `pos` DESC";
        $res = mysql_query($query);
        Mysql::queryError($res,$query);
  //  $row = mysql_fetch_array($res);
		if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
				
	            $result["caption"]=stripslashes($result["caption"]);
	            $result["desc_short"]=stripslashes($result["desc_short"]);
	            $result["desc_full"]=stripslashes($result["desc_full"]);
	            $result["meta_t"]=stripslashes($result["meta_t"]);
	            $result["meta_d"]=stripslashes($result["meta_d"]);
	            $result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}
		
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }

//        $arrcat2 = Shop::sortArrayByPrice($arrcat);

        return $arrcat;

    }
    
    function sortArrayByPrice($array){
        
        return $array;
    }
    
    function itemListShowFlagmanByBrand($tag,$brand){
	
	$brand = str_replace ('%20',' ',$brand);
        $query = "SELECT * FROM ".SHOP_ITEM_TABLE." 
                  LEFT JOIN ".SHOP_ITEM_TABLE_LANG." ON ".SHOP_ITEM_TABLE.".id=".SHOP_ITEM_TABLE_LANG.".pid 
                  WHERE `connect` LIKE '%;".$tag.";%' AND `showing`='1' AND `flagman`='1' AND `brand`='".$brand."' ORDER BY `pos` DESC";

        $res = mysql_query($query);
        Mysql::queryError($res,$query);
  //  $row = mysql_fetch_array($res);
		if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
				
	            $result["caption"]=stripslashes($result["caption"]);
	            $result["desc_short"]=stripslashes($result["desc_short"]);
	            $result["desc_full"]=stripslashes($result["desc_full"]);
	            $result["meta_t"]=stripslashes($result["meta_t"]);
	            $result["meta_d"]=stripslashes($result["meta_d"]);
	            $result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}
		
        if($itog!=NULL){
            foreach($itog as $key=>$val){
                $arrcat[$val["id"]]=$val;
            }
        }
//SYS::varDump($arrcat,__FILE__,__LINE__,"ARRCAT");
        return $arrcat;
    }


static function itemListSpecial($spec_where){
	
$query = "SELECT * FROM ".SHOP_ITEM_TABLE." 
              LEFT JOIN ".SHOP_ITEM_TABLE_LANG." ON ".SHOP_ITEM_TABLE.".id=".SHOP_ITEM_TABLE_LANG.".pid 
              WHERE ".$spec_where." ORDER BY `pos` DESC";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
  //  $row = mysql_fetch_array($res);
		if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
				
	$result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}

		
    if(isset($itog) && $itog!=NULL){
        foreach($itog as $key=>$val){
            $arrcat[$val["id"]]=$val;
        }
    }
	else{$arrcat = NULL;}
//SYS::varDump($arrcat,__FILE__,__LINE__,"ARRCAT");
    return $arrcat;
}

function itemDataId($id){

    $query = "SELECT * FROM ".SHOP_ITEM_TABLE." 
              LEFT JOIN ".SHOP_ITEM_TABLE_LANG." ON ".SHOP_ITEM_TABLE.".id=".SHOP_ITEM_TABLE_LANG.".pid 
              WHERE `id`='".$id."' LIMIT 1";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
    $result = mysql_fetch_assoc($res); 
    
    $result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);

    return $result;
//SYS::varDump($result,__FILE__,__LINE__,"itemDataId");
    
/*	
$select="";
$from=SHOP_ITEM_TABLE;
$where["id"]=$id;

$db = new mysql;
$row = $db->selectSQL($select, $from, $where, "", 1);

return $row[0];
SYS::varDump($row[0],__FILE__,__LINE__,"itemDataId");
*/

}


function paramItemData($param_item_id){
	   
	$query = "SELECT * FROM ".PARAM_ITEM_TABLE." 
              LEFT JOIN ".PARAM_ITEM_TABLE_LANG." ON ".PARAM_ITEM_TABLE.".id=".PARAM_ITEM_TABLE_LANG.".pid 
              WHERE `id`='".$param_item_id."' LIMIT 1";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
    $result = mysql_fetch_assoc($res); 
    
    $result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
//SYS::varDump($result,__FILE__,__LINE__,"paramItemData");
    return $result;
/*	
$select="";
$from="param_item";
$where["id"]=$param_item_id;

$db = new mysql;
$row = $db->selectSQL($select, $from, $where, "", 1);

return $row[0];
SYS::varDump($row[0],__FILE__,__LINE__,"paramItemData");
*/
}

function paramTagData($param_tag_id){

    $query = "SELECT * FROM ".PARAM_TAG_TABLE." 
              LEFT JOIN ".PARAM_TAG_TABLE_LANG." ON ".PARAM_TAG_TABLE.".id=".PARAM_TAG_TABLE_LANG.".pid 
              WHERE `id`='".$param_tag_id."' LIMIT 1";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
    $result = mysql_fetch_assoc($res); 
    
    $result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
//SYS::varDump($result,__FILE__,__LINE__,"paramTagData");
    return $result;

/*
$select="";
$from="param_tag";
$where["id"]=$param_tag_id;

$db = new mysql;
$row = $db->selectSQL($select, $from, $where, "", 1);
SYS::varDump($row[0],__FILE__,__LINE__,"paramTagData");
return $row[0];
*/
}


function paramItemList($tag){

	$query = "SELECT * FROM ".PARAM_ITEM_TABLE." 
              LEFT JOIN ".PARAM_ITEM_TABLE_LANG." ON ".PARAM_ITEM_TABLE.".id=".PARAM_ITEM_TABLE_LANG.".pid 
              WHERE `connect` LIKE '%;".$tag.";%' ORDER BY `pos` DESC";
    $res = mysql_query($query);
    Mysql::queryError($res,$query);
    $result = mysql_fetch_assoc($res); 
    
    if (mysql_num_rows($res) > 0)
		{
			while ($result = mysql_fetch_assoc ($res))
			{
								
	$result["caption"]=stripslashes($result["caption"]);
	$result["desc_short"]=stripslashes($result["desc_short"]);
	$result["desc_full"]=stripslashes($result["desc_full"]);
	$result["meta_t"]=stripslashes($result["meta_t"]);
	$result["meta_d"]=stripslashes($result["meta_d"]);
	$result["meta_k"]=stripslashes($result["meta_k"]);
	
				$itog[] = $result;
			}
		}

		
    if($itog!=NULL){
        foreach($itog as $key=>$val){
            $arrcat[$val["id"]]=$val;
        }
    }
//SYS::varDump($arrcat,__FILE__,__LINE__,"ARRCAT");
    return $arrcat;
/*	
$select="";
$from="param_item";
$where="connect LIKE '%;".$tag.";%'";
$sortby="pos DESC";

$db = new mysql;
$row = $db->origSelectSQL($select, $from, $where, $sortby,"0,70");

if($row!=NULL){foreach($row as $key=>$val){
$arrcat[$val["id"]]=$val;
}}
SYS::varDump($row[0],__FILE__,__LINE__,"paramItemList");
return $arrcat;
*/
}

    static function getBrand($tag_id){
        $query = "SELECT DISTINCT `brand`, `connect`  FROM `shop_item` WHERE `connect` LIKE '%;{$tag_id};%' ORDER BY `brand`";
        $res = mysql_query($query);
		
	mysql::queryError($res,$query);
        while ($row = mysql_fetch_row($res)){
            $brand_list[] = $row;
        }
        return $brand_list;
    } 

    static function getTagIdBySeolink($tag2, $level){
        //$query = "SELECT id FROM `shop_tag` WHERE `seolink` LIKE '%;{$tag2};%' LIMIT 1";
        $select = "id";
        $from=SHOP_TAG_TABLE;
        $where="`seolink` LIKE '%{$tag2}%' AND `level`='{$level}'";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby,"1");
//var_dump($row);
        return $row[0];
    }    


}

class SiteShopTpl extends Tpl{
function SiteShopTpl (){
$this->template_dir = SITE_PATH.'/site/shop/tpl';
}}

?>
