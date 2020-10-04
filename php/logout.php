<?php 
	session_start();
	include "dbconn.php";

	unset($_SESSION["LoggedIn"]);
	unset($_SESSION["LoggedAs"]);

	setcookie("connecté","",time()-3600,"/");

	header("Location: identification.php");

?>