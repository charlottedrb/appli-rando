<?php 
	if(isset($_SESSION["LoggedIn"])&&$_SESSION["LoggedIn"]==True)
		{
			echo "authentifié comme ".$_SESSION["LoggedAs"];
			echo "<br/>mail : ".$_SESSION["LoggedMail"];
		}
?>


	<section>
		<form method="post" action="login.php">
			<label>Votre identifiant</label>
			<input 	type="text" 
				name="identifiant"
				required>
                
            <br>

			<label>Votre mot de passe</label>
			<input 	type="password" 
				name="mdp"
				required>
                
            <br>
                
            <input 	type="submit" 
				value="Authentifications">
                
            <br>
		</form>
	</section>
        
    <section>
		vous n'avez pas de compte ?
		<a href="creation_compte.php"><strong>créez-en un dès maintenant</strong></a>
	</section>
    
    <form method="post" action="logout.php">
		<input type="submit" value="DECONNEXION">
	</form>