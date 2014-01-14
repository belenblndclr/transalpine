<!doctype html>
<head>
	<meta charset="utf-8">
	<title>animate demo</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/util.js"></script>
</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu" style="height: 90%; background-color: white;">
		<div class="navarrow" style="">
			<button id="ouv">Ouvert</button> 
			<button id="miouv">Mi Ouvert</button>	
			<button id="ferm">Ferme</button>	
		</div>
		<header>
			<nav>
			  <ul>
				<li id="compte"><a href="admin/">Mon compte</a></li>
				<li id="accueil"><a href="#">Accueil</a></li>
				<li id="revues"><a href="#">Revues</a></li>
				<li id="aPropos"><a href="#">A propos</a></li>
				<li id="aide"><a href="#">Aide</a></li>
			  </ul>   
			</nav>
			<div id="logo"><img src="images/logo.png"/></div>
		</header>
	</div>

	<section id="content" style="height: 100%;">
		<div id="map-canvas" style="height: 90%;"></div>
			<?php
				$sql='SELECT * FROM map;';
				$req=$bdd->query($sql);
				require('map.php');
			?>
		</div>
	</section>
	
	
	<script>		
		$( "#ouv" ).click(function() {
			$( ".menu" ).animate({ "left": "0" }, "slow" );
		});
		
		$( "#miouv" ).click(function() {
			$( ".menu" ).animate({ "left": "-20%" }, "slow" );
		});
		
		$( "#ferm" ).click(function(){
			$( ".menu" ).animate({ "left": "-35%" }, "slow" );
		});
	</script>
  </body>
</html>