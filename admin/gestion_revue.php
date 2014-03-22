<!DOCTYPE html> 
<html lang="fr"> 
 
	<head>
		<meta charset="utf-8">
		<title>Administration</title>
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/icon_font.css">
		
		
	
		<link href="../css/footable/footable.core.css" rel="stylesheet" type="text/css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
		<script src="../js/footable.js" type="text/javascript"></script>
		<script src="../js/footable.sort.js" type="text/javascript"></script>
		<script src="../js/footable.paginate.js" type="text/javascript"></script>
			
	</head> 

	<body class="adminpanelbody">
		<div class="adminpanel">
			<section class="deco">
				<a href="deconnection.php">Déconnexion <i class="icon-cancel-circled2"></i></a><br>
				<a href="../index.php">Accueil du site <i class="icon-home-circled"></i>
				</a>
			</section>
			<h1>Administration du Site</h1>	
				<div class="gestionpanel gestionrevue">
					<h2>Gestion des Revues</h2>
						
				<nav>
					
					<span class="icon_nav">
						<a href="add_article.php">
							<i class="icon-doc-new-circled l"></i> Ajouter une Revue
						</a>
					</span>
				</nav>
				
				<table class="footable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Date de Publication</th>
							<th>Référence</th>
							<th>Couverture</th>
							<th>Typologie</th>
							<th>Preview</th>
							<th>Mots clés</th>
							<th>Editer</th>
							<th>Supprimer</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<?php
						require('../id_connexion.php');
							$req = $bdd->query('SELECT * FROM revue ORDER BY DATEPUBLICATION ASC');
							while($data = $req->fetch()){
								echo '<tr>';
									echo '<td>'.stripslashes($data['IDREVUE']).'</td>';
									echo '<td>'.stripslashes($data['DATEPUBLICATION']).'</td>';
									echo '<td>'.stripslashes($data['REFERENCE']).'</td>';								
									echo '<td><img src="../'.stripslashes($data['COUV']).'" height="100px"/></td>';
									echo '<td>'.stripslashes($data['TITRE']).'</td>';
									echo '<td>'.stripslashes($data['PREVIEW']).'</td>';
									echo '<td>'.stripslashes($data['KEYWORD1']).'</td>';
									echo '<td><a href="edit.php?p='.$data['PREVIEW'].'"><i class="icon-pencil-circled"></i></a></td>';
									echo '<td><a class="delete" href="delete.php?p='.$data['KEYWORD1'].'"><i class="icon-cancel"></i></a></td>';
								echo '</tr>';
							}
							$req->closeCursor();
						?>
					</tbody>
				</table>
			</div>
			
			
			<div class="footer">
			COUCOU
			</div>
		</div>
		
		<script type="text/javascript">
			$(function () {
				$('.footable').footable();
			});
		</script>
		
	</body>
</html>
