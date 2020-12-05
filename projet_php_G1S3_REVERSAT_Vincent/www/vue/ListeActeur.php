<?php

	require_once("template/header.php");
	
	require_once("../model/BddConnectionManager.class.php");
	require_once("../model/ActeurManager.class.php");
	require_once("../controller/Acteur.class.php");

?>
		<table>
			<tr>
				<th>nom acteur</th>
				<th>film joué</th>
			</tr>
			<?php

				$managerActeur = new ActeurManager();
				$acteurs = $managerActeur->getListActeur();
				foreach($acteurs as $acteur) {
					$acteur->drawRaw();
				}

			?>
		</table>
	</body>
</html>