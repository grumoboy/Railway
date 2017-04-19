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
 
<div class="centrDiv">

<div class="panel panel-primary" role="alert">
<div class="panel-heading">Проекты</div>
<div class="panel-body">
 <?php 
			$selQuery="SELECT * FROM `projects` WHERE `idProject`= ".$_GET['idPrj'];
			
           $result=mysql_query ($selQuery);
		   $array = mysql_fetch_array($result);
		  
        ?> 
    
		<form id="newProject"  method="post" action="update.php">
		
		  <div class="divTextSeting hidDiv ">
		  <label class="col-sm-4 " for="#firstName">Код:</label>
		  <input  name="idProject"  class="inputStyle" 
		  value="<?php echo $array['idProject']?>" required aria-required="true"/>

		 </div>
		
		  <div class="divTextSeting">
		  <label class="col-sm-4 " for="#firstName">Название:</label>
		  <input  name="NameProject" class="inputStyle" 
		  value="<?php echo $array['NameProject'];?>" required aria-required="true"/>

		 </div>
		 <div class="divTextSeting" >

			<label class="col-sm-4">Дата начала: </label>
			<input name="DateStart"  class="changeDate inputStyle" type="text"
			value=' <?php echo $array['DateStart']?>'/>
				<script type="text/javascript">
			cDate();	
			</script>
		 </div>
		 <div class="divTextSeting" >

			<label class="col-sm-4">Дата окончания: </label>
			<input name="DateStop" id="dateinp" class="changeDate inputStyle" type="text" 
			value=' <?php echo $array['DateStop']?>'required aria-required="true"/>
			<script type="text/javascript">
			cDate();	
			</script>
		 </div>
		 
		
		  <div class="divTextSeting">
		  <label class="col-sm-4 " for="#firstName">Размер фин.:</label>
		  <input name="FinancingSize"  class="inputStyle"
		  value=' <?php echo $array['FinancingSize']?>' required aria-required="true"/>

		 </div>
		 
		  <div class="divTextSeting">
		  <label class="col-sm-4 " for="#firstName">Тип фин.:</label>
		  <select name="FinancingType" class="inputStyle" value=' <?php echo $array['FinancingType']?>'>
		  <option>Разовый</option>
		  <option>Периодический</option>
		</select>
		 </div>
		 
	    <button  type="submit" class="btn btn-success" action="update.php" >
		<i class="glyphicon glyphicon-ok"></i> Сохранить</button>
		</form>
		 </div>
		 </div >
		

	
</body>
</html>
