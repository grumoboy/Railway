<?

// Соединямся с БД
$link=mysqli_connect("localhost", "root", '','mydb');
if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] == $_POST['password'])
    {
        // Ставим куки
  //      setcookie("id", $data['user_id'], time()+60*60*24*30);
      //  setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!
        // Переадресовываем браузер на страницу проверки нашего скрипта
        //  header("Location: Admin_menu.php"); exit();



  //      echo "
  //       <script type='text/javascript'>
  //      $.post(
  //      'Admin_menu.php',
  //      {login:'".$_POST['login']."'},
  //      function(data) {
  //
  //      }
  //  );</script>";
    exit("<meta http-equiv='refresh' content='0; url= Admin_menu.php?login=".$_POST['login']."'>");
    }
    else
    {
      echo "<script type='text/javascript'>
      alert('Вы ввели неправильный логин/пароль');
      </script>";
      exit("<meta http-equiv='refresh' content='0; url= login.php'>");
    }
  }

?>
