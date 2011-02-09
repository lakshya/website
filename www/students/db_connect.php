<?php
  session_start();
  $con = mysql_pconnect("localhost","thelaksh_student","thelaksh");
  if (!$con)
  {
  	echo "dberror.php";
	exit();
  }
  else
  {
  	mysql_select_db("thelaksh_lakshya");
  }
?>