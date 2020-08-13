/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

	var images = new Array();
	function preload() {
		for (i = 0; i < preload.arguments.length; i++) {
			images[i] = new Image()
			images[i].src = preload.arguments[i]
		}
	};
	preload(
		"https://re-balance.io/wp-content/themes/rebalance-wptheme/img/benefits-galaxy-bg.jpg"
	);

( function($) {
	
	gsap.registerPlugin(DrawSVGPlugin);

	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
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

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			if ($("#primary-menu, .site-header-account").length){
				gsap.to("#primary-menu, .site-header-account", {
					duration: .2,
					xPercent: 100,
					transformOrigin: "50% right",
					ease: "sine.inOut",
					onComplete: function(){
						container.className = container.className.replace( ' toggled', '' );
						button.setAttribute( 'aria-expanded', 'false' );
						menu.setAttribute( 'aria-expanded', 'false' );
						gsap.set("#primary-menu, .site-header-account", {
							xPercent: 0,
						})
					}
				})
			} else {
				
					container.className = container.className.replace( ' toggled', '' );
					button.setAttribute( 'aria-expanded', 'false' );
					menu.setAttribute( 'aria-expanded', 'false' );									
			}
			
			gsap.to(".site-main > *", {
				duration: .2,
				autoAlpha: 1,
			})
			
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
			if ($("#primary-menu, .site-header-account").length){
				gsap.from("#primary-menu, .site-header-account", {
					duration: .1,
					xPercent: 80,
					transformOrigin: "50% right",
					ease: "sine.inOut"
				})
			}
				
			gsap.to(".site-main > *", {
				duration: .2,
				autoAlpha: .3,
			})
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
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

	$('.main-navigation a').on('click', function(){
		$('.main-navigation').removeClass('toggled');
		gsap.to(".site-main > *", {
			duration: .2,
			autoAlpha: 1,
		})
	})

	$(function() {
    var header = $(".site-header");
  
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 81) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });
  
	});


	function init() {

		//close messages
		$('.close').on('click', function(){
			$(this).parents('.notification, .swpm-partial-protection').hide();
		})

		//Date greeting
		if (document.querySelector('#lblGreetings')) {
			var myDate = new Date();
			var hrs = myDate.getHours();
			var greet;
			if (hrs < 12)
				greet = 'Good Morning';
			else if (hrs >= 12 && hrs <= 17)
				greet = 'Good Afternoon';
			else if (hrs >= 17 && hrs <= 24)
				greet = 'Good Evening';
			document.querySelector('#lblGreetings').prepend(greet + ', ');
		}
		//position move menus
		if (document.querySelector('#move-body-map')) {
			positionMoveMenus();
		}
		document.querySelector("html").scrollTop = "0";

		// initiate live search
		if (typeof jQuery().searchwp_live_search == 'function') {
			jQuery('input[data-swplive="true"]').searchwp_live_search();			
		}
		// Hide Livesearch after page switch
		$('.searchwp-live-search-results').removeClass('searchwp-live-search-results-showing');
		
		// Discreet onboarding 
		if (localStorage.getItem('popState', 'value') != 'shown') {
			$(".onboarding").delay(2000).fadeIn();
			localStorage.setItem('popState', 'shown');
			console.log('localstorage item set.');
		} else {
				console.log('No modal for you.');
		}

		$('.onboarding-close').on('click', function(e) {
			$('.onboarding').fadeOut(); // Now the pop up is hiden.
		});

		$('.onboarding').on('click', function(e) {
			$('.onboarding').fadeOut();
		});

		// Discreet toggle
		$(".switch input").on("change", function(e) {
			const isOn = e.currentTarget.checked;
			
		  
		  	if (isOn) {
			  	$("body").addClass('show-discreet-exercises-only');
				
			  	if ( $("article.exercises-tag-discreet").length == 0 ) {
				  	$(".site-main").append('<div class="notification--nodiscreet">⚡ Sorry, there are no discreet exercises available in this selection!</div>');
			  	}
			  	TweenLite.to($("article"), .2, 
			  	{
				  	autoAlpha: 0,
				  	scale: .9,
				  	onComplete: function(){
						$("article:not(.exercises-tag-discreet)").hide();
						$("article.exercises-tag-discreet").append('<i class="discreet-checkmark"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="26.846" viewBox="0 0 36 26.846"><path id="Icon_awesome-check" data-name="Icon awesome-check" d="M12.227,30.9.527,19.2a1.8,1.8,0,0,1,0-2.546L3.073,14.1a1.8,1.8,0,0,1,2.546,0L13.5,21.986,30.382,5.1a1.8,1.8,0,0,1,2.546,0L35.473,7.65a1.8,1.8,0,0,1,0,2.546l-20.7,20.7A1.8,1.8,0,0,1,12.227,30.9Z"/></svg></i>');
						TweenLite.to(
							$("article.exercises-tag-discreet"), .2, {
								autoAlpha: 1,
								scale: 1,			
								ease: "elastic.out(1.25, 0.3)"
								
							}, .1
						);
						TweenLite.staggerFrom(
							$(".discreet-checkmark"), .5, {
								autoAlpha: 0,
								scale: .2,			
								ease: "elastic.out(1.25, 0.3)",
								delay: .2
								
							}, .1
						);
					}
			  	});

		  } else {
			$("body").removeClass('show-discreet-exercises-only');
			$("article:not(.exercises-tag-discreet)").show();
			TweenLite.staggerTo($("article:not(.exercises-tag-discreet)"), .3, 
			  {
				  autoAlpha: 1,
				  scale: 1
			  })
			$(".notification--nodiscreet").remove();
			$(".discreet-checkmark").remove();
		  }
		});

		// Membership registration links don't swup
		$('a[href$="membership-registration/"], a[href$="membership-registration"]').attr("data-no-swup", "");
		
		gsap.set("body", {clearProps: "all"});

		animateBenefits();



	} // end init() function
	
	function ani_loader_in(){
		gsap.to('.loading-animation', { transformOrigin: "50% 0%", autoAlpha: 0, duration: .5 });			
	};

	function ani_loader_out(){
		gsap.to('.loading-animation', { autoAlpha: 1, duration: .5, delay: .3 });	
		let tl = gsap.timeline({ repeat: -1 });
		tl.fromTo('.loader svg circle', { drawSVG: "100% 100%" }, { drawSVG: "0% 100%", duration: 1.5, ease: "none" }, 0)
		tl.fromTo('.loader svg circle', { drawSVG: "0% 100%" }, { drawSVG: "0% 0%", duration: 1.5, ease: "none" })
		tl.fromTo('.loader svg circle', { transformOrigin: "50% 50%", rotationZ: 0 }, { rotationZ: -720, duration: 3, ease: "none" }, 0)
		return tl;
	};

	const jsoptions = [
		{
		  from: '(.*)', to: '(.*)',
		  in: function(next) {
				gsap.set('#swup .site-main', { xPercent: 20, autoAlpha: 0 });
				ani_loader_in();
				gsap.to('#swup .site-main', { xPercent: 0, autoAlpha: 1, ease: "circ.out", duration: 0.3, onComplete: next });
		  },
		  out: (next) => {
				gsap.set('#swup .site-main', { xPercent: 0, autoAlpha: 1 });
				ani_loader_out();
				gsap.to('#swup .site-main', { xPercent: -20, autoAlpha: 0, ease: "circ.in", duration: 0.3, onComplete: next });
		  }
		},
		{
			from: '(.*)', to: '/exercises/:id',
			in: function(next) {
				gsap.set('.post-info > *', { xPercent: 20, autoAlpha: 0 });
				ani_loader_in();
				gsap.to('.post-info > *', { xPercent: 0, autoAlpha: 1, ease: "circ.out", duration: 0.3, onComplete: next });
			},
			out: (next) => {
				gsap.set('#swup .site-main', { xPercent: 0, autoAlpha: 1 });
				ani_loader_out();
				gsap.to('#swup .site-main', { xPercent: -20, autoAlpha: 0, ease: "circ.in", duration: 0.3, onComplete: next });
			}
		},
		{
			from: '/exercises/:id', to: '(.*)',
			in: function(next) {
				gsap.set('#swup .site-main', { xPercent: 20, autoAlpha: 0 });
				ani_loader_in();
				gsap.to('#swup .site-main', { xPercent: 0, autoAlpha: 1, ease: "circ.out", duration: 0.3, onComplete: next });
			},
			out: (next) => {
				gsap.set('.post-info > *', { autoAlpha: 1 });
				ani_loader_out()
				gsap.to('.post-info > *', { xPercent: -20, autoAlpha: 0, ease: "circ.in", duration: 0.3, onComplete: next });
			}
		},
		{
			from: '/exercises/:id', to: '/exercises/:id',
			in: function(next) {
				gsap.set('.post-info > *', { xPercent: 20, autoAlpha: 0 });
				ani_loader_in();
				gsap.to('.post-info > *', { xPercent: 0, autoAlpha: 1, ease: "circ.out", duration: 0.3, onComplete: next });
			},
			out: (next) => {
				gsap.set('.post-info > *', { autoAlpha: 1 });
				ani_loader_out()
				gsap.to('.post-info > *', { xPercent: -20, autoAlpha: 0, ease: "circ.in", duration: 0.3, onComplete: next });
			}
		},
		{
			from: '(.*)', to: '/about',
			in: function(next) {
				gsap.set('#swup', { autoAlpha: 0 });
				ani_loader_in();
				gsap.to('#swup', { autoAlpha: 1, duration: 0.3, onComplete: next  });
			},
			out: (next) => {
				gsap.set('#swup .site-main', { xPercent: 0, autoAlpha: 1 });
				ani_loader_out();
				gsap.to('#swup .site-main', { xPercent: -20, autoAlpha: 0, ease: "circ.in", duration: 0.3, onComplete: next  });
			}
		},
		{
			from: '(.*)', to: '/why-rebalance',
			in: function(next) {
				gsap.set('#swup', { autoAlpha: 0 });
				ani_loader_in();
				gsap.to('#swup', { autoAlpha: 1, duration: 0.3, onComplete: next  });
			},
			out: (next) => {
				gsap.set('#swup .site-main', { xPercent: 0, autoAlpha: 1 });
				ani_loader_out();
				gsap.to('#swup .site-main', { xPercent: -20, autoAlpha: 0, ease: "circ.in", duration: 0.3, onComplete: next });
			}
		},
		{
			from: '/about', to: '(.*)',
			in: function(next) {
				gsap.set('#swup .site-main', { xPercent: 20, autoAlpha: 0 });
				gsap.to('#swup .site-main', { xPercent: 0, autoAlpha: 1, ease: "circ.in", duration: 0.3, onComplete: next  });
				ani_loader_in();
			},
			out: (next) => {
				gsap.set('#swup', { autoAlpha: 1 });
				gsap.to('#swup', { autoAlpha: 0, duration: 0.3, onComplete: next  });
				ani_loader_out();
			}
		},
		{
			from: '/why-rebalance', to: '(.*)',
			in: function(next) {
				gsap.set('#swup .site-main', { xPercent: 20, autoAlpha: 0 });
				gsap.to('#swup .site-main', { xPercent: 0, autoAlpha: 1, ease: "circ.in", duration: 0.3, onComplete: next  });
				ani_loader_in();
			},
			out: (next) => {
				gsap.set('#swup', { autoAlpha: 1 });
				gsap.to('#swup', { autoAlpha: 0, duration: 0.3, onComplete: next  });
				ani_loader_out();
			}
		},
		{
			from: '/about', to: '/why-rebalance',
			in: function(next) {
				gsap.set('#swup', { autoAlpha: 0 });
				gsap.to('#swup', { autoAlpha: 1, duration: 0.3, onComplete: next });				
				ani_loader_in();
				gsap.to('.loading-animation', { autoAlpha: 0, duration: .15, delay: .3 });
			},
			out: (next) => {
				gsap.set('#swup', { autoAlpha: 1 });
				gsap.to('#swup', { autoAlpha: 0, duration: 0.3, onComplete: next });
				ani_loader_out();
			}
		},
		{
			from: '/why-rebalance', to: '/about',
			in: function(next) {
				gsap.set('#swup', { autoAlpha: 0 });
				gsap.to('#swup', { autoAlpha: 1, duration: 0.3, onComplete: next  });
				ani_loader_in();
			},
			out: (next) => {
				gsap.set('#swup', { autoAlpha: 1 });
				gsap.to('#swup', { autoAlpha: 0, duration: 0.3, onComplete: next });
				ani_loader_out();
			}
		}
	  ];
	
	const swup = new Swup({
		animateHistoryBrowsing: true,
		cache: false,
		plugins: [new SwupBodyClassPlugin(), new SwupJsPlugin(jsoptions),]
	});
	// run swup the first time
	init();
	// this event runs for every page view after initial load
	swup.on('contentReplaced', init);
	// to clean up 
	//swup.on('willReplaceContent', unload);



	// Mobile Menu search
	$('.toggle-search').on('click', function(e){
		e.preventDefault;
		if( $('.site-header-search--toggled').length > 0 ){
			$('.site-header-search--toggled').removeClass('site-header-search--toggled');
		} else {
			$('.site-header-search').addClass('site-header-search--toggled');
			$('.search-field').focus();
		}
		$('.site-header-search--toggled .search-field').on('blur', function(){
			$('.site-header-search--toggled').removeClass('site-header-search--toggled');
		});
	})


	// Move Navigation stuff
	
	//Position sub menus
	function positionMoveMenus() {
		if ($('.move-bodyparts-map').length == 1) {

			$("#move-body-map #head").on('click', function(){		
				TweenLite.to('.move-bodypart-group', .5, {
					autoAlpha: 0
				});
				TweenLite.to('.move-bodypart-group--head', .5, {
					autoAlpha: 1
				});
			});
		
			$("#move-body-map #body").on('click', function(){		
				TweenLite.to('.move-bodypart-group', .5, {
					autoAlpha: 0
				});
				TweenLite.to('.move-bodypart-group--body', .5, {
					autoAlpha: 1
				});
			});
			$("#move-body-map #feet").on('click', function(){		
				TweenLite.to('.move-bodypart-group', .5, {
					autoAlpha: 0
				});
				TweenLite.to('.move-bodypart-group--feet', .5, {
					autoAlpha: 1
				});
			});
			$("#move-body-map #legs").on('click', function(){		
				TweenLite.to('.move-bodypart-group', .5, {
					autoAlpha: 0
				});
				TweenLite.to('.move-bodypart-group--legs', .5, {
					autoAlpha: 1
				});
			});
			$("#move-body-map #hands .hand").on('click', function(){		
		
				TweenLite.to('.move-bodypart-group', .5, {
					autoAlpha: 0
				});
				TweenLite.to('.move-bodypart-group--hands', .5, {
					autoAlpha: 1
				});
			});
		} else {};
	};
	positionMoveMenus();
		

} )( jQuery );

