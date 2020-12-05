<?php

	function title($url) {
		$fileName = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_FILENAME); //extraction du nom de fichier
		switch($fileName) { //le titre de la page dépend du nom du fichier
			case "index":
				return "Index";
				break;
			case "ListeActeur":
				return "Liste des Acteurs";
				break;
			case "ListeFilm":
				return "Liste des Films";
				break;
			case "AjoutActeur":
				return "Ajout d'un Acteur";
				break;
			case "AjoutFilm":
				return "Ajout d'un Film";
				break;
			case "AjoutJaquette":
				return "Ajout d'une Jaquette";
				break;
			case "AjoutCasting":
				return "Ajout d'un Acteur sur un Film";
				break;
			
			default:
				return "404";
				break;
		}	
	}

?>