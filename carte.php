<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archive TransAlpine</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/icon_font.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/util.js"></script>
	<script src="js/ion.rangeSlider.js"></script>
	<script src="js/ion.rangeSlider.min.js"></script>
	<script src="js/normalize.min.js"></script>
</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu" style="height: 100%;">
		
		<header>
			<nav>
			  <ul>
				<li class="compte"><a href="moderation.php">Contributions</a></li>
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
					<!--<input type="text" id="siecle" name="rangeName" value="10;100"/>-->
					
					<input type="checkbox" name="8" id="8" /> <label for=	"8">IIX</label>
					<input type="checkbox" name="9" id="9" /> <label for=	"9">IX</label>
					<input type="checkbox" name="10" id="10" /> <label for=	"10">X</label>
					<input type="checkbox" name="11" id="11" /> <label for=	"11">XI</label>
					<input type="checkbox" name="12" id="12" /> <label for=	"12">XII</label>
					<input type="checkbox" name="13" id="13" /> <label for=	"13">XIII</label>
					<input type="checkbox" name="14" id="14" /> <label for=	"14">XIV</label>
					<input type="checkbox" name="14" id="14" /> <label for=	"15">XV</label>

				</fieldset>
				<!--<fieldset>
				<legend>Auteur</legend>					
					<input type="checkbox" name="uz" id="uz" /> <label for="uz">u-z</label>
					<input type="checkbox" name="qt" id="qt" /> <label for="qt">q-t</label>
					<input type="checkbox" name="mp" id="mp" /> <label for="mp">m-p</label>
					<input type="checkbox" name="il" id="il" /> <label for="il">i-l</label>
					<input type="checkbox" name="eh" id="eh" /> <label for="eh">e-h</label>
					<input type="checkbox" name="ad" id="ad" /> <label for="ad">a-d</label>
				</fieldset>-->
				<fieldset>
				<legend>Typologie</legend>
					<input type="checkbox" name="compta" id="compta" /> <label for="compta">Comptabilité</label>
					<input type="checkbox" name="chartre" id="chartre" /> <label for="chartre">Chartres</label>
				</fieldset>
				<!--<fieldset>
					<legend>la Grande Histoire</legend>					
					    
				</fieldset>-->
				<fieldset>
					
					<input type="submit" name="refvalue" value="Choisir une référence" />
					<select name="ref" size="1">
				<?php
							$req = $bdd->query('SELECT * FROM document');
							while($data = $req->fetch()){
									echo '<option>'.stripslashes($data['IDDOC']).'</option>';
							}
							$req->closeCursor();
				?>
				</select>
				</fieldset>
			</form>
		</div>
	</div>
	
	<div id="navarrow" style="position: fixed; bottom: 1em;">
		<button id="ferm"></button> <!--Ferme-->
		<button id="miouv"></button> <!--Mi Ouvert-->
		<button id="ouv"></button> <!--Ouvert-->
	</div>


	<section id="content" style="height: 100%;">
		<div id="map-canvas" style="height: 100%;"></div>
			<?php
				$sql='SELECT * FROM document;';
				$req=$bdd->query($sql);
				require('map.php');
			?>
		</div>
	</section>
	
	
	<section class="contact">
		 0xe839
	</section>
	
	
	<script>		
		$( "#ouv" ).click(function() {
			$( ".menu" ).animate({ "left": "0" }, "slow" );
		});
		
		$( "#miouv" ).click(function() {
			$( ".menu" ).animate({ "left": "-15em" }, "slow" );
		});
		
		$( "#ferm" ).click(function(){
			$( ".menu" ).animate({ "left": "-25em" }, "slow" );
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
	<!--
	<script>
		$("input:checkbox").bind( "change", function() 
		{
			$.each(markers, function(index, m) 
			{
				console.log(m); // récup les check checked et vérif si correspondance
				if($("input:checkbox[name='region'][value='"+m.region+"']").is(':checked'))
				{
					m.setVisible(true);
				} 
				else
				{
					m.setVisible(false);
				}
			})
		});
		
	</script>-->
  </body>
</html>