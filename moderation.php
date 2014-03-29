<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archive TransAlpine</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/icon_font.css">
	
	<link href="css/footable/footable.core.css" rel="stylesheet" type="text/css"/>
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="js/jquery-1.9.1.min.js"><\/script>');
        }
    </script>
    <script src="js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="js/footable.filter.js?v=2-0-1" type="text/javascript"></script>
    <script src="js/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
</head>

<html style="height: 100%;">
  <body style="height: 100%;">  
	<?php require('id_connexion.php');	?>
	<div class="menu menumoderation" style="height: 100%; background-color: white; position: fixed;">
		<header>
			<nav>
			  <ul>
				<li class="compte in"><a href="moderation.php">Contributions</a></li>
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
		<p>
                Pour retrouver votre contribution, recherchez l'adresse E-Mail associée <input id="filter4" type="text"/>
                <a href="#clear" class="clear-filter" title="clear filter">[Remettre à zéro]</a>
        </p>
		
		<p class="statut"> Statut des contributions:<br/> <span class="att">En attente de modération</span> </br> <span class="maj">Contribution approuvée</span> </br> <span class="ref">Contribution refusée</span>
		</p>
		</div>
	</div>

	<section id="content" style="height: 100%;">
			<div class="page moderationpage">
				<div class="section on">
				
			 <table class="table" data-filter="#filter4" data-page-size="10">
                <thead>
                <tr>
					<th>Référence contribution</th>
					<th>Date contribution</th>
					<th>Email contributeur</th>
					<th>Description contribution</th>
					<th>Référence document</th>
					<th>Statut</th>
                </tr>
                </thead>
                <tbody>
                <?php
						require('id_connexion.php');
							$req = $bdd->query('SELECT * FROM contribution ORDER BY DATECONTRI ASC');
							while($data = $req->fetch()){
								echo '<tr>';
									echo '<td>'.stripslashes($data['IDDOC']).'</td>';
									echo '<td>'.stripslashes($data['DATECONTRI']).'</td>';
									echo '<td>'.stripslashes($data['EMAILCONTRI']).'</td>';
									echo '<td>'.stripslashes($data['DESCCONTRI']).'</td>';
									echo '<td>'.stripslashes($data['IDDOC']).'</td>';
									echo '<td> <span class="icon-info-circled '.stripslashes($data['STATUTCONTRI']).'"></td>';
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
				
				<div class="section two">
					<p>Navigation Secondaire</p>
				</div>
			</div>
			
		</div>
	</section>
	<script type="text/javascript">
    $(function () {
        $('table').footable().bind({
            'footable_filtering': function (e) {
                var selected = $('.filter-status').find(':selected').text();
                if (selected && selected.length > 0) {
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                }
            },
            'footable_filtered': function() {
                var count = $('table.demo tbody tr:not(.footable-filtered)').length;
                $('.row-count').html(count + ' rows found');
            }
        });

        $('.clear-filter').click(function (e) {
            e.preventDefault();
            $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
            $('.row-count').html('');
        });

        $('.filter-status').change(function (e) {
            e.preventDefault();
            $('table.demo').data('footable-filter').filter( $('#filter').val() );
        });
    });
</script>
	
	
  </body>
</html>