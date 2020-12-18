// ----------------------------------------------------------
// Benefits page animations
// ----------------------------------------------------------

function gsAnimations(){
  ScrollTrigger.getAll().forEach(element => element.kill());

  if (document.querySelector('#illu-woman-rain-shine')) {						
    // -------------------------
    // Animations for Home Page
    // -------------------------
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(DrawSVGPlugin);
    ScrollTrigger.defaults({
      toggleActions: "restart complete restart reset"//,
    });

    let trigger_illu_woman_rain = { 
      trigger: "#section_why_reblance", 
      start: "0% center", 
      end: "100% center" };
    
    let tl_woman_rain_raindrops = gsap.timeline({ 
      paused: true,  
      scrollTrigger: {
        trigger: "#section_why_rebalance",
        start: "top center",
        end: "bottom center"
      } })
      .fromTo("#illu01-raindrop01, #illu01-raindrop02, #illu01-raindrop04", 
        { yPercent: 0, scaleY: 1 }, 
        { yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3}, 1.7)
      .fromTo("#illu01-raindrop03, #illu01-raindrop05", 
        { yPercent: 0, scaleY: 1 },
        { yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3 }, 1.85);
    
    let tl_woman_rain_in = gsap.timeline({ 
      paused: true, 
      scrollTrigger: trigger_illu_woman_rain })
      .set("#illu01-head", 
        { rotationZ: 0, y: 0, yPercent: 0 })
      .set("#illu01-smile", 
        { scaleY: 1 })
      .fromTo("#illu-woman-rain-shine", 
        { yPercent: 0, autoAlpha: 0 }, 
        { yPercent: 0, autoAlpha: 1, duration: .7})
      .fromTo("#cloudrain", 
        { xPercent: -100, yPercent: 0, autoAlpha: 0 }, 
        { xPercent: 0, yPercent: 0, autoAlpha: 1, duration: .5 }, 1.2)
      .fromTo("#illu01-lightning-left", 
        { y: -300, x: -100, autoAlpha: 0 }, 
        { y: 0, x: 0, autoAlpha: 1, ease: "power4.inOut", duration: .5 }, .7)
      .fromTo("#illu01-lightning-right", 
        { y: -300, x: 100, autoAlpha: 0 }, 
        { y: 0, x: 0, autoAlpha: 1, ease: "power4.inOut", duration: .5 }, .8)
      .fromTo("#illu01-head", 
        { rotationZ: 0, y: 0, yPercent: 0 }, 
        { rotationZ: 2, y: 0, yPercent: 20, duration: 1 }, 1.5)
      .fromTo("#illu01-smile", 
        { scaleY: 1, transformOrigin: "50% 50%" }, 
        { scaleY: -1, duration: .5 }, .9);

    let trigger_whatsWrong_in = { 
      trigger: "#section_whatsWrong", 
      start: "0% center", 
      end: "25% center", 
      id: "stress", 
      scrub: true };

    let tl_whatsWrong_in = gsap.timeline({ paused: true, scrollTrigger: trigger_whatsWrong_in })      
      .fromTo("#illu-woman-rain-shine", 
        { autoAlpha: 1, yPercent: 0 }, 
        { autoAlpha: 0, yPercent: -110, duration: .75 }, 0)
      .fromTo("#illu-workdays", 
        { yPercent: 100, autoAlpha: 0, scale: 1 }, 
        { yPercent: 0, autoAlpha: 1, scale: 1, duration: 1 }, 0);
     
    let trigger_woman_on_desk_slumps = { 
      trigger: "#section_whatsWrong", 
      start: "0% center", 
      end: "100% center", 
      scrub: true };

    let tl_woman_on_desk_slumps_in = gsap.timeline({ 
      paused: true, 
      scrollTrigger: trigger_woman_on_desk_slumps })         
      .fromTo("#woman-on-desk", 
        { autoAlpha: 0, scale: .5 }, 
        { autoAlpha: 1, scale: 1, duration: 1 }, 0)
      .fromTo("#illu-moneyloss", 
        { autoAlpha: 1, yPercent: 0, scale: 1, transformOrigin: "50% 50%" }, 
        { autoAlpha: 0, yPercent: 50, scale: 1.5, duration: 1, onComplete: ()=>{
          gsap.set("#illu-moneyloss", { autoAlpha: 0, yPercent: 100 })} }, 0)
      .fromTo("#clock", 
        { autoAlpha: 0, scale: .6, xPercent: 0 }, 
        { autoAlpha: 1, scale: 1, xPercent: 0, duration: 1 }, 0)
      .fromTo("#minutes", { transformOrigin: "50% 100%", rotate: 0 }, { rotate: 3600, duration: 5 }, 0)
      .fromTo("#hours", { transformOrigin: "0% 100%", rotate: 0 }, { rotate: 300, duration: 5 }, 0)
      .fromTo("#body-workdays #upperbody", 
        { autoAlpha: 1, rotationZ: -5, transformOrigin: "4% 96%" }, 
        { autoAlpha: 1, rotationZ: 5, duration: 5 }, 0)
      .fromTo("#body-workdays #arm", 
        { rotationZ: 0, xPercent: -10, yPercent: 0, transformOrigin: "10% 40%" }, 
        { rotationZ: -10, xPercent: 5, yPercent: 10, duration: 5 }, 0);
    
  
    let trigger_speechbubble_pops_up = { 
      paused: true, 
      trigger: "#section_bring_balance_back", 
      start: "0% center", 
      end: "100% center" };

    let tl_speechbubble_pops_up = gsap.timeline({ paused: true, scrollTrigger: trigger_speechbubble_pops_up })
      .fromTo("#body-workdays #upperbody", 
        { autoAlpha: 1,  rotationZ: 5 }, 
        { rotationZ: -30, duration: .5, ease: "power4.in" }, 0)
      .fromTo("#body-workdays #arm", 
        { rotationZ: -10, xPercent: 5, yPercent: 10 }, 
        { rotationZ: 30, xPercent: -40, yPercent: -25, duration: .5, ease: "power4.in" }, 0)
      .fromTo("#body-howcombat", 
        { autoAlpha: 0, yPercent: 0 }, 
        { autoAlpha: 1, duration: .05 }, .55)
      .fromTo("#body-workdays", 
        { autoAlpha: 1, yPercent: 0 }, 
        { autoAlpha: 0, duration: .05 }, .55)
      .to("#clock", 
        { autoAlpha: 0, xPercent: -100, duration: .4,  }, .4)
      .fromTo("#speechbubble", 
        { autoAlpha: 1, scale: 0, transformOrigin: "100% 100%" }, 
        { scale: 1, duration: .5, ease: "elastic.out( 1, 0.75)" }, .5);

    let trigger_woman_sunrise = { 
      trigger: "#section_about_habits", 
      start: "0% center", 
      end: "100% center" };

    let tl_woman_sunrise_sunriseloop = gsap.timeline({ 
      paused: true, 
      scrollTrigger: trigger_woman_sunrise })      
      .fromTo("#illu01-sun", 
        { autoAlpha: 0 }, 
        { duration: .3, autoAlpha: 1 }, 1)
      .fromTo("#illu01-sun", 
        { xPercent: 0, yPercent: 0 }, 
        { duration: 1, xPercent: -60, yPercent: -60 }, 1)
      .fromTo("#illu01-sun--rays", 
        { scale: 1 }, 
        { scale: .9, duration: .5, transformOrigin: "50% 50%", repeat: -1, yoyo: true }, 1)
      .fromTo("#illu01-sun--rays", 
        { rotationZ: 0 }, 
        { rotationZ: 360, duration: 8, ease: "none", repeat: -1 }, 1);

    let tl_woman_sunrise_in = gsap.timeline({ paused: true, scrollTrigger: trigger_woman_sunrise })
      .fromTo("#illu-woman-rain-shine", 
        { autoAlpha: 0, yPercent: -110 }, 
        { autoAlpha: 1, yPercent: 0, duration: .75 }, 0)
      .fromTo("#illu-workdays", 
        { yPercent: 0, autoAlpha: 1, scale: 1 }, 
        { yPercent: 100, autoAlpha: 0, scale: 1, duration: 1 }, 0)
      .fromTo("#illu01-head", 
        { rotationZ: 2, y: 0, yPercent: 20 }, 
        { rotationZ: 0, y: 0,  yPercent: 0, duration: .3 }, 1)
      .to("#cloudrain", 
        { xPercent: 0, yPercent: -400, autoAlpha: 0, duration: .5 }, 1)
      .to("#illu01-lightning-left", 
        { x: -200, y: 0, autoAlpha: 0, duration: .3 }, 1)
      .to("#illu01-lightning-right", 
        { x: 200, y: 0, autoAlpha: 0, duration: .3 }, 1)
      .fromTo("#illu01-smile", 
        { scaleY: -1, transformOrigin: "50% 50%" }, 
        { scaleY: 1, duration: .5 }, 1);

    let triggerrebalanceYourselfIn = { 
      trigger: "#section_rebalanceYourself", 
      start: "0% center", 
      end: "100% center" };
    
    let rebalanceYourselfIn = gsap.timeline({ 
      paused: true, 
      scrollTrigger: triggerrebalanceYourselfIn })     
    .fromTo("#illu-woman-rain-shine", 
      { yPercent: 0, autoAlpha: 1 }, 
      { y: 0, yPercent: -110, autoAlpha: 0, duration: .3 }, 0)
    .fromTo("[id^='letter-']", 
      { y: 0, x: 0, rotationZ: function(){ return gsap.utils.random(-45, 45); }, xPercent: function(){ return gsap.utils.random(-33, 33); } }, 
      { y: 0, x: 0, rotationZ: 0, xPercent: 0, duration: 5, ease: "elastic.out(1.5,.1)" }, 0.1)
    .fromTo("#illu-logo", 
      { scale: .8, y: 0, yPercent: 110, autoAlpha: 0 }, 
      { y: 0, yPercent: 0, autoAlpha: 1, duration: .5 }, 0)
    .fromTo("#illu-logo", 
      { rotationZ: -25, transformOrigin: "50% 70%" }, 
      { rotationZ: 0, duration: 5, ease: "elastic.out(2, .3)" }, 0);    
  }; 
  
  if (document.querySelector('#world')) { 
  // -------------------------
  // Animations for About Page
  // -------------------------
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(DrawSVGPlugin);
    ScrollTrigger.defaults({
      toggleActions: "restart complete restart reset",
    });
    
    gsap.fromTo("#breatheman", 
    { yPercent: -10, autoAlpha: 0, scale: .75 }, 
    { yPercent: 0, autoAlpha: 1, scale: .8, ease: "none", 
      scrollTrigger: { trigger: "#section_improve_your_workday", start: "0% center", end: "60% center"} })

    gsap.fromTo("#breatheman", 
    { yPercent: 0, autoAlpha: 1 }, 
    { yPercent: -100, autoAlpha: 0, ease: "none", 
      scrollTrigger: { trigger: "#section_unbalancedWorld", start: "-200 center", end: "0% center ", scrub: true } })

    let trigger_unbalancedWorldIn = { 
      trigger: "#section_unbalancedWorld", 
      start: "0% center", 
      end: "100% center ", 
      onEnter: ()=>{ 
        tl_unbalancedWorldeyeloop.pause(); 
        console.log('trigger_unbalancedWorldIn'); 
      }};

    let tl_unbalancedWorldeyeloop = gsap.timeline({ paused: true, repeat: -1 })
      .fromTo("#eyes", { xPercent: -2, yPercent: -40 }, { xPercent: -2, yPercent: -40, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -20, yPercent: 60, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -20, yPercent: -20, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -2, yPercent: 60, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -2, yPercent: -40, duration: 1, ease: "power4.out" })
      .fromTo("#eyelids", { yPercent: 0 }, { yPercent: -30, duration: 5 }, 0)
      .to("#eyelids", { yPercent: 0, duration: 3 }, 5);
    
    gsap.fromTo("#unbalancedWorld", 
        { yPercent: 100, autoAlpha: 0 },
        { yPercent: 0, autoAlpha: 1, duration: 1, scrollTrigger: trigger_unbalancedWorldIn })

    let tl_unbalancedWorld = gsap.timeline({ paused: true, scrollTrigger: trigger_unbalancedWorldIn }).timeScale(2)
      .set("#eyes", { xPercent: 0, yPercent: 0 })
      .set("[id^='notification-']", { scale: 0, xPercent: 0, yPercent: 0, autoAlpha: 1, transformOrigin: "50% 50%" })
      .to("#unbalancedWorld", { autoAlpha: 1, duration: 1 })
      .to("[id^='notification-']", { scale: 1, ease: "elastic.out(1, .3)", duration: 1,  stagger: 1}, 2)
      .to("#eyes", { xPercent: -15, yPercent: 10, duration: 2, ease: "power4.out" }, 0)
      .to("#eyelids", { yPercent: -20, duration: 2 }, 0)
      .to("#eyelids", { yPercent: 0, duration: .2 }, 2)
      .to("#eyelids", { yPercent: -30, duration: 5 }, 2.2)
      .to("#eyes", { xPercent: -20, yPercent: 60, duration: 1, ease: "power4.out" }, 2)
      .to("#eyes", { xPercent: -20, yPercent: -20, duration: 1, ease: "power4.out" }, 3)
      .to("#eyes", { xPercent: -2, yPercent: 60, duration: 1, ease: "power4.out" }, 4)
      .to("#eyes", { xPercent: -2, yPercent: -40, duration: 1, ease: "power4.out" }, 5)
      .to("#eyelids", { yPercent: 0, duration: 1, onComplete: ()=>{ tl_unbalancedWorldeyeloop.play(0) } }, 7.2);

    let tl_ourMissioneyeloop = gsap.timeline({ paused: true, repeat: -1 })
      .fromTo("#bw-eyelids-lower", { yPercent: 0 }, { yPercent: -75, duration: .05 }, 2)
      .fromTo("#bw-eyelids-upper", { yPercent: 0 }, { yPercent: 75, duration: .05 }, 2)
      .to("#bw-eyelids-lower, #bw-eyelids-upper", { yPercent: 0, duration: .3 }, 2.05)
      .fromTo("#bw-eyelids-lower", { yPercent: 0 }, { yPercent: -75, duration: .05 }, 2.35)
      .fromTo("#bw-eyelids-upper", { yPercent: 0 }, { yPercent: 75, duration: .05 }, 2.35)
      .to("#bw-eyelids-lower, #bw-eyelids-upper", { yPercent: 0, duration: .2 }, 2.4)
      
      

    let trigger_ourMission_In = { trigger: "#section_ourMission", start: "0% center", end: "100% center", onEnter: ()=>{ tl_unbalancedWorldeyeloop.pause();  console.log('trigger_ourMission_In'); } }

    let tl_ourMission = gsap.timeline({ paused: true, scrollTrigger: trigger_ourMission_In })
      .to("#notification-todo", { xPercent: 100, yPercent: 100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#notification-traffic", { xPercent: -100, yPercent: -100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#notification-alarm", { xPercent: -100, yPercent: 100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#notification-meeting", { xPercent: 100, yPercent: -100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#world", { transformOrigin: "50% 50%", yPercent: -50, scale: .8, duration: .5 }, 0)
      .to("#eyes", { xPercent: -10, yPercent: 80, duration: 1, onComplete: ()=>{tl_ourMissioneyeloop.play(0)} }, .5)
      .to("#eyelids", { yPercent: 0, duration: 1 }, .5)
      .fromTo("#bw-eyes", {  yPercent: 0 }, { yPercent: -50, duration: 1 }, 1.5)
      .fromTo("#bw-arrow path", { stroke: "#000000" }, {  stroke: "#FFFFFF", duration: 1 }, 0)
      .fromTo("#bw-arrow", { yPercent: 0 }, { yPercent: 50, repeat: -1, yoyo: true, duration: .2 }, 0)
      .fromTo("#ourMission", { scale: .8, yPercent: 100, autoAlpha: 0 }, { scale: .8, y: 0, yPercent: 23, autoAlpha: 1,  duration: 1 }, 0)
      .fromTo("#bw-mouth", {
        drawSVG: "50% 50%" },{
        drawSVG: "100%", ease: "expo.inOut", duration: 1}, .5)

    let trigger_rebalanceYourWorkDayIn = { trigger: "#section_rebalance", start: "0% center", end: "100% center" };
    let tl_rebalanceYourWorkDayIn = gsap.timeline({ paused: true, scrollTrigger: trigger_rebalanceYourWorkDayIn })         
    .fromTo("#world", 
      { yPercent: 0, autoAlpha: 1 }, 
      { yPercent: -110, autoAlpha: 0, duration: .3 }, 0)
    .to("#ourMission", { yPercent: -100, autoAlpha: 0, duration: .3 }, 0)
    .fromTo("[id^='letter-']", 
      { y: 0, x: 0, rotationZ: function(){ return gsap.utils.random(-45, 45); }, xPercent: function(){ return gsap.utils.random(-33, 33); } }, 
      { y: 0, x: 0, rotationZ: 0, xPercent: 0, duration: 5, ease: "elastic.out(1.5,.1)" }, 0.1)
    .fromTo("#illu-logo", 
      { scale: .8, yPercent: 110, autoAlpha: 0 }, 
      { y: 0, yPercent: 0, autoAlpha: 1, duration: .5 }, 0)
    .fromTo("#illu-logo", 
      { rotationZ: -25, transformOrigin: "50% 70%" }, 
      { rotationZ: 0, duration: 5, ease: "elastic.out(2, .3)" }, 0);
  };
  
  if (document.querySelector('#breatheman')) {
    let breathemanbreathes = gsap.timeline( { paused: false, repeat: -1, repeatDelay: .3, yoyo: true } )
    .to("#breatheman-chest", { transformOrigin: "50% 100%", scale: 1.125, yPercent: -5, ease: "power2.inout", duration: 5 }, 0)
    .to("#breatheman-neck", { transformOrigin: "50% 100%", scaleX: 1.125, yPercent: -13, ease: "power2.inout", duration: 4.9 }, 0.1)   
    .to("#breatheman-head", { transformOrigin: "50% 100%", yPercent: -9, ease: "power2.inout", duration: 4.9 }, 0.3)  
    .to("#breatheman-brows", { transformOrigin: "50% 100%", yPercent: -66, scaleX: .9, ease: "power2.inout", duration: 4.7 }, 0.3)    
    .to("#breatheman-nose", { transformOrigin: "50% 50%", scaleX: 1.2, ease: "power2.inout", duration: 4.8 }, 0.2);    
  };

  if (document.querySelector('#energising-breaths')) {
    let energisingbreaths_tl = gsap.timeline({ paused: false, repeat: -1, yoyo: false })
      .fromTo("#breatheout", {autoAlpha: 0}, { autoAlpha: 1, duration: 0.01}, 1)
      .fromTo("#breathein", {autoAlpha: 1}, { autoAlpha: 0, duration: 0.01}, 1)
      .fromTo("#breatheout", {autoAlpha: 1}, { autoAlpha: 0, duration: 0.01}, 2.1)
      .fromTo("#breathein", {autoAlpha: 0}, { autoAlpha: 1, duration: 0.01}, 2.1)
  };

  if (document.querySelector('#eye-relaxation')) {
    let eyerelaxation_tl = gsap.timeline({ paused: false, repeat: -1, yoyo: false })
      .fromTo("#rub, #armhand", {autoAlpha: 0}, { autoAlpha: 1, duration: 0.1}, 2)
      .fromTo("#nice", {autoAlpha: 1}, { autoAlpha: 0, duration: 0.1}, 2)
      .fromTo("#rub, #armhand", {autoAlpha: 1}, { autoAlpha: 0, duration: 0.1}, 3.1)
      .fromTo("#nice", {autoAlpha: 0}, { autoAlpha: 1, duration: 0.1}, 3.1)
  };

  if (document.querySelector('#tiny-first-aid')) {
    let tl_woman_rain_raindrops = gsap.timeline()
      .set("#cloudrain", { yPercent: -5 })
      .fromTo("#illu01-raindrop01, #illu01-raindrop02, #illu01-raindrop04", 
        { yPercent: 0, scaleY: 1 }, 
        { yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3}, 0)
      .fromTo("#illu01-raindrop03, #illu01-raindrop05", 
        { yPercent: 0, scaleY: 1 },
        { yPercent: 550, scaleY: .5, repeat: -1, ease: "power3.inout", duration: .3 }, .15);
    let tinyfirstaid_tl = gsap.timeline({ paused: false, repeat: -1, yoyo: true })
      .set("#illu01-body, #illu01-head", {transformOrigin: "50% 100%"})
      .to("#illu01-body", { scale: 1.125, ease: "power3.inOut", duration: 3 }, 0)
      .to("#illu01-head", { yPercent: -9, ease: "power3.inOut", duration: 2.9 }, 0.3)  
    let rainawaysunup_tl = gsap.timeline({ paused: false})
      .to("#cloudrain", { yPercent: -200, autoAlpha: 0, ease: "power3.inOut" ,duration: 1 }, 5)
      .to("#illu01-sun", { yPercent: -120, xPercent: 100, ease: "power3.inOut", duration: 1 }, 5.25)
  };

  if (document.querySelector('#illu-focus')) {
    let tinyfocus_tl = gsap.timeline({ repeat: -1 })
      .set("#body, #head", { transformOrigin: "50% 100%" })
      .to("#body", { scale: 1.125, ease: "power2.Out", duration: 4 }, 0)
      .to("#head, #hands", { yPercent: -12, ease: "power2.Out", duration: 4 }, 0)
      .to("#arms", { yPercent: -20, ease: "power2.Out", duration: 4 }, 0)
      .to("#body", { scale: 1, ease: "power2.Out", duration: 4 }, 4)
      .to("#head, #hands", { yPercent: 0, ease: "power2.Out", duration: 4 }, 4)
      .to("#arms", { yPercent: 0, ease: "power2.Out", duration: 4 }, 4)
  };
  
  if (document.querySelector('#illu-neck-moves-side-to-side')) {
    let neckmove_tl = gsap.timeline({ repeat: -1 })
      .set("#body, #head", { transformOrigin: "50% 90%" })
      .set("#head", { rotationZ: -45 })
      .to("#body", { scale: 1.125, ease: "power2.Out", duration: 4 }, 0)
      .to("#head, #hands", { yPercent: -12, ease: "power2.Out", duration: 4 }, 0)
      .to("#arms", { yPercent: -20, ease: "power2.Out", duration: 4 }, 0)
      .to("#body", { scale: 1, ease: "power2.Out", duration: 4 }, 4)
      .to("#head, #hands", { yPercent: 0, ease: "power2.Out", duration: 4 }, 4)
      .to("#arms", { yPercent: 0, ease: "power2.Out", duration: 4 }, 4)
    let sidetoside_tl = gsap.timeline({ repeat: -1 })
      .to("#head", { rotationZ: 0, duration: 4 }, 0)
      .to("#head", { rotationZ: 45, duration: 4 }, 4)
      .to("#head", { rotationZ: 0, duration: 4 }, 8)
      .to("#head", { rotationZ: -45, duration: 4 }, 12)
  };

  if (document.querySelector( '#tiny-illu-calming-breaths' )) {
    let calmingbreaths_tl = gsap.timeline({ repeat: -1 })
    .set("#head, #rays", { transformOrigin: "50% 50%" })
    .set("#pursed", { autoAlpha: 0 })
    .to("#head, #rays", { scale: 1.5, duration: 4, ease: "power3.Out" }, 0)
    .to("#face", { yPercent: -15, duration: 4, ease: "power3.Out" }, 0)
    .to("#brows", { yPercent: -100, duration: 4, ease: "power3.Out" }, 0)
    .to("#nose", { yPercent: -25, scaleX: 1.1, duration: 4, ease: "power3.Out" }, 0)
    .to("#mouth", { yPercent: -50, duration: 4, ease: "power3.Out" }, 0)
    .to("#pursed", { autoAlpha: 1, duration: .25 }, 4)
    .to("#smile", { autoAlpha: 0, duration: .25 }, 4)
    .to("#head, #rays", { scale: 1, duration: 4, ease: "power3.Out" }, 5)
    .to("#face", { yPercent: 0, duration: 4, ease: "power3.Out" }, 5)
    .to("#brows", { yPercent: 0, duration: 4, ease: "power3.Out" }, 5)
    .to("#nose", { yPercent: 0, scaleX: 1, duration: 4, ease: "power3.Out" }, 5)
    .to("#mouth", { yPercent: 0, duration: 4, ease: "power3.Out" }, 5)
    .to("#pursed", { autoAlpha: 0, duration: .25 }, 8.75)
    .to("#smile", { autoAlpha: 1, duration: .25 }, 8.75)
    .to("#rays", { rotationZ: 360, duration: 9, ease: "linear" }, 0)
  };
  if (document.querySelector( "#neck-moves-up-and-down" )) {
    let neckupdown_tl = gsap.timeline({ repeat: -1 })
      .set("#head", { transformOrigin: "45% 90%" })
      .set("#body", { transformOrigin: "50% 100%" })
      .to("#head", { rotationZ: 45, xPercent: -5,  duration: 3 })
      .to("#head", { rotationZ: -35, xPercent: 0, yPercent: 3, duration: 3 })
      .to("#body", { scale: 1.075, xPercent: 3, duration: 3 }, 3)
      .to("#head", { rotationZ: 0, xPercent: 0, yPercent: 0, duration: 3 })
      .to("#body", { scale: 1, xPercent: 0, duration: 3 }, 6)
      .to("#body", { duration: 3 })
  }
  if( document.querySelector( "#neck-rotation" )) {
    let neckrotation_tl = gsap.timeline({ repeat: -1, yoyo: true })
      .set("[id^='head-']:not(#head-down)", { autoAlpha: 0 }, 0)
      //.set("#head-down", { autoAlpha: 1 }, 0)
      .set("#head-down", { autoAlpha: 0}, .5)
      .set("#head-down-right", { autoAlpha: 1}, .5)
      .set("#head-down-right", { autoAlpha: 0}, 1)
      .set("#head-up-right", { autoAlpha: 1}, 1)
      .set("#head-up-right", { autoAlpha: 0}, 1.5)
      .set("#head-up", { autoAlpha: 1}, 1.5)
      .set("#head-up", { autoAlpha: 0}, 2)
      .set("#head-up-left", { autoAlpha: 1}, 2)
      .set("#head-up-left", { autoAlpha: 0}, 2.5)
      .set("#head-down-left", { autoAlpha: 1}, 2.5)
      .set("#head-down-left", { autoAlpha: 0}, 3)
      .set("#head-down", { autoAlpha: 1}, 3)
      .set("#head-down", { autoAlpha: 1}, 3.5);
      neckrotation_tl.timeScale(1.5);
  }
  if( document.querySelector( "#wrist-moves-flexions" )) {
    let wristflexions_tl = gsap.timeline({ repeat: -1, yoyo: true })
      .to("#hand", { duration: 1}, 0)
      .to("#hand", { transformOrigin: "45% 5%", yPercent: 5, xPercent: -4, rotationZ: 85, duration: 1 }, 1)
      .to("#fingers", { transformOrigin: "20% 10%", rotationZ: 45, duration: .75 }, 1.25)
      .to("#hand", { duration: 1})
  }  
} 
