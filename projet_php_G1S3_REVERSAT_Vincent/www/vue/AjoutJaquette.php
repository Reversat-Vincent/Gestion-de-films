<?php

	require_once("template/header.php");
	
	require_once("../model/BddConnectionManager.class.php");
	require_once("../model/FilmManager.class.php");
	require_once("../controller/Film.class.php");

?>
		<form action="AjoutJaquette.php" method="post">
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
			<label for="file">URL Jaquette : </label>
			<input name="file" type="text" />
			<br>
			<input type="submit">
		</form>
	</body>
</html>

<?php

	if(isset($_POST["film"]) && isset($_POST["file"])){
		if (filter_var($_POST["file"], FILTER_VALIDATE_URL)) { //vérifi qu'il s'agise bien d'une URL
			$managerFilm->addJaquette($_POST["film"], $_POST["file"]);
		} else {
			echo("not a valid URL");
		}
	}

?>