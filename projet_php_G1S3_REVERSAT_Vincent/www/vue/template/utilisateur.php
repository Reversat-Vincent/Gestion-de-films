<div id="user-div"> <!--affiche le nom d'utilisateur et le boutton Déconnection-->
	<p>
		<?php
			echo "Utilisateur : ".$_SESSION['nom'];
		?>
	</p>
	<p>
		<a id="logout" href="logout.php">Déconnection</a>
	</p>
</div>