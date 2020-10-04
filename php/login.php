<?php 
	session_start();
	include "dbconn.php";

	$identifiant=$_POST["identifiant"];
	if(isset($_SESSION["LoggedIn"])&&$_SESSION["LoggedIn"]==True)
	{
		if($_SESSION["LoggedAs"]==$identifiant)
		{
			header("Location: identification.php");
		}
	}

	if((!isset($_POST["identifiant"])||!$_POST["identifiant"]=="")&&(!isset($_POST["mdp"])||!$_POST["mdp"]==""))
	{
		$results= mysqli_fetch_array(mysqli_query($conn, 'SELECT `motDePasse` FROM `connexion` WHERE `identifiant` LIKE "'.$identifiant.'"'));
		$MotDePasse=$results["motDePasse"];
		if($MotDePasse==$_POST["mdp"])
		{
			$_SESSION["LoggedIn"]=True;
			$_SESSION["LoggedAs"]=$identifiant;
			$query_mail= mysqli_fetch_array(mysqli_query($conn, 'SELECT `mail` FROM `connexion` WHERE `identifiant` LIKE "'.$identifiant.'"'));
			$_SESSION["LoggedMail"]=$query_mail["mail"];
			setcookie("connecté","oui",time()+3600,"/");
			header("Location: identification.php");
		}else
		{
			header("Location: identification.php");
		}
	}






?>