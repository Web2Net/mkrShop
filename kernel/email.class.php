<?php

class Email
{
      function checkEmail($em)
      { 
          $em = filter_var($em, FILTER_VALIDATE_EMAIL);
          if($em)
          {
              return $em;
          }
          else
          {
              return false;
          }
     }
     
     function sendMail($name, $subject, $url, $to, $from) 
     {
       $letter_tpl = file_get_contents('letter.txt'); // считываем из файла шаблон письма
       $date = date("d.m.Y", time()); // форматируем текущую дату
       $searches = array("/\{name\}/", "/\{url\}/", "/\{date\}/");
       $replacements = array($name, $url, $date);
       // подставляем данные в шаблон
       $letter = preg_replace($searches, $replacements, $letter_tpl);
       $from = convert_cyr_string($from, "w","k"); // перекодируем поле 'от кого'
       $letter = convert_cyr_string($letter, "w","k"); // перекодируем тело письма
       // составляем заголовки - очень важно!
       $headers  = "Content-type: text/plain; charset=koi8-r\r\n";
       $headers .= "From: ".$from."\r\n";
       $subject = '=?koi8-r?B?'.base64_encode(convert_cyr_string($subject, "w","k")).'?=';
       if (mail($to, $subject, $letter, $headers)) {
          return true;
       }else {
          return false;
       }
    }
     
     
     
     function send_mime_mail($name_from, // имя отправителя
                             $email_from, // email отправителя
                             $name_to, // имя получателя
                             $email_to, // email получателя
                             $data_charset, // кодировка переданных данных
                             $send_charset, // кодировка письма
                             $subject, // тема письма
                             $body // текст письма
                            ) 
     {
         $to = Email::mime_header_encode($name_to, $data_charset, $send_charset).'<'.$email_to.'>';
         $subject = Email::mime_header_encode($subject, $data_charset, $send_charset);
         $from =  Email::mime_header_encode($name_from, $data_charset, $send_charset).'<'.$email_from.'>';
          if($data_charset != $send_charset) 
          {
         $body = iconv($data_charset, $send_charset, $body);
          }
          $headers = "From: {$from}\r\n";
          $headers .= "Content-type: text/html; charset={$send_charset}\r\n";
          $headers .= "Mime-Version: 1.0\r\n";

          return mail($to, $subject, $body, $headers);
     }

	  static function sendSimplyMail($id,$to,$content){
//          $to  = "Виталий <vitalyyou@gmail.com>, " ; 
//          $to .= "Александр <alex@mkr.com.ua>, " ;
//          $to .= "Ирина <irina@mkr.com.ua>, " ; 

          $subject = "Напоминание № {$id}";
          $title = "Создано новое напоминание № {$id}.<br />{$_SESSION['user_short_caption']}";
          //$content = "";
                  
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
	
     function mime_header_encode($str, $data_charset, $send_charset) 
     {
          if($data_charset != $send_charset) 
          {
              $str = iconv($data_charset, $send_charset, $str);
          }
          return '=?'.$send_charset.'?B?'.base64_encode($str).'?=';
     }
  
     static function sendMessForAdminAndUser($us_id, $us_name, $us_mail, $us_message){ //Отправка писем для юзера и менеджеров из мода message
         $name_from = SITE_NAME;
         $email_from = EMAIL_SHOP;
         $name_to = trim(str_replace('"','&quot;',$us_name));
         $email_to = trim($us_mail);
         $data_charset="UTF-8";
         $send_charset="UTF-8";
         $subject = MESSAGE_SITE_SUBJ_FOR_USER;
         $GLOBALS['id']=$us_id;
         $body= MESSAGE_SITE_BODY_FOR_USER . $us_message;

         Email::send_mime_mail($name_from,$email_from,$name_to,$email_to, $data_charset,  $send_charset, $subject, $body);

         $name_to = trim($us_name);
         $email_to = explode(",",trim(EMAIL_ADMIN));
         $subject = MESSAGE_SITE_BODY_FOR_ADMIN . " - " . Time::formatMonth(date("Y-M-d H:i:s"))." ".date("H:i");
         $body=$us_message;

         if($email_to!=NULL){
             foreach($email_to as $key=>$val){
                 Email::send_mime_mail($name_from,$email_from,$name_to,$val,$data_charset,$send_charset,$subject, $body);
             }
         }
		
    }
     
}
?>
