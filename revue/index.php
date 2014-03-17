<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archive TransAlpine</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="js/util.js"></script>
	<script src="js/ion.rangeSlider.js"></script>
	<script src="js/ion.rangeSlider.min.js"></script>
	<script src="js/normalize.min.js"></script>
</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu" style="height: 90%; background-color: white;">
		<header>
			<nav>
			  <ul>
				<li class="compte"><a href="admin/">Mon compte</a></li>
				<li class="accueil"><a href="#">Accueil</a></li>
				<li class="revues"><a href="#">Revues</a></li>
				<li class="aPropos"><a href="#">A propos</a></li>
				<li class="aide"><a href="#">Aide</a></li>
			  </ul>   
			</nav>
			<div id="logo">
				<img src="img/logo.png" style="float: left;"/>
			</div>
		</header>
		
		<div class="form">
			<form>
				<fieldset>
				<legend>Régions</legend>
					<input type="checkbox" name="savoie" id="savoie" /> <label for=	"savoie">Savoie</label>
					<input type="checkbox" name="piemont" id="piemont" /> <label for="piemont">Piemont</label>
					<input type="checkbox" name="dauphine" id="dauphine" /> <label for="dauphine">Dauphiné</label>
					<input type="checkbox" name="suisse" id="suisse" /> <label for="suisse">Suisse</label>
				</fieldset>
				<fieldset>
				<legend>Siècles</legend>
					<input type="text" id="siecle" name="rangeName" value="10;100"/>
				</fieldset>
				<fieldset>
				<legend>Auteur</legend>
					<input type="checkbox" name="ad" id="ad" /> <label for="ad">a-d</label>
					<input type="checkbox" name="eh" id="eh" /> <label for="eh">e-h</label>
					<input type="checkbox" name="il" id="il" /> <label for="il">i-l</label>
					<input type="checkbox" name="mp" id="mp" /> <label for="mp">m-p</label>
					<input type="checkbox" name="qt" id="qt" /> <label for="qt">q-t</label>
					<input type="checkbox" name="uz" id="uz" /> <label for="uz">u-z</label>
				</fieldset>
				<fieldset>
				<legend>Typologie</legend>
					<input type="checkbox" name="compta" id="compta" /> <label for="compta">Comptabilité</label>
					<input type="checkbox" name="chartre" id="chartre" /> <label for="chartre">Chartres</label>
				</fieldset>
				<fieldset>
				<legend>Référence</legend>
					<input type="text" name="ref" id="ref" /> <label for="ref">Choisissez</label>
				</fieldset>
			</form>
		</div>
	</div>

	<section id="content" style="height: 100%;">
			<div class="accueilpage">
				<div class="section pres">
					<h1>L'histoire opère lentement</h1>
					<p> Mesdames, messieurs, l'effort prioritaire en faveur du statut précaire des exclus doit nous amener au choix réellement impératif d'une restructuration dans laquelle chacun pourra enfin retrouver sa dignité.</p>
					<p>Je me tiens devant vous et vous dis que la politique globale mondialiste conforte mon désir incontestable d'aller dans le sens d'un plan correspondant véritablement aux exigences légitimes de chacun.</p>
				</div>
				<div class="section part">
					<p>Réalisé avec le soutient de</p>
				</div>
			</div>
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
			$( ".menu" ).animate({ "left": "-40%" }, "slow" );
		});
	</script>
	
	<script>
		$("#siecle").ionRangeSlider({
			min: 8,                        // min value
			max: 15,                       // max value
			from: 10,                       // overwrite default FROM setting
			to: 11	,                         // overwrite default TO setting
			type: "double",                 // slider type
			step: 1,                       // slider step
			postfix: "ème",             // postfix text
			hasGrid: false,                  // enable grid
			hideMinMax: false,               // hide Min and Max fields
			hideFromTo: true,               // hide From and To fields
			prettify: false,                 // separate large numbers with space, eg. 10 000
			disable: false,                 // disable the slider
			onChange: function(obj){        // callback, is called on every change
				console.log(obj);
			},
			onFinish: function(obj){        // callback, is called once, after slider finished it's work
				console.log(obj);
			}
		});
	</script>
  </body>
</html>