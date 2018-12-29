<?
//SYS::varDump($_REQUEST,__FILE__,__LINE__,"EVAL");

if(isset($_REQUEST["mod"])){$mod = $_REQUEST["mod"];}
if(isset($_REQUEST["type"])){$type = $_REQUEST["type"];}
if(isset($_REQUEST["com"])){$com = $_REQUEST["com"];}
if(isset($_REQUEST["event"])){$event = $_REQUEST["event"];}
if(isset($_REQUEST["tag"])){$tag = $_REQUEST["tag"];}
if(isset($_REQUEST["id"])){$id = $_REQUEST["id"];}
if(isset($_REQUEST["display"])){$display = $_REQUEST["display"];}
if(isset($_REQUEST["print_variant"])){$print_variant = $_REQUEST["print_variant"];}
if(isset($_REQUEST["caption"])){$caption = $_REQUEST["caption"];}
if(isset($_REQUEST["cmd"])){$cmd = $_REQUEST["cmd"];}
if(isset($_REQUEST["pos"])){$pos = $_REQUEST["pos"];}
if(isset($_REQUEST["connect"])){$connect = $_REQUEST["connect"];}
if(isset($_REQUEST["desc_short"])){$desc_short = $_REQUEST["desc_short"];}
if(isset($_REQUEST["price_diler"])){$price_diler = $_REQUEST["price_diler"];}
if(isset($_REQUEST["package"])){$package = $_REQUEST["package"];} // modSHOP - Используется под кол-во товара на складе
if(isset($_REQUEST["flagman"])){$flagman = $_REQUEST["flagman"];} 
if(isset($_REQUEST["showing"])){$showing = $_REQUEST["showing"];} 
if(isset($_REQUEST["article"])){$article = $_REQUEST["article"];} 
if(isset($_REQUEST["pp1"])){$pp1 = $_REQUEST["pp1"];} 
if(isset($_REQUEST["p1"])){$p1 = $_REQUEST["p1"];} 
if(isset($_REQUEST["p2"])){$p2 = $_REQUEST["p2"];} 
if(isset($_REQUEST["p3"])){$p3 = $_REQUEST["p3"];} 
if(isset($_REQUEST["p4"])){$p4 = $_REQUEST["p4"];}  // modSHOP - используется только в связке с полем поставщик, иф $postavschik=mkr - цена в грн, элс - цена в евро
if(isset($_REQUEST["p5"])){$p5 = $_REQUEST["p5"];}  // modSHOP - используется как неизменная позиция при обновлении прайс-листов
if(isset($_REQUEST["p6"])){$p6 = $_REQUEST["p6"];}  // modSHOP - Используется под "Подарок" к товару
if(isset($_REQUEST["monitor"])){$branch = $_REQUEST["monitor"];} 
if(isset($_REQUEST["branch"])){$branch = $_REQUEST["branch"];} 
if(isset($_REQUEST["brand"])){$brand = $_REQUEST["brand"];} 
if(isset($_REQUEST["gallery"])){$gallery = $_REQUEST["gallery"];} 
if(isset($_REQUEST["desc_full"])){$desc_full = $_REQUEST["desc_full"];} 
if(isset($_REQUEST["seolink"])){$seolink = $_REQUEST["seolink"];} 
if(isset($_REQUEST["meta_t"])){$meta_t = $_REQUEST["meta_t"];} 
if(isset($_REQUEST["meta_k"])){$meta_k = $_REQUEST["meta_k"];} 
if(isset($_REQUEST["meta_d"])){$meta_d = $_REQUEST["meta_d"];} 
if(isset($_REQUEST["cart"])){$cart = $_REQUEST["cart"];} 
if(isset($_REQUEST["level"])){$level = $_REQUEST["level"];} 
if(isset($_REQUEST["parent_tag"])){$parent_tag = $_REQUEST["parent_tag"];} 
if(isset($_REQUEST["hit"])){$hit = $_REQUEST["hit"];} 
if(isset($_REQUEST["on_main"])){$on_main = $_REQUEST["on_main"];} 
if(isset($_REQUEST["sell_out"])){$sell_out = $_REQUEST["sell_out"];} 
if(isset($_REQUEST["good_price"])){$good_price = $_REQUEST["good_price"];} 
if(isset($_REQUEST["first_update"])){$first_update = $_REQUEST["first_update"];} 
if(isset($_REQUEST["last_update"])){$last_update = $_REQUEST["last_update"];} 
if(isset($_REQUEST["ordering"])){$ordering = $_REQUEST["ordering"];} 
if(isset($_REQUEST["filter_connect"])){$filter_connect = $_REQUEST["filter_connect"];} 
if(isset($_REQUEST["postavschik"])){$postavschik = $_REQUEST["postavschik"];} 

if(isset($_REQUEST["name"])){$name = $_REQUEST["name"];} 
if(isset($_REQUEST["surname"])){$surname = $_REQUEST["surname"];} 
if(isset($_REQUEST["email"])){$email = $_REQUEST["email"];} 
if(isset($_REQUEST["phone"])){$phone = $_REQUEST["phone"];} 
if(isset($_REQUEST["short_caption"])){$short_caption = $_REQUEST["short_caption"];} 
 
if(isset($_REQUEST["address"])){$address = $_REQUEST["address"];} 
if(isset($_REQUEST["job"])){$job = $_REQUEST["job"];} 
if(isset($_REQUEST["ban"])){$ban = $_REQUEST["ban"];}

if(isset($_REQUEST["organization"])){$organization = $_REQUEST["organization"];}
if(isset($_REQUEST["organization_1"])){$organization_1 = $_REQUEST["organization_1"];}
if(isset($_REQUEST["organization_2"])){$organization_2 = $_REQUEST["organization_2"];}
if(isset($_REQUEST["organization_3"])){$organization_3 = $_REQUEST["organization_3"];}
if(isset($_REQUEST["organization_4"])){$organization_4 = $_REQUEST["organization_4"];}
if(isset($_REQUEST["edrpoy"])){$edrpoy = $_REQUEST["edrpoy"];} 
if(isset($_REQUEST["edrpoy_1"])){$edrpoy_1 = $_REQUEST["edrpoy_1"];} 
if(isset($_REQUEST["edrpoy_2"])){$edrpoy_2 = $_REQUEST["edrpoy_2"];} 
if(isset($_REQUEST["edrpoy_3"])){$edrpoy_3 = $_REQUEST["edrpoy_3"];} 
if(isset($_REQUEST["edrpoy_4"])){$edrpoy_4 = $_REQUEST["edrpoy_4"];} 
 
if(isset($_REQUEST["field"])){$field = $_REQUEST["field"];} 
if(isset($_REQUEST["password_old"])){$password_old = $_REQUEST["password_old"];} 
if(isset($_REQUEST["password"])){$password = $_REQUEST["password"];} 
if(isset($_REQUEST["password_1"])){$password_1 = $_REQUEST["password_1"];} 
if(isset($_REQUEST["save"])){$save = $_REQUEST["save"];} 

if(isset($_REQUEST["filter"])){$filter = $_REQUEST["filter"];} 
if(isset($_REQUEST["resultat"])){$resultat = $_REQUEST["resultat"];} 
if(isset($_REQUEST["ingener"])){$ingener = $_REQUEST["ingener"];} 
if(isset($_REQUEST["month_n"])){$month_n = $_REQUEST["month_n"];} 
if(isset($_REQUEST["year"])){$year = $_REQUEST["year"];}

if(isset($_REQUEST["change_kurs_usd_nb"])){$change_kurs_usd_nb = $_REQUEST["change_kurs_usd_nb"];}
if(isset($_REQUEST["kurs_usd_nb"])){$kurs_usd_nb = $_REQUEST["kurs_usd_nb"];}
if(isset($_REQUEST["change_kurs_euro_nb"])){$change_kurs_euro_nb = $_REQUEST["change_kurs_euro_nb"];}
if(isset($_REQUEST["kurs_euro_nb"])){$kurs_euro_nb = $_REQUEST["kurs_euro_nb"];}

//if(isset($_REQUEST["client_in_note"])){$client_in_note = $_REQUEST["client_in_note"];}

// Reminder

?>
