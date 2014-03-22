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
		<script src="../js/footable.filter.js" type="text/javascript"></script>
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
			
			<div class="gestionpanel gestiondoc">
				<h2>Gestion des Documents</h2>
				
				<nav>
					<div class="icon_nav">
						<a href="add_article.php">
							<i class="icon-location-circled l"></i> 	<br> Ajouter un 	Document
						</a>
					</div>
					
					<div class="icon_nav">
						<a href="SQLtoXML.php">
							<i class="icon-globe-alt l"></i>  <br>Générer la carte
						</a>
					</div>
					
					<div class="icon_nav">
						<a href="../xml/point.xml">
							<i class="icon-doc-circled l"></i> <br> Lire la carte
						</a>
					</div>	
				</nav>
				<input id="filter" type="text"/>
				<table class="footable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Région</th>
							<th>Date</th>
							<th>Siècle</th>
							<th>Typologie</th>
							<th>Editer</th>
							<th>Supprimer</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require('../id_connexion.php');

							$req = $bdd->query('SELECT * FROM document ORDER BY IDDOC ASC');
							while($data = $req->fetch()){
								echo '<tr>';
									echo '<td>'.stripslashes($data['IDDOC']).'</td>';
									echo '<td>'.stripslashes($data['IDREGION']).'</td>';
									echo '<td>'.stripslashes($data['DATE']).'</td>';								
									echo '<td>'.stripslashes($data['SIECLE']).'</td>';
									echo '<td>'.stripslashes($data['TYPOLOGIE']).'</td>';
									echo '<td><a  class="icon-pencil-circled" href="edit.php?p='.$data['IDDOC'].'"> </a></td>';
									echo '<td><a class="delete icon-cancel" href="delete.php?p='.$data['IDDOC'].'"></a></td>';
								echo '</tr>';
							}
							$req->closeCursor();
							
						?>
					</tbody>
					<tfoot class="hide-if-no-paging">
						<tr>
							<td colspan="5">
								<div class="pagination pagination-centered"></div>
							</td>
						</tr>
					</tfoot>
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
