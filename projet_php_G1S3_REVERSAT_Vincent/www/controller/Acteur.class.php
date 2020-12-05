<?php

	require_once("../model/FilmManager.class.php");
	require_once("../controller/Film.class.php");

	class Acteur {

		private $id;
		private $nom;
		
		function __construct($id, $nom) {
			$this->id = $id;
			$this->nom = $nom;
		}

		public function drawRaw() { //écrit une ligne de tableau
			echo "<tr><td>".$this->getNom()."</td><td>";
			$managerFilm = new FilmManager();
			$films = $managerFilm->getListFilmBy($this);
			foreach($films as $film){
				echo $film->getNom()."<br>"; //liste de film dans lequel l'acteur instancié à joué
			}
			echo "</td></tr>";
		}

		public function getId() {
			return $this->id;
		}

		public function getNom() {
			return $this->nom;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function setNom($nom) {
			$this->nom = $nom;
		}

	}

?>