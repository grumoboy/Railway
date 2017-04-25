<?
  // if(!$_POST)
  //  exit("<meta http-equiv='refresh' content='0; url= login.php'>");
$place="";
$vars=1;
$k=0;
include ("conDB.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.minical.plain.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Администрирование</title>

    <script src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript">
    var tablesnamecolums={
      "tUsers":"user_id"
    };
    var open=true;
    function generator(){
      var display;
        lib = new Array('A','B','C','D','E','F','G','H','I','J','K','L',
      'M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
      'a','b','c','d','e','f','g','h','i','j','k','l',
      'm','n','o','p','q','r','s','t','u','v','w','x','y','z',
      '','0','1','2','3','4','5','6','7','8','9');
    var pass="";
       for (var i=0; i < 10; i++) {
         pass+=lib[Math.floor(Math.random() * ((62)- 0 + 1)) + 0];
       }
       var btn=document.getElementById('Password2');
       btn.value=pass;
      //  alert(lib.lenght);
      }
      function sendNew(){
      //  alert("Я открыт");
        $.ajax({
            url: 'new.php',
            type: 'POST',
            data:
            {
              Login:""+document.newUser.Login.value,
              Password:""+document.newUser.Password.value,
              user_type:""+document.newUser.user_type.value,
              surname:""+document.newUser.surname.value,
              name:""+document.newUser.name.value,
              patronymic:""+document.newUser.patronymic.value
            },

            success: function(data) {
                newUser.reset();
              //  alert("успех");
            },
            error: function() {
                //alert("error");
            }
        });

//alert("шо?");
      }

      //при нажатии на ячейку таблицы с классом edit

      $(document).on('click', 'td.edit', function(){
          if($('#editbox').length>0) {return false}
        //находим input внутри элемента с классом ajax и вставляем вместо input его значение
         $('.ajax').html($('.ajax input').val());
        //удаляем все классы ajax
         $('.ajax').removeClass('ajax');
        //Нажатой ячейке присваиваем класс ajax
        $(this).addClass('ajax');
        //внутри ячейки создаём input и вставляем текст из ячейки в него
        str=$(this).text().trim();
        $(this).html('<input id="editbox"  size="'+ str.length+'" value="'+str+'" type="text">');
        //устанавливаем фокус на созданном элементе
        $('#editbox').focus();
      });

      		//определяем нажатие кнопки на клавиатуре
      		$(document).on('keydown', 'td.edit', function(event){
      		//получаем значение класса и разбиваем на массив
      		//в итоге получаем такой массив - arr[0] = edit, arr[1] = наименование столбца, arr[2] = id строки
      		arr = $(this).attr('class').split( " " );
      		//проверяем какая была нажата клавиша и если была нажата клавиша Enter (код 13)
      		   if(event.which == 13)
      		   {
      				//получаем наименование таблицы, в которую будем вносить изменения
      				var table = $('table').attr('id');
      				//выполняем ajax запрос методом POST
      				$.ajax({ type: "POST",
      				//в файл update.php
      				url:"update.php",
      				//создаём строку для отправки запроса
      				//value = введенное значение
      				//id = номер строки
      				//field = название столбца
      				//table = собственно название таблицы
      				 data: "value="+$('.ajax input').val()+"&id="+arr[2]+"&field="+arr[1]+"&table="+table,
      				//при удачном выполнении скрипта, производим действия
      				 success: function(data){
      				//находим input внутри элемента с классом ajax и вставляем вместо input его значение
      				 $('.ajax').html($('.ajax input').val());
      				//удаялем класс ajax
      				 $('.ajax').removeClass('ajax');
                },
                error: function (x, status, message) {
                alert("Ошибка " + status + ": " + message);}
             });
      		 	}

      		});
            $(document).on('blur', '#editbox', function(){
              $('.ajax').html($('.ajax input').val());
              $('.ajax').removeClass('ajax');
            });

            function hidemenu(){
              if (open) {
                $('.place').addClass('place-new');
                $('.maini').removeClass('fa-th-list');
                $('.maini').addClass('fa-th');
              }
              else {
                $('.place').removeClass('place-new');
                $('.maini').removeClass('fa-th');
                $('.maini').addClass('fa-th-list');
              }
                open=!open;
            }

            function validate_form()
            {

            <?php $res_logins=mysql_query ("SELECT * FROM users" );
              $str="''";
              while($row = mysql_fetch_array($res_logins)):
              $str.=",'".$row['user_login']."'";
              endwhile; ?>
              var arrayLogin = new Array(<?php echo $str ?>);
              for (var i = 0; i < arrayLogin.length; i++) {
                if ( document.newUser.Login.value ==  arrayLogin[i])
                {
                        alert ( "Такой пользователь уже есть.");
                        return false;
                }
              }
                sendNew();
            }
             $(document).on('click', '.mitem', function(){
                $('.active').removeClass('active');
                $(this).addClass('active');
             });
      </script>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top"> <!-- Фиксированый блок-->
      <div class="container ">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">DONBASS <i class="fa fa-train"></i> WAY</i></a>
        </div>
        <div class="btn-group menu-right ">
          <a class="btn btn-primary our-btn" href="#"><i class="fa fa-user fa-fw"></i> <? echo $_GET["login"]; ?></a>
          <a class="btn btn-primary dropdown-toggle our-btn" data-toggle="dropdown" href="#">
            <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
            <!-- <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
            <li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li> -->
            <li class="divider"></li>
            <li><a href="login.php"><i class="fa fa-sign-out"></i> Exit</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row main-block">
        <div class=" vmenu" >
            <!-- <div class="li mainli"><a onclick="hidemenu()"><i class="maini fa fa-th"></i></a></div> -->
            <div class="mitem li "><a ><i class="fa fa-table fa-fw"></i> Edit timetable</a></div>
            <div class="mitem li "><a ><i class="fa fa-table fa-fw"></i> Edit timetable</a></div>
            <div class="mitem li active"><a ><i class="fa fa-users"></i> Account management</a></div>
        </div>
        <!-- Учётные записи -->
        <div class="col-md-8 col-sm-8 col-xs-8 place">

            <div class="mainli" onclick="hidemenu()"><i class="maini fa fa-th-list"></i><span>MENU</span></div>
            <div class=" add">
                <a href="#" class="btn btn-primary" data-toggle="modal"  data-target="#myModal"><i class="fa fa-plus fa-fw"></i> New</a>
            </div>

          <div class="col-lg-12 col-sm-12 scrol">
          <table id="users" class="table table-bordered table-hover ">
              <thead>
                  <tr>
               
                      <th>Логин</th>
                      <th>Роль</th>
                      <th>Фамилия</th>
                      <th>Имя</th>
          			      <th>Отчество</th>
          			      <th ></th>
                  </tr>
              </thead>
              <tbody>
                    <?php $result=mysql_query ("SELECT * FROM users ORDER BY user_id" );
               while($row = mysql_fetch_array($result)): ?>
              <tr >
               <td class="edit user_login <?php echo $row['user_id'];?>">
                 <?php echo $row['user_login']; ?>
                 </td>
               <td class="edit user_type <?php echo $row['user_id'];?>">
                 <?php echo trim($row['user_type']); ?>
                 </td>
               <td class="edit user_surname <?php echo $row['user_id'];?>">
                 <?php echo trim($row['user_surname']); ?>
                </td>
               <td class="edit user_name <?php echo $row['user_id'];?>">
                 <?php echo $row['user_name']; ?>
                 </td>
               <td class="edit user_patronymic <?php echo $row['user_id'];?>">
                 <?php echo $row['user_patronymic']; ?>
                 </td>
          	   <td class="centered">
              <?php
               if($row['user_type']!="administrator"){
             	 echo "<a type='button'  class='btn glyphicon glyphicon-trash trash'
               href=\"delete.php?idUsr='".$row['user_id']."'\"/>";  }
          	   ?>
          	  </td>
              </tr>
          	<?php endwhile; ?>
              </tbody>
          </table>

          </div>
        </div>
    </div>

    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h2 class="modal-title centered">Новый пользователь</h2>
    </div>
    <div class="modal-footer">


     <div align="left">
     <div id="changeHTML" class="panel-body">

    <form role="form" name="newUser" method="post" onsubmit="return validate_form()" >
    <div >
      <!-- Скрипт для проверки наличия такого пользователя в системе -->

      <div class="divTextSeting">
      <label class="col-sm-4 " for="#Login">Логин </label>
      <input  name="Login" id="Login" class="inputStyle"
      value="cacher" required aria-required="true"/>
      </div>
      <!-- Генератор пароля -->
      <div class="divTextSeting">
      <label class="col-sm-4 " for="#Password2">Пароль </label>
      <input  name="Password" id="Password2" class="inputStyle"
      value="password"/>
       <button class="btn" type="button" name="genpass"
       onclick="generator();">
        <i class="fa fa-cogs"></i>
      </button>
      </div>


      <div class="divTextSeting">
      <label class="col-sm-4 " >Роль </label>
      <select name="user_type" class="inputStyle">
      <option>administrator</option>
      <option selected="">cashier</option>
    </select>
     </div>

     <div class="divTextSeting">
     <label class="col-sm-4 " for="#surname">Фамилия </label>
     <input  name="surname" id="surname" class="inputStyle"
     value="Фамилия" required aria-required="true"/>
     </div>

     <div class="divTextSeting">
     <label class="col-sm-4 " for="#name">Имя </label>
     <input  name="name" id="name" class="inputStyle"
     value="Имя" required aria-required="true"/>
     </div>

     <div class="divTextSeting">
     <label class="col-sm-4 " for="#patronymic">Отчество </label>
     <input  name="patronymic" id="patronymic" class="inputStyle"
     value="Отчество" required aria-required="true"/>
     </div>

    <button type="submit" class="btn btn-success"
    <i class="glyphicon  glyphicon-floppy-disk"></i> Сохранить</button>
    </form>
     <button class="btn btn-warning" type="button" data-dismiss="modal">
     <i class="glyphicon glyphicon-remove"></i> Выйти</button>
     </div>
      </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">?</button>
          <h4 class="modal-title">Вы уверены что хотите сохранить?</h4>
          </div>
          <div class="modal-footer">
          <button class="btn btn-success" type="button" data-dismiss="modal" onClick="changeHTML();  sendForm();">
          <i class="glyphicon glyphicon-ok"></i> Да</button>
          <button class="btn btn-warning" type="button" data-dismiss="modal">
          <i class="glyphicon glyphicon-remove"></i> Нет</button>
          </div>
        </div>
      </div>
    </div> -->

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
