#Système d'authentification

###suite du système d'authentification
	séparation de la config dans un fichier non versionné
	ajout d'un readme.md
	amélioration de l'inscription
		username != email
		mots réservés pour le username
		expressions rationnelles
			uniquement des alphanumériques pour le username
			au moins une lettre, un chiffre et un caractère spécial
	suite du login
		redirections avec messages d'informations
	page protégée, accessible que pour les utilisateurs connectés
	navigation
		salutation de l'utilisateur connecté
		logout
	ajout de rôle
		page protégée pour admin seulement

###envoi d'email avec PHPMailer

###suite encore du système d'auth
	mot de passe oublié
		token
	remember me
		cookies
###si on a le temps : 
	vérification de l'email à l'inscription