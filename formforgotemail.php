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

	include ("send_test.php");
			
		}else{
			echo ($foundEmail['email']."email pas trouvé dans cette base");

		}
		
	}
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