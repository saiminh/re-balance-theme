/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

 //Preload some images
	// var images = new Array();
	// function preload() {
	// 	for (i = 0; i < preload.arguments.length; i++) {
	// 		images[i] = new Image()
	// 		images[i].src = preload.arguments[i]
	// 	}
	// };
	// preload(
	// 	"https://re-balance.io/wp-content/themes/rebalance-wptheme/img/benefits-galaxy-bg.jpg"
	// );

  import { gsap } from "gsap";
  import { DrawSVGPlugin } from "gsap/DrawSVGPlugin";

  import Swup from 'swup';
  import SwupBodyClassPlugin from '@swup/body-class-plugin';
  import SwupJsPlugin from '@swup/js-plugin';
  
  import gsAnimations from './gsapAnimations.js'
  
  gsap.registerPlugin(DrawSVGPlugin);

( function($) {
	
	gsap.registerPlugin(DrawSVGPlugin);

	var container, navbutton, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	navbutton = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof navbutton ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		navbutton.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	navbutton.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			if ($("#primary-menu, .site-header-account").length){
				gsap.to("#primary-menu, .site-header-account", {
					duration: .2,
					xPercent: 100,
					transformOrigin: "50% right",
					ease: "sine.inOut",
					onComplete: function(){
						container.className = container.className.replace( ' toggled', '' );
						navbutton.setAttribute( 'aria-expanded', 'false' );
						menu.setAttribute( 'aria-expanded', 'false' );
						gsap.set("#primary-menu, .site-header-account", {
							xPercent: 0,
						})
					}
				})
			} else {
				
					container.className = container.className.replace( ' toggled', '' );
					navbutton.setAttribute( 'aria-expanded', 'false' );
					menu.setAttribute( 'aria-expanded', 'false' );									
			}
			
			gsap.to(".site-main > *", {
				duration: .2,
				autoAlpha: 1,
			})
			
		} else {
			container.className += ' toggled';
			navbutton.setAttribute( 'aria-expanded', 'true' );
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
	links = menu.getElementsByTagName( 'a' );

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
        if (scroll >= 81) { header.addClass("scrolled"); } 
				else { header.removeClass("scrolled"); }
    });
	});
	
// Celebratory Confetti
	const defaultColors = ["#c4e3f2", "#FFCEBE", "#9ACFE9", "#ff9b7a", "#ffffff"];

	function createElements(root, elementCount, colors, width, height) {
		return Array.from({ length: elementCount }).map((_, index) => {
			const element = document.createElement("div");
			const color = colors[index % colors.length];
			element.style["background-color"] = color; // eslint-disable-line space-infix-ops
			element.style.width = width;
			element.style.height = height;
			element.style.position = "absolute";
			element.style.willChange = "transform, opacity";
			element.style.visibility = "hidden";
			root.appendChild(element);
			return element;
		});
	}

	function randomPhysics(angle, spread, startVelocity, random) {
		const radAngle = angle * (Math.PI / 180);
		const radSpread = spread * (Math.PI / 180);
		return {
			x: 0,
			y: 0,
			z: 0,
			wobble: random() * 10,
			wobbleSpeed: 0.1 + random() * 0.1,
			velocity: startVelocity * 0.5 + random() * startVelocity,
			angle2D: -radAngle + (0.5 * radSpread - random() * radSpread),
			angle3D: -(Math.PI / 4) + random() * (Math.PI / 2),
			tiltAngle: random() * Math.PI,
			tiltAngleSpeed: 0.1 + random() * 0.3
		};
	}

	function updateFetti(fetti, progress, dragFriction, decay) {
		/* eslint-disable no-param-reassign */
		fetti.physics.x += Math.cos(fetti.physics.angle2D) * fetti.physics.velocity;
		fetti.physics.y += Math.sin(fetti.physics.angle2D) * fetti.physics.velocity;
		fetti.physics.z += Math.sin(fetti.physics.angle3D) * fetti.physics.velocity;
		fetti.physics.wobble += fetti.physics.wobbleSpeed;
		// Backward compatibility
		if (decay) {
			fetti.physics.velocity *= decay;
		} else {
			fetti.physics.velocity -= fetti.physics.velocity * dragFriction;
		}
		fetti.physics.y += 3;
		fetti.physics.tiltAngle += fetti.physics.tiltAngleSpeed;

		const { x, y, z, tiltAngle, wobble } = fetti.physics;
		const wobbleX = x + 10 * Math.cos(wobble);
		const wobbleY = y + 10 * Math.sin(wobble);
		const transform = `translate3d(${wobbleX}px, ${wobbleY}px, ${z}px) rotate3d(1, 1, 1, ${tiltAngle}rad)`;

		fetti.element.style.visibility = "visible";
		fetti.element.style.transform = transform;
		fetti.element.style.opacity = 1 - progress;

		/* eslint-enable */
	}

	function animate(root, fettis, dragFriction, decay, duration, stagger) {
		let startTime;

		return new Promise(resolve => {
			function update(time) {
				if (!startTime) startTime = time;
				const elapsed = time - startTime;
				const progress = startTime === time ? 0 : (time - startTime) / duration;
				fettis.slice(0, Math.ceil(elapsed / stagger)).forEach(fetti => {
					updateFetti(fetti, progress, dragFriction, decay);
				});

				if (time - startTime < duration) {
					requestAnimationFrame(update);
				} else {
					fettis.forEach(fetti => {
						if (fetti.element.parentNode === root) {
							return root.removeChild(fetti.element);
						}
					});
					resolve();
				}
			}

			requestAnimationFrame(update);
		});
	}

	const defaults = {
		angle: 90,
		spread: 45,
		startVelocity: 45,
		elementCount: 50,
		width: "10px",
		height: "10px",
		perspective: "",
		colors: defaultColors,
		duration: 3000,
		stagger: 0,
		dragFriction: 0.1,
		random: Math.random
	};
  var config;
	function backwardPatch(config) {
		if (!config.stagger && config.delay) {
			config.stagger = config.delay;
		}
		return config;
	}

	function confetti(root, config = {}) {
		const {
			elementCount,
			colors,
			width,
			height,
			perspective,
			angle,
			spread,
			startVelocity,
			decay,
			dragFriction,
			duration,
			stagger,
			random
		} = Object.assign({}, defaults, backwardPatch(config));
		root.style.perspective = perspective;
		const elements = createElements(root, elementCount, colors, width, height);
		const fettis = elements.map(element => ({
			element,
			physics: randomPhysics(angle, spread, startVelocity, random)
		}));

		return animate(root, fettis, dragFriction, decay, duration, stagger);
	}
// End Celebratory confetti code

//Insert after function
function insertAfter(referenceNode, newNode) {
	referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
};

//Variable to count page inits with swup, mainly as a workaround to the payment buttons not being updated 
let n_pagereloads = 0;

// Begin INIT - js that needs to load on each new swupped page
	function init() {
    n_pagereloads = n_pagereloads + 1;
    if ( n_pagereloads > 1 ) {
      if (
        document.querySelector('body').classList.contains('page-template-page-free-trial') 
        || 
        document.querySelector('.modern-footnotes-footnote')){
        window.location.reload();
      }
    }

		//local storage functions
		if (sessionStorage.hasSeenPdfPopup) {
			//do nothing
		} else {
			sessionStorage.hasSeenPdfPopup = 1;
			let popup = document.querySelector('.rebalance-popup');
			if(popup){
				setTimeout(
					function(){
						gsap.to(popup, {
							yPercent: -100,
							duration: 0.3,
							ease: "circ.inOut"
						})
					}, 5000
				)
				document.addEventListener('click', function(event){
					if(!event.target.closest('.rebalance-popup .close')) return;
					gsap.to(popup, {
						yPercent: 0,
						duration: 0.3,
						ease: "circ.inOut"
					})
				})
			}
		}
		// Notification
		if ( $('.notification-hidden').length ) {
			$('.show-notification').on('click', function(){
				$('.notification-hidden').removeClass('notification-hidden');
			})
		}
		// Confetti init
		let confetter = document.getElementsByClassName('button-confetti')[0];
		if ( confetter ) {
			const root = confetter;
			confetter.addEventListener('click', (e) => {
				console.log('confetti!');
				confetter.innerHTML = "✓ Celebrate more!";
				confetti(root, config = {} );
				e.preventDefault();				
			});
		} else {
			console.log('no confetter');
		};	
		//close messages
		$('.close, .button-closes-msg').on('click', function(){
			$(this).parents('.swpm-partial-protection').hide();
			$(this).parents('.notification, .notification-modal-darken').addClass('notification-hidden');
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
		// go to top after swup change
		document.querySelector("html").scrollTop = "0";
		// initiate live search
		if (typeof jQuery().searchwp_live_search == 'function') {
			jQuery('input[data-swplive="true"]').searchwp_live_search();			
		}
		// Hide Livesearch after page switch
		$('.searchwp-live-search-results').removeClass('searchwp-live-search-results-showing');
		// Membership registration links don't swup
		let noswuplinks = [
			'a[href$="membership-registration/"]', 
			'a[href$="membership-registration"]', 
			'a[href$="pricing"]',
			'a[href$="pricing/"]', 
			'a[href$="try-rebalance-for-free"]', 
			'a[href$="try-rebalance-for-free/"]', 
			'a[href*="/courses/"]',
			'a[href*="/course/"]'
		];
		$( noswuplinks.toString() ).attr("data-no-swup", "");
		gsap.set("body", {clearProps: "all"});
		gsAnimations();
		//Make cards clickable
		const cards = document.querySelectorAll(".card");
		cards.forEach(function(card){
			const mainLink = card.querySelector(".card-mainlink");
			const clickableElements = Array.from(card.querySelectorAll("a.clickable")); //we are using 'a' here for simplicity but ideally you should put a class like 'clickable' on every clickable element inside card(a, button) and use that in query selector
			clickableElements.forEach((ele) =>
				ele.addEventListener("click", (e) => e.stopPropagation())
			);
			function handleClick(event) {
				const noTextSelected = !window.getSelection().toString();
				if (noTextSelected) {
					mainLink.click();
				}
			}
			card.addEventListener("click", handleClick);
		});
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
	$('.search-toggle').on('click', function(e){
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

} )( jQuery );

