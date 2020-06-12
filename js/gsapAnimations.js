// ----------------------------------------------------------
// Benefits page animations
// ----------------------------------------------------------

function animateBenefits(){
  
  // Create timelines for benefits page to use in init
  if (document.querySelector('#illuOne')) {						
    
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(DrawSVGPlugin);
    
    //gsap.defaults({ duration: 0.01 });

    ScrollTrigger.defaults({
      toggleActions: "restart complete restart reset",
      markers: {startColor: "green", endColor: "red", fontSize: "15px", indent: 10}
    });

    gsap.set("#clock", {autoAlpha: 0} );
    
    let triggerLoad = { trigger: "#section_one", start: "0% center", end: "50% center" };
    let triggerOne = { trigger: "#section_one", start: "0% center", end: "100% center" };
    let triggerTwo = { trigger: "#section_two", start: "0% center", end: "100% center" };
    let triggerStressIn = { trigger: "#section_stressAndBurnout", start: "0% center", end: "25% center", scrub: .5 };
    let triggerStressCount = { trigger: "#section_stressAndBurnout", start: "0% center", end: "90% center", scrub: false };
    let triggermoneyLossIn = { trigger: "#section_moneyloss", start: "0% center", end: "90% center", scrub: true };
    let triggerproblemSittingIn = { trigger: "#section_problemWithSitting", start: "0% center", end: "100% center", scrub: .5 };

    let raindrops_tl = gsap.timeline()
    .to("#illu01-raindrop01, #illu01-raindrop02, #illu01-raindrop04", { 
      yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3}, 0)
    .to("#illu01-raindrop03, #illu01-raindrop05", { 
      yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3 }, .15);

    let section_OneIn = gsap.timeline({ scrollTrigger: triggerOne })
      .set("#illu01-sun", { autoAlpha: 0 })
      .set("#cloudrain", { xPercent: -100, yPercent: 0, autoAlpha: 0 })
      .set("#illu01-lightning-left", { y: -300, x: -100, autoAlpha: 0 })
      .set("#illu01-lightning-right", { y: -300, x: 100, autoAlpha: 0 })
      .set("#illu01-head", { rotationZ: 0, yPercent: 0 })
      .fromTo("#illuOne", { 
        autoAlpha: 0 }, {
        autoAlpha: 1, duration: .7})
      .to("#cloudrain", { 
        xPercent: 0, yPercent: 0, autoAlpha: 1, duration: .5 }, 1.2)
      .to("#illu01-lightning-left", {
        y: 0, x: 0, autoAlpha: 1, ease: "power4.inOut", duration: .5 }, .7)
      .to("#illu01-lightning-right", {
        y: 0, x: 0, autoAlpha: 1, ease: "power4.inOut", duration: .5 }, .8)
      .to("#illu01-head", { 
        rotationZ: 2, yPercent: 20, duration: 1 }, 1.5)
      .fromTo("#illu01-smile", { 
        scaleY: 1, transformOrigin: "50% 50%" }, {
        scaleY: -1, duration: .5  
        }, .9)
      .add(raindrops_tl, 1.7);

    let sunriseloop = gsap.timeline()
      .set("#illu01-sun", { autoAlpha: 0, xPercent: 0 })
      .to("#illu01-sun", { duration: .3, autoAlpha: 1 }, 0)
      .to("#illu01-sun", { duration: 1, xPercent: -60, yPercent: -60 }, 0)
      .to("#illu01-sun--rays", { duration: .5, transformOrigin: "50% 50%", scale: .9, repeat: -1, yoyo: true }, 0)
      .to("#illu01-sun--rays", { duration: 1, rotationZ: 45, ease: "none", repeat: -1 }, 0);

    let section_TwoIn = gsap.timeline({ scrollTrigger: triggerTwo })
      .call( function(){ section_OneIn.pause() } )
      .set("#illuOne", { autoAlpha: 1 })
      .set("#illu01-lightning-left", { y: 0, x: 0, autoAlpha: 1 })
      .set("#illu01-lightning-right", { y: 0, x: 0, autoAlpha: 1 })
      .set("#illu01-head", { rotationZ: 2, yPercent: 20 })
      .set("#illu01-smile", { scaleY: -1, transformOrigin: "50% 50%" })
      .to("#illu01-head", { rotationZ: 0, yPercent: 0, duration: .3 }, 0)
      .fromTo("#cloudrain", { 
        xPercent: 0, yPercent: 0, autoAlpha: 1 }, { 
        xPercent: 0, yPercent: -400, autoAlpha: 0, duration: .5 }, 0)
      .to("#illu01-lightning-left", { x: -200, y: 0, autoAlpha: 0, duration: .3 }, 0)
      .to("#illu01-lightning-right", { x: 200, y: 0, autoAlpha: 0, duration: .3 }, 0)
      .to("#illu01-smile", { scaleY: 1, duration: .5 }, 0)
      .add(sunriseloop);

    let section_stressIn = gsap.timeline( { scrollTrigger: triggerStressIn } )
      .call( function(){ section_OneIn.pause(); }, 0)
      .set("#illu-workdays", { y: 400, autoAlpha: 0 })
      .set("#illuOne", { autoAlpha: 1, yPercent: 0 } )
      .to("#illuOne", { autoAlpha: 0, yPercent: -110, duration: .75 }, 0)
      .to("#illu-workdays", { autoAlpha: 1, y: 0, duration: 1 }, 0);

    //Function for counting up
    Number.prototype.numberFormat = function(decimals, dec_point, thousands_sep) {
      dec_point = typeof dec_point !== 'undefined' ? dec_point : '.';
      thousands_sep = typeof thousands_sep !== 'undefined' ? thousands_sep : ',';
      var parts = this.toFixed(decimals).split('.');
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
      return parts.join(dec_point);
    };
    var counter = { var: 0 };
    var tal = document.getElementById("number-workdays");

    let section_stressCount = gsap.timeline({ scrollTrigger: triggerStressCount })      
      .set("#number-workdays", { scale: 1, fill: "#FFF" })
      .to(counter, {
        var: 12800000, 
        onUpdate: function(){
          var nwc = counter.var.numberFormat(0);
          tal.innerHTML = nwc;
        },
        ease: "power4.in", duration: 3, 
        onComplete: function(){
          gsap.fromTo("#number-workdays", { scale: 1.2, fill: "#FFF" },{ scale: 1, fill: "#000", ease: "elastic.out( 1, 0.3)", duration: .66 })
        }
      }, 0);

      let loss = { var: 2 };
      let losstal = document.getElementById("lossnumber");

    let section_moneyLossIn = gsap.timeline({ scrollTrigger: triggermoneyLossIn })
      .set("#illu-moneyloss", { autoAlpha: 0, y: 400 })
      .set("#illu-workdays", { autoAlpha: 1, yPercent: 0, scale: 1 })
      .set("#woman-on-desk", { autoAlpha: 1, scale: 1, transformOrigin: "50% 50%" }, 0)
      .to("#illu-workdays", { autoAlpha: 1, yPercent: -22, scale: .75 , duration: 1}, 0)
      .to("#illu-moneyloss", { autoAlpha: 1, y: 0, duration: 1 }, 0)
      .to("#woman-on-desk", { autoAlpha: 0, scale: .5, duration: 1 }, 0)
      .fromTo("#losspath", {
          drawSVG: "0%" },{
          drawSVG: "100%", ease: "none", duration: 5}, 0)
      .to(loss, 5, { 
        var: 600, 
        onUpdate: function(){
          var somethingelse = loss.var.numberFormat(0);
          losstal.innerHTML = somethingelse;
        }, 
        ease: "none", duration: 3,
        onComplete: function(){
          gsap.fromTo("#lossnumber", {
              scale: 1.5, transformOrigin: "50% 50%" }, {
              scale: 1, ease: "elastic.out( 1, 0.3)", duration: .66 
          })
        }
      }, 0);
     
    let section_problemWithSittingIn = gsap.timeline({ scrollTrigger: triggerproblemSittingIn })
      .set("#woman-on-desk", { autoAlpha: 0, scale: .5 })
      .set("#illu-moneyloss", { autoAlpha: 1, y: 0, scale: 1, transformOrigin: "50% 50%" })
      .set("#woman-on-desk", { autoAlpha: 0, scale: .5 })
      .set("#clock", { autoAlpha: 0, scale: .6 })
      .set("#illu-workdays", { autoAlpha: 1, yPercent: -22, scale: .75 })
      .to("#illu-workdays", { autoAlpha: 1, yPercent: 0, scale: 1, duration: 1 }, 0)
      .to("#woman-on-desk", { autoAlpha: 1, scale: 1, duration: 1 }, 0)
      .to("#illu-moneyloss", { autoAlpha: 0, y: 100, scale: 1.5, duration: 1 }, 0)
      .to("#clock", { autoAlpha: 1, scale: 1, duration: 1 }, 0)
      .fromTo("#calendar, #number-workdays", {
          autoAlpha: 1, scale: 1, transformOrigin: "50% 0%" }, {
          autoAlpha: 0, scale: 0.3, duration: 1 }, 0)
      .to("#minutes", { transformOrigin: "50% 100%", rotate: 3600, duration: 5 }, 0)
      .to("#hours", { transformOrigin: "0% 100%", rotate: 300, duration: 5 }, 0);
    
  
    
  
  } else {
    console.log('illu-01 doesnt exist');
  }
}
animateBenefits();