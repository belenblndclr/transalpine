<!doctype html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>ICI</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<script>
		$(function() {
					 $( "#draggable5" ).draggable({ 
						axis: "x", 
						containment: "#containment-wrapper", 
						scroll: false,
						grid: [ 250,250 ] 
					});
		});
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/util.js"></script>
</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<div id="containment-wrapper" style="height: 100%; z-index: 2;">
		<div class="draggable ui-widget-content" style="height: 95%; " id="draggable5" >
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
	</div>
	
	<?php require('id_connexion.php');	?>

		<section id="content" style="height: 100%; ">
			<div style="height: 100%; ">
				<div id="map-canvas" style="height: 95%; "></div>

				<?php
					$sql='SELECT * FROM map;';
					$req=$bdd->query($sql);
					require('map.php');
				?>
			</div>
		</section>
</body>
	
</html>