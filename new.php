<?php
// баг с повторной прогрузкой
include ("conDB.php");
if ((isset($_POST['Login']))
  &&(isset($_POST['Password']))
  &&(isset($_POST['user_type']))
  &&(isset($_POST['surname']))
  &&(isset($_POST['name']))
  &&(isset($_POST['patronymic']))
  ) {

    $sql ="INSERT INTO `users`
    (`user_login`, `user_password`
      , `user_type`, `user_surname`
      , `user_name`, `user_patronymic`
    )
             VALUES ('".$_POST['Login'].
							     "','".$_POST['Password'].
								   "','".$_POST['user_type'].
								   "','". $_POST['surname'].
								   "','". $_POST['name'].
                   "','". $_POST['patronymic'].
								   "')" ;

    //Если вставка прошла успешно
    if (mysql_query($sql)) {
        echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>данне не записаны</p>";
    }
}
else{
  echo "<p>Данных нет</p>";
}
exit("<meta http-equiv='refresh' content='0; url= Admin_menu.php'>");
?>
