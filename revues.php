<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archive TransAlpine</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/pagination.css" />
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.pagination.js"></script>
    
    <script type="text/javascript">
    
        // This demo shows how to paginate elements that were loaded via AJAX
        // It's very similar to the static demo.
    
        /**
         * Callback function that displays the content.
         *
         * Gets called every time the user clicks on a pagination link.
         *
         * @param {int}page_index New Page index
         * @param {jQuery} jq the container with the pagination links as a jQuery object
         */
		function pageselectCallback(page_index, jq){
            var new_content = $('#hiddenresult div.result:eq('+page_index+')').clone();
            $('#Searchresult').empty().append(new_content);
            return false;
        }
       
        /** 
         * Callback function for the AJAX content loader.
         */
        function initPagination() {
            var num_entries = $('#hiddenresult div.result').length;
            // Create pagination element
            $("#Pagination").pagination(num_entries, {
                num_edge_entries: 0,
                num_display_entries: 0,
                callback: pageselectCallback,
                items_per_page:1
            });
         }
                
        // Load HTML snippet with AJAX and insert it into the Hiddenresult element
        // When the HTML has loaded, call initPagination to paginate the elements        
        $(document).ready(function(){      
            $('#hiddenresult').load('revue/revue.php', null, initPagination);
        });
        
        
        
    </script>

</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu menurevue" style="height: 100%; background-color: white; position: fixed;">
		<header>
			<nav>
			  <ul>
				<li class="compte"><a href="admin/">Mon compte</a></li>
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
			<div id="Pagination"></div>
		</div>
	</div>

	<section id="content" style="height: 100%;">
			<div class="page revuepage">
				<div id="Searchresult">
					This content will be replaced when pagination inits.
				</div>
				<div id="hiddenresult" style="display:none;">
        
				</div>
			</div>
		</div>
	</section>
	
	
  </body>
</html>