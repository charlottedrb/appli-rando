<section>
			<form method="post" action="new_account.php">
				<label>Votre email</label>
				<input 	type="email" 
						name="email"
						value="<?php if (isset($_SESSION["errors"])) echo $_SESSION["old"]["email"]; ?>"
						required>
				<?php
					if (isset($_SESSION["errors"]) &&
						in_array("email", $_SESSION["errors"]))
						echo "<span class='erreur'>Erreur : adresse mail valide requise</span>";
				?>
				<br>				
				<label>Votre identifiant</label>
				<input 	type="text" 
						name="identifiant"
						value="<?php if (isset($_SESSION["errors"])) echo $_SESSION["old"]["identifiant"]; ?>"
						required>
				<?php
					if (isset($_SESSION["errors"]) &&
						in_array("identifiant", $_SESSION["errors"]))
						echo "<span class='erreur'>Erreur : identifiant requis</span>";
				?>
				<?php
					if (isset($_SESSION["errors"]) &&
						in_array("identifiant_pris", $_SESSION["errors"]))
						echo "<span class='erreur'>Erreur : identifiant déjà utilisé</span>";
				?>
				<br>
				<label>Votre mot de passe</label>
				<input 	type="password" 
						name="mdp1"
						value=""
						required>
				<?php
					if (isset($_SESSION["errors"]) &&
						in_array("mdp", $_SESSION["errors"]))
						echo "<span class='erreur'>Erreur : Mot de passe requis</span>";
				?>
				<br>
				<label>Vérifiez votre mot de passe</label>
				<input 	type="password" 
						name="mdp2"
						value=""
						required>
				<?php
					if (isset($_SESSION["errors"]) &&
						in_array("mdp_different", $_SESSION["errors"]))
						echo "<span class='erreur'>Erreur : Les mots de passes ne correspondent pas</span>";
				?>
				<br>
				<input type="submit" value="Créer">
			</form>
</section>