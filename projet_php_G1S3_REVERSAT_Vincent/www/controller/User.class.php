<?php

	class User {

		private $id;
		private $nom;
		private $pwd;
		private $email;

		function __construct($id, $nom, $pwd, $email) {
			$this->id = $id;
			$this->nom = $nom;
			$this->pwd = $pwd;
			$this->email = $email;
		}

		public function getId() {
			return $this->id;
		}

		public function getNom() {
			return $this->nom;
		}

		public function getPwd() {
			return $this->pwd;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function setNom($nom) {
			$this->nom = $nom;
		}

		public function setPwd($pwd) {
			$this->pwd = $pwd;
		}

		public function setEmail($email) {
			$this->email = $email;
		}

	}

?>