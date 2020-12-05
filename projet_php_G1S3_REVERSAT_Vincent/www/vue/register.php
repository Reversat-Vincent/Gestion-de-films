<?php

	if ((isset($_POST['nom']) && isset($_POST['pwd']) && isset($_POST['mail'])) && $_POST['nom'] != "" && $_POST['pwd'] != "") { //vérifi si le formulaire register est bien rempli et si les champs nom et password non pas été laissé vide
		if (htmlentities($_POST['nom']) != "admin") { //vérifi que le nom choisi n'est pas "admin" car c'est un nom réservé
			session_start();

			require_once("../model/BddConnectionManager.class.php");
			require_once("../model/UserManager.class.php");
			require_once("../controller/User.class.php");

			$managerUser = new UserManager();

			if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) { //vérifi la validité de l'email
				$users = $managerUser->getListUser();
				$emailUnique = true;
				foreach ($users as $user) {
					if ($user->getEmail() == $_POST['mail']) { //vérifi que le mail n'est pas déjà utiliser
						$emailUnique = false;
					}
				}
				if ($emailUnique) { //si l'email est unique, enregistre le nouvel utilisateur
					$managerUser->addUser(htmlentities($_POST["nom"]), htmlentities($_POST["pwd"]), $_POST['mail']);
					$_SESSION['nom'] = htmlentities($_POST['nom']);
					header('location: index.php');
				} else { //message d'erreur approprié à l'erreur
					echo '<body onLoad="alert(\'email déjà enregistré\')">';
					echo '<meta http-equiv="refresh" content="0;URL=../index.html">';
				}
			} else {
				echo '<body onLoad="alert(\'email non valide\')">';
				echo '<meta http-equiv="refresh" content="0;URL=../index.html">';
			}
		} else {
			echo '<body onLoad="alert(\'nom indisponible\')">';
			echo '<meta http-equiv="refresh" content="0;URL=../index.html">';
		}
	} else {
		echo '<body onLoad="alert(\'Variables du formulaire non déclarées\')">';
		echo '<meta http-equiv="refresh" content="0;URL=../index.html">';
	}

?>