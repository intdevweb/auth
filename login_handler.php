<?php
	
	session_start();
	include("config.php");
	include("vendor/autoload.php");
	include("functions.php");
	include("db.php");

	pr($_POST);

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users 
			WHERE email = :email 
			OR username = :email 
			LIMIT 1";

	$sth = $dbh->prepare($sql);
	$sth->bindValue(":email", $email);
	$sth->execute();

	$foundUser = $sth->fetch();

	if ($foundUser){
		//vérifie le mot de passe
		pr($foundUser);

		/*
		||||||| Attention : PHP 5.5 ou plus !!! |||||||||
		||||  Sinon, depuis 5.3.7 : https://github.com/ircmaxell/password_compat
		*/
		$isValidPassword = password_verify($password, $foundUser['password']);

		if ($isValidPassword){
			//on préfère ne pas stocker le mdp en session, 
			//même si pas très grave...
			unset($foundUser['password']);

			//on stocke l'array de l'utilisateur en session
			//toutes les données seront disponible sur toutes les pages !
			$_SESSION["user"] = $foundUser;
			echo "good password !";
		}
		else {
			echo "wrong password !";
		}

	}
	else {
		//redirection vers login avec message d'erreur
		echo "not found !";
	}