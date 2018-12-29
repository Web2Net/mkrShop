<?php
include_once("item.filter.admin.php");
include_once("tag.filter.admin.php");

include_once("define.filter.admin.php");

define('FILTER_ITEM_TABLE','filter_item');
define('FILTER_ITEM_TABLE_LANG','filter_item_'.$_SESSION['lang']);
define('FILTER_TAG_TABLE','filter_tag');
define('FILTER_TAG_TABLE_LANG','filter_tag_'.$_SESSION['lang']);
define('FILTER_ITEM_IMG_PATH', SITE_PATH."/image/filter/item");
define('FILTER_TAG_IMG_PATH', SITE_PATH."/image/filter/tag");

class Filter {	

function admFilter() {
	


define('MOD_NAME', 'Фильтры');

include (SITE_PATH."/cms/inc/eval.php");

if($type=="tag"){
$c_cont=FilterTag::admTag();	
}
if($type=="item"){
$c_cont=FilterItem::admItem();
}


return $c_cont;
}


}
?>
