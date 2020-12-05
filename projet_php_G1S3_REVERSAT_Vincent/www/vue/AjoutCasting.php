<?php

	require_once("template/header.php");
	
	require_once("../model/BddConnectionManager.class.php");
	require_once("../model/FilmManager.class.php");
	require_once("../controller/Film.class.php");
	require_once("../model/ActeurManager.class.php");
	require_once("../controller/Acteur.class.php");
	require_once("../model/CastingManager.class.php");

?>
		<form action="AjoutCasting.php" method="post">
			<label for="film">Sélectionnez un film : </label>
			<select name="film">
				<?php //création du formulaire dynamiquement
					$managerFilm = new FilmManager();
					$films = $managerFilm->getListFilm();
					foreach($films as $film) {
						echo "<option>";
						echo $film->getNom();
						echo "</option>";
					}
				?>
			</select>
			<br>
			<label for="acteur">Sélectionnez un acteur : </label>
			<select name="acteur">
				<?php //création du formulaire dynamiquement
					$managerActeur = new ActeurManager();
					$acteurs = $managerActeur->getListActeur();
					foreach($acteurs as $acteur) {
						echo "<option>";
						echo $acteur->getNom();
						echo "</option>";
					}
				?>
			</select>
			<br>
			<input type="submit">
		</form>
	</body>
</html>

<?php

	if(isset($_POST["film"]) && isset($_POST["acteur"])){
		$managerCasting = new CastingManager();
		$managerCasting->addCasting($_POST["film"], $_POST["acteur"]);
	}

?>