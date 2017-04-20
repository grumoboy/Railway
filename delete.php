
<?php
include ("conDB.php");
    if (isset($_GET['idUsr']) ) {
        {
			$delQuery='DELETE FROM `users` WHERE `user_id` in (' . $_GET['idUsr'] . ')';
			//echo $delQuery;
           mysql_query ($delQuery);
        }
        //Обновляем страницу во избежании повторной встаки данных
       exit("<meta http-equiv='refresh' content='0; url= Admin_menu.php'>");
}?>
