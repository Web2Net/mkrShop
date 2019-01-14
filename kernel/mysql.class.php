<?php
$GLOBALS["SQL_DEBUG"]="";

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Подключение к базе данных не состоялось!"); 
//var_dump($db);
//mysql_select_db(DB_NAME,$db);
//mysql_query("SET NAMES latin1");
mysql_query("SET NAMES utf8");

class mysql{

	var $table;
    var $prefix="";

	function put_error ($msg)
	{
		print "<p><b>$msg</b>";
		exit();
	}

	function sql_error ($msg)
	{
		print "<p><b>$msg</b>";
		print "<p><b>Ошибка базы данных:</b>".mysql_error();
		exit();
	}

	function selectSQL ($select, $from, $where, $order="", $limit="")
	{
        $from = $this->prefix.$from;
		if (!is_array ($where)) $this->put_error ("В метод selectSQL(".$from.") передан НЕ массив");
		if ($select == "") $select = "*";
		$q = "SELECT $select FROM $from WHERE ";
		foreach ($where as $field=>$val)
		{
			$q .= "$field = '$val' AND ";
		}
		$q .= " 1=1 ";
		if ($order != "") $q .= "ORDER BY $order ";
		if ($limit != "") $q .= "LIMIT $limit";
        //print $q."<br />";
        SYS::varSQL($q,__FILE__,__LINE__,'selectSQL');
        $GLOBALS["SQL_DEBUG"].=$q."<br />";
        $raw = mysql_query ($q);
		if (!$raw) $this->sql_error ("Error ".$q." in selectSQL(".$from.")!");
		else
		if (mysql_num_rows($raw) > 0)
		{
			while ($result = mysql_fetch_assoc ($raw))
			{
				$itog[] = $result;
			}
			return $itog;
		}
		else return 0;
	}

    function selectMysql ($select, $from, $where, $order="", $limit=""){ // Замена метода selectSQL (что-бы можно было использовать конструкцию класс::метод)
        if(!is_array($where)){
            exit("В метод mysql::selectMysql(".$from.") передан НЕ массив");
        }
        if($select == ""){
            $select = "*";
        } 
        $q = "SELECT $select FROM $from WHERE ";
        
        foreach ($where as $field=>$val){
            $q .= "$field = '$val' AND ";
        }
        
        $q .= " 1=1 ";
        
        if($order != ""){
            $q .= "ORDER BY $order ";
        }
        if($limit != ""){
             $q .= "LIMIT $limit";
        }
        //print $q."<br />";
        SYS::varSQL($q,__FILE__,__LINE__,'selectSQL');
        $GLOBALS["SQL_DEBUG"].= $q."<br />";
        
        $raw = mysql_query ($q);
        
        if(!$raw){
            Mysql::queryError($raw,$q);
        } 
        else{
            if(mysql_num_rows($raw) > 0){
                while ($result = mysql_fetch_assoc ($raw)){
                    $itog[] = $result;
                }
                return $itog;
            }
            else{
                return 0;  
            }
        } 
    }

    function origSelectSQL ($select, $from, $where, $order="", $limit="", $group="")
	{
        $from = $this->prefix.$from;
		if (!isset ($where)) $this->put_error ("В метод origSelectSQL(".$from.") не передан WHERE");
		if ($select == "") $select = "*";
		$q = "SELECT $select FROM $from WHERE ";
		$q .= $where;
		$q .= " AND 1=1 ";
		if ($group != "") $q .= "GROUP BY $group ";	
		if ($order != "") $q .= "ORDER BY $order ";
		if ($limit != "") $q .= "LIMIT $limit";
		$q .= ";";
//print $q."<br />";
        $raw = mysql_query ($q);

        $GLOBALS["SQL_DEBUG"].=$q."<br />";        
		if (!$raw) $this->sql_error ("Error ".$q." in origSelectSQL(".$from.")!");
		else
		if (mysql_num_rows($raw) > 0)
		{
			while ($result = mysql_fetch_assoc ($raw))
			{
				$itog[] = $result;
			}
			return $itog;
		}
		else return 0;
	}
    
    function insertSQL ($arr_value, $table)
	{ 
		$table = $this->prefix.$table;
		if (!is_array ($arr_value)) $this->put_error ("Â ìåòîä insertSQL(".$table.") ïåðåäàí ÍÅ ìàññèâ");
		
		$field = ""; $var_field = "";
		foreach ($arr_value as $key=>$val)
		{
			$field .= "`$key`, ";
			$var_field .= "'$val', ";
		}

		$field = substr_replace($field, "", -2, 1);
		$var_field = substr_replace($var_field, "", -2, 1);
		$q = "INSERT INTO $table ($field) VALUES ($var_field)";
		$GLOBALS["SQL_DEBUG"].=$q."<br />";
        Auth::userDo($q);  // Запись того, что юзер делает
        //print $q;
		if (!mysql_query ($q)) $this->sql_error ("Error ".$q." in insertSQL(".$table.")!");
		else
		{
			$id = mysql_insert_id();
			return $id;
		}

	}
 
    static function insertMysql($arr_value, $table){ // Замена метода insertSQL (что-бы можно было использовать конструкцию класс::метод)
        if(!is_array ($arr_value)){
            exit("В метод insertMysql(".$table.") передан НЕ массив (".$arr_value.")");
        }

        $field = ""; 
        $var_field = "";
        
        foreach ($arr_value as $key=>$val){
            $field .= "`$key`, ";
            $var_field .= "'$val', ";
        }

        $field = substr_replace($field, "", -2, 1);
        $var_field = substr_replace($var_field, "", -2, 1);
        $q = "INSERT INTO $table ($field) VALUES ($var_field)";
        $GLOBALS["SQL_DEBUG"].=$q."<br />";
        Auth::userDo($q);  // Запись того, что юзер делает
        //print $q;
        if(!mysql_query ($q)){
            exit("В метод insertMysql(".$table.") передан НЕ массив (".$arr_value.")");
        }
        if (!mysql_query ($q)){
            exit("Error ".$q." in insertSQL(".$table.")!");
        } 
        else{
            $id = mysql_insert_id();
            return $id;
        }
    } 

    function updateSQL ($from, $arr_val, $where)
	{
        $from = $this->prefix.$from;
		$q = "UPDATE $from SET ";
		if (!is_array($arr_val)) $this->put_error("В параметрах значений на обновление updateSQL(".$arr_val.") передан НЕ массив!");

		$q_var = "";
		foreach ($arr_val as $field=>$var)
		{
			$q_var .= "`$field` = '$var', ";
		}
		$q_var = substr_replace($q_var, "", -2, 1);

		if (!is_array($where)) $this->put_error("В параметрах условий на обновление updateSQL(".$where.") передан НЕ массив!");
		$q_where = "";
		foreach ($where as $field=>$val)
		{
			$q_where .= "`$field` = '$val' AND ";
		}
		$q_where .= " 1=1";

		$q .= "$q_var WHERE $q_where";
		$GLOBALS["SQL_DEBUG"].=$q."<br />";
        Auth::userDo($q);  // Запись того, что юзер делает
        //print $q." - MySQL::updateSQL";
        SYS::varDump($q,__FILE__,__LINE__,"UPDATE");
        $_SESSION['update'] = $q;
		if (!mysql_query ($q))
		{
			$this->sql_error ("Error ".$q." in updateSQL(".$from.")!");
			return;
		}
		else return 1;

	}

    function updateMysql($from, $arr_val, $where){ // Замена метода updateSQL (что-бы можно было использовать конструкцию класс::метод)
        $q = "UPDATE $from SET ";
        
        if(!is_array($arr_val)){
            exit("В параметрах значений на обновление updateSQL(".$arr_val.") передан НЕ массив!");  
        } 
        if (!is_array($where)){
            exit("В параметрах условий на обновление updateSQL(".$where.") передан НЕ массив!");
        }

        $q_var = "";
        foreach($arr_val as $field=>$var){
            $q_var .= "`$field` = '$var', ";
        }
        $q_var = substr_replace($q_var, "", -2, 1);

        $q_where = "";
        foreach ($where as $field=>$val){
            $q_where .= "`$field` = '$val' AND ";
        }
        $q_where .= " 1=1";

        $q .= "$q_var WHERE $q_where";
        $GLOBALS["SQL_DEBUG"].=$q."<br />";
        Auth::userDo($q);  // Запись того, что юзер делает
        //print $q." - MySQL::updateSQL";
        //SYS::varDump($q,__FILE__,__LINE__,"UPDATE");
        $_SESSION['update'] = $q;
        if(!mysql_query ($q)){
            exit("Error ".$q." in updateSQL(".$from.")!");
            return;
        }
        else return 1;
    }

    function deleteSQL ($from, $where)
	{
		$from = $this->prefix.$from;
		$q = "DELETE FROM $from WHERE ";

		if (!is_array($where)) $this->put_error("В параметрах значений на удаление mysql::deleteSQL(".$from.") передан НЕ массив!");
		foreach ($where as $field=>$val)
		{
			$q .= "$field = '$val' AND ";
		}
		$q .= " 1=1";
		$GLOBALS["SQL_DEBUG"].=$q."<br />";
Auth::userDo($q);  // Запись того, что юзер делает		
        //print $q;
		if (!mysql_query ($q)) $this->sql_error ("Error ".$q." in mysql::deleteSQL(".$from.")!");
		else
		return true;

	}
	
	function origSQL($sql)
	{
		$q = $sql;
		$GLOBALS["SQL_DEBUG"].=$q."<br />";
		$raw = mysql_query ($q);		
		if (!raw) $this->sql_error ("Error ".$q." in mysql::origSQL(".$from.")!");
		else
		if (is_array($raw)){
		if (mysql_num_rows($raw) > 0)
		{
			while ($result = mysql_fetch_assoc ($raw))
			{
				$itog[] = $result;
			}
			return $itog;
		}}
		else return 0;
	}
    
    static function getRowFromTable($table,$field,$val){
        $select = "";
        $from = $table;

        if($val == ""){
            $where = "1 = 1";
        }
        else{
            $where = "{$field} = {$val}";
        }
        
        $sortby="";

        $db = new mysql;
        $row = $db->origSelectSQL($select, $from, $where, $sortby);
        

        return $row['0'];
    }

    static function checkUniqRow($table, $row, $value)
    {
        $query = "SELECT * FROM {$table} WHERE `{$row}`='{$value}'";
        $GLOBALS["SQL_DEBUG"].=$query."<br />";
        $res = mysql_query($query);
//SYS::varDump(mysql_num_rows($res),__FILE__,__LINE__,"USER_QUERY");       
        if(mysql_num_rows($res)==0)
        {   
            return false;
        }
        else
        {   
            return true;
        }
    }	
    
    static function backupTables($file){ // Дамп всех таблиц БД в файл $file
        file_put_contents($file, '');
        
        //получение списка таблиц
        $tables = array();
        $result = mysql_query('SHOW TABLES;');
        while($row = mysql_fetch_row($result)){
            $tables[] = $row[0];
        }
        
        //обработка таблиц
        if(count($tables)>0){
            foreach($tables as $table){
                mysql::backupTableStructure($file, $table);
                mysql::backupTableData($file, $table);
            }
        }
    }

    static function backupTableStructure($file, $table){
        //получение и сохранение структуры таблицы
        $content = 'DROP TABLE IF EXISTS `'.$table."`;\n\n";
        $GLOBALS["SQL_DEBUG"] .= $content."<br />";
        $result = mysql_fetch_row(mysql_query('SHOW CREATE TABLE `'.$table.'`;'));
        $content .= $result[1].";\n\n";
        file_put_contents($file, $content, FILE_APPEND);
    }

    static function backupTableData($file, $table)
    {
        //получение и сохранение данных таблицы
        $result = mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM `'.$table.'`;'));
        $count = $result[0];
        $delta = 500;
        
        //если данные существуют
        if($count>0){
            //определяем не числовые поля
            $not_num = array();
            $result = mysql_query('SHOW COLUMNS FROM `'.$table.'`;');
            $start = 0;
            while($row = mysql_fetch_row($result)){
                if (!preg_match("/^(tinyint|smallint|mediumint|bigint|int|float|double|real|decimal|numeric|year|NULL)/", $row[1])) {
                    $not_num[$start] = 1;
                }
                $start++;
            }
            //начинаем производить выборки данных
            $start = 0;
            while($count>0){
                $result = mysql_query('SELECT * FROM `'.$table.'` LIMIT '.$start.', '.$delta.';');
                $content = 'INSERT INTO `'.$table.'` VALUES ';
                $GLOBALS["SQL_DEBUG"].=$content."<br />";
                $first = true;
                while($row = mysql_fetch_row($result)){
                    $content .= $first ? "\n(" : ",\n(";
                    $first2 = true;
                    foreach($row as $index=>$field){
                        if(isset($not_num[$index])){
                            //$field = addslashes($field);
                            $field = str_replace("\n", "\\n", $field);
                            $content .= !$first2 ? (",'".$field."'") : ("'".$field."'");
                        }else{
                            $content .= !$first2 ? (",".$field) : $field;
                        }
                        $first2 = false;
                    }
                    $content .= ")";
                    $first = false;
                }
                //сохраняем результаты выборки
                file_put_contents($file, $content.";\n\n", FILE_APPEND);
                $count -= $delta;
                $start += $delta;
            }
        }
    }

    static function countRowsInTable($table_name,$where)
    {
        if($where == ""){$where = "1=1";}
        $query = "SELECT COUNT(1) FROM `{$table_name}` WHERE {$where}";
        $GLOBALS["SQL_DEBUG"].=$query."<br />";
        $res = mysql_query($query);
        $cnt  = mysql_fetch_array($res);

        return $cnt[0];
    }
    
    static function dumpTableByField($table,$field,$value){ // Создание дампа определенных полей таблицы по полю=значение,
                                                            // Сохранение в файл dump_t.{$table}_f.{$field}_v.{$value}.csv    
        $query = "SELECT * from `shop_item`
                      WHERE `{$field}`='{$value}'
                      INTO OUTFILE '/tmp/dump_t.{$table}_f.{$field}_v.{$value}.csv'  
                      FIELDS TERMINATED BY ';'
                      ENCLOSED BY '\"'
                      LINES TERMINATED BY '\n';";
            $res = mysql_query($query);
            mysql::queryError($res,$query); // описывает ошибку запроса к БД
    }
    
    static function backupAllTables($path,$file){ //Создание Бэкапа всех таблиц перед заливкой нового прайса
        $file = $_SERVER['DOCUMENT_ROOT'].$path."/".$file;
        if(!file_exists($file))  //если файла нету... тогда
        {
            $fp = fopen($file, "w"); // создаем файл
            fclose ($fp);
        }
        mysql::backupTables($file);  // CООБВЕННО БЭКАПИМ

    }

    static function queryError($res,$query,$f="",$l=""){
    	//$GLOBALS["SQL_DEBUG"].=$query."<br />";
        if(!$res){
            $message  =  PAGE_URL . "\n\r<br />";
            $message .= 'Неверный запрос: ' . mysql_error() . "\n\r<br />";
            $message .= 'Запрос целиком: ' . $query;
            mail("you@mkr.com.ua,vitalyyou@gmail.com","SQL_ERROR",$message);
            die($message);
        }       
    }
 
    static function deleteAllFields($table){
	$query = "TRUNCATE  `{$table}`";
	$GLOBALS["SQL_DEBUG"].=$query."<br />";
	$res = mysql_query($query);
        mysql::queryError($res,$query);
    } 

    static function optimazeTable($table){
		$query = "OPTIMIZE TABLE {$table}";
		$res = mysql_query($query);
        Mysql::queryError($res,$query);
	}     
	

}
 ?>
