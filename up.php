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