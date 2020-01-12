<!--
/**
Ce projet est développé par Esserrati Mohammed Abdessamad Un étudiant ingénieur informatique en deuxième année
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
-->
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php $title=array("Afficher le jornale des messages Principal","عرض سجل الرسائل الرئيسي");
		  echo $title[$langue];?></title>
</head>
<body>


<main role="main" class="container">
  <div class="d-flex align-items-center p-3 my-3 text-block-50 bg-purple rounded shadow-sm">
    <div class="lh-100">
      <h6 class="mb-0 text-block lh-100"><?php echo $title[$langue];?></h6>
      <small>Since 2020</small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0"><?php $titre=array("Recent messages","الرسائل الحديثة");
		  echo $titre[$langue];?></h6>
	<div class="AfficherMessages">
    <!-- ce partie poue Afficher les dernier message avec tous les amis
		ce div est une exemple d'affichage	-->
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">@username</strong>
        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
      </p>
    </div>
    
	</div>
    <small id="AllMessages" class="d-block text-right mt-3">
      <a href="#"  onclick="AllMessages()"><?php $allMsg=array("All messages","كل الرسائل");
		  echo $allMsg[$langue];?></a>
    </small>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0"><?php $sug=array("Suggestions","اقتراحات");
		  echo $sug[$langue];?></h6>
	<div class="AfficherUser">
    <div class="media text-muted pt-3">
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#"><?php $fol=array("Follow","متابعة");
		  echo $fol[$langue];?></a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    
    
    <small class="d-block text-right mt-3">
      <a href="#"><?php $allS=array("All suggestions","كل الاقتراحات");
		  echo $allS[$langue];?></a>
    </small>
  </div>
</main>
</body>
</html>
<script>
	/**
 * Partie Agax pour g�rer 
 * la dynamique de l'affichage les messages  des amis;
 * sans recharger la page Web

/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
getMessages();

function getMessages(){
	const requetAjax= new XMLHttpRequest();//valable juste pour windows
	requetAjax.open("GET","gererBaseDD.php?mode=lire");
	//requetAjax.responseType = 'json';
	requetAjax.onload=function(){
		const res=JSON.parse(requetAjax.responseText);
		//console.log(res);
		const html = res.map(function(message){
			return '<div class="media text-muted pt-3"><p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">'
+'<strong class="d-block text-gray-dark">@'+message['id_users2']+'</strong>'+message['msgTxt']+'</p></div>';
		}).join('');
		//console.log(html);
		const AfficherMessages=document.querySelector('.AfficherMessages');
		AfficherMessages.innerHTML=html;
		AfficherMessages.scrollTop= AfficherMessages.scrollHeight;
	}
	requetAjax.send();
}
function AllMessages(){
	alert("OK All messages");
}
</script>
<style>

</style>