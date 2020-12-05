<?php

	require_once("template/header.php");
	
	require_once("../model/BddConnectionManager.class.php");
	require_once("../model/FilmManager.class.php");
	require_once("../controller/Film.class.php");

?>
		<form action="AjoutFilm.php" method="post">
			<label for="nom">Nom du film : </label>
			<input type="text" name="nom" placeholder='nom' required>
			<br>
			<label for="annee">Année de sortie : </label>
			<input type="number" name="annee" placeholder='annee' required>
			<br>
			<label for="score">Score du film : </label>
			<input type="number" step="0.1" name="score" placeholder='score' required>
			<br>
			<label for="nbVotants">Nombre de votants : </label>
			<input type="number" name="nbVotants" placeholder='nbVotants' required>
			<br>
			<input type="submit">
		</form>
	</body>
</html>

	<?php
		if(isset($_POST["nom"]) && isset($_POST["annee"]) && isset($_POST["score"]) && isset($_POST["nbVotants"])) {
			$managerFilm = new FilmManager();
			$managerFilm->addFilm($_POST["nom"], $_POST["annee"], $_POST["score"], $_POST["nbVotants"]);
		}
	?>