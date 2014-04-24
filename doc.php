<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archive TransAlpine</title>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/icon_font.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="js/notebook/jquery.notebook.css" rel="stylesheet">
	
	<script src="js/notebook/libs/jquery-1.10.2.min.js"></script>
	<script src="js/notebook/jquery.notebook.js"></script>
</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu" style="height: 100%; background-color: white; position: fixed; top: 0;">
		
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
	</div>
	

	<section id="content">
		<div class="page docpage">
				<div class="section one">
					<?php
						$p = 1;
						$req = $bdd->prepare("SELECT * FROM document WHERE IDDOC=".$p);
						$req->execute();
						$data = $req->fetch();
							$trans = $data['TRANSCRIPTION'];
							$imglink = $data['IMAGE'];
							$iddoc = $data['IDDOC'];
							$idregion = $data['IDREGION'];
							$date = $data['DATE'];
							$siecle = $data['SIECLE'];
							$typo = $data['TYPOLOGIE'];
						$req->closeCursor();
					?>
					<div class="my-img part">
						<img src="<?php echo stripslashes($imglink);?>" width="400px"; />
						<p>
							<span>Id Doc: <?php echo stripslashes($iddoc);?></span>
							<span>Région: <?php echo stripslashes($idregion);?></span>
							<span>Année: <?php echo stripslashes($date);?> </span>
							<span>Siècle: <?php echo stripslashes($siecle);?> </span>
							<span>Typologie: <?php echo stripslashes($typo);?></span>
						</p>
					</div>
					<div class="my-editor part">
						<?php echo stripslashes($trans);?>
					</div>
				</div>
				
				<div class="section two">
				<a href="">PDF</a> <a href="">Contribuer</a></div>
		</div>
		
	</section>
	
	
	<script>
		$(document).ready(function(){
			$('.my-editor').notebook();
		});
	</script>
	
  </body>
</html>