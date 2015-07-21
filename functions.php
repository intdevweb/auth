<?php

	//affiche un array dans une balise <pre>
	//sur fond noir 
	function pr($var)
	{
		echo '<pre style="background-color: #000; color: #FFF;">';
		print_r($var);
		echo '</pre>';
	}


	//convertit une date du format MySQL, vers le français
	function convertDateToFrench($dateMysql)
	{
		$unix = strtotime($dateMysql);
		$frenchDate = date("d-m-Y H:i:s", $unix);

		return $frenchDate;
	}

	//si l'utilisateur n'est pas connecté, on le redirige vers login.php
	function lock()
	{
		//si on a oublié d'appeler session_start()
		if (!isset($_SESSION)){
			session_start();
		}

		if (empty($_SESSION['user'])){
			header("Location: login.php");
			die();
		}
	}