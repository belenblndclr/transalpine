<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archive TransAlpine</title>
	<link rel="stylesheet" href="css/style.css">

</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu menurevue" style="height: 100%; background-color: white; position: fixed;">
		<header>
			<nav>
			  <ul>
				<li class="compte"><a href="admin/">Mon compte</a></li>
				<li class="accueil"><a href="index.php">Accueil</a></li>
				<li class="revues"><a href="revues.php">Revues</a></li>
				<li class="aPropos"><a href="apropos.php">A propos</a></li>
				<li class="aide"><a href="aide.php">Aide</a></li>
			  </ul>   
			</nav>
			<div id="logo">
				<img src="img/logo.png" style="float: left;"/>
			</div>
		</header>
		
		<div class="form">
			#Revue
		</div>
	</div>

	<section id="content" style="height: 100%;">
			<div class="page revuepage">
				<div class="section one">
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
						echo '<img class="couvrevue" src=".'.$data['COUV'].'" /> 
				</div>
				<div class="section two">';
						echo '<p class="datarevu"><b>Publié le </b>'.$data['DATEPUBLICATION'].'<br><br>
						<b>Référence </b>'.$data['REFERENCE'].'<br><br>
						<a href="'.$data['URLPDF'].'" target="_blank">Télécharger</a></p>
						<h1>'.$data['TITRE'].' </h1> 
						<p class="previewrevue">';
						echo $data['PREVIEW']; 
					} 

					// on ferme la connexion à mysql
					mysql_close(); 
					?>  
					</p>
				</div>
			</div>
		</div>
	</section>
	
	
  </body>
</html>