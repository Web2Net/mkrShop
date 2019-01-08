<?php
ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки
//$value = $var[$key]; // пример ошибки
//ini_set('display_errors', 'Off'); // теперь сообщений НЕ будет
/*
session_start();
unset($_SESSION); 
session_destroy();
//header('Location: index.php')

$MySQL_log=getenv("DOCUMENT_ROOT")."/magic/MySQL.log";
//unlink($filename);
$filewrite=fopen($MySQL_log,"w+");
$paper='';
fwrite($filewrite,$paper);
fclose($filewrite);
*/

include_once ("kernel/cfg.php");		
include_once ("site/logic.php");	

$file = getenv("DOCUMENT_ROOT") . "/magic/index.log";
if($_SERVER['REQUEST_URI'] !== "/cart/incart/?display=ajax"){
    $str = date("Y-m-d H:i:s") . " || " . $_SERVER['REMOTE_ADDR'] . " || " . $_SERVER['HTTP_REFERER'] . " || " . $_SERVER['REQUEST_URI'] . " || " . $_SERVER["HTTP_USER_AGENT"] . "\r\n";
}
//if($_SERVER['REQUEST_URI'] == "/cart/incart/?display=ajax") unset $str;
//$str = "..";
// Пишем содержимое в файл,
// используя флаг FILE_APPEND для дописывания содержимого в конец файла
// и флаг LOCK_EX для предотвращения записи данного файла кем-нибудь другим в данное время
file_put_contents($file, $str, FILE_APPEND | LOCK_EX);