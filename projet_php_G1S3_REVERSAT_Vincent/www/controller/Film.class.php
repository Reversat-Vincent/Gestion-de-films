<?php

	require_once("../model/ActeurManager.class.php");
	require_once("../controller/Acteur.class.php");

	class Film {

		private $id;
		private $nom;
		private $annee;
		private $score;
		private $nbVotants;
		private $jaquette;
		
		function __construct($id, $nom, $annee, $score, $nbVotants, $jaquette) {
			$this->id = $id;
			$this->nom = $nom;
			$this->annee = $annee;
			$this->score = $score;
			$this->nbVotants = $nbVotants;
			$this->jaquette = $jaquette;
		}

		public function drawRaw() { //écrit une ligne de tableau
			if (is_null($this->getJaquette())) {
				echo "<tr><td>".$this->getNom()."</td><td>".$this->getAnnee()."</td><td>".$this->getScore()."</td><td>".$this->getNbVotants()."</td><td>"; //si le film n'a pas de jaquette
			} else {
				echo "<tr><td>".$this->getNom()."<span><img src=\"".$this->getJaquette()."\" alt=\"Lien de jaquette obsolète\" height=\"400em\"></span></td><td>".$this->getAnnee()."</td><td>".$this->getScore()."</td><td>".$this->getNbVotants()."</td><td>"; //si le film a une jaquette
			}
			$managerActeur = new ActeurManager();
			$acteurs = $managerActeur->getListActeurBy($this);
			foreach($acteurs as $acteur){
				echo $acteur->getNom()."<br>"; //liste d'acteur ayant joué dans le film instancié
			}
			echo "</td></tr>";
		}

		public function getId() {
			return $this->id;
		}

		public function getNom() {
			return $this->nom;
		}

		public function getAnnee() {
			return $this->annee;
		}

		public function getScore() {
			return $this->score;
		}

		public function getNbVotants() {
			return $this->nbVotants;
		}

		public function getJaquette() {
			return $this->jaquette;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function setNom($nom) {
			$this->nom = $nom;
		}

		public function setAnnee($annee) {
			$this->annee = $annee;
		}

		public function setScore($score) {
			$this->score = $score;
		}

		public function setNbVotants($nbVotants) {
			$this->nbVotants = $nbVotants;
		}

		public function setJaquette($jaquette) {
			$this->jaquette = $jaquette;
		}

	}

?>