<?php

	require_once("template/header.php");

?>
		<div class="nav-button">
			<a href="ListeFilm" class="nav-button"><p>Liste Film</p></a>
			<a href="ListeActeur" class="nav-button"><p>Liste Acteur</p></a>
			<?php
				if ($_SESSION["nom"] == "admin") { //n'affiche les fonctionnalités d'administration que si l'utilisateur est l'admin
					echo "<a href=\"AjoutFilm\" class=\"nav-button\"><p>Ajout Film</p></a>";
					echo "<a href=\"AjoutActeur\" class=\"nav-button\"><p>Ajout Acteur</p></a>";
					echo "<a href=\"AjoutJaquette\" class=\"nav-button\"><p>Upload Jaquette Film</p></a>";
					echo "<a href=\"AjoutCasting\" class=\"nav-button\"><p>Associer Acteur-Film</p></a>";
				}
			?>
		</div>
	</body>
</html>
