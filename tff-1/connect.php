<?php
$connect = mysql_connect("localhost","root","");
			if(!$connect){
			die("Veritabany Ba?lantý Hatasy: ".mysql_error());
			}
			mysql_query("SET NAMES 'utf8'");
			$db_select = mysql_select_db("tff",$connect);
			if(!$db_select){
			die("Veritabany Tablo Seçim Hatasy: ".mysql_error());
			}
			mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");
	
?>
