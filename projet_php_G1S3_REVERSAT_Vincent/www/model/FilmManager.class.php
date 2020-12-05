<?php

	class FilmManager {

		public function getFilm($nom) { //get un film suivant son nom
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$films=$bdd->prepare('SELECT * FROM film WHERE nom=?');
			$films->execute(array(htmlentities($nom)));
			foreach($films as $film){
				return new Film($film["id"], $film["nom"], $film["annee"], $film["score"], $film["nbVotants"], $film["jaquette"]);
			}
		}

		public function getListFilm() { //get une liste de film
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$films=$bdd->prepare('SELECT * FROM film');
			$films->execute();
			$i = 0;
			$listFilm = array();
			foreach($films as $film){
				$objFilm = new Film($film["id"], $film["nom"], $film["annee"], $film["score"], $film["nbVotants"], $film["jaquette"]);
				$listFilm[$i] = $objFilm;
				$i++;
			}
			return $listFilm;
		}

		public function getListFilmBy($acteur) { //get une liste de film dans lequel un acteur passer en parmètre à joué
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$films=$bdd->prepare('SELECT * FROM film f inner join casting c on f.id=c.film where c.acteur=?');
			$films->execute(array($acteur->getId()));
			$i = 0;
			$listFilm = array();
			foreach($films as $film){
				$objFilm = new Film($film["id"], $film["nom"], $film["annee"], $film["score"], $film["nbVotants"], $film["jaquette"]);
				$listFilm[$i] = $objFilm;
				$i++;
			}
			return $listFilm;
		}

		public function addFilm($nom, $annee, $score, $nbVotants) { //ajoute un film
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$query = $bdd->prepare('SELECT * FROM film WHERE nom=?');
			$query->execute(array(htmlentities($nom)));
			if($query->rowCount()==0) {
				$index = count($this->getListFilm()) + 1;
				$query = $bdd->prepare('INSERT INTO film (id, nom, annee, score, nbVotants) VALUES (?, ?, ?, ?, ?)');
				$query->execute(array($index, htmlentities($nom), intval($annee), intval($score), intval($nbVotants)));
			} else {
				$query = $bdd->prepare('UPDATE film SET nom=?, annee=?, score=?, nbVotants=? WHERE nom=?');
				$query->execute(array(htmlentities($nom), intval($annee), intval($score), intval($nbVotants), htmlentities($nom)));
			}
		}

		public function addJaquette($nomFilm, $url) { //ajoute une jaquette
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$query = $bdd->prepare('UPDATE film SET jaquette=? WHERE nom=?');
			$query->execute(array($url, htmlentities($nomFilm)));
		}

	}

?>