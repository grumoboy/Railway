
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
         header("Location: Admin_menu.php"); exit();
    }
    else
    {
      echo "<script type='text/javascript'>
      alert('Вы ввели неправильный логин/пароль');
      </script>";

    }
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">

    <title>Авторизация</title>
  </head>
  <body>


    <div class="mainblock">
      <div id="login-form">
        <h1>Авторизация на сайте</h1>

        <fieldset>
            <form action="check.php" method="POST">
                <div class="errlog">Логин или пароль введены не верно</div>
                <input type="text" name="login" required value="Логин"
                onBlur="if(this.value=='')this.value='Логин'"
                onFocus="if(this.value=='Логин')this.value='' ">
                <input type="password" name="password" required value="Пароль"
                onBlur="if(this.value=='')this.value='Пароль'"
                onFocus="if(this.value=='Пароль')this.value='' ">
                <!-- <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" placeholder="Email address">
                </div>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="password" placeholder="Password">
                </div> -->
                <input name="submit" type="submit" value="ВОЙТИ">
            </form>
        </fieldset>

    </div>
    </div>
    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
