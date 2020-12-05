<?php

	session_start();

	require_once("../vue/title.php");

	if (substr(title($_SERVER['REQUEST_URI']), 0, 5) == "Ajout") { //si la page commence par "Ajout", c'est une page d'administration
		if ($_SESSION["nom"] != "admin") { //donc si l'utilisateur n'est pas l'admin et cherche à y accéder
			header('location: index.php'); //il est rediriger vers l'index
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			<?php
				echo title($_SERVER['REQUEST_URI']); //affiche un titre retourné par title.php
			?>
		</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<?php
		if (title($_SERVER['REQUEST_URI']) == "Index") { //si il s'agit de la page d'index le body a besoin d'un id pour les propriétés css
			echo "<body id=\"index\">";
		} else {
			echo "<body>";
		}
		if (title($_SERVER['REQUEST_URI']) != "404") { //la page d'erreur 404 n'a pas besoin de la template d'afficher l'utilisateur
			require_once("template/utilisateur.php");
		}
		if (title($_SERVER['REQUEST_URI']) != "Index") { //l'index n'a pas besoin du boutton de retour à l'index
			require_once("template/home.php");
			echo "<h1>".title($_SERVER['REQUEST_URI'])."</h1>";
		}
	?>
		<br>