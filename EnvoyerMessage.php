<?php
/**
Ce projet est développé par Esserrati Mohammed Abdessamad
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
				header('Location: index.php');
			}else{
				$_SESSION["id_user"]=$ident['id_user'];
					$_SESSION["prenom"]=$ident['pronom'];
				$_SESSION["nom"]=$ident['nom'];
					$_SESSION["email"]=$user;
				$_SESSION["psw"]=$mdp;
			}	
		}else{
			header('Location: index.php');
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
?>
<!doctype html>
<html lang="en">
 <head>
 	<script type="text/javascript" src="javascript/jsMessages.js"></script>
	<link rel="stylesheet" href="css/stylesMessages.css">
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
    <?php
		if(!empty($_GET) && isset($_GET['amis']) && !empty($_GET['amis'])){
				$_amis=$_GET['amis'];
				
		?>
		
		<div class="outer-div">
		
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php $titre=array("Envoyer un message:","إبعث رسالة:");
		  echo $titre[$langue];?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary"><?php $profil=array("Voir le profil","انظر الملف الشخصي");
		  echo $profil[$langue];?></button>
            <button type="button" class="btn btn-sm btn-outline-secondary"><?php $bloq=array("Bloquer","حجب");
		  echo $bloq[$langue];?></button>
          </div>
        </div>
		 </div>
		<div  class="inner-div">
		<section class="chat">
			<div class="msgs">
			<div class="messages">
				<!-- section pour afficher les messages -->
			</div>
			<div class="EnvMsg">
				<form   action="gererBaseDD.php?mode=write&amis=".$_amis.>
					
					<input type="text" name="msgTxt" id="msgTxt"
							placeholder="<?php $env1=array("Ecrire votre message","اكتب رسالتك");
		  echo $env1[$langue];?>">
					
					<button type="submit"  ><?php $env=array("Envoyer le message","إرسال رسالة");
		  echo $env[$langue];?></button>
					
				</form>
			</div>
			</div>
		</section>
		</div>
		</div>
	<?php
		}
	  
	  
	  /**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
	  ?>
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