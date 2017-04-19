<?

error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');


// Соединямся с БД
$link=mysqli_connect("localhost", "root", '','mydb');
if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    if(mysql_num_rows($query)>0){
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] == $_POST['password'])
    {
        // // Генерируем случайное число и шифруем его
        // $hash = md5(generateCode(10));

        // Ставим куки
  //      setcookie("id", $data['user_id'], time()+60*60*24*30);
      //  setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!
        // Переадресовываем браузер на страницу проверки нашего скрипта
        // header("Location: Admin_menu.php"); exit();

    	 // exit("<meta http-equiv='refresh' content='0; url= Admin_menu.php'>");
    }
    else
    {
      echo 'Вы ввели неправильный логин/пароль';
    }
  }
  else {
    echo 'Вы ввели неправильный логин/пароль';
  }
}

echo 'dsff';

?>
