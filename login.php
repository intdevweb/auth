<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion !</title>
</head>
<body>

	<h1>Connexion</h1>
	
	<form method="POST" action="login_handler.php">
		<input type="text" name="email" placeholder="Email ou pseudo" />
		<input type="password" name="password" placeholder="Mot de passe" />
		<input type="submit" value="OK" />
	</form>

<<<<<<< HEAD
	<a href="formforgotemail.php" id="#form1">email oublié?</a>
=======
	<a href="forgot_password.php">Mot de passe oublié ?</a>

>>>>>>> origin/master
	<?php 
		//si on a stocké un message d'erreur (dans login_handler.php)
		if(!empty($_SESSION['login_error'])){
			//affiche le message d'erreur
			echo $_SESSION['login_error']; 
			//on a affiché le message, alors on peut le virer
			unset($_SESSION['login_error']);
		}
	?>

</body>
</html>