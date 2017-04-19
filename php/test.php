<?php
	$text = "Выберите Людей!";
	$people = array("Иссак","Ньютон","Вовочка","Степок","Танюшка","Коля","Катерина","Никита");
	$array_fuck2 = array("я cдам экзамен");
	$array_fuck = array("сдать","экзамен","как","выйди","ШО?!!"
	,"за пивасом"
	,"тригер"
	,"сеть"
	,"ОСПФ"
	,"ЮЮЮРАААА!"
	,"рип"
	,"тупиковый чтоли?"
	,"вставай"
	,"утром"
	,"сисадмин"
	,"А Иссак"
	,"."
	,"!"
	,""
	,"?"
	,","
	,"Вова блин"
	);
	$array_fuck2 = array("бля","как-так","козел","урод","ШО?!!",
	"эксгибиционист", "опа, колхозочка","Однако","Кто тут?","Вечером наберу",
	"Чупик","Василия спроси","Утром","Итить колотить"
	,"квант"
	,"рано"
	,"вставай"
	,"жизнь"
	,"водку"
	,"нажрался"
	,"ТААААААААААЗИИИИИИИИК!!!"
	,"Степок"
	,"Хмелевой"
	,"сосал"
	,"хуй"
	,"Таня"
	,"бензопила"
	,"фестиваль"
	,"жопа"
	,"пизда Кузьминична"
	,"экзамен"
	,"привалов"
	,"анал"
	,"здоровенный"
	,"нигер"
	,"упал"
	,"очко"
	,"пивас"
	);
	$array=array();
	$rand = rand(1,15);
		for ($i=0;$i<$rand;$i++)
		{
			$sub_array="";
			for ($j=0;$j<rand(1,count($array_fuck));$j++)
				{
					$sub_array.=" ".$array_fuck[rand(0,count($array_fuck)-1)];
				}
			array_push($array,"<b>".$people[rand(0,count($people)-1)]."</b>: ''".$sub_array."''");
		}
	function rest(){

	}

?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
</head>
<style>
body{
	background-image: linear-gradient(#10d276, #330069);
	background-size: 100%;
	background-repeat: no-repeat;
	background-attachment: fixed;

}
.main{
	margin:0 auto;

	padding: 1px;
	width-min: 300px;
	width: 500px;

}
.message{
	background-color: #00FA9A;
	padding: 5px;
	margin: 5px;
	width: 90%;
	text-align: left;

	border-top-left-radius: 9px;
    border-bottom-right-radius: 9px;
}
h2{
	display: block;
	padding: 1px;
	border-radius: 50px;
	background: rgba(255,235,205, 0.3)

}
.but_class{
	position:  fixed;

}
</style>
<body>
	<div align="center" >
	<!-- <input value="<? echo $text?>"> -->
	</div>
	<div class="but_class">
	<button class="btn btn-successmy new"   data-toggle="modal"  data-target="#myModal">
	<i class="glyphicon glyphicon glyphicon-plus"> </i>
	</button>
	</div>
	<div   class="main" >
	<div align="center">
	<h2>Диалог великих людей:</h2>
	<!-- <ul style="list-style-type: none; "> -->

		<? foreach ($array as $value): ?>
		<!-- <li> -->
		<div class="message">
				<div style="width:35%;  " >
				<? echo date(" d M Y H i s");  ?>
				</div>
				<div >
				<? echo $value;  ?>
				</div>
			</div>
			<!-- </li> -->

		<?  endforeach; ?>
	<!-- </ul> -->
	</div>
	</div>
</body>
</html>
