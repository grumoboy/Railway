<html>
<head>
</head>
<body>
<?php
$db = "mydb";
$link = mysql_connect ('localhost', 'root', '');
if ( !$link )
   die ("Невозможно подключение к MySQL");
mysql_select_db ( $db ) or die ("Невозможно открыть $db");
/*$query = "INSERT INTO tasks
          VALUES (1, 'Первая',
        'Интересно')";$
mysql_query ( $query );
mysql_close ( $link );
*/
?>
</body>
</html>
