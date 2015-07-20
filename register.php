<?php

	include("functions.php");
	include("db.php");

	//tester la soumission du formulaire avec un print_r()
	pr($_POST);
	$error = "";

	//si le form est soumis...
	if (!empty($_POST)){

		//on crée nos variables, tout en enlevant les balises HTML
		//et les espaces en début et fin de chaîne
		$email = trim(strip_tags($_POST['email']));
		$username = trim(strip_tags($_POST['username']));
		$password = trim(strip_tags($_POST['password']));
		$password_confirm = trim(strip_tags($_POST['password_confirm']));

		//validation

		//email vide ?
		if(empty($email)){
			$error = "Veuillez renseigner votre email !";
		}
		//email valide ?
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Votre email n'est pas valide !";
		}
		//email trop long ?
		elseif(strlen($email) > 100){
			$error = "Votre email est long, trop long.";
		}
		else {
			//email déjà présent dans la base ?
			$sql = "SELECT email FROM users WHERE email = :email";
			$sth = $dbh->prepare($sql);
			//l'array remplace le bindValue()
			$sth->execute(array(":email" => $email));
			$foundEmail = $sth->fetchColumn();

			if ($foundEmail){
				$error = "Cet email est déjà enregistré ici !";
			}
		}

		//username vide ?
		if(empty($username)){
			$error = "Veuillez renseigner votre pseudo !";
		}
		//username trop long ?
		elseif(strlen($username) > 100){
			$error = "Votre pseudo est long, trop long.";
		}
		else {
			//username déjà présent dans la base ?
			$sql = "SELECT username FROM users WHERE username = :username";
			$sth = $dbh->prepare($sql);
			//l'array remplace le bindValue()
			$sth->execute(array(":username" => $username));
			$foundUsername = $sth->fetchColumn();

			if ($foundUsername){
				$error = "Ce pseudo est déjà enregistré ici !";
			}
		}

		//mots de passe correspondent ?
		if ($password != $password_confirm){
			$error = "Vos mots de passe ne correspondent pas !";
		}
		elseif(strlen($password) <= 6){
			$error = "Veuillez saisir un mot de passe d'au moins 7 caractères !";
		}

		//si on n'a pas d'erreur 
		//en d'autre mots, si notre variable est encore vierge
		if (empty($error)){
			//insert dans la table users
			$sql = "INSERT INTO users (id, email, username, password, date_created, date_modified) 
					VALUES (NULL, :email, :username, :password, NOW(), NULL)";

			$sth = $dbh->prepare($sql);

			//on donne une valeur aux paramètres de la requête
			$sth->bindValue(":email", $email);
			$sth->bindValue(":username", $username);

			/*
			||||||| Attention : PHP 5.5 ou plus !!! |||||||||
			||||  Sinon, depuis 5.3.7 : https://github.com/ircmaxell/password_compat
			*/
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$sth->bindValue(":password", $hashedPassword);

			$sth->execute();
		}

	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription !</title>
</head>
<body>
	<h1>Inscription !</h1>
	<form method="POST" id="login_form">
		<div>
			<label for="email">Votre email</label>
			<input type="email" name="email" id="email" />
		</div>
		<div>
			<label for="username">Votre pseudo</label>
			<input type="text" name="username" id="username" />
		</div>
		<div>
			<label for="password">Votre mot de passe</label>
			<input type="password" name="password" id="password" />
		</div>
		<div>
			<label for="password_confirm">Encore une fois !</label>
			<input type="password" name="password_confirm" id="password_confirm" />
		</div>
		<button type="submit">OK !</button>
		<?php 
		if (!empty($error)){
			echo '<div>' . $error . '</div>';
		}
		?>
	</form>
</body>
</html>