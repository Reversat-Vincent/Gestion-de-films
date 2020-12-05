<?php

	class Acteur {

		private $film;
		private $acteur;
		
		function __construct($film, $acteur) {
			$this->film = $film;
			$this->acteur = $acteur;
		}

		public function getFilm() {
			return $this->film;
		}

		public function getActeur() {
			return $this->acteur;
		}

		public function setFilm($film) {
			$this->film = $film;
		}

		public function setActeur($acteur) {
			$this->acteur = $acteur;
		}

	}

?>