<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archives Médiévales TransAlpines</title>
	<link rel="stylesheet" href="css/icon_font.css">
	<link rel="stylesheet" href="css/filtrify/filtrify.css">
	<link rel="stylesheet" href="css/filtrify/jPages.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/filtrify/filtrify.js"></script>
	<script src="js/filtrify/highlight.pack.js"></script>
	<script src="js/filtrify/jPages.min.js"></script>
	<script src="js/filtrify/jquery.isotope.min.js"></script>
	<script src="js/filtrify/jquery.lazyload.min.js"></script>
	<script src="js/filtrify/script.js"></script>
</head>	

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu menurevue" style="height: 100%; background-color: white; position: fixed;">
		<header>
			<nav>
			  <ul>
				<li class="compte"><a href="moderation.php">Contributions</a></li>
				<li class="accueil"><a href="index.php">Accueil</a></li>
				<li class="revues in"><a href="revues.php">Revues</a></li>
				<li class="aPropos"><a href="apropos.php">A propos</a></li>
				<li class="aide"><a href="aide.php">Aide</a></li>
			  </ul>   
			</nav>
			<div id="logo">
				<img src="img/logo.png" style="float: left;"/>
			</div>
		</header>
		
		<div class="form">
		<p> Filtrer les Revues par:</p>
		<div id="placeHolder"></div>
		</div>
	</div>

	<section id="content" style="height: 100%;">
			<div class="page revuepage">
				<div class="section one">
				
				<div id="pagination"></div>
				
				<ul id="container">
				
				<?php
							$req = $bdd->query('SELECT * FROM revue ORDER BY DATEPUBLICATION ASC');
							while($data = $req->fetch()){
									echo '<li data-keyword="'.stripslashes($data['KEYWORD1']).', '.stripslashes($data['KEYWORD2']).', '.stripslashes($data['KEYWORD3']).'" data-date="'.stripslashes($data['DATEPUBLICATION']).'" > <span class="couv"><img src=".'.stripslashes($data['COUV']).'"/></span>';
									echo '<span class="col1">
									<p><b>Date</b><br/>'.stripslashes($data['DATEPUBLICATION']).'</p><p>
									<b>Référence</b><br/>'.stripslashes($data['IDREVUE']).'<br/>
									</p>
									<p>
									 <a href="'.stripslashes($data['URLPDF']).'" class="icon-download-alt"></a></p> </span>';
									echo '<span class="col2"> <h1>'.stripslashes($data['TITRE']).'</h1>';
									echo '<p>'.stripslashes($data['PREVIEW']).'</p>';
									echo '<p>Keywords : <i>'.stripslashes($data['KEYWORD1']).' - '.stripslashes($data['KEYWORD2']).' - '.stripslashes($data['KEYWORD3']).'</i></p></span></li>';
							}
							$req->closeCursor();
						?>
				</ul>
			</div>
			</div>
			
		</div>
	</section>
	
	<script type="text/javascript">
$(function() {

    var container = $("#container"),
        pagination = $("#pagination");

    function setLazyLoad () {
        container.find("img").lazyload({
            event : "turnPage",
            effect : "fadeIn"
        });
    };

    function setPagination () {
        pagination.jPages({
            containerID : "container",
            perPage : 1,
            direction : "auto",
            animation : false,
			previous : "←",
			next : "→",
            callback : function( pages, items ){
                items.showing.find("img").trigger("turnPage");
                items.oncoming.find("img").trigger("turnPage");
            }
        });
    };

    function destroyPagination () {
        pagination.jPages("destroy");
    };

    setLazyLoad();
    setPagination();

    $.filtrify("container", "placeHolder", {
        block : "data-original",
        callback : function() {
            destroyPagination();
            setPagination();
        }
    });


});
</script>
	
	
  </body>
</html>