<?php 
	session_start();
	include("functions.php");
	pr($_SESSION);

	//vérification que l'utilisateur est bien connecté

	//voir functions.php
	lock();

	//sinon... on ne fait rien et la page ci-dessous s'affichera

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil !</title>
</head>
<body>

	<a href="logout.php" title="Me déconnecter de mon compte">Déconnexion</a>

	<h1>Profil de <?php echo $_SESSION['user']['username']; ?></h1>
	<p>Cette page ne devrait être accessible que pour les utilisateurs connectés.</p>
</body>
</html>