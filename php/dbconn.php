<?php

 $conn = mysqli_connect("localhost", "id","mdp", "nomT"); 
mysqli_set_charset($conn, "utf8");

if ($conn==FALSE)
	{echo "erreur, impossible de se connecter à la base de données";}
?>