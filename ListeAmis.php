<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Afficher lAa liste des amis</title>
</head>
<body>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              <?php $liste=array("Liste des amis","قائمة الأصدقاء");
		  echo $liste[$langue];?> <span class="sr-only">(current)</span>
            </a>
          </li>
			<div class="ListeAmis">
				<!--partie resirver pour ajouter tous les amies onligne -->
			</div>
			</ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><?php $choix=array("Choisir une langue :",": إختر اللغة");
		  echo $choix[$langue];?></span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="?langue=1">
              <span data-feather="file-text"></span>
              العربية
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?langue=1">
              <span data-feather="file-text"></span>
              ⵜⴰⵎⴰⵣⵉⵖⵜ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?langue=0">
              <span data-feather="file-text"></span>
              English (UK)
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?langue=1">
              <span data-feather="file-text"></span>
              한국어
            </a>
          </li>
		  </li>
          <li class="nav-item">
            <a class="nav-link" href="?langue=0">
              <span data-feather="file-text"></span>
              Français (France)
            </a>
          </li>
        </ul>
      </div>
    </nav>
	
</body>
</html>

<script>
/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
	/**
 * Partie Agax pour gérer 
 * la dynamique de l'affichage des Amis;
 * sans recharger la page Web
 */
 
getAmis();

const intevalamis= window.setInterval(getAmis,10000);


function getAmis(){
	const requetAjax= new XMLHttpRequest();//valable juste pour windows
	requetAjax.open("GET","http://localhost:8080/AppsWebMessagerie/gererBaseDD.php?getAmis=oui");
	//requetAjax.responseType = 'json';
	requetAjax.onload=function(){
		const res=JSON.parse(requetAjax.responseText);
		//console.log(res);
		const html = res.map(function(users){
		return ''
            +'<li class="nav-item"><a class="nav-link"  href="http://localhost:8080/AppsWebMessagerie/EnvoyerMessage.php?amis='+users['id_user']+'" >'
		 +'<span data-feather="file"></span>'
		+users['pronom']+' '+users['nom']+'</a></li>'
			
		}).join('');
		//console.log(html);
		const liste=document.querySelector('.ListeAmis');
		liste.innerHTML=html;
		liste.scrollTop= liste.scrollHeight;
	}
	requetAjax.send();
}
/**
Ce projet est développé par Esserrati Mohammed Abdessamad
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
</script>