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

    
    let triggerOne = { trigger: "#section_one", start: "0% center", end: "100% center" };
    let triggerTwo = { trigger: "#section_two", start: "0% center", end: "100% center" };
    let triggerStressIn = { trigger: "#section_stressAndBurnout", start: "0% center", end: "25% center", scrub: .5 };
    let triggerStressCount = { trigger: "#section_stressAndBurnout", start: "0% center", end: "90% center"};
    let triggermoneyLossIn = { trigger: "#section_moneyloss", start: "0% center", end: "90% center", scrub: true };
    let triggerproblemSittingIn = { trigger: "#section_problemWithSitting", start: "0% center", end: "100% center", scrub: .5 };

    let section_One_raindrops_tl = gsap.timeline({ scrollTrigger: triggerOne })
    .to("#illu01-raindrop01, #illu01-raindrop02, #illu01-raindrop04", { 
      yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3}, 1.7)
    .to("#illu01-raindrop03, #illu01-raindrop05", { 
      yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3 }, 1.85);

    let section_OneIn = gsap.timeline({ scrollTrigger: triggerOne })
      .set(".illustration-stage svg", { clearProps: "all"})
      .set("#illu01-sun", { autoAlpha: 0 })
      .set("#cloudrain", { xPercent: -100, yPercent: 0, autoAlpha: 0 })
      .set("#illu01-lightning-left", { y: -300, x: -100, autoAlpha: 0 })
      .set("#illu01-lightning-right", { y: -300, x: 100, autoAlpha: 0 })
      .set("#illu01-head", { rotationZ: 0, yPercent: 0 })
      .fromTo("#illuOne", { 
        autoAlpha: 0 }, {
        autoAlpha: 1, duration: .7})
      .to("#cloudrain", { xPercent: 0, yPercent: 0, autoAlpha: 1, duration: .5 }, 1.2)
      .to("#illu01-lightning-left", { y: 0, x: 0, autoAlpha: 1, ease: "power4.inOut", duration: .5 }, .7)
      .to("#illu01-lightning-right", { y: 0, x: 0, autoAlpha: 1, ease: "power4.inOut", duration: .5 }, .8)
      .to("#illu01-head", {  rotationZ: 2, yPercent: 20, duration: 1 }, 1.5)
      .fromTo("#illu01-smile", { scaleY: 1, transformOrigin: "50% 50%" }, {
        scaleY: -1, duration: .5 }, .9);

    let section_Two_sunriseloop = gsap.timeline({ scrollTrigger: triggerTwo })
      .set("#illu01-sun", { autoAlpha: 0, xPercent: 0 })
      .to("#illu01-sun", { duration: .3, autoAlpha: 1 }, 0)
      .to("#illu01-sun", { duration: 1, xPercent: -60, yPercent: -60 }, 0)
      .to("#illu01-sun--rays", { duration: .5, transformOrigin: "50% 50%", scale: .9, repeat: -1, yoyo: true }, 0)
      .to("#illu01-sun--rays", { duration: 1, rotationZ: 45, ease: "none", repeat: -1 }, 0);

    let section_TwoIn = gsap.timeline({ scrollTrigger: triggerTwo })
      .call( function(){ section_OneIn.pause() } )
      .set("#illuOne", { autoAlpha: 1 })
      .set("#illu-workdays", { clearProps: "all" })
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
      .to("#illu01-smile", { scaleY: 1, duration: .5 }, 0);

    //let section_stressReset = gsap.timeline({ scrollTrigger: triggerStressReset })
      

    let section_stressIn = gsap.timeline({ scrollTrigger: triggerStressIn })      
      .set("#illu-workdays", { y: 400, autoAlpha: 0, scale: 1 })
      .set("#illuOne", { autoAlpha: 1, yPercent: 0 } )
      .fromTo("#illuOne", { autoAlpha: 1, yPercent: 0 }, { autoAlpha: 0, yPercent: -110, duration: .75 }, 0)
      .fromTo("#illu-workdays", { y: 400, autoAlpha: 0, scale: 1 }, { y: 0, autoAlpha: 1, scale: 1, duration: 1 }, 0);

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
      .call( function(){ section_OneIn.pause(); }, 0)
      .set("#woman-on-desk", { autoAlpha: 1, scale: 1, transformOrigin: "50% 50%" }, 0)
      .set("#illu-moneyloss", { clearProps: "all" })
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
      .set("#clock", { autoAlpha: 0, scale: 1, xPercent: 0 })
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
      .set("#clock", { autoAlpha: 0, scale: .6, xPercent: 0 })
      .set("#illu-workdays", { autoAlpha: 1, yPercent: -22, scale: .75 })
      .set("#body-workdays #upperbody", { autoAlpha: 1, transformOrigin: "4% 96%", rotationZ: -5 })
      .set("#body-workdays #arm", { transformOrigin: "10% 40%", rotationZ: 0, xPercent: -10 })      
      .to("#illu-workdays", { autoAlpha: 1, yPercent: 0, scale: 1, duration: 1 }, 0)
      .to("#woman-on-desk", { autoAlpha: 1, scale: 1, duration: 1 }, 0)
      .to("#illu-moneyloss", { autoAlpha: 0, y: 100, scale: 1.5, duration: 1 }, 0)
      .to("#clock", { autoAlpha: 1, scale: 1, xPercent: 0, duration: 1 }, 0)
      .fromTo("#calendar, #number-workdays", {
          autoAlpha: 1, scale: 1, transformOrigin: "50% 0%" }, {
          autoAlpha: 0, scale: 0.3, duration: 1 }, 0)
      .to("#minutes", { transformOrigin: "50% 100%", rotate: 3600, duration: 5 }, 0)
      .to("#hours", { transformOrigin: "0% 100%", rotate: 300, duration: 5 }, 0)
      .to("#body-workdays #upperbody", { rotationZ: 5, duration: 5 }, 0)
      .to("#body-workdays #arm", { rotationZ: -10, xPercent: 5, yPercent: 10, duration: 5 }, 0);
    
  
    let triggerhowCombatIn = { trigger: "#section_howCombat", start: "0% center", end: "100% center" };  
    let section_howCombatIn = gsap.timeline({ scrollTrigger: triggerhowCombatIn })
    .set("#clock", { autoAlpha: 1, scale: 1, xPercent: 0 })
    .set("#body-howcombat", { autoAlpha: 0 })
    .set("#body-workdays", { autoAlpha: 1 })
    .set("#body-workdays #upperbody", { autoAlpha: 1,  rotationZ: 5 }, 0)
    .set("#body-workdays #arm", { rotationZ: -10, xPercent: 5, yPercent: 10 }, 0)
    .set("#speechbubble", { autoAlpha: 1, scale: 0, transformOrigin: "100% 100%" })
    .to("#body-workdays #upperbody", { rotationZ: -30, duration: .5, ease: "power4.in" }, 0)
    .to("#body-workdays #arm", { rotationZ: 30, xPercent: -40, yPercent: -25, duration: .5, ease: "power4.in" }, 0)
    .to("#body-howcombat", { autoAlpha: 1, duration: .05 }, .55)
    .to("#body-workdays", { autoAlpha: 0, duration: .05 }, .55)
    .to("#clock", { autoAlpha: 0, xPercent: -100, duration: .4,  }, .4)
    .to("#speechbubble", { scale: 1, duration: .5, ease: "elastic.out( 1, 0.75)" }, .5)
    ;

    let triggermindfulBreakIn = { trigger: "#section_mindfulBreak", start: "0% center", end: "100% center", scrub: .5 };
    let section_mindfulBreak = gsap.timeline({ scrollTrigger: triggermindfulBreakIn })
      .set("#illu-mindfulbreak", { yPercent: 110, autoAlpha: 0 })
      .set("#illu-workdays", { yPercent: 0, autoAlpha: 1 })
      .set("#flash", { autoAlpha: 1, scaleX: 1, transformOrigin: "0 50%" })
      .set("#charge", { scaleX: 0, fill: "red" })
      .to("#illu-workdays", { yPercent: -110, autoAlpha: 0, duration: 1 }, 0)
      .to("#illu-mindfulbreak", { yPercent: 0, autoAlpha: 1, duration: 1.2 }, 0)
      .to("#charge", { scaleX: 1, ease: "none", duration: 10 }, 0)
      .to("#charge", { fill: "#6a945b", ease: "power4.easeOut", duration: 10 }, 0);

    let triggermindfulBreakCharge = { trigger: "#section_mindfulBreak", start: "0% center", end: "90% center" };
    let braincharging = gsap.timeline({ trigger: triggermindfulBreakCharge })
    .set("#illu-logo", { scale: .8, yPercent: 110, autoAlpha: 0 })
    .to("#flash", { autoAlpha: 0, duration: .5, repeat: -1, yoyo: true, ease: "power" }, .5)
    .to("body", { backgroundColor: "#9ACFE9"}, 0);
    
    let triggerrebalanceYourselfIn = { trigger: "#section_rebalanceYourself", start: "0% center", end: "100% center" };
    let rebalanceYourselfIn = gsap.timeline({ scrollTrigger: triggerrebalanceYourselfIn })
      .set("#illu-logo", { scale: .8, yPercent: 110, autoAlpha: 0 })
      .set("#illu-mindfulbreak", { yPercent: 0, autoAlpha: 1 })
      .set("#illu-logo", { rotationZ: -25, transformOrigin: "50% 70%" })
      .set("[id^='letter-']", { 
        rotationZ: function(){ return gsap.utils.random(-45, 45); },
        xPercent: function(){ return gsap.utils.random(-33, 33); },
      })
      .to("#illu-mindfulbreak", { yPercent: -110, autoAlpha: 0, duration: .3 }, 0)
      .to("#illu-logo", { yPercent: 0, autoAlpha: 1, duration: .5 }, 0)
      .to("[id^='letter-']", { rotationZ: 0, xPercent: 0, duration: 5, ease: "elastic.out(1.5,.1)" }, 0.1)
      .to("#illu-logo", { rotationZ: 0, duration: 5, ease: "elastic.out(2, .3)" }, 0)
      .fromTo("body", { backgroundColor: "#9ACFE9" }, { backgroundColor: "#FFFFFF", duration: 1, ease: "power4.inout" }, 0  );

  
  } else {
    console.log('illu-01 doesnt exist');
  }
}
animateBenefits();