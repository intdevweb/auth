	<?php

	//envoie un email grâce aux serveurs SMTP de gmail

	/*||||||||||||||||||||||
	Attention :: Il faut maintenant autoriser les apps en se rendant d'abord sur 
	https://www.google.com/settings/security/lesssecureapps
	||||||||||||||||||||||*/

	/*
	ATTENTION : NE PUBLIEZ PAS VOTRE MOT DE PASSE GMAIL DE VOTRE COMPTE PERSO SUR GITHUB !!!!!
	*/

	//////////// POUR INFO 																///////////////
	//////////////////////ajouot de bibliotheque et de composer pour les telecharger //////////////////
	//////////////////////se connecter sous dos se mettre dans le repertoire voulu , ici auth et //////
	///////////////////// taper : composer install 											///////////
	///////////////////// puis installer la bibliotheque de messagerie maxwell irc 			///////////
	////////////////////// en saissisant toujours en dos : composer require phpmailer/phpmailer ///////
require ("db.php");
	require ("config.php");
	require ("vendor/autoload.php");

	//instance de PHPMailer
	$mail = new PHPMailer;

	//config de l'envoi
	$mail->isSMTP();
	$mail->setLanguage('fr');
	$mail->CharSet = 'UTF-8';

	//debug
	$mail->SMTPDebug = 0;	//0 pour désactiver les infos de débug
	$mail->Debugoutput = 'html';

	//config du serveur smtp
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = SMTPUSER;
	$mail->Password = SMTPPASS;

	//qui envoie, et qui reçoit

	$mail->setFrom('picocjo@gmail.com', 'jp_informatique');
	
	$mail->addAddress('jp_informatique@hotmail.fr', 'picocjo gmail');

	//$mail->setFrom('accounts@auth.com', 'Test');
	//$mail->addAddress('guillaumewf3@gmail.com', 'Guillaume Sylvestre');


	//mail au format HTML
	$mail->isHTML(true); 

	//sujet 
	$mail->Subject = 'Envoyé par PHP !';

	//message (avec balises possibles)
	//reour sur la page formforgotmail.php
	$mail->Body = 
	'<a href="http://localhost/auth/formnewpassword.php?token='.$token.'" >
	Cliquez ici pour créer un nouveau mot de passe</a>';

	//pièce jointe
	//$mail->addAttachment('panda.gif');

	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
