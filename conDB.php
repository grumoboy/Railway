﻿
<?php
$db = "mydb";
$link = mysql_connect ('localhost', 'root', '');
if ( !$link )
   die ("Невозможно подключение к MySQL");
mysql_select_db ( $db ) or die ("Невозможно открыть $db");

?>
