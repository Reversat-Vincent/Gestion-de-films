<?php

	class ActeurManager {

		public function getActeur($nom) {  //get un acteur suivant son nom
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$acteurs=$bdd->prepare('SELECT * FROM acteur WHERE nom=?');
			$acteurs->execute(array(htmlentities($nom)));
			foreach($acteurs as $acteur){
				return new Acteur($acteur["id"], $acteur["nom"]);
			}
		}

		public function getListActeur() { //get une liste d'acteur
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$acteurs=$bdd->prepare('SELECT * FROM acteur');
			$acteurs->execute();
			$i = 0;
			$listActeur = array();
			foreach($acteurs as $acteur){
				$objActeur = new Acteur($acteur["id"], $acteur["nom"]);
				$listActeur[$i] = $objActeur;
				$i++;
			}
			return $listActeur;
		}

		public function getListActeurBy($film) { //get une liste d'acteur ayant joué dans un film passer en parmètre
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$acteurs=$bdd->prepare('SELECT * FROM acteur a inner join casting c on a.id=c.acteur where c.film=?');
			$acteurs->execute(array($film->getId()));
			$i = 0;
			$listActeur = array();
			foreach($acteurs as $acteur){
				$objActeur = new Acteur($acteur["id"], $acteur["nom"]);
				$listActeur[$i] = $objActeur;
				$i++;
			}
			return $listActeur;
		}

		public function addActeur($nom) { //ajoute un acteur
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$index = count($this->getListActeur()) + 1;
			$query = $bdd->prepare('INSERT INTO acteur (id, nom) VALUES (?, ?)');
			$query->execute(array($index, htmlentities($nom)));
		}

	}

?>