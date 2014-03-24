<?php
session_start();
if(!empty($_SESSION['admin'])){
 header('Location: admin.php');
}
if(!empty($_POST)){
 extract($_POST);
 $valid=true;
 
 if(empty($login)){
	$valid=false;
	$erreurlogin = 'Vous devez indiquer votre login';
 }
 
 if(empty($pass)){
	$valid=false;
	$erreurpass = 'Vous devez indiquer un mot de passe';
 }
 
 require('../id_connexion.php');

try{
  $bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dblogin,$dbpass) or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8');
}

catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
}

$req = $bdd->prepare('SELECT id FROM admin WHERE login=:login AND pass=:pass');
$req->execute(array('login'=>$login, 'pass'=>sha1($pass)));
if(!empty($login) && !empty($pass)){
if($req->rowCount()==0){
 $valid=false;
 $erreur = 'Mauvais identifiants';
 }
}
 
 if($valid){
	$_SESSION['admin'] = $login;
	header('Location: admin.php');
 }
 
}
?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Archive TransAlpine</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/icon_font.css">
</head>

<html>
  <body class="connexionpanel">  
  <h1>Administration du Site</h1>	
  <section class="connexionbox">
		<form name="identif" method="POST" action="index.php">
			<table>
				<tr><td class="login">Identifiant  </td><td><input type="text" name="login"></td></tr>
				<tr><td>Mot de passe  </td><td><input type="password" name="pass"></td></tr>
			</table>
			<input id="ok" type="submit" name="action" value="OK">
		</form>
	</section>
	
	<section class="backhome">
	<a href="../index.php">Retour au site <i class="icon-home-circled"></i>
	</section>
  </body>
</html>
