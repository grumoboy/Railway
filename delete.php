<html>
<head>
<title>Редактирование</title>

<link rel="stylesheet" type="text/css" href="css\jquery.minical.plain.css"> 
<link rel="stylesheet" type="text/css" href="css\maincss.css"> 
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="css\index.css"> 

<script type="text/javascript"  src="js\jquery-1.12.0.min.js" ></script>
<script type="text/javascript"  src="js\jquery.minical.plain.js" ></script>
<script type="text/javascript"  src="js\bootstrap.min.js" ></script> 
<script type="text/javascript">
	function cDate() {
	var $date_field = $('input.changeDate');
	
	$date_field.minical({
		date_format: function(date) {
		var month=(date.getMonth() + 1);
	    var day=date.getDate();
		
	    if( month<10){
	    month='0'+month;
	    }
		if( day<10){
	    day='0'+day;
	    }
	     return [date.getFullYear(),month, day].join("-");
		}
	})
	}
	</script>
</head>
<body>
<?php
include ("conDB.php");?>
 <?php

    if (isset($_GET['idPrj']) ) {
        
        {//Обьеденяем в строку
			//echo "".implode(',', $ids);
			$delQuery='DELETE FROM `projects` WHERE `idProject` in (' . $_GET['idPrj'] . ')';
			//echo $delQuery;
           mysql_query ($delQuery);
        }
        //Обновляем страницу во избежании повторной встаки данных
       exit("<meta http-equiv='refresh' content='0; url= table.php'>");
    
}?>
</body>
</html>
