function checkBrowser(){
	var browser = navigator.appName;
	var version = navigator.appVersion;
	if(version.indexOf("MSIE")!=-1){
		var tmp = version.split("MSIE")
		var appVers = parseFloat(tmp[1]);
		if(appVers < 8){
			if(confirm('Attention, le navigateur que vous utilisez ne gère pas toutes les fonctionnalités du backoffice !\n\nUtilisez Firefox, Safari, Opéra ou encore Chrome qui sont bien plus performants.\n\nSinon cliquez sur Ok pour mettre à jour votre version Internet Explorer sur Windows Update, sur Annuler pour continuer malgrès tout')){
				window.location = 'http://v4.windowsupdate.microsoft.com/fr/default.asp';
			}
		}
	}
}

function alerte_message(msg){
	$('block_alerte_message').empty();
	var alerte = new Element('div',{'class':'alerte_message','opacity':0}).set('html',msg).inject('block_alerte_message').fade(1);
}
window.addEvent('domready',function(e){

	
});
