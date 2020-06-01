/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function($) {
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
			gsap.to("#primary-menu, .site-header-account", {
				duration: .2,
				xPercent: 100,
			//	yPercent: -20,
				transformOrigin: "50% right",
				ease: "sine.inOut",
				onComplete: function(){
					container.className = container.className.replace( ' toggled', '' );
					button.setAttribute( 'aria-expanded', 'false' );
					menu.setAttribute( 'aria-expanded', 'false' );
					gsap.set("#primary-menu, .site-header-account", {
						xPercent: 0,
						yPercent: 0,
					})
				}
			})
			
			gsap.to(".content-area", {
				duration: .2,
				autoAlpha: 1,
				scale: 1, 
				transformOrigin: "50% 0"
			})
			
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
			gsap.from("#primary-menu, .site-header-account", {
				duration: .1,
				xPercent: 80,
				transformOrigin: "50% right",
				ease: "sine.inOut"
			})
			
			gsap.to(".content-area", {
				duration: .2,
				autoAlpha: .3,
				scale: .9, 
				transformOrigin: "50% 0"
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
		// Hide Livesearch after page swotch
		$('.searchwp-live-search-results').removeClass('searchwp-live-search-results-showing');
		
		// Exercise count
		// var nArticles = $(".archive article").length;		
		// $(".breadcrumbs li:last-child").append(" ("+nArticles+")");

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
		
		// Create timelines for benefits page to use in init
		if ($("#illu-01").length) {
			//Animation: Raindrops falling
			function raindrops(){
				var tl = gsap.timeline({paused: true})					
					.fromTo("#illu01-cloud", 
						{ x: -700, y: 0, autoAlpha: 0 }, 
						{ x: 0, y: 0, autoAlpha: 1, duration: 1 }, 0)
					.fromTo("[id^='illu01-raindrop']", { autoAlpha: 0 }, { autoAlpha: 1, duration: .1 }, 1)
					.fromTo("#illu01-raindrop01, #illu01-raindrop02, #illu01-raindrop04", 
						{ yPercent: 0, scaleY: 1 }, 
						{ yPercent: 420, scaleY: .5, repeat: -1, duration: .3 }, 1)
					.fromTo("#illu01-raindrop03, #illu01-raindrop05", 
						{ yPercent: 0, scaleY: 1 }, 
						{ yPercent: 420, scaleY: .5, repeat: -1, duration: .3 }, 1.15);
				return tl;				
			}

			//Animation: Rotating sun
			function sunrotate() {
				var tl = gsap.timeline({paused: true})
					.fromTo("#illu01-sun", { autoAlpha: 0}, { duration: .3, autoAlpha: 1 }, 0)
					.fromTo("#illu01-sun", { xPercent: 0, yPercent: 0 }, { duration: 1, xPercent: -100, yPercent: -50 })
					.to("#illu01-sun--rays", { duration: .5, transformOrigin: "50% 50%", scale: .9, repeat: -1, yoyo: true }, 0)
					.to("#illu01-sun--rays", { duration: 1, rotationZ: 45, ease: "none", repeat: -1 }, 0);
					return tl;
			}
			function lightning(){
				var tl = gsap.timeline({paused: true})
					.set("#illu01-lightning-left", { y: -300, x: -100, autoAlpha: 0 })
					.set("#illu01-lightning-right", { y: -300, x: 100, autoAlpha: 0 })
					.to("#illu01-lightning-left", { y: 0, x: 0, autoAlpha: 1, ease: "elastic.out( 1, 0.3)", duration: .5 }, .2)
					.to("#illu01-lightning-right", { y: 0, x: 0, autoAlpha: 1, ease: "elastic.out( 1, 0.3)", duration: .5 }, .3);
				return tl;
			}
			
			//gsap.defaults({overwrite: "auto"});
			var section_zero_tl = section_zero();
			var section_one_tl = section_one();
			var section_two_tl = section_two();
			var section_three_tl = section_three();
			var section_four_tl = section_four();

			function section_zero(){
				var tl = gsap.timeline({paused: true})
					.call(function(){console.log("zero start");}, 0)
					.set("#illu01-lightning-left", { y: -300, x: -100, autoAlpha: 0 })
					.set("#illu01-lightning-right", { y: -300, x: 100, autoAlpha: 0 })
					.set("#illu01-cloud", { x: -700, autoAlpha: 0 })
					.set("[id^='illu01-raindrop']", { autoAlpha: 0 })
					.set("#illu01-head", { rotationZ: 0, yPercent: 0 })
					.set("#illu01-smile", { scale: 1, transformOrigin: "50% 50%" })
					.set("#illu-01", { autoAlpha: 0 })
					.set("#illu-02", { autoAlpha: 0, yPercent: 30 })
					.to("#illu-01", { autoAlpha: 1, duration: 1, onComplete: function(){console.log('zero complete')}}, 0);
					return tl;
			}

			//Animation: When First Section is on screen
			function section_one(){
				var tl = gsap.timeline({paused: true})		
				.call(function(){console.log("one start");}, 0)
					.set("#illu-01", { autoAlpha: 1 })
					.set("#illu-02", { autoAlpha: 0, yPercent: 30 })
					.set("#illu01-head", { rotationZ: 0, yPercent: 0 })
					.set("#illu01-smile", {scale: 1, transformOrigin: "50% 50%"})
					.set("#illu01-sun", { autoAlpha: 0 })		
					.set("[id^='illu01-raindrop']", { autoAlpha: 0 })
					.add(lightning().play(0), 0)					
					.add(raindrops().play(0), 0)
					.to("#illu01-head", { duration: 3, rotationZ: 2, yPercent: 20 }, .6)
					.to("#illu01-smile", { scaleY: -1, duration: .5, ease: "elastic.out( 1, 0.3)"}, .6)
				return tl;
			}

			function section_two(){
				var tl = gsap.timeline({paused: true})
					.set("#illu-01", { autoAlpha: 1, yPercent: 0 })
					.set("#illu-02", { autoAlpha: 0, yPercent: 30 })
					.set("#illu01-smile", {scale: -1, transformOrigin: "50% 50%"})
					.set("#illu01-head", { rotationZ: 3, yPercent: 20 })
					.set("#illu01-lightning-left, #illu01-lightning-right", {x: 0, y: 0, autoAlpha: 1})
					.set("#illu01-cloud", {x: 0, y: 0, autoAlpha: 1})
					.set("[id^='illu01-raindrop']", { autoAlpha: 1 })
					.add(sunrotate().play(0), 0)
					.to("#illu01-cloud", { duration: .25, y: -200, autoAlpha: 0 }, 0.1)
					.to("[id^='illu01-raindrop']", { duration: .1, autoAlpha: 0 }, 0.1)
					.to("#illu01-lightning-left", { duration: .25, x: -100, autoAlpha: 0 }, 0.1)
					.to("#illu01-lightning-right", { duration: .25, x: 100, autoAlpha: 0 }, 0.1)
					.to("#illu01-smile", { scaleY: 1, duration: .5, ease: "elastic.out( 1, 0.3)" }, 0)
					.to("#illu01-head", { rotationZ: 0, yPercent: 0, duration: .3 }, 0.1)
					return tl;
				}

			function section_three(){
				var tl = gsap.timeline({paused: true})
					.set("#illu-01", { autoAlpha: 1, yPercent: 0 })
					.set("#illu-02", { autoAlpha: 0, yPercent: 30 })
					.to("#illu-01", { duration: .3, yPercent: -30, autoAlpha: 0 })
					.to("#illu-02", { duration: .3, yPercent: 0, autoAlpha: 1 });
					return tl;
			}			
			
			function section_four(){
				var tl = gsap.timeline({paused: true});
				return tl;
			}
		
		} else {
			console.log('illu-01 doesnt exist');
		}

		// Benefits page function

		// scrNav function 
		function scrNav() {
			var sTop = $(window).scrollTop() + ( $(window).height() / 2 );
			$('.section').each(function() {
				var id = $(this).attr('id'),
						offset = $(this).offset().top-1,
						height = $(this).height(),
						tl = eval(id.toString()+"_tl");
				if(sTop >= offset && sTop <= offset + height) {
					console.log("My offset is: "+offset+" My height is: "+height+" sTop is: "+sTop);
					if (!tl.isActive() && ( tl.progress() != 1 ) ){
						tl.play(0);							
					}
				}
				else { //scrolled past back up
					if(id == "section_two"){
						tl.pause();
					}											
					else {
						tl.pause(0);
					}	
				}
			});
		}
		scrNav();


		$(window).on('scroll', function(){
			scrNav();
			});

	} // end init() function
	
	const jsoptions = [
		{
		  from: '(.*)',
		  to: '(.*)',
		  in: function(next) {
			document.querySelector('#swup').style.opacity = 0;
			TweenLite.to($('.loading-animation'), .15, {				
				autoAlpha: 0
			});
			TweenLite.to(document.querySelector('#swup'), 0.5, {
			  opacity: 1,
			  onComplete: next
			});
		  },
		  out: (next) => {
			document.querySelector('#swup').style.opacity = 1;
			TweenLite.to($('.loading-animation'), .15, {				
				autoAlpha: 1
			});
			TweenLite.to(document.querySelector('#swup'), 0.5, {
			  opacity: 0,
			  onComplete: next
			});
		  }
		}
	  ];
	
	const swup = new Swup({
		animateHistoryBrowsing: true,
		plugins: [new SwupBodyClassPlugin(), new SwupJsPlugin(jsoptions),]
	});
	
	init();
	
	// this event runs for every page view after initial load
	swup.on('contentReplaced', init);

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

