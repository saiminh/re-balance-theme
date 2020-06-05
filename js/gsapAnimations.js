// ----------------------------------------------------------
// Benefits page animations
// ----------------------------------------------------------

function animateBenefits(){
  
  // Create timelines for benefits page to use in init
  if (document.querySelector('#illuOne')) {						
    
    gsap.registerPlugin(ScrollTrigger);
  
    //Animation: Raindrops falling
    function raindrops(){
      var tl = gsap.timeline({paused: true})			
        .set("#illu01-cloud", { x: -700, y: 0, autoAlpha: 0 })	
        .set("[id^='illu01-raindrop']", { autoAlpha: 0 })	
        .set("#illu01-raindrop01, #illu01-raindrop02, #illu01-raindrop04", { yPercent: 0, scaleY: 1 })
        .set("#illu01-raindrop03, #illu01-raindrop05", { yPercent: 0, scaleY: 1 })
        .to("#illu01-cloud", 
          { x: 0, y: 0, autoAlpha: 1, duration: .6 }, 0)
        .to("[id^='illu01-raindrop']", { autoAlpha: 1, duration: .1 }, .6)
        .to("#illu01-raindrop01, #illu01-raindrop02, #illu01-raindrop04", { yPercent: 500, scaleY: .5, repeat: -1, duration: .3 }, .6)
        .to("#illu01-raindrop03, #illu01-raindrop05", { yPercent: 500, scaleY: .5, repeat: -1, duration: .3 }, .75);
      return tl;				
    }
  
    //Animation: Rotating sun
    function sunrotate() {
      var tl = gsap.timeline({paused: true})
        .set("#illu01-sun", {autoAlpha: 0, xPercent: 0, yPercent: 0 })
        .to("#illu01-sun", { duration: .3, autoAlpha: 1 }, 0)
        .to("#illu01-sun", { duration: 1, xPercent: -60, yPercent: -60 }, 0)
        .to("#illu01-sun--rays", { duration: .5, transformOrigin: "50% 50%", scale: .9, repeat: -1, yoyo: true }, 0)
        .to("#illu01-sun--rays", { duration: 1, rotationZ: 45, ease: "none", repeat: -1 }, 0);
        return tl;
    }

    //Animation: lightning strikes
    function lightning(){
      var tl = gsap.timeline({paused: true})
        .set("#illu01-lightning-left", { y: -300, x: -100, autoAlpha: 0 })
        .set("#illu01-lightning-right", { y: -300, x: 100, autoAlpha: 0 })
        .to("#illu01-lightning-left", { y: 0, x: 0, autoAlpha: 1, ease: "elastic.out( 1, 0.3)", duration: .5 }, .2)
        .to("#illu01-lightning-right", { y: 0, x: 0, autoAlpha: 1, ease: "elastic.out( 1, 0.3)", duration: .5 }, .3);
      return tl;
    }
  
    gsap.set("#illu01-lightning-left", { y: -300, x: -100, autoAlpha: 0 }, 0);
    gsap.set("#illu01-lightning-right", { y: -300, x: 100, autoAlpha: 0 }, 0)
    gsap.set("#illu01-cloud", { x: -700, autoAlpha: 0 }, 0)
    gsap.set("#illu01-sun", { autoAlpha: 0 }, 0)
    gsap.set("[id^='illu01-raindrop']", { autoAlpha: 0 }, 0)
    gsap.set("#illu01-head", { rotationZ: 0, yPercent: 0 }, 0)
    gsap.set("#illu01-smile", { scale: 1, transformOrigin: "50% 50%" }, 0)
    gsap.set("#illuOne", { autoAlpha: 0 }, 0)
    gsap.set("#illuTwo", { autoAlpha: 0, yPercent: 0 }, 0)
    
    //gsap.defaults({overwrite: "auto"});
   // let section_zero_tl = section_zero();
    let section_one_tl = section_one();
    let section_two_tl = section_two();
    let section_three_tl = section_three();
    let section_four_tl = section_four();
  
    ScrollTrigger.defaults({
      toggleActions: "restart pause restart pause",
    });
  
   gsap.fromTo("#illuOne", {
      xPercent: 0
   }, {
     scrollTrigger: {
        trigger: "#section_three",
        scrub: .5,
        ease: "none",
        start: "top center",
        end: "bottom center"
     },
     xPercent: -300
   });

   gsap.fromTo("#illuTwo", {
    xPercent: 200,
    autoAlpha: 0
   }, {
    scrollTrigger: {
       trigger: "#section_three",
       scrub: .5,
       ease: "none",
       start: "top center",
       end: "25% center"
    },
    xPercent: 0,
    autoAlpha: 1
  });
  
    //Animation: When First Section is on screen
    function section_one(){
      var tl = gsap.timeline({
        paused: true,		
        scrollTrigger: {
          trigger: "#section_one",
          toggleActions: "restart pause restart pause",
          start: "top center",
          end: "bottom center"
          
        }
      })
        .set("#illuOne", { autoAlpha: 1 })
        .set("#illuTwo", { autoAlpha: 0, yPercent: 30 })
        .set("#illu01-head", { rotationZ: 0, yPercent: 0 })
        .set("#illu01-smile", {scale: 1, transformOrigin: "50% 50%"})
        .set("#illu01-sun", { autoAlpha: 0 })		
        .set("[id^='illu01-raindrop']", {x: 0, y: 0, autoAlpha: 0 })
        .add(lightning().play(0), 0)					
        .add(raindrops().play(0), 0)
        .to("#illu01-head", { duration: 0.5, rotationZ: 2, yPercent: 20 }, .5)
        .to("#illu01-smile", { scaleY: -1, duration: .5, ease: "elastic.out( 1, 0.3)"}, .3);
      return tl;
    }
  
    function section_two(){
      var tl = gsap.timeline({
        paused: true,
        scrollTrigger: {
          trigger: "#section_two",
          toggleActions: "restart pause restart pause",
          start: "top center",
          end: "bottom center"
        }
      })
        .set("#illuOne", { autoAlpha: 1, yPercent: 0 })
        .set("#illuTwo", { autoAlpha: 0, yPercent: 0 })
        .set("#illu01-smile", {scale: -1, transformOrigin: "50% 50%"})
        .set("#illu01-head", { rotationZ: 3, yPercent: 20 })
        .set("#illu01-lightning-left, #illu01-lightning-right", {x: 0, y: 0, autoAlpha: 1})
        .set("#illu01-cloud", { x: 0, y: 0, autoAlpha: 1 })
        .set("[id^='illu01-raindrop']", { x: 0, y: 0, autoAlpha: 1 })
        .add(sunrotate().play(0), 0)
        .to("#illu01-cloud", { duration: .25, y: -200, autoAlpha: 0 }, 0.1)
        .to("[id^='illu01-raindrop']", { x: 0, y: -200, duration: .1, autoAlpha: 0 }, 0.1)
        .to("#illu01-lightning-left", { duration: .25, x: -100, y: 0, autoAlpha: 0 }, 0.1)
        .to("#illu01-lightning-right", { duration: .25, x: 100, y: 0, autoAlpha: 0 }, 0.1)
        .to("#illu01-smile", { scaleY: 1, duration: .5, ease: "elastic.out( 1, 0.3)" }, 0)
        .to("#illu01-head", { rotationZ: 0, yPercent: 0, duration: .3 }, 0.1);
        return tl;
      }
  
    function section_three(){
      var tl = gsap.timeline({
        paused: true,
        scrollTrigger: {
          trigger: "#section_three",
          toggleActions: "restart pause restart pause",
          start: "top center",
          end: "bottom center"
        }
      })
        //.set("#illuOne", { autoAlpha: 1, yPercent: 0 })
      //  .set("#illuTwo", { autoAlpha: 0, yPercent: 30 })
        //.to("#illuOne", { duration: .3, yPercent: -30, autoAlpha: 0 })
      //  .to("#illuTwo", { duration: .3, yPercent: 0, autoAlpha: 1 });
        return tl;
    }			
    
    function section_four(){
      var tl = gsap.timeline({
        paused: true,
        scrollTrigger: {
          trigger: "#section_four",
          toggleActions: "restart pause restart pause",
          start: "top center",
          end: "bottom center"
        }
      })
        .set("#illuOne", { autoAlpha: 1, yPercent: 0 })
        .set("#illuTwo", { autoAlpha: 0, yPercent: 30 });
      return tl;
    }
  
  } else {
    console.log('illu-01 doesnt exist');
  }
}
animateBenefits();