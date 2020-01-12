<?php
/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
session_start();
/**
*connexion simple a la base de donnees via PDO
*/
$db= new PDO('mysql:host=localhost;dbname=appswebmessageriedb;
		charset=utf8','root','esrt',[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	]);
	
/**
Analyser la demande faite via l'URL (GET)
pour APPLIQUER a la bonne fonction ;
*/
if(!empty($_GET) && isset($_GET['deconnecter']) && !empty($_GET['deconnecter'])){
	setcookie('psw', '', time() + 365*24*3600, '/', null, false, true  );//Vider le cookie
	setcookie('email', '', time() + 365*24*3600  , '/', null, false, true);//Vider l' autre cookie...
	session_destroy() ;
	header('Location: index.php');
}
	
if(!empty($_GET) && isset($_GET['getAmis']) && !empty($_GET['getAmis'])){
	getAmis();
}
if(!empty($_GET) && isset($_GET['addUser']) && !empty($_GET['addUser'])){
	postInscription();
}
if(!empty($_GET) && isset($_GET['connecter']) && !empty($_GET['connecter'])){
	connection();
}

$mode = "lire";	
if(!empty($_GET) && isset($_GET['mode']) && !empty($_GET['mode'])){
	$mode =$_GET['mode'];
if($mode == "write"){
	postMessages();
}else{
	getMessage();
}
}
function connection(){
	global $db;
	if(!empty($_POST) && isset($_POST['user']) && !empty($_POST['user'])
		&& isset($_POST['mdp']) && !empty($_POST['mdp'])){
		$mdp =$_POST['mdp'];$user =$_POST['user'];
		$resultats = $db ->query("SELECT * FROM users WHERE email LIKE '$user'  && psw LIKE '$mdp' ");
		$ident =$resultats -> fetch();
		
		if(empty($ident)){
			header('Location: index.php?errone=2');
		}else{
			$_SESSION["id_user"]=$ident['id_user'];
			$_SESSION["prenom"]=$ident['pronom'];
			$_SESSION["nom"]=$ident['nom'];
			$_SESSION["email"]=$user;
			$_SESSION["psw"]=$mdp;
			if( isset($_POST['Cookie']) && !empty($_POST['Cookie'])){
				setcookie('psw', $mdp, time() + 365*24*3600, '/', null, false, true  );//On écrit un cookie
				setcookie('email', $user, time() + 365*24*3600  , '/', null, false, true);//On écrit un autre cookie...
			//echo $_COOKIE['email'];echo $_COOKIE['psw'];
			}
			header('Location: principale.php');
		}
}else{
	header('Location: index.php?errone=1');
}
}

function postInscription(){
	global $db;
	if(!empty($_POST) && isset($_POST['pre']) && !empty($_POST['pre'])&& isset($_POST['nom']) && !empty($_POST['nom'])
		&& isset($_POST['eml']) && !empty($_POST['eml'])&& isset($_POST['mdp']) && !empty($_POST['mdp'])
		&& isset($_POST['choix'])&& isset($_POST['tel'])){
			
	$pre =$_POST['pre'];$nom =$_POST['nom'];$eml =$_POST['eml'];
	$mdp =$_POST['mdp'];$tel =$_POST['tel'];$choix =$_POST['choix'];$status=1;
	
	$query = $db ->prepare('INSERT INTO users SET
		pronom = :pre ,nom = :nom,email = :eml,
		psw = :mdp ,telephone = :tel,sexe = :choix,status = :status');
		
	$query->execute(array(
			"pre" => $pre,"nom"=>$nom,
			"eml"=>$eml,"tel" => $tel,
			"mdp"=>$mdp,"choix"=>$choix,
			"status"=>$status
	));
	
	header('Location: index.php');
	
}else{
	header('Location: index.php?aaction=creer?echec=111');}
}
function getAmis(){
	global $db;
	$resultats = $db ->query("SELECT * FROM users");
	$amis =$resultats -> fetchAll();
	echo json_encode($amis);
	//echo "in get";
}
function postMessages(){
	global $db;
if(!empty($_POST) && isset($_POST['msgTxt']) && !empty($_POST['msgTxt'])){
	$msgTxt =$_POST['msgTxt'];
	//$msgTxt=$data;
	$id_users2=3;$id_user1=1;
	$query = $db ->prepare('INSERT INTO messages SET
		msgTxt = :msgTxt ,id_user1 = :id_user1,
		id_users2 = :id_users2');
	$query->execute(array(
			"msgTxt" => $msgTxt,
			"id_user1"=>$id_user1,
			"id_users2"=>$id_users2
));}
	//echo "in Post";
}
function getMessage(){
	$user=$_SESSION["id_user"];
	global $db;
	$resultats = $db ->query("SELECT * FROM messages WHERE id_user1 LIKE '$user'  ");
	$message =$resultats -> fetchAll();
	echo json_encode($message);
	//echo "in get";echo $user;
}

/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
?>