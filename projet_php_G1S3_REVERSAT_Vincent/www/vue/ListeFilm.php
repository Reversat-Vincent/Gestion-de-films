<?php

	require_once("template/header.php");
	
	require_once("../model/BddConnectionManager.class.php");
	require_once("../model/FilmManager.class.php");
	require_once("../controller/Film.class.php");

?>
		<table>
			<tr>
				<th>nom film</th>
				<th>année</th>
				<th>score</th>
				<th>nombre vote</th>
				<th>acteur ayant joué</th>
			</tr>
			<?php

				$managerFilm = new FilmManager();
				$films = $managerFilm->getListFilm();
				foreach($films as $film) {
					$film->drawRaw();
				}

			?>
		</table>
	</body>
</html>