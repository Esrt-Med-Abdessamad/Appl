<?php
/**
Ce projet est développé par Esserrati Mohammed Abdessamad Un étudiant ingénieur informatique en deuxième année
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
	session_start();
	if(empty($_SESSION) || !isset($_SESSION['email']) || empty($_SESSION['email'])
						|| !isset($_SESSION['psw']) || empty($_SESSION['psw'])){
							
		if(!empty($_COOKIE) && isset($_COOKIE['email']) && !empty($_COOKIE['email'])
						&& isset($_COOKIE['psw']) && !empty($_COOKIE['psw'])){
				
				$db= new PDO('mysql:host=localhost;dbname=appswebmessageriedb;
				charset=utf8','root','esrt',[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				]);
				$mdp =$_COOKIE['psw'];$user =$_COOKIE['email'];

				$resultats = $db ->query("SELECT * FROM users WHERE email LIKE '$user'  && psw LIKE '$mdp' ");
					
				$ident =$resultats -> fetch();
					
				if(empty($ident)){
					header('Location: http://localhost:8080');
				}else{
					$_SESSION["id_user"]=$ident['id_user'];
					$_SESSION["prenom"]=$ident['pronom'];
					$_SESSION["nom"]=$ident['nom'];
					$_SESSION["email"]=$user;
					$_SESSION["psw"]=$mdp;
				}	
				}else{
				header('Location: http://localhost:8080/');
		}
		}
	$langue='1';
	
	if(array_key_exists("langue",$_GET)){
		$langue = $_GET['langue'];
		setcookie('langue', $langue, time() + 365*24*3600  , '/', null, false, true);
	}else{
		if($_COOKIE['langue']!=null){
			$langue=$_COOKIE['langue'];
		}else{
			setcookie('langue', $langue, time() + 365*24*3600  , '/', null, false, true);
		}
	}
/**
Ce projet est développé par Esserrati Mohammed Abdessamad Un étudiant ingénieur informatique en deuxième année
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/	
?>
<!doctype html>
<html lang="en">
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta charset="utf-8">
	<meta name="theme-color" content="#563d7c">
	<link rel="stylesheet" href="css_bot/css_bot.css">
	
	<title>Messagerie</title>
 </head>
  
 <body>

<?php include 'menu.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php include 'ListeAmis.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <?php	include 'AfficherMsgPrincipal.php';?>
</main>
  
  </div>
</div>
</body>
</html>

<style>
.outer-div {
     padding: 30px;
}
.inner-div {
     margin: auto;
     width: 100px;
     height: 100px;  
}
</style>