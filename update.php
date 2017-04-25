<?

include ("conDB.php");
if ((isset($_POST['table']))){

	$table = $_POST['table']; 	//таблица (получаем из #table)
	$field = $_POST['field']; 	//имя поля (получаем при разборе класса td)
	$id = $_POST['id']; 		//id ячейки которую будем обновлять (получаем при разборе класса td)
	$value = $_POST['value'];	//новое значение (получаем при разборе класса td)

	$query = "UPDATE `".$table."` SET `".$field."`='".$value."' WHERE user_id = '".$id."'"; //составляем запрос
	//$mysqli->query($query); //выполняем запрос
	//echo "Updated success"; //выводим ответ
  echo $query;
  if (mysql_query($query)) {
      echo "<p>Данные успешно добавлены в таблицу.</p>";
  } else {
      echo "<p>данне не записаны</p>";
  }
	exit(); //завершаем работу скрипта

}
else {
	echo "<p>Таблицы нет</p>";
}

?>
