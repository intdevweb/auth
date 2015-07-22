<?php 
	session_start();

	include("config.php");
	include("db.php");
	include("functions.php");

	//si le form est soumis...
	if (!empty($_POST)){

		//validation rapide et sécurisation de l'email

		//si valide

			//recherche de l'email en bdd

				//si trouvé

					//on génère un token pour l'utilisateur

					//on sauvegarde ce token

					//on génère le lien complet

					//envoie du message 

				//sinon, erreur

		//sinon, erreur

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mot de passe oublié</title>
</head>
<body>
	
	<h1>Mot de passe oublié</h1>

	<p>Veuillez entrer l'adresse email utilisée lors de votre inscription.</p>
	<p>Nous y enverrons un message permettant de créer un nouveau mot de passe.</p>
	<form method="POST">
		<input type="text" name="email" placeholder="Votre email" />
		<input type="submit" value="OK" />
	</form>

</body>
</html>