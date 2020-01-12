/**
 * Partie Agax pour gérer 
 * la dynamique de transmission des messages;
 * sans recharger la page Web
 */
 
getMessages();

const intevalmsg= window.setInterval(getMessages,10000);
function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}
window.onload= function (){
	const el = document.querySelector('form');
	el.addEventListener("submit",postMessages);
//Your entire JS code here
}

function getMessages(){
	const requetAjax= getXMLHttpRequest();//valable juste pour windows
	requetAjax.open("GET","http://localhost:8080/AppsWebMessagerie/gererBaseDD.php?mode=lire");
	//requetAjax.responseType = 'json';
	requetAjax.onload=function(){
		const res=JSON.parse(requetAjax.responseText);
		//console.log(res);
		const html = res.map(function(message){
			return '<div class="message"><span class="date">'
			+message['id_user1']+'</span><span class="autor">'
			+message['id_users2']+'</span> :<span class="content">'
			+message['msgTxt']+'</span></div>'
		}).join('');
		//console.log(html);
		const messages=document.querySelector('.messages');
		messages.innerHTML=html;
		messages.scrollTop= messages.scrollHeight;
	}
	requetAjax.send();
}




function postMessages(event){
		event.preventDefault();
		
		const msgTxt = document.querySelector('#msgTxt');
		if(msgTxt.value==null){
			//console.log("Ok");
		}else{
		
		const data = new FormData();
		data.append('msgTxt',msgTxt.value);
		//console.log(data);
		const requetAjax = new XMLHttpRequest();
		requetAjax.open('POST',"http://localhost:8080/AppsWebMessagerie/gererBaseDD.php?mode=write");
	
		requetAjax.onload = function(){
			msgTxt.value='';
			msgTxt.focus();
			getMessages();
		}
		requetAjax.send(data);
	}
}