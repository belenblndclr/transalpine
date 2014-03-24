<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport"
          content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no" charset="utf-8"/>
	<title>Administration</title>
	<link rel="stylesheet" href="../css/icon_font.css">
	
    <link href="../css/footable/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footable/footable.core.css" rel="stylesheet" type="text/css"/>
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="js/jquery-1.9.1.min.js"><\/script>');
        }
    </script>
    <script src="../js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="../js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
    <script src="../js/footable.filter.js?v=2-0-1" type="text/javascript"></script>
    <script src="../js/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
    <script src="../js/bootstrap-tab.js" type="text/javascript"></script>
    <script src="../js/demos.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body class="adminpanelbody">
<div class="adminpanel">
<section class="deco">
				<a href="deconnection.php">Déconnexion <i class="icon-cancel-circled2"></i></a><br>
				<a href="../index.php">Accueil du site <i class="icon-home-circled"></i>
				</a>
			</section>
			
			<h1>Administration du Site</h1>	
    
    <ul class="nav nav-tabs" style="margin-bottom:0;">
        <li class="active"><a href="#docs">Gestion des Documents</a></li>
        <li><a href="#revues">Gestion des Revues</a></li>
        <li><a href="#last">Docs</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="docs">
            <p>
                Rechercher un Document <input id="filter" type="text"/>
                <a href="#clear" class="clear-filter" title="clear filter">[Remettre à zéro]</a>
            </p>
            <table class="table demo" data-filter="#filter" data-page-size="5">
                <thead>
                <tr>
                   <th>ID</th>
							<th>Région</th>
							<th>Date</th>
							<th>Siècle</th>
							<th>Typologie</th>
							<th></th>
							<th></th>
                </tr>
                </thead>
                <tbody>
                <?php
							require('../id_connexion.php');

							$req = $bdd->query('SELECT * FROM document ORDER BY IDDOC ASC');
							while($data = $req->fetch()){
								echo '<tr>';
									echo '<td>'.stripslashes($data['IDDOC']).'</td>';
									echo '<td class="region'.stripslashes($data['IDREGION']).'"></td>';
									echo '<td>'.stripslashes($data['DATE']).'</td>';								
									echo '<td>'.stripslashes($data['SIECLE']).'</td>';
									echo '<td>'.stripslashes($data['TYPOLOGIE']).'</td>';
									echo '<td><a  class="icon-pencil-circled" href="edit.php?p='.$data['IDDOC'].'"> </a></td>';
									echo '<td><a class="delete icon-cancel" href="delete.php?p='.$data['IDDOC'].'"></a></td>';
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
			
			<section class="gestion_nav">
				<a href="add_article.php" target="_top">
					<i class="icon-location-circled"></i> Ajouter un 	Document
				</a>
				<a href="SQLtoXML.php">
					<i class="icon-globe-alt"></i> Générer la carte
				</a>
			</section>
        </div>
        <div class="tab-pane" id="revues">
         <p>
                Rechercher une Revue <input id="filter2" type="text"/>
                <a href="#clear" class="clear-filter" title="clear filter">[Remettre à zéro]</a>
            </p>
            <table class="table demo" data-filter="#filter2" data-page-size="5">
                <thead>
                <tr>
					<th>ID</th>
					<th>Date de Publication</th>
					<th>Référence</th>
					<th>Couverture</th>
					<th>Typologie</th>
					<th>Preview</th>
					<th>Mots clés</th>
					<th></th>
					<th></th>
                </tr>
                </thead>
                <tbody>
                <?php
						require('../id_connexion.php');
							$req = $bdd->query('SELECT * FROM revue ORDER BY DATEPUBLICATION ASC');
							while($data = $req->fetch()){
								echo '<tr>';
									echo '<td>'.stripslashes($data['IDREVUE']).'</td>';
									echo '<td>'.stripslashes($data['DATEPUBLICATION']).'</td>';
									echo '<td>'.stripslashes($data['REFERENCE']).'</td>';								
									echo '<td><img src="../'.stripslashes($data['COUV']).'" height="100px"/></td>';
									echo '<td>'.stripslashes($data['TITRE']).'</td>';
									echo '<td>'.stripslashes($data['PREVIEW']).'</td>';
									echo '<td>'.stripslashes($data['KEYWORD1']).'</td>';
									echo '<td><a href="edit.php?p='.$data['PREVIEW'].'"><i class="icon-pencil-circled"></i></a></td>';
									echo '<td><a class="delete" href="delete.php?p='.$data['KEYWORD1'].'"><i class="icon-cancel"></i></a></td>';
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
			
			<section class="gestion_nav">
				<a href="add_article.php" target="_top">
					<i class="icon-doc-new-circled"></i> Ajouter une Revue
				</a>
			</section>
        </div>
        <div class="tab-pane" id="last">
           3
    </div>
</div>
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
