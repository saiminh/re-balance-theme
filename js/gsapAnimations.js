// ----------------------------------------------------------
// Benefits page animations
// ----------------------------------------------------------

function gsAnimations(){
  ScrollTrigger.getAll().forEach(element => element.kill());

  if (document.querySelector(".rebalance-mini-illustration svg")) {
    gsap.to(".rebalance-mini-illustration svg", { autoAlpha: 1, duration: 1 })
  }

  if (document.querySelector('#illu-woman-rain-shine')) {						
    // -------------------------
    // Animations for Home Page
    // -------------------------
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(DrawSVGPlugin);
    gsap.registerPlugin(MorphSVGPlugin);
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
    gsap.set(".rebalance-mini-illustration #breatheman > *", { autoAlpha: 1 });
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
    gsap.to("#rub, #armhand, #neck, #head, #body", { autoAlpha: 1, duration: 1 });
    gsap.to("#rub", { xPercent: 3, yPercent: -3, repeat: -1, duration: .1, yoyo: true});
    gsap.to("#armhand", { xPercent: -3, yPercent: 3, repeat: -1, duration: .1, yoyo: true});
    let eyerelaxation_tl = gsap.timeline({ paused: false, repeat: -1, yoyo: false })
      .to("#rub, #armhand", {autoAlpha: 0, duration: 0.1}, 2)      
      .to("#nice", { autoAlpha: 1, duration: 0.1}, 2)
      .to("#rub, #armhand", { autoAlpha: 1, duration: 0.1}, 3.1)
      .to("#nice", { autoAlpha: 0, duration: 0.1}, 3.1)
  };

  if (document.querySelector('#tiny-first-aid')) {
    gsap.set(".rebalance-mini-illustration #tiny-first-aid > *", { autoAlpha: 1 });
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
    gsap.set(".rebalance-mini-illustration #illu-focus > *", { autoAlpha: 1 });
    gsap.set("#n2, #n3, #n4, #n5, #n6, #exhale", { autoAlpha: 0 });
    gsap.set("#inhale, #exhale", { transformOrigin: "50% 100%" });
    let tinyfocus_tl = gsap.timeline({ repeat: -1 })
      .addLabel("inhale", 0)
      .fromTo("#inhale", {autoAlpha: 0, yPercent: 50}, { autoAlpha: 1, yPercent: 0 }, "exhale")
      .set("#body, #head", { transformOrigin: "50% 100%" }, "inhale")
      .to("#body", { scale: 1.125, ease: "power2.Out", duration: 4 }, "inhale")
      .to("#head, #hands", { yPercent: -12, ease: "power2.Out", duration: 4 }, "inhale")
      .to("#arms", { yPercent: -20, ease: "power2.Out", duration: 4 }, "inhale")
      .fromTo("#n1", { autoAlpha: 0, yPercent: 40  }, { autoAlpha: 1, yPercent: 0  }, "inhale")
      .to("#n1", { autoAlpha: 0 }, "inhale+=1")
      .fromTo("#n2", { autoAlpha: 0, yPercent: 40  }, { autoAlpha: 1, yPercent: 0 }, "inhale+=1")
      .to("#n2", { autoAlpha: 0  }, "inhale+=2")
      .fromTo("#n3", { autoAlpha: 0, yPercent: 40  }, { autoAlpha: 1, yPercent: 0 }, "inhale+=2")
      .to("#n3", { autoAlpha: 0 }, "inhale+=3")
      .fromTo("#n4", { autoAlpha: 0, yPercent: 40  }, { autoAlpha: 1, yPercent: 0 }, "inhale+=3")
      .to("#n4", { autoAlpha: 0 }, "inhale+=4")
      .addLabel("exhale", 4.5)
      .to("#inhale", { autoAlpha: 0, yPercent: 50 }, "exhale")
      .fromTo("#exhale", {autoAlpha: 0, yPercent: -50 }, { autoAlpha: 1, yPercent: 0 }, "exhale")
      .to("#body", { scale: 1, ease: "power2.Out", duration: 6 }, "exhale" )
      .to("#head, #hands", { yPercent: 0, ease: "power2.Out", duration: 6 }, "exhale" )
      .to("#arms", { yPercent: 0, ease: "power2.Out", duration: 6 }, "exhale" )
      .fromTo("#n1", { autoAlpha: 0, yPercent: -40  }, { autoAlpha: 1, yPercent: 0 }, "exhale")
      .to("#n1", { autoAlpha: 0}, "exhale+=1")
      .fromTo("#n2", { autoAlpha: 0, yPercent: -40  }, { autoAlpha: 1, yPercent: 0 }, "exhale+=1")
      .to("#n2", { autoAlpha: 0 }, "exhale+=2")
      .fromTo("#n3", { autoAlpha: 0, yPercent: -40  }, { autoAlpha: 1, yPercent: 0 }, "exhale+=2")
      .to("#n3", { autoAlpha: 0 }, "exhale+=3")
      .fromTo("#n4", { autoAlpha: 0, yPercent: -40  }, { autoAlpha: 1, yPercent: 0 }, "exhale+=3")
      .to("#n4", { autoAlpha: 0 }, "exhale+=4")
      .fromTo("#n5", { autoAlpha: 0, yPercent: -40  }, { autoAlpha: 1, yPercent: 0 }, "exhale+=4")
      .to("#n5", { autoAlpha: 0 }, "exhale+=5")
      .fromTo("#n6", { autoAlpha: 0, yPercent: -40  }, { autoAlpha: 1, yPercent: 0 }, "exhale+=5")
      .to("#n6", { autoAlpha: 0 }, "exhale+=6")
      .to("#exhale", { autoAlpha: 0, yPercent: -40 }, "exhale+=6")
  };
  
  if (document.querySelector('#illu-neck-moves-side-to-side')) {
    gsap.set(".rebalance-mini-illustration #illu-neck-moves-side-to-side > *", { autoAlpha: 1 });
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
    gsap.set(".rebalance-mini-illustration #tiny-illu-calming-breaths > *", { autoAlpha: 1 });
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
    gsap.set(".rebalance-mini-illustration #neck-moves-up-and-down > *", { autoAlpha: 1 });
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
    gsap.set(".rebalance-mini-illustration #neck-rotation > *", { autoAlpha: 1 });
    let neckrotation_tl = gsap.timeline({ repeat: -1, yoyo: true })
      .set("[id^='head-']:not(#head-down)", { autoAlpha: 0 }, 0)
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
      neckrotation_tl.timeScale(.5);
  }
  if( document.querySelector( "#wrist-moves-rotations" )) {
    gsap.to("#fist-1", { autoAlpha: 1, onComplete: () => {tl.play()} });
    let tl = gsap.timeline({ paused: true, repeat: -1, yoyo: true, repeatDelay: 1, defaults: { duration: .2 } })
      .to("#fist-1", { autoAlpha: 0 }, .5)
      .to("#fist-2", { autoAlpha: 1 }, .5)
      .to("#fist-2", { autoAlpha: 0 }, 1)
      .to("#fist-4", { autoAlpha: 1 }, 1)
      .to("#fist-4", { autoAlpha: 0 }, 1.5)
      .to("#fist-3", { autoAlpha: 1 }, 1.5)
      .to("#fist-3", { autoAlpha: 0 }, 2)
      .to("#fist-1", { autoAlpha: 1 }, 2)
          
  }
  if( document.querySelector( "#emergency-breath" )) {
    gsap.set("#emergency-breath > *", { autoAlpha: 0});
    let t_count = 1,
        t_fade  = 1,
        numbers = Array.from( document.querySelectorAll( "#one, #two, #three, #four" ) ),
        numbersin = {autoAlpha: 1, yPercent: 0, duration: t_fade },
        numbersout = {autoAlpha: 0, yPercent: 10, duration: t_fade/2 };
    gsap.set(numbers, { yPercent: 10 })      
    gsap.to("#ready", {autoAlpha: 1, duration: 1 });
    let countdown_tl = gsap.timeline({ paused: true })
      .to(numbers[3], numbersin )
      .to(numbers[3], numbersout, t_count )
      .to(numbers[2], numbersin, t_count )
      .to(numbers[2], numbersout, (t_count * 2) )
      .to(numbers[1], numbersin, (t_count * 2) )
      .to(numbers[1], numbersout, (t_count * 3) )
      .to(numbers[0], numbersin, (t_count * 3) )
      .to(numbers[0], numbersout, (t_count * 4) );
    let textin = { autoAlpha: 1, onComplete: () => countdown_tl.play(0), duration: .5 },
        textout = { autoAlpha: 0, duration: .5 };
    let emergenzyBreath_tl = gsap.timeline({ paused: true })
      .to("#ready, #again", textout )
      .to("#inhale", textin )
      .fromTo("#inhale", { scale: .4, transformOrigin: "50% 50%" }, { scale: 1, duration: ( t_count * 4 ) }, 0)
      .to("#inhale", textout, (t_count * 4 + t_fade))
      .to("#hold", textin, (t_count * 4 + t_fade))
      .to("#hold", textout, (t_count * 8 + t_fade))
      .to("#exhale", textin, (t_count * 8 + t_fade))
      .fromTo("#exhale", { scale: 1 }, { scale: .4, transformOrigin: "50% 50%", duration: ( t_count * 4 ) }, (t_count * 8 + t_fade))
      .to("#exhale", textout, (t_count * 12 + t_fade))
      .to("#hold", textin, (t_count * 12 + t_fade))
      .to("#hold", textout, (t_count * 16 + t_fade))
      .to("#again", {  autoAlpha: 1, duration: .5} );
    document.querySelector("#ready").addEventListener("click", () => emergenzyBreath_tl.play(0) );
    document.querySelector("#again").addEventListener("click", () => emergenzyBreath_tl.play(0) );
  }
  if( document.querySelector( "#concentrating-breaths" )) {
    let tl = gsap.timeline({ repeat: -1 })
      .addLabel("scenetwo", 3)
      .addLabel("thumbin", 5)
      .addLabel("pinkout", 7)
      .addLabel("pinkin", 9)
      .addLabel("thumbout", 11)
      .to("#woman-head-side", { autoAlpha: 1 })
      .from("#woman-side-arm", { transformOrigin: "90% 90%", autoAlpha: 0, rotationZ: 35, duration: 2 })
      // Blend over to scenetwo
      .to("#woman-head-side", { autoAlpha: 0, duration: 2 }, "scenetwo" )
      .set("#nose-closeup > * ", {autoAlpha: 0}, "scenetwo")
      .set("#nose-closeup", { autoAlpha: 1 }, "scenetwo" )
      .to("#nose, #thumb, #bg-face", { autoAlpha: 1, duration: 2 }, "scenetwo" )
      //Thumbin
      .from("#thumb", { transformOrigin: "40% 85%", rotationZ: -10 }, "thumbin" )
      .fromTo("#right-in", 
        { autoAlpha: 0,  xPercent: 50, yPercent: 50 }, 
        { autoAlpha: 1, xPercent: 0, yPercent: 0 }, "thumbin" )
      //Pinkout
      .to("#thumb", { transformOrigin: "40% 85%", rotationZ: -10, autoAlpha: 0 }, "pinkout")
      .to("#right-in", { autoAlpha: 0 }, "pinkout" )
      .fromTo("#pinkie", 
        { transformOrigin: "70% 90%", rotationZ: 10 }, 
        { rotationZ: 0, autoAlpha: 1 }, "pinkout" )
      .fromTo("#left-out", 
        { autoAlpha: 0,  xPercent: 50, yPercent: -50 }, 
        { autoAlpha: 1, xPercent: 0, yPercent: 0 }, "pinkout" + .5 )
      //PinkIn
      .to("#left-out", { autoAlpha: 0 }, "pinkin")
      .fromTo("#left-in", 
      { autoAlpha: 0,  xPercent: -50, yPercent: 50 }, 
      { autoAlpha: 1, xPercent: 0, yPercent: 0 }, "pinkin" )
      //ThumbOut
      .to("#pinkie", { transformOrigin: "70% 90%", rotationZ: 10, autoAlpha: 0 }, "thumbout")
      .to("#thumb", { transformOrigin: "40% 85%", rotationZ: 0, autoAlpha: 1 }, "thumbout")
      .to("#left-in", { autoAlpha: 0 }, "thumbout")
      .fromTo("#right-out", 
      { autoAlpha: 0,  xPercent: -50, yPercent: -50 }, 
      { autoAlpha: 1, xPercent: 0, yPercent: 0 }, "thumbout" + .5 )
      .to("nose", {duration: 2})
  }
  if (document.querySelector("#gaze-change") ){
    gsap.to("#eye, #nothing-to-see, #arrow", {autoAlpha: 1});
    gsap.to("#nothing-to-see", {yPercent: 10});
    gsap.fromTo("#arrow", 
      { scale: 0, rotationZ: 20, transformOrigin: "100% 100%"}, 
      { scale: 1, rotationZ: 0, delay: .5, ease: "circ.inOut"});
    gsap.fromTo("#look-elsewhere", { autoAlpha: 0, yPercent: -50 }, { autoAlpha: 1, yPercent: 30, delay: .5 })
  }
  if (document.querySelector("#eye-movements") ){
    gsap.to("#eye-movements > *", { autoAlpha: 1 });
   let tl = gsap.timeline({ repeat: -1 })
    .set("#retina", {transformOrigin: "50% 50%"})
    .to("#retina", { scaleY: .8, yPercent: -60, ease: "power4.out", duration: 1.5 }, 2)
    .to("#eye-movements", { scale: 1.25, yPercent: -10, duration: 3 }, 2)
    .to("#retina", { scaleY: 1, yPercent: 0, xPercent: 70, ease: "power4.out", duration: 1.5 }, 5)
    .to("#eye-movements", { scale: 1, yPercent: 0, duration: 3 }, 5)
    .to("#retina", { scaleY: .8, yPercent: 60, xPercent: 0, ease: "power4.out", duration: 1.5 }, 8)
    .to("#eye-movements", { scale: 1.25, yPercent: -10, duration: 3 }, 8)
    .to("#retina", { scaleY: 1, yPercent: 0, xPercent: -70, ease: "power4.out", duration: 1.5 }, 11)
    .to("#eye-movements", { scale: 1, yPercent: 0, duration: 3 }, 11)
    .to("#retina", { scaleY: 1, yPercent: 0, xPercent: 0, ease: "power4.out", duration: 1.5 }, 14)
  }
  if (document.querySelector('#blinking-practice')) {
    gsap.set("#blinking-practice > *", { autoAlpha: 1 });
    gsap.set("#eyes-closed", { autoAlpha: 0 });
    let tl_eyes = gsap.timeline ( { repeat: -1, repeatDelay: .3 })
      .to("#eyes-closed", { autoAlpha: 1, duration: .2 }, 5)
      .to("#eyes-open", { autoAlpha: 0, duration: .2 }, 5)
      .to("#eyes-closed", { autoAlpha: 0, duration: .2 }, 10.5)
      .to("#eyes-open", { autoAlpha:  1, duration: .2 }, 10.5)
    let tl = gsap.timeline( { paused: false, repeat: -1, repeatDelay: .3, yoyo: true } )
    .to("#woman-chest", { transformOrigin: "50% 100%", scale: 1.125, yPercent: -5, ease: "power2.inout", duration: 5 }, 0)
    .to("#woman-neck", { transformOrigin: "50% 100%", scaleX: 1.125, yPercent: -13, ease: "power2.inout", duration: 4.9 }, 0.1)   
    .to("#woman-head, #woman-hair-back", { transformOrigin: "50% 100%", yPercent: -9, ease: "power2.inout", duration: 4.9 }, 0.3)  
    .to("#woman-brows", { transformOrigin: "50% 100%", yPercent: -66, scaleX: .9, ease: "power2.inout", duration: 4.7 }, 0.3)    
    .to("#woman-nose", { transformOrigin: "50% 50%", scaleX: 1.2, ease: "power2.inout", duration: 4.8 }, 0.2);    
  }
  if (document.querySelector('#shoulder-stretch')) {
    gsap.to("#shoulder-stretch > *:not(#forearm-left)", {autoAlpha: 1})
    let tl = gsap.timeline({ 
      repeat: -1, yoyo :true, repeatDelay: 3, defaults: {
        duration: 2,
        ease: "power4.inOut"
      } })
      .from("#arm-right", { transformOrigin: "5% 90%", rotationZ: 90 }, 0)
      .from("#forearm-right", { transformOrigin: "50% 90%", rotationZ: 45 }, .1)
      .from("#upperarm-left", { transformOrigin: "10% 33%", rotationZ: 45 }, .4)
      .fromTo("#forearm-left", 
        { transformOrigin: "50% 90%", autoAlpha: 0, xPercent: -80, yPercent: 33, rotationZ: 90 }, 
        { autoAlpha: 1, xPercent: 0, yPercent: 0, rotationZ: 0 }, .5)
  }
  if (document.querySelector('#shoulder-shrugs')) {
    gsap.to("#shoulder-shrugs > *:not(#breatheman-chest-shrugged)", {autoAlpha: 1})
    let tl = gsap.timeline({ repeat: -1, yoyo: true, repeatDelay: 1 })
      .addLabel("a")
      .to("#breathman-chest", { morphSVG: "#breatheman-chest-shrugged", duration: 2, ease: "circ.inOut" }, "a" )
      .to("#breatheman-neck", { yPercent: -15, duration: 2, ease: "circ.inOut" }, "a" )
      .to("#breatheman-head", { yPercent: 5, duration: 2, ease: "circ.inOut" }, "a" )
  }
  if (document.querySelector('#wrist-flexions')) {    
    gsap.set("#hand", { transformOrigin: "48% 18%" })
    gsap.set("#finger", { transformOrigin: "55% 10%" });
    let tl = gsap.timeline({ repeat: -1, repeatDelay: 2, defaults: {
      duration: 1
    } })
      .set("#wrist-flexions > *", { autoAlpha: 1 })
      .to("#hand", { rotationZ: -70, xPercent: 4, yPercent: -4 })
      .to("#finger", { rotationZ: -40 }, .2 )
      .to("#hand", { rotationZ: 80, xPercent: -10, yPercent: -4 }, 3)
      .to("#finger", { rotationZ: 40 }, 3.2 )
      .to("#hand", { rotationZ: 0, xPercent: 0, yPercent: 0 }, 6)
      .to("#finger", { rotationZ: 0 }, 6.2 )
  }
  if (document.querySelector('#fingers-palm-stretch')) {
    gsap.set("#arm-right", { transformOrigin: "5% 25%",  rotationZ: 45  }, 0)
    gsap.set("#hand-right", {  transformOrigin: "25% 90%",  rotationZ: 40  }, 0)
    gsap.set("#arm-left, #shadow-arm-left", { transformOrigin: "5% 50%",  rotationZ: 55  }, 0)
    gsap.set("#hand-left, #shadow-hand-left", { transformOrigin: "25% 17%", rotationZ: -70  }, 0)
    gsap.to("#fingers-palm-stretch > *", { autoAlpha: 1, onComplete: () => { tl.play() } });
    let tl = gsap.timeline({ paused: true, repeat: -1, yoyo: false, defaults: {
      duration: 1, ease: "power3.inOut"
    } })      
      .to("#arm-right", { 
        rotationZ: 0  }, 1)
      .to("#hand-right", { 
        rotationZ: 0  }, 1)      
      .to("#arm-left, #shadow-arm-left", { 
        rotationZ: -35  }, 1)
      .to("#hand-left, #shadow-hand-left", { 
        rotationZ: -45  }, 1)
      .to("#arm-left, #shadow-arm-left", { 
        rotationZ: 0  }, 2)
      .to("#hand-left, #shadow-hand-left", { 
        rotationZ: 0  }, 2)
      .to("#hand-left, #shadow-hand-left", { 
        rotationZ: 10  }, 3)
      .to("#hand-right", { 
        rotationZ: -10  }, 3)      
      .to("#arm-right", { rotationZ: 45  }, 6)
      .to("#hand-right", { rotationZ: 40  }, 6)
      .to("#arm-left, #shadow-arm-left", { rotationZ: 55  }, 6)
      .to("#hand-left, #shadow-hand-left", { rotationZ: -70  }, 6)
      .to("#hand-left",{ duration: 2 }, 3)  
  }
  if (document.querySelector("#seated-twists")) {
    gsap.to("#frontal, #chair", { autoAlpha: 1, onComplete: () => { tl.play() } })
    let tl = gsap.timeline({ paused: true, repeat: -1 })
     .set("#frontal", { autoAlpha: 0 }, 1)
     .set("#left", { autoAlpha: 1 }, 1)
     .set("#left", { autoAlpha: 0 }, 3)
     .set("#frontal", { autoAlpha: 1 }, 3)
     .set("#frontal", { autoAlpha: 0 }, 5)
     .set("#right", { autoAlpha: 1 }, 5)
     .set("#right", { autoAlpha: 0 }, 7)
     .set("#frontal", { autoAlpha: 1 }, 7)
  }
  if(document.querySelector("#gratefulness")) {
    gsap.set("#rays line", {drawSVG: "0% 100%"})
    gsap.to("#rays", {transformOrigin: "50% 50%", rotationZ: 45, duration: 5, ease: "linear", repeat: -1 }, 0)
    gsap.to("#gratefulness > *", { autoAlpha: 1, onComplete: () => { tl.play() } })
    let tl = gsap.timeline({ paused: true, repeat: -1, repeatDelay: .1 })
      .fromTo("#rays line", {
        drawSVG: "0% 100%"
      },{
        drawSVG: "100% 100%", duration: .5, ease: "circ.out"
      }, 0)
      .fromTo("#rays line", {
        drawSVG: "0% 0%"
      }, {
        drawSVG: "0% 100%", duration: .75, ease: "circ.out"
      }, .75)
  }
  if(document.querySelector("#happiness")) {
    gsap.set("#dimple-left", { autoAlpha: 1, xPercent: 110, yPercent: 100, drawSVG: "50% 50%" });
    gsap.set("#dimple-right", { autoAlpha: 1, xPercent: -110, yPercent: 80, drawSVG: "50% 50%" });
    gsap.to("#straight", { autoAlpha: 1, onComplete: () => { tl.play() } });
    let tl = gsap.timeline({ paused: true, repeat: -1, repeatDelay: 1 })
     .to("#straight", { morphSVG: "#smile", ease: "circ.out", duration: 2 } )
     .to("#dimple-left, #dimple-right", { drawSVG: "0% 100%", ease: "circ.out", duration: 2 }, 0)
     .to("#dimple-left", { xPercent: 0, yPercent: 0, ease: "circ.out", duration: 2 }, 0)
     .to("#dimple-right", { xPercent: 0, yPercent: 0, ease: "circ.out", duration: 2 }, 0)
     .to("#straight", { morphSVG: "#straight" }, 3 )
     .to("#dimple-left, #dimple-right", { drawSVG: "50% 50%" }, 3 )
     .to("#dimple-left", { xPercent: 110, yPercent: 100 }, 3 )
     .to("#dimple-right", { xPercent: -110, yPercent: 80 }, 3 )
  }
  if (document.querySelector("#beauty")) {
    gsap.set("#beauty > *", { transformOrigin: "50% 50%", scale: 0 })
    gsap.to("#beauty > *", {autoAlpha: 1, onComplete: () => { tl.play() }});
    let tl = gsap.timeline({ paused: true, repeat: -1  })
      .to("#beauty > *", 
        { scale: 1, stagger: { amount: 1, from: "start" }, duration: 3, ease: "power4.out" })
      .to("#beauty > *", 
        { scale: 0, rotationZ: "+=180", stagger: { amount: 2, from: "end" }, duration: 3, ease: "power2.in" })
  }
  if (document.querySelector("#tiny-seated-side-bends")) {
    gsap.set("#up > *, #middle > *", { autoAlpha: 0})
    gsap.set("#tiny-seated-side-bends > *", { autoAlpha: 1})
    let tl = gsap.timeline({ repeat: -1, yoyo: false, defaults: {
      ease: "power2.inOut", duration: 3, transformOrigin: "50% 95%"
    }})
      .to("#front-hand-l", { morphSVG: "#mid-hand-l", duration: .25, ease: "none" }, 1)
      .to("#front-hand-r", { morphSVG: "#mid-hand-r", duration: .25, ease: "none" }, 1)
      .to("#front-arm-l", { morphSVG: "#mid-arm-l", duration: .25, ease: "none" }, 1)
      .to("#front-arm-r", { morphSVG: "#mid-arm-r", duration: .25, ease: "none" }, 1)
      .addLabel("palmstretch")
      .to("#front-hand-l", { morphSVG: "#up-hand-l", ease: "power3.out", duration: 1 }, "palmstretch")
      .to("#front-hand-r", { morphSVG: "#up-hand-r", ease: "power3.out", duration: 1 }, "palmstretch")
      .to("#front-arm-l", { morphSVG: "#up-arm-l", ease: "power3.out", duration: 1 }, "palmstretch")
      .to("#front-arm-r", { morphSVG: "#up-arm-r", ease: "power3.out", duration: 1 }, "palmstretch")
      .addLabel("lean-l")
      .to("#whole", { rotationZ: -13 }, "lean-l")
      .to("#head-neck", { rotationZ: -21 }, "lean-l")
      .to("#head", { rotationZ: -11 }, "lean-l")
      .to("#front-armhand-l", { rotationZ: -16 }, "lean-l")
      .to("#front-armhand-r", { rotationZ: -15 }, "lean-l")   
      .to("#front-hand-r", { yPercent: -15 }, "lean-l")   
      .addLabel("lean-m-1")
      .to("#whole", { rotationZ: 0 }, "lean-m-1")
      .to("#head-neck", { rotationZ: 0 }, "lean-m-1")
      .to("#head", { rotationZ: 0 }, "lean-m-1")
      .to("#front-armhand-l", { rotationZ: 0 }, "lean-m-1")
      .to("#front-armhand-r", { rotationZ: 0 }, "lean-m-1")   
      .to("#front-hand-r", { yPercent: 0 }, "lean-m-1")   
      .addLabel("lean-r")
      .to("#whole", { rotationZ: 13 }, "lean-r")
      .to("#head-neck", { rotationZ: 21 }, "lean-r")
      .to("#head", { rotationZ: 11 }, "lean-r")
      .to("#front-armhand-l", { rotationZ: 16 }, "lean-r")
      .to("#front-armhand-r", { rotationZ: 12 }, "lean-r")      
      .to("#front-hand-l", { yPercent: -15 }, "lean-r")   
      .addLabel("lean-m-2")
      .to("#whole", { rotationZ: 0 }, "lean-m-2")
      .to("#head-neck", { rotationZ: 0 }, "lean-m-2")
      .to("#head", { rotationZ: 0 }, "lean-m-2")
      .to("#front-armhand-l", { rotationZ: 0 }, "lean-m-2")
      .to("#front-armhand-r", { rotationZ: 0 }, "lean-m-2")   
      .to("#front-hand-l", { yPercent: 0 }, "lean-m-2")   
      .addLabel("backtostart")
      .to("#front-hand-l", { morphSVG: "#front-hand-l", duration: .25, ease: "none" }, "backtostart")
      .to("#front-hand-r", { morphSVG: "#front-hand-r", duration: .25, ease: "none" }, "backtostart")
      .to("#front-arm-l", { morphSVG: "#front-arm-l", duration: .25, ease: "none" }, "backtostart")
      .to("#front-arm-r", { morphSVG: "#front-arm-r", duration: .25, ease: "none" }, "backtostart")
  }
  if (document.getElementById('illu-seated-cat-cows')){
    gsap.set("#torso-arched, #torso-stretched", { autoAlpha: 0 })
    gsap.set("#illu-seated-cat-cows > *", { autoAlpha: 1 })
    let tl = gsap.timeline({ repeat: -1, yoyo: false, defaults: {
      duration: 2, ease: "power3.out"
    } })
      .addLabel("to-cow")
      .to("#head-neck", { transformOrigin: "40% 90%", rotationZ: -50, xPercent: -10}, "to-cow")
      .to("#body", { transformOrigin: "18% 90%", rotationZ: 20, xPercent: -2, yPercent: 1 }, "to-cow")
      .to("#torso-straight", { morphSVG: "#torso-stretched" }, "to-cow")
      .to("#arm", { transformOrigin: "15% 15%",rotationZ: 10, xPercent: -2 }, "to-cow")
      .to("#forearm-hand", { transformOrigin: "10% 10%",rotationZ: -40 }, "to-cow")
      .to("#hand", { transformOrigin: "10% 10%",rotationZ: 15, xPercent: -5, yPercent: -5 }, "to-cow")
      .addLabel("to-cat")
      .to("#head-neck", { rotationZ: 66, xPercent: 50, yPercent: 15}, "to-cat")
      .to("#body", { rotationZ: -20, xPercent: 0, yPercent: 0 }, "to-cat")
      .to("#torso-straight", { morphSVG: "#torso-arched" }, "to-cat")
      .to("#arm", { rotationZ: 23, xPercent: 25, yPercent: 5 }, "to-cat")
      .to("#forearm-hand", { rotationZ: -10 }, "to-cat")
      .to("#hand", { rotationZ: 15, xPercent: -5, yPercent: -5 }, "to-cat")
      .addLabel("back")
      .to("#head-neck", { rotationZ: 0, xPercent: 0, yPercent: 0}, "back")
      .to("#body", { rotationZ: 0, xPercent: 0, yPercent: 0 }, "back")
      .to("#torso-straight", { morphSVG: "#torso-straight" }, "back")
      .to("#arm", { rotationZ: 0, xPercent: 0, yPercent: 0 }, "back")
      .to("#forearm-hand", { rotationZ: 0 }, "back")
      .to("#hand", { rotationZ: 0, xPercent: 0, yPercent: 0 }, "back")
  }
  if(document.getElementById('tiny-seated-figure-four')){
    gsap.set("#tiny-seated-figure-four > *", { autoAlpha: 1 })
    gsap.set("#arm, #arm-lower, #hand", { transformOrigin: "8% 50%" })
    gsap.set("#torso", { transformOrigin: "10% 90%" })
    gsap.set("#head-neck", { transformOrigin: "30% 90%" })
    let tl = gsap.timeline({ repeat: -1, repeatDelay: 1, yoyo: true, defaults: {
      duration: 2, ease: "power3.Out"
    }})
      .addLabel("raisearm")
      .fromTo("#arm", { rotationZ: 90 }, { rotationZ:20, duration: .5, ease: "none" }, "raisearm")
      .fromTo("#arm-lower", { rotationZ:-60 }, { rotationZ: -20, duration: .5, ease: "none" }, "raisearm")
      .fromTo("#hand", { rotationZ:-40 }, { rotationZ: -20, duration: .5, ease: "none"} , "raisearm")
      .addLabel("lean-fwd", .5)
      .to("#torso", { rotationZ: 45 }, "lean-fwd")
      .to("#head-neck", { rotationZ: -45 }, "lean-fwd")
      .to("#arm", { rotationZ: -45 }, "lean-fwd")
      .to("#arm-lower", { rotationZ: 0 }, "lean-fwd")
      .to("#hand", { rotationZ: 0 }, "lean-fwd")
  }
  if(document.getElementById('illu-tiny-squats')){
    gsap.set("#illu-tiny-squats > *", { autoAlpha: 1 })
    gsap.set("#body-upper", { transformOrigin: "41% 94.5%", rotationZ: -80  })
    gsap.set("#hip-torso", { transformOrigin: "44% 80.5%", rotationZ: 80 })
    gsap.set("#arm", { transformOrigin: "44% 10.6%" })
    gsap.set("#arm, #arm-lower", { transformOrigin: "44% 10.6%" })
    gsap.set("#hand", { transformOrigin: "55% 10.6%" })
    gsap.set("#head-neck", { transformOrigin: "40% 86%" })
    gsap.set("#dude", { transformOrigin: "100% 100%" })
    gsap.set("#foot", { transformOrigin: "23% 10%" })
    let tl = gsap.timeline({ repeat: -1, repeatDelay: 1, yoyo: true, defaults:{
      duration: 1.5, ease: "power2.inOut"
    } })
      .addLabel("setup")
      .addLabel("stand", 1)
      .to("#body-upper", { rotationZ: 0 }, "stand")
      .to("#hip-torso", { rotationZ: 0, duration: 1.1 }, "stand+=0.4")
      .to("#arm, #arm-lower, #head-neck, #hand", { rotationZ: -20, duration: .75 }, "stand")
      .to("#arm, #arm-lower, #head-neck, #hand", { rotationZ: 0, ease: "elastic.inout" }, "stand+=0.75")
  }
} 
