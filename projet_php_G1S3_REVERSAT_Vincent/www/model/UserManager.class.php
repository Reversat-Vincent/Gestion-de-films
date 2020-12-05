<?php

	class UserManager {
		
		public function getUser($nom) { //get un utilisateur suivant son nom
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$users=$bdd->prepare('SELECT * FROM user WHERE nom=?');
			$users->execute(array(htmlentities($nom)));
			foreach($users as $user){
				return new User($user["id"], $user["nom"], $user["pwd"], $user["email"]);
			}
		}

		public function getListUser() { //get tout les utilisateurs
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$users=$bdd->prepare('SELECT * FROM user');
			$users->execute();
			$i = 0;
			$listUser = array();
			foreach($users as $user){
				$objUser = new User($user["id"], $user["nom"], $user["pwd"], $user["email"]);
				$listUser[$i] = $objUser;
				$i++;
			}
			return $listUser;
		}

		public function addUser($nom, $pwd, $email) { //ajoute un utilisateur
			$bddConnect = new BddConnectionManager('localhost', 'php', 'root', '');
			$bdd = $bddConnect->getBdd();
			$index = count($this->getListUser()) + 1;
			$query = $bdd->prepare('INSERT INTO user (id, nom, pwd, email) VALUES (?, ?, ?, ?)');
			$query->execute(array($index, $nom, $pwd, $email));
		}

	}

?>