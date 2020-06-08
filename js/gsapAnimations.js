// ----------------------------------------------------------
// Benefits page animations
// ----------------------------------------------------------

function animateBenefits(){
  
  // Create timelines for benefits page to use in init
  if (document.querySelector('#illuOne')) {						
    
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(DrawSVGPlugin);
  
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
    gsap.set("#illu-workdays", { autoAlpha: 0, yPercent: 0 }, 0)
    gsap.set("#illu-moneyloss", { autoAlpha: 0, yPercent: 200 }, 0)
    gsap.set("#lossnumber", { scale: 1 }, 0)
    gsap.set("#clock", {autoAlpha: 0}, 0)
    
    let section_one_tl = section_one();
    let section_two_tl = section_two();
  
    ScrollTrigger.defaults({
      toggleActions: "restart pause restart pause",
    });
  
   gsap.fromTo("#illuOne", {
      yPercent: 0
   }, {
     scrollTrigger: {
        trigger: "#section_stressAndBurnout",
        scrub: .5,
        ease: "none",
        start: "-15% center",
        end: "top center"
     },
     yPercent: -120
   });

   gsap.fromTo("#illu-workdays", {
    yPercent: 200,
    autoAlpha: 0,
    scale: 1
   }, {
    scrollTrigger: {
       trigger: "#section_stressAndBurnout",
       scrub: .5,
       ease: "none",
       start: "-20% center",
       end: "0% center"
    },
    yPercent: 0,
    autoAlpha: 1,
    scale: 1
  });

  Number.prototype.numberFormat = function(decimals, dec_point, thousands_sep) {
    dec_point = typeof dec_point !== 'undefined' ? dec_point : '.';
    thousands_sep = typeof thousands_sep !== 'undefined' ? thousands_sep : ',';

    var parts = this.toFixed(decimals).split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);

    return parts.join(dec_point);
  }

  var counter = { var: 10000000 };
  var tal = document.getElementById("number-workdays");
    
  gsap.to(counter, 5, {
    var: 12800000, 
    onUpdate: function () {
      var nwc = counter.var.numberFormat(0);
      tal.innerHTML = nwc;
    },
    ease: "none",
    scrollTrigger: {
      trigger: "#section_stressAndBurnout",      
      start: "-15% center",
      end: "50% center",
      scrub: true
    }
  });

  //bounce
  gsap.fromTo("#number-workdays", {
    scale: 1.2
  },{
    scale: 1,
    ease: "elastic.out( 1, 0.3)",
    duration: .8,
    scrollTrigger: {
      trigger: "#section_stressAndBurnout",      
      start: "50% center"
    }
  })

  gsap.fromTo("#illu-workdays", {
    yPercent: 0,
    scale: 1
  },{
    yPercent: -27,
    scale: .6,
    scrollTrigger: {
      trigger: "#section_moneyloss",
      scrub: .5,
      ease: "none",
      start: "-20% center",
      end: "0% center"
    }
  });

  gsap.fromTo("#illu-moneyloss", {
    yPercent: 200,
    autoAlpha: 0,
  }, {
    scrollTrigger: {
      trigger: "#section_moneyloss",
      scrub: .5,
      ease: "none",
      start: "-20% center",
      end: "0% center"
    },
    yPercent: 0,
    autoAlpha: 1,
  });

  gsap.fromTo("#losspath", {
    drawSVG: "0%"
  },{
    drawSVG: "100%",
    scrollTrigger: {
      trigger: "#section_moneyloss",
      scrub: 1,
      ease: "power3.in",
      start: "0% center",
      end: "60% center"
    }    
  });

  var loss = { var: 2 };
  var losstal = document.getElementById("lossnumber");
  
  gsap.to(loss, 5, {
    var: 600, 
    onUpdate: function () {
      var somethingelse = loss.var.numberFormat(0);
      losstal.innerHTML = somethingelse;
    },
    ease:Circ.easeOut,
    scrollTrigger: {
      trigger: "#section_moneyloss",
      scrub: true,
      start: "0% center",
      end: "60% center",
      ease: "power4.out"
    }
  });

  //bounce
  gsap.fromTo("#lossnumber", {
    scale: 1.3,
    transformOrigin: "50% 100%"
  },{
    scale: 1,
    ease: "elastic.out( 1, 0.3)",
    duration: .8,
    scrollTrigger: {
      trigger: "#section_moneyloss",      
      start: "60% center"
    }
  })

  //section_problemWithSitting
  
  gsap.fromTo("#illu-workdays", {
    yPercent: -27,
    scale: .6
  },{
    yPercent: 0,
    scale: 1,
    scrollTrigger: {
      trigger: "#section_problemWithSitting",    
      start: "-10% center",
      end: "0% center",
      scrub: true     
    }
  });

  gsap.fromTo("#illu-moneyloss", {
    yPercent: 0,
    autoAlpha: 1,
    scale: 1
  }, {
    scrollTrigger: {
      trigger: "#section_problemWithSitting",
      scrub: true,
      ease: "none",
      start: "-10% center",
      end: "10% center"
    },
    yPercent: 200,
    autoAlpha: 0,
    scale: 1.5
  });

  gsap.fromTo("#calendar, #number-workdays", {
    autoAlpha: 1,
    scale: 1,
    transformOrigin: "50% 0%"
  },{
    autoAlpha: 0,
    scale: 0.3,
    scrollTrigger: {
      trigger: "#section_problemWithSitting",
      scrub: true,
      ease: "none",
      start: "-10% center",
      end: "0% center"
    }
  });

  gsap.fromTo("#clock", {
    autoAlpha: 0,
    scale: .6
  },{
    autoAlpha: 1,
    scale: 1,
    scrollTrigger: {
      trigger: "#section_problemWithSitting",
      scrub: true,
      ease: "none",
      start: "top center",
      end: "20% center"
    }
  });

  gsap.to("#minutes", {
    transformOrigin: "50% 100%",
    rotate: 3600,
    scrollTrigger: {
      trigger: "#section_problemWithSitting",
      scrub: true,
      ease: "none",
      start: "top center",
      end: "130% center",
    }
  });

  gsap.to("#hours", {
    transformOrigin: "0% 100%",
    rotate: 60,
    scrollTrigger: {
      trigger: "#section_problemWithSitting",
      scrub: true,
      ease: "none",
      start: "top center",
      end: "130% center",
    }
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
        .set("#illu-moneyloss", { autoAlpha: 0, yPercent: 200 })
        .set("#illuOne", { autoAlpha: 1 })
        //.set("#illu-workdays", { autoAlpha: 0, yPercent: 30 })
        .set("#illu01-head", { rotationZ: 0, yPercent: 0 })
        .set("#illu01-smile", {scale: 1, transformOrigin: "50% 50%"})
        .set("#illu01-sun", { autoAlpha: 0 })		
        .set("[id^='illu01-raindrop']", {x: 0, y: 0, autoAlpha: 0 })
        .add(lightning().play(0), 0)					
        .add(raindrops().play(0), 0)
        .to("#illu01-head", { duration: 0.5, rotationZ: 2, yPercent: 20 }, .5)
        .to("#illu01-smile", { scaleY: -1, duration: .5, ease: "elastic.out( 1, 0.3)"}, .3)
        .set("#lossnumber", { scale: 1 }, 0);
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
        .set("#illu-moneyloss", { autoAlpha: 0, yPercent: 200 })
        .set("#illuOne", { autoAlpha: 1, yPercent: 0 })
        .set("#illu-workdays", { autoAlpha: 0, yPercent: 0 })
        .set("#illu01-smile", {scale: -1, transformOrigin: "50% 50%"})
        .set("#illu01-head", { rotationZ: 3, yPercent: 20 })
        .set("#illu01-lightning-left, #illu01-lightning-right", {x: 0, y: 0, autoAlpha: 1})
        .set("#illu01-cloud", { x: 0, y: 0, autoAlpha: 1 })
        .set("[id^='illu01-raindrop']", { x: 0, y: 0, autoAlpha: 1 })
        .set("#lossnumber", { scale: 1 }, 0)
        .add(sunrotate().play(0), 0)
        .to("#illu01-cloud", { duration: .25, y: -200, autoAlpha: 0 }, 0.1)
        .to("[id^='illu01-raindrop']", { x: 0, y: -200, duration: .1, autoAlpha: 0 }, 0.1)
        .to("#illu01-lightning-left", { duration: .25, x: -100, y: 0, autoAlpha: 0 }, 0.1)
        .to("#illu01-lightning-right", { duration: .25, x: 100, y: 0, autoAlpha: 0 }, 0.1)
        .to("#illu01-smile", { scaleY: 1, duration: .5, ease: "elastic.out( 1, 0.3)" }, 0)
        .to("#illu01-head", { rotationZ: 0, yPercent: 0, duration: .3 }, 0.1);
        return tl;
      }
  
  } else {
    console.log('illu-01 doesnt exist');
  }
}
animateBenefits();