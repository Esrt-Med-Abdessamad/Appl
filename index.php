<?php
/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
	session_start();
	
	if(!empty($_SESSION)&& isset($_SESSION['email']) && !empty($_SESSION['email'])
						&& isset($_SESSION['psw']) && !empty($_SESSION['psw'])){
		header('Location: principale.php');
	}else{
		/***connexion simple a la base de donnees via PDO*/
		$db= new PDO('mysql:host=localhost;dbname=appswebmessageriedb;
				charset=utf8','root','esrt',[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
		if(!empty($_COOKIE) && isset($_COOKIE['email']) && !empty($_COOKIE['email'])
								&& isset($_COOKIE['psw']) && !empty($_COOKIE['psw'])){
		$mdp =$_COOKIE['psw'];$user =$_COOKIE['email'];

		$resultats = $db ->query("SELECT * FROM users WHERE email LIKE '$user'  && psw LIKE '$mdp' ");
			
		$ident =$resultats -> fetch();
			
		if(!empty($ident)){
			$_SESSION["id_user"]=$ident['id_user'];
			$_SESSION["prenom"]=$ident['pronom'];
			$_SESSION["nom"]=$ident['nom'];
			$_SESSION["email"]=$user;
			$_SESSION["psw"]=$mdp;
			header('Location: principale.php');
		}	
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
	include 'SessionCookie.php';
/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/?>
<!DOCTYPE html>
<html>
<head>
	<meta  Charset="UTF-8" http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<link rel="stylesheet" href="css_bot/css_bot.css">
	<link rel="stylesheet" href="css/styles.css">
	<title><?php echo $titre[$langue]; ?></title>
</head>

<body>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><?php echo $titre[$langue]; ?></a>
		  <input class="form-control form-control-dark w-100" type="text" placeholder="<?php echo $Search[$langue]; ?>" aria-label="Search">
		  <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
			  <a class="nav-link" href="index.php?aaction=connecter"><?php echo $conne[$langue]; ?></a>
			</li>
		  </ul>
		  <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
			  <a class="nav-link" href="index.php?aaction=creer"><?php echo $creer[$langue]; ?></a>
			</li>
		  </ul>
	</nav>

    <div class="Contune">
    <table width="100%">
    	<tr>
    		<td valign="middle" align ="center" >
    			<div class="presenter">
    		<h4><?php echo $h4[$langue]; ?></h4>
    		<p> <?php echo $parag[$langue]; ?>   <a href="#presenterComplet"><?php echo $plus[$langue];?></a>
			</p>
		</div>
    		</td>
    		
    		<td id="element" width="100%" valign="middle" align ="center" >
				<?php
						$aaction = "list";
						
						if(array_key_exists("aaction",$_GET)){
							$aaction = $_GET['aaction'];
						}
						if($aaction !="creer"){
				?>
    			<div id="Connexion">
		    	<h1>Se connecter à Messagerie</h1>
		    	
		    	<TABLE align ="center"> 
				<form method="post" action="gererBaseDD.php?connecter=oui">
		    		<TR>
		    			<TD><label for="user">Nom d'utilisateur</label></TD>
		    			<TD><input type="text" id="user" name="user" /></TD>
		    			<TD></TD>
		    		</TR>
		    		<TR>
		    			<TD><label for="mdp">Mot de passe</label></TD>
		    			<TD><input type="password" id="mdp" name="mdp" /></TD>
		    		</TR>
		    		<TR>
		    			<TD colspan="2" align ="center"><INPUT type="checkbox" name="Cookie" value="1" >   Mémoriser le mot de passe </TD>
		    		</TR>
		    		<TR>
		    			<TD colspan="2" align ="center"><input name="btnConnect" type="submit" value="Connexion"> </TD>
		    		</TR>
					<tr bgcolor="orange"><?php if(!empty($_GET) && isset($_GET['errone']) && !empty($_GET['errone']) && $_GET['errone']=="2"){ ?>
							<TD colspan="2" align ="center">	<p  >
							<strong>Attention:</strong><br>
								le <strong>login</strong> ou le <strong>mot de passe</strong> est erroné
							</p>	</TD>
						<?php } ?>
					</tr>
					<tr bgcolor="orange"><?php if(!empty($_GET) && isset($_GET['errone']) && !empty($_GET['errone']) && $_GET['errone']=="1"){ ?>
							<TD colspan="2" align ="center">	<p  >
							<strong>Attention</strong><br>
								Entrez les informations complètes:<br> <strong>Nom d'utilisateur   </strong><br>ou  <br> <strong>Mot de passe</strong>
							</p>	</TD>
						<?php } ?>
					</tr>
		    		<TR>
		    			<TD colspan="2" align ="center"><a href="#">Informations de compte oubliées ?</a> </TD>
		    		</TR>
		    		<TR>
		    			<TD colspan="2" align ="center"><label for="infor">Vous n'avez pas de compte?</label></TD>
		    		</TR>
					</form>
		    		<TR>
						<form method="post" action="index.php?aaction=creer">
		    			<TD colspan="2" align ="center"><input name="btnCreerCompte" type="submit" value="Créer un compte"> </TD>
						</form>
		    		</TR>
					
		    	</TABLE>
		    	
		    </div> <?php }else{ ?>
    			
				
				<div id="CreerCompte">
    				<h1>Créer un compte</h1> 
		    	<form method="post" action="gererBaseDD.php?addUser=oui">
		    	<TABLE align ="center"> 
		    		<TR>
		    			<TD><label for="username">Prénom</label></TD>
		    			<TD><input type="text" id="pre" name="pre" placeholder="Votre prénom" /></TD>
		    			<TD></TD>
		    		</TR>
		    		<TR>
		    			<TD><label for="username">Nom</label></TD>
		    			<TD><input type="text" id="nom" name="nom" placeholder="Votre nom" /></TD>
		    			<TD></TD>
		    		</TR>
		    		<TR>
		    			<TD><label for="username">Adresse e-mail</label></TD>
		    			<TD><input type="text" id="eml" name="eml" placeholder="Votre adresse e-mail"/></TD>
		    			<TD></TD>
		    		</TR>
		    		<TR>
		    			<TD><label for="password">Mot de passe</label></TD>
		    			<TD><input type="text" id="mdp" name="mdp" placeholder="Votre mot de passe"/></TD>
		    		</TR>
		    		<TR>
		    			<TD><label for="password">Numéro de téléphone</label></TD>
		    			<TD><input type="password" id="tel" name="tel" placeholder="Votre numéro de téléphone"/></TD>
		    		</TR>
		    		<TR>
		    			<TD colspan="2" align ="center"><label for="password">Votre Sexe : </label>
							<input type="radio" id="f" name="choix" value="f" />  Féminin  <input type="radio" id="m" name="choix" value="m" /> Masculin
		    			</TD>
		    		</TR>
		    		<TR>
		    			<TD colspan="2" align ="center"><input name="btnConnect" type="submit" value="Inscription"> </TD>
		    		</TR>
		    		<TR>
		    			<TD colspan="2" align ="center"><label for="password">Vous avez déjà un compte?</label></TD>
		    		</TR>
					</form>
		    		<TR>
						<form method="post" action="index.php?aaction=connecter">
		    			<TD colspan="2" align ="center"><input id="btn_Connexien" name="btnConnexien" type="submit" value="Connexion"> </TD>
						</form>
		    		</TR>
		    	</TABLE>
    			</div>
			<?php }	?>
    		</td>
    	</tr>
    <!--	<tr>
    		<TD colspan="2" align ="left">
    			<label>langue</label>
    		</TD>
    	</tr>-->
    </table>
<!--	/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/-->
	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><?php $choix=array("Choisir une langue :",": إختر اللغة");
		  echo $choix[$langue];?></span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
		<!--
/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/-->
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="index.php?langue=1">
              <span data-feather="file-text"></span>
              العربية
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?langue=1">
              <span data-feather="file-text"></span>
              ⵜⴰⵎⴰⵣⵉⵖⵜ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?langue=0">
              <span data-feather="file-text"></span>
              English (UK)
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?langue=1">
              <span data-feather="file-text"></span>
              한국어
            </a>
          </li>
		  </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?langue=0">
              <span data-feather="file-text"></span>
              Français (France)
            </a>
          </li>
        </ul>
		<div>
    		<h1><?php echo $h1[$langue]; ?></h1>
    	<p id="presenterComplet"> <?php echo $paragraphe[$langue]; ?></p>
		</div>
	</div>
</body>
</html>