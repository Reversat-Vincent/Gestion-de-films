<?php

	if (isset($_POST['nom']) && isset($_POST['pwd']) && $_POST['nom'] != "" && $_POST['pwd'] != "") { //vérifi si le formulaire login est bien rempli et si les champs nom et password non pas été laissé vide

		session_start();

		require_once("../model/BddConnectionManager.class.php");
		require_once("../model/UserManager.class.php");
		require_once("../controller/User.class.php");

		$managerUser = new UserManager();
		$user = $managerUser->getUser(htmlentities($_POST['nom'])); //récupère l'utilisateur par son nom

		if (!is_null($user) && $user->getPwd() == htmlentities($_POST['pwd'])) { //vérifi le password
			$_SESSION['nom'] = $user->getNom();
			header('location: index.php');
		} else { //message d'erreur approprié à l'erreur
			echo '<body onLoad="alert(\'Error nom or pwd\')">';
			echo '<meta http-equiv="refresh" content="0;URL=../index.html">';
		}
	} else {
		echo '<body onLoad="alert(\'Variables du formulaire non déclarées\')">';
		echo '<meta http-equiv="refresh" content="0;URL=../index.html">';
	}

?>