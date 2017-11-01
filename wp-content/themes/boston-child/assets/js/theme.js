/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    isIe     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( isWebkit || isOpera || isIe ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus, i, len;

	body = document.getElementsByTagName('body')[0];
	if (!body) {
		return;
	}

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = document.getElementById( 'menu-button' );
	if ( ! button) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	drawer = document.getElementById('layout-drawer');
	if( !drawer) {
		return;
	}

	obfuscator = document.getElementById('obfuscator');
	if( !obfuscator){
		return;
	}

	button.onclick = function() {
		if (drawer.classList.contains('toggled') ) {
			hideDrawer(drawer,obfuscator,button,menu,body);
		} else {
			showDrawer(drawer,obfuscator,button,menu,body);
		}
	};

	obfuscator.onclick = function(){
		hideDrawer(drawer,obfuscator,button,menu,body);
	}

	closeDrawerButton = document.getElementById("close-drawer");
	closeDrawerButton.onclick = function() {
		hideDrawer(drawer,obfuscator,button,menu,body);
	};

	window.addEventListener('resize',function(event) {
		var clientWidth = event.target.outerWidth;
		if (clientWidth > 991){
			hideDrawer(drawer,obfuscator,button,menu,body);
		}
	});

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	function showDrawer(drawer,obfuscator,button,menu,body) {
		drawer.classList.add('toggled');
		obfuscator.classList.add('isVisible');
		body.classList.add('blocked');
		button.setAttribute( 'aria-expanded', 'true' );
		menu.setAttribute( 'aria-expanded', 'true' );

	}

	function hideDrawer(drawer,obfuscator,button,menu,body) {
		if(drawer.classList.contains('toggled')){
			drawer.classList.remove('toggled');
			obfuscator.classList.remove('isVisible');
			body.classList.remove('blocked');
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		}
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();

/*=====================================================================================*/

/*
	Search icon top-bar
*/
( function() {
	var searchIconFixed = document.getElementById("topbar-search-icon-fixed");
	var containerFixed = document.getElementById("topbar-search-fixed");
	var txtSearchFixed = document.getElementById("search-fixed");

	addSearchClickHandler(searchIconFixed,containerFixed,txtSearchFixed);


	var searchIcon = document.getElementById("topbar-search-icon");
	var container = document.getElementById("topbar-search");
	var txtSearch = document.getElementById("search");

	addSearchClickHandler(searchIcon,container,txtSearch);


	function addSearchClickHandler(searchIcon,container,txtSearch) {
		if(!searchIcon){
			return;
		}
		if(!container){
			return;
		}

		if(!txtSearch){
			return;
		}

	
		searchIcon.onclick = function(event) {
			container.classList.toggle("open");
			if(container.classList.contains("open")) {
				txtSearch.focus();
			}
		};

		txtSearch.onblur = function(event) {
			/*
				https://stackoverflow.com/questions/121499/when-a-blur-event-occurs-how-can-i-find-out-which-element-focus-went-to

			*/
			setTimeout(function(){
				var isSearchClicked = document.activeElement === searchIcon;
				if(!isSearchClicked) {
					container.classList.remove("open");
				}
			},100);
			
			
		};
	}
})();

/*
	fixed top bar when scrolling  down
*/
( function() {

	window.addEventListener("scroll", function(){
		var clientWidth = document.documentElement.clientWidth;
		if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200){
			if(clientWidth > 991) {
				document.getElementById("site-topbar").classList.add('site-topbar-fixed');
			} else {
				document.getElementById("top-zone-header").classList.add('site-topbar-fixed');
			}
		} else {
			document.getElementById("site-topbar").classList.remove('site-topbar-fixed');
			document.getElementById("top-zone-header").classList.remove('site-topbar-fixed');
		}
		
		
	});
})();


// Call owl carousel for featured content.
jQuery( document ).ready( function(){
	jQuery('.featured_posts').owlCarousel( {
		autoPlay: 5000,
		items : 3,
		itemsDesktop: 2,
		itemsDesktopSmall: [979,2],
		paginationNumbers: false,
	} )
} );
