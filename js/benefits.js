
// Create timelines for benefits page to use in init
if (jQuery("#illuOne").length) {
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
  var sTop = jQuery(window).scrollTop() + ( jQuery(window).height() / 2 );
  jQuery('.section').each(function() {
    var id = jQuery(this).attr('id'),
        offset = jQuery(this).offset().top-1,
        height = jQuery(this).height(),
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


jQuery(window).on('scroll', function(){
  scrNav();
  });

