
(function() {
	var shareButton = document.getElementById("share-button");

	container = document.getElementsByClassName('social-icons-widget-container')[0].parentElement;

	shareButton.onclick = function(event) {
		container.classList.toggle('isSocialVisible');
	};
})();

