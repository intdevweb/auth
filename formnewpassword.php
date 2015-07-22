<?php 
session_start();
include ("vendor/autoload.php");

include ("config.php");
include ("functions.php");

$token = trim(strip_tags($_GET['token']));

$sql = "SELECT * FROM users WHERE token = :token";
$sth= $dbh->prepare($sql);
$sth->execute(array(":token" =>$token));
$user = $sth->fetch();
if (!$user){
if(!empty($_POST)) 
{ 
	$password = trim(strip_tags($_POST['password']));
	$newpassword = trim(strip_tags($_POST['newpassword']));
	
	$sql = "UPDATE users SET password=:newpassword WHERE token = :token";
	$sth= $dbh->prepare($sql);
	$sth->bindValue(':token', $token);
	
	$sth->bindValue(':newpassword', $newpassword);

	$sth->execute();



	if($newpassword === $password){
		echo "  nouveau password  bien enregistré dans la base";



	}else{
		echo ($foundEmail['email']."impossible de modifier mot de passe");

	}

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
	<title>forgotten password!</title>
</head>
<body>
	
	<form method="POST" >
		<input type="text" name="password" placeholder="Votre password ?" />
		<input type="text" name="newpassword" placeholder=" ressaisissez Votre password" />
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