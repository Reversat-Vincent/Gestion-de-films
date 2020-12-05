<?php

	class BddConnectionManager {

		private $bdd;

		function __construct($host, $db, $user, $pwd) {
			try {
				$this->bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user, $pwd);
			} catch(exception $e) {
				header('location: ../index.html');
			}
		}

		function getBdd() {
			return $this->bdd;
		}

	}

?>