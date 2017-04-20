<?
$place="";
$vars=1;
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
        <div class="col-md-4 col-sm-4 col-xs-4 vmenu" >
            <div class="li "><a onclick=""><i class="fa fa-table fa-fw"></i> Edit timetable</a></div>
            <!-- <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
            <li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li> -->
            <!-- <div class="hr-dash"></div> -->
            <div class="li active"><a href="#"><i class="fa fa-users"></i> Account management</a></div>
        </div>
        <!-- Учётные записи -->
        <div class="col-md-8 col-sm-8 col-xs-8 place">

            <div class=" add">
                <a href="#" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i> Edit</a>
            </div>
            <div class="save">
              <a href="#" class="btn btn-success"><i class="fa fa-floppy-o fa-fw"></i> Save</a>
          </div>


          <?php $result=mysql_query ("SELECT * FROM users"); ?>
          <div class="col-lg-12 col-sm-12 scrol">
          <table class="table table-bordered table-hover ">
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
               <?php while($array = mysql_fetch_array($result)): ?>
              <tr >
               <td><?php echo $array['user_login']; ?></td>
               <td><?php echo $array['user_type']; ?></td>
               <td><?php echo $array['user_surname']; ?></td>
               <td><?php echo $array['user_name']; ?></td>
               <td><?php echo $array['user_patronymic']; ?></td>

          	 <td>
            <?php
            if($array['user_type']!="administrator"){
          	 echo "<a type='button'  class='btn glyphicon glyphicon-trash trash'
             href=\"delete.php?idUsr='".$array['user_id']."'\"/>";
            }
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
    </div>

    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
