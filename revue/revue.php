	<?php 
		// on se connecte à MySQL
		$db = mysql_connect('localhost', 'root', ''); 

		// on seléctionne la base
		mysql_select_db('google_maps',$db); 

		// on crée la requete SQL
		$sql = "SELECT * FROM revue"; 

		// on envoie la requête
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

		// on fait une boucle qui va faire un tour pour chaque enregistrement
		while($data = mysql_fetch_array($req)) 
			{
			// on affiche les informations de l'enregistrement en cours
			echo '
<div class="result">
	<div class="section one">
		<img class="couvrevue" src=".'.$data['COUV'].'" /> 
	</div>
	<div class="section two">';
		echo '
		<p class="datarevu">
			<b>Publié le </b>'.$data['DATEPUBLICATION'].'<br><br>
			<b>Référence </b>'.$data['REFERENCE'].'<br><br>
			<a href="'.$data['URLPDF'].'" target="_blank">Télécharger</a>
		</p>
		<h1>'.$data['TITRE'].' </h1> 
		<p class="previewrevue">';
			echo $data['PREVIEW'].' 
		</p>
	</div>
</div>'; 
		} 

		// on ferme la connexion à mysql
		mysql_close(); 
	?> 