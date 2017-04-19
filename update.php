<html>
<head>
</head>
<body>
<?php
include ("conDB.php");
if ((isset($_POST['NameProject']))
  &&(isset($_POST['DateStart']))
  &&(isset($_POST['DateStop']))
  &&(isset($_POST['FinancingSize']))
  &&(isset($_POST['FinancingType']))) {
   
    $sql ="UPDATE `projects` SET `NameProject`='".$_POST['NameProject']."',
								 `DateStart`='".$_POST['DateStart']."',
								 `DateStop`='".$_POST['DateStop']."',
								 `FinancingSize`='".$_POST['FinancingSize']."',
								 `FinancingType`='".$_POST['FinancingType']."' 
								   WHERE `idProject`=".$_POST['idProject'];
                             
	//echo ($sql);							   
    //Если вставка прошла успешно
    if (mysql_query($sql)) {
      //  echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        //echo "<p>Произошла ошибка.</p>";
    }
	exit("<meta http-equiv='refresh' content='0; url= table.php'>");
}
?>
</body>
</html>
