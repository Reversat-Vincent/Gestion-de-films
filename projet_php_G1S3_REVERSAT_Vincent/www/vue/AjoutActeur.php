<?php

	require_once("template/header.php");
	
	require_once("../model/BddConnectionManager.class.php");
	require_once("../model/ActeurManager.class.php");
	require_once("../controller/Acteur.class.php");

?>
		<form action="AjoutActeur.php" method="post">
			<label for="nom">Nom du acteur : </label>
			<input type="text" name="nom" placeholder='nom' required>
			<br>
			<input type="submit">
		</form>
	</body>
</html>

	<?php
		if(isset($_POST["nom"])) {
			$managerActeur = new ActeurManager();
			$managerActeur->addActeur($_POST["nom"]);
		}
	?>