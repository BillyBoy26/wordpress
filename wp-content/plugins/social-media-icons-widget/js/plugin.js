
function afficherMasquer(){
	/*TODO parentElements*/
	divInfo = document.getElementsByClassName('social-icons-widget')[0].parentElement;
	if(divInfo.classList.contains('isSocialVisible')){
		divInfo.classList.remove('isSocialVisible');
	} else {
		divInfo.classList.add('isSocialVisible');
	}
}
