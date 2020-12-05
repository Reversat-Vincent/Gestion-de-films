<?php
	
	require_once("../model/FilmManager.class.php");
	require_once("../model/ActeurManager.class.php");

	class CastingManager {

		public function getListCasting() { //get la liste des casting
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$castings=$bdd->prepare('SELECT * FROM casting');
			$castings->execute();
			$i = 0;
			$listCasting = array();
			foreach($castings as $casting){
				$objCasting = new Casting($casting["film"], $casting["acteur"]);
				$listCasting[$i] = $objCasting;
				$i++;
			}
			return $listCasting;
		}

		public function addCasting($film, $acteur) { //ajoute un casting
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$managerFilm = new FilmManager();
			$film = $managerFilm->getFilm(htmlentities($film));
			$managerActeur = new ActeurManager();
			$acteur = $managerActeur->getActeur(htmlentities($acteur));
			$query = $bdd->prepare('INSERT INTO casting VALUES (?, ?)');
			$query->execute(array($film->getId(), $acteur->getId()));
		}

	}

?>