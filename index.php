<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archives TransAlpines</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<div class="menu" style="height: 100%; background-color: white; position: fixed; top: 0;">
		<header>
			<nav>
			  <ul>
				<li class="compte"><a href="moderation.php">Contributions</a></li>
				<li class="accueil in"><a href="index.php">Accueil</a></li>
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
			
		</div>
	</div>

	<section id="content" style="height: 100%;position: fixed;top:0;">
			<div class="page accueilpage">
				<div class="section one">
					<h1>L'histoire opère lentement</h1>
					<p> Mesdames, messieurs, l'effort prioritaire en faveur du statut précaire des exclus doit nous amener au choix réellement impératif d'une restructuration dans laquelle chacun pourra enfin retrouver sa dignité.</p>
					<p>Je me tiens devant vous et vous dis que la politique globale mondialiste conforte mon désir incontestable d'aller dans le sens d'un plan correspondant véritablement aux exigences légitimes de chacun.</p>
					
					
					<span class="carte"><a href="carte.php">Explorer la carte</a></span>
				</div>
				<div class="section two">
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