<?php
	session_start();
	include "dbconn.php";
	

	$errors = [];

	if(!isset($_POST["email"])||!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
	{
    	$errors[] = "email";
	}
	if(!isset($_POST["identifiant"])||$_POST["identifiant"]=="")
	{
		$errors[] = "identifiant";
	}
	if(!isset($_POST["mdp1"])||$_POST["mdp1"]=="")
	{
		$errors[] = "mdp";
	}else{
		if((!isset($_POST["mdp2"])||$_POST["mdp2"]=="")&&($_POST["mdp1"]==$_POST["mdp2"]))
		{
			$errors[] = "mdp_different";
		}
	}
	if(count($errors)>0)
	{
		$_SESSION["errors"]=$errors;
		$_SESSION["old"] = $_POST;

		header("Location: creation_compte.php");

	}else
	{
		$email=$_POST["email"];
		$identifiant=$_POST["identifiant"];
		$mdp=$_POST["mdp2"];
		if(mysqli_num_rows(mysqli_query($conn, 'SELECT `id` FROM `connexion` WHERE `identifiant` LIKE "'.$identifiant.'"'))==0)
		{
			$results = mysqli_query($conn,"INSERT INTO connexion VALUES (NULL,'$identifiant','$mdp','$email');");
			header("Location: ../index.html");
		}else
		{
			$errors[] = "identifiant_pris";
			$_SESSION["errors"]=$errors;
			$_SESSION["old"] = $_POST;
			header("Location: creation_compte.php");
		}
	}
?>