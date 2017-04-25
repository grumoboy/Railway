<!DOCTYPE HTML>
<?php
function editing(){

}

?>
<html lang="ru-RU">
<head>
<title>
Таблица
</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta http-equiv="Content-Language" content="ru">

<link rel="stylesheet" type="text/css" href="css\jquery.minical.plain.css">
<link rel="stylesheet" type="text/css" href="css\maincss.css">
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css\bootstrap-theme.min.css">
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
include ("conDB.php");
?>
<div>

<button class="btn btn-successmy new"   data-toggle="modal"  data-target="#myModal">
<i class="glyphicon glyphicon glyphicon-plus"> </i>
</button>
</div>
<div class="centrDiv">

<div class="panel panel-primary" role="alert">
<div class="panel-heading">Проекты</div>
<div class="panel-body ">


<!--<button class="btn btn-dangermy butDel "  type="submit" onClick="return validate1(this.form)" >
<i class="glyphicon glyphicon-trash"> Удалить</i>
</button>-->
<?php $result=mysql_query ("SELECT * FROM projects"); ?>
<div class="scrol">
<table class="table table-bordered table-hover ">
    <thead>
        <tr>
            <th>Название</th>
            <th>Начало</th>
            <th>Окончание</th>
            <th>Размер фин.</th>
			<th>Тип фин.</th>
			<th ></th>
        </tr>
    </thead>
    <tbody>
     <?php while($array = mysql_fetch_array($result)): ?>
    <tr >
     <td><?php echo $array['NameProject']; ?></td>
     <td><?php echo $array['DateStart']; ?></td>
     <td><?php echo $array['DateStop']; ?></td>
     <td><?php echo $array['FinancingSize']; ?></td>
     <td><?php echo $array['FinancingType']; ?></td>

	 <td> <!-- <?php echo("<input  name='selUsr[]' type='checkbox'  value='". $array['idProject']."' >"); ?>-->
	 <a type="button" class="btn butMy glyphicon glyphicon-trash butDel" href="delete.php?idPrj='<?php echo ($array['idProject']);?>'"/>
	 <a type="button" class="btn butMy glyphicon glyphicon-pencil " href="editing.php?idPrj='<?php echo ($array['idProject']);?>'"/>

	</td>
    </tr>
	<?php endwhile; ?>
    </tbody>
</table>
</div>

</div>
</div>
</div>




<div id="myModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Новый проект</h4>
</div>
<div class="modal-footer">


 <div align="left">
 <div id="changeHTML" class="panel-body">

<form role="form" id="newProject"  method="post" action="new.php">
<div >
  <div class="divTextSeting">
  <label class="col-sm-4 " for="#firstName">Название:</label>
  <input  name="NameProject" id="firstName" class="inputStyle" value="Новый проект" required aria-required="true"/>

 </div>
 <div class="divTextSeting" >

	<label class="col-sm-4">Дата начала: </label>
	<input name="DateStart" id="dateinp" class="changeDate inputStyle" type="text" >
	<!--	 <input  id="dateinp" class="inputStyle">-->
		<script type="text/javascript">
	cDate();
	</script>
 </div>
 <div class="divTextSeting" >

	<label class="col-sm-4">Дата окончания: </label>
	<input name="DateStop" id="dateinp" class="changeDate inputStyle" type="text" >
	<script type="text/javascript">
	cDate();
	</script>
 </div>

 <div >
  <div class="divTextSeting">
  <label class="col-sm-4 " for="#firstName">Размер фин.:</label>
  <input name="FinancingSize" id="firstName" class="inputStyle" value="2000" required aria-required="true"/>

 </div>
 <div >
  <div class="divTextSeting">
  <label class="col-sm-4 " for="#firstName">Тип фин.:</label>
  <select name="FinancingType" class="inputStyle">
  <option>Разовый</option>
  <option>Периодический</option>
</select>

 </div>
 </div>
 </div >
  <button type="submit" class="btn btn-success"  >
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

</body>
</html>
