<?php 
	session_start();
	include ("vendor/autoload.php");

include ("config.php");
include ("functions.php");
if(!empty($_POST)) 
{ 
	$email = trim(strip_tags($_POST['email']));
	
	
	$sql = "SELECT email FROM users WHERE email= :email";
		$sth= $dbh->prepare($sql);
		$sth->execute(array(":email" =>$email));
		$foundEmail = $sth->fetchColumn();
		if($foundEmail){
			$error= "  cet email est bien enregistré ici";
			$factory = new RandomLib\Factory;
$generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));
$token = $generator->generateString(80, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
	include ("send_test.php");
			
		}else{
			echo ($foundEmail['email']."email pas trouvé dans cette base");

		}
		
	}
	//////////////////////ajouot de bibliotheque et de composer pour les telecharger
	//////////////////////se connecter sous dos se mettre dans le repertoire voulu , ici auth et 
	///////////////////// taper : composer install
	///////////////////// puis installer la bibliotheque de messagerie maxwell irc
	////////////////////// en saissisant toujours en dos : composer require phpmailer/phpmailer
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>forgotten email!</title>
</head>
<body>
	
	<form method="POST" action="formforgotemail.php">
		<input type="text" name="email" placeholder="Votre email ?" />
		<input type="submit" value="OK" />
	</form>
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