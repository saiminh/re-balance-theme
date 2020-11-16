// ----------------------------------------------------------
// Benefits page animations
// ----------------------------------------------------------

function gsAnimations(){
  ScrollTrigger.getAll().forEach(element => element.kill());

  // Create timelines for benefits page to use in init
  if (document.querySelector('#illu-woman-rain-shine')) {						
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
      .set("#illu-mindfulbreak, #illu-workdays, #illu-moneyloss, #cloudrain, #clock, #illu01-lightning-left, #illu01-lightning-right", 
        { autoAlpha: 0 })
      .set("#woman-on-desk", 
        { autoAlpha: 1, scale: 1 })
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
      .fromTo("#clock", 
        { autoAlpha: 1, scale: 1, xPercent: 0 }, 
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
      .fromTo("#cloudrain", 
        { xPercent: 0, yPercent: 0, autoAlpha: 1 }, 
        { xPercent: 0, yPercent: -400, autoAlpha: 0, duration: .5 }, 1)
      .fromTo("#illu01-lightning-left", 
        { x: 0, y: 0, autoAlpha: 1 }, 
        { x: -200, y: 0, autoAlpha: 0, duration: .3 }, 1)
      .fromTo("#illu01-lightning-right", 
        { x: 0, y: 0, autoAlpha: 1 }, 
        { x: 200, y: 0, autoAlpha: 0, duration: .3 }, 1)
      .fromTo("#illu01-smile", 
        { scaleY: -1, transformOrigin: "50% 50%" }, 
        { scaleY: 1, duration: .5 }, 1);

    let triggerrebalanceYourselfIn = { trigger: "#section_rebalanceYourself", start: "0% center", end: "100% center" };
    let rebalanceYourselfIn = gsap.timeline({ paused: true, scrollTrigger: triggerrebalanceYourselfIn })     
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
  } 
  else if (document.querySelector('#world')) { 
    
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(DrawSVGPlugin);
    
    //gsap.defaults({ overwrite: "true" });

    ScrollTrigger.defaults({
      toggleActions: "restart complete restart reset",
    });
    
    gsap.fromTo(".bg-galaxy", { yPercent: -10 }, { yPercent: -20, ease: "none", scrollTrigger: {trigger: "#section_ourMission", start: "0% 70px", end: "100% top", scrub: true} })

    gsap.fromTo(".bg-galaxy", { yPercent: 0 }, { yPercent: -10, ease: "none", scrollTrigger: {trigger: "#section_unbalancedWorld", start: "0% 70px", end: "100% top", scrub: true} }) 

    let trigger_unbalancedWorldIn = { trigger: "#section_unbalancedWorld", start: "0% center", end: "100% center ", onEnter: ()=>{ section_unbalancedWorldeyeloop.pause(); console.log('trigger_unbalancedWorldIn'); }};

    let section_unbalancedWorldeyeloop = gsap.timeline({ paused: true, repeat: -1 })
      .fromTo("#eyes", { xPercent: -2, yPercent: -40 }, { xPercent: -2, yPercent: -40, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -20, yPercent: 60, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -20, yPercent: -20, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -2, yPercent: 60, duration: 1, ease: "power4.out" })
      .to("#eyes", { xPercent: -2, yPercent: -40, duration: 1, ease: "power4.out" })
      .fromTo("#eyelids", { yPercent: 0 }, { yPercent: -30, duration: 5 }, 0)
      .to("#eyelids", { yPercent: 0, duration: 3 }, 5);

    let section_unbalancedWorld = gsap.timeline({ paused: true, scrollTrigger: trigger_unbalancedWorldIn }).timeScale(2)
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
      .to("#eyelids", { yPercent: 0, duration: 1, onComplete: ()=>{ section_unbalancedWorldeyeloop.play(0) } }, 7.2);

    let section_ourMissioneyeloop = gsap.timeline({ paused: true, repeat: -1 })
      .fromTo("#bw-eyelids-lower", { yPercent: 0 }, { yPercent: -75, duration: .05 }, 2)
      .fromTo("#bw-eyelids-upper", { yPercent: 0 }, { yPercent: 75, duration: .05 }, 2)
      .to("#bw-eyelids-lower, #bw-eyelids-upper", { yPercent: 0, duration: .3 }, 2.05)
      .fromTo("#bw-eyelids-lower", { yPercent: 0 }, { yPercent: -75, duration: .05 }, 2.35)
      .fromTo("#bw-eyelids-upper", { yPercent: 0 }, { yPercent: 75, duration: .05 }, 2.35)
      .to("#bw-eyelids-lower, #bw-eyelids-upper", { yPercent: 0, duration: .2 }, 2.4)
      
      

    let trigger_ourMission_In = { trigger: "#section_ourMission", start: "0% center", end: "100% center", onEnter: ()=>{ section_unbalancedWorldeyeloop.pause();  console.log('trigger_ourMission_In'); } }

    let section_ourMission = gsap.timeline({ paused: true, scrollTrigger: trigger_ourMission_In })
      .to("#notification-todo", { xPercent: 100, yPercent: 100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#notification-traffic", { xPercent: -100, yPercent: -100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#notification-alarm", { xPercent: -100, yPercent: 100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#notification-meeting", { xPercent: 100, yPercent: -100, autoAlpha: 0, duration: .2, ease: "power3.out" }, 0)
      .to("#world", { transformOrigin: "50% 50%", yPercent: -50, scale: .8, duration: .5 }, 0)
      .to("#eyes", { xPercent: -10, yPercent: 80, duration: 1, onComplete: ()=>{section_ourMissioneyeloop.play(0)} }, .5)
      .to("#eyelids", { yPercent: 0, duration: 1 }, .5)
      .fromTo("#bw-eyes", {  yPercent: 0 }, { yPercent: -50, duration: 1 }, 1.5)
      .fromTo("#bw-arrow path", { stroke: "#000000" }, {  stroke: "#FFFFFF", duration: 1 }, 0)
      .fromTo("#bw-arrow", { yPercent: 0 }, { yPercent: 50, repeat: -1, yoyo: true, duration: .2 }, 0)
      .fromTo("#ourMission", { scale: .8, yPercent: 100, autoAlpha: 0 }, { scale: .8, y: 0, yPercent: 23, autoAlpha: 1,  duration: 1 }, 0)
      .fromTo("#bw-mouth", {
        drawSVG: "50% 50%" },{
        drawSVG: "100%", ease: "expo.inOut", duration: 1}, .5)

    let trigger_ourStory_In = { trigger: "#section_ourStory", start: "0% center", end: "100% center", onEnter: ()=>{ section_ourMissioneyeloop.pause() } }

    let section_ourStory = gsap.timeline({ paused: true, scrollTrigger: trigger_ourStory_In })      
      .to("#unbalancedWorld, #ourMission", { yPercent: -200, autoAlpha: 0, duration: 1.1 }, 0)
      .fromTo("#ourStory", { yPercent: 100, autoAlpha: 0 }, { y: 0, yPercent: 0, autoAlpha: 1, duration: .5 }, 0)
      .fromTo("#er-wholearm", { transformOrigin: "11% 63%", xPercent: 0, rotationZ: 45 }, { transformOrigin: "11% 63%", rotationZ: 0, xPercent: 9, duration: .5, ease: "back.out(1.7)" }, 0.2)
      .fromTo("#er-underarm", { transformOrigin: "10% 90%", rotationZ: 45 }, { rotationZ: 0, duration: .5, ease: "back.out(1.7)" }, 0.2)
      .fromTo("#er-hand", { transformOrigin: "80% 90%", rotationZ: 45 }, { rotationZ: 0, duration: .5, ease: "back.out(1.7)" }, 0.2)
      .addLabel("bulb", .3)
      //.fromTo("#er-hand", { transformOrigin: "80% 90%", rotationZ: 0 }, { rotationZ: 58, duration: .4, ease: "back.out(1.7)" }, "bulb+=.3")
      .fromTo("#er-bulb", { transformOrigin: "50% 90%", yPercent: 20, scaleY: 0 }, { yPercent: 0, scaleY: 1, ease: "back.out(1.7)", duration: .3 }, "bulb")
      .set("[id^='ray-']", {y: -15}, "bulb+=.3" )
      .fromTo("#ray-01", 
        { transformOrigin: "50% 50%", yPercent: 0 }, 
        { yPercent: -1200, duration:.3, ease: "power3.in" }, "bulb+=.3" )
      .fromTo("#ray-02", 
        { transformOrigin: "50% 50%", rotationZ: 45, yPercent: 0, xPercent: 0 }, 
        { yPercent: -800, xPercent: 800, duration:.3, ease: "power3.in" }, "bulb+=.3" )
      .fromTo("#ray-03", 
        { transformOrigin: "50% 50%", rotationZ: 90, yPercent: 0, xPercent: 0 }, 
        { yPercent: 0, xPercent: 1000, duration:.3, ease: "power3.in" }, "bulb+=.3" )
      .fromTo("#ray-04", 
        { transformOrigin: "50% 50%", rotationZ: -45, yPercent: 0, xPercent: 0 }, 
        { yPercent: -800, xPercent: -800, duration:.3, ease: "power3.in" }, "bulb+=.3" )
      .fromTo("#ray-05", 
        { transformOrigin: "50% 50%", rotationZ: -90, yPercent: 0, xPercent: 0 }, 
        { yPercent: 0, xPercent: -1000, duration:.3, ease: "power3.in" }, "bulb+=.3" )
      .fromTo("#er-bulb > circle",  { scaleY: 1 }, { scaleY: 6, duration: .2  }, "bulb+=.3")
      .fromTo("#er-bulb > circle", { scaleY: 6 }, { scaleY: 1, duration: .3 }, "bulb+=.5" )
      .fromTo("#er-bulb > circle", { autoAlpha: 1 }, { autoAlpha: 0, duration: .1, ease: "power3.out" }, "bulb+=.8" )
      .fromTo(".bg-galaxy", { autoAlpha: 1 }, { autoAlpha: 0, duration: .3 }, "bulb+=.5" )
      .fromTo(".content-scroll", { color: "#FFFFFF"}, { color: "#000000", duration: .3 }, "bulb+=.5")
      .fromTo(".page-template-page-about em", { color: "#FF9B7A"}, { color: "rgb(234, 75, 23)", duration: .3 }, "bulb+=.5")
      .fromTo(".page-template-page-about .illustration-stage", { background: "linear-gradient(rgba(26, 32, 46, 1) 0%, rgba(26, 32, 46, 1) 80%, rgba(26, 32, 46, 0) 100%) no-repeat" }, { background: "linear-gradient(rgba(154, 207, 233, 1) 0%, rgba(154, 207, 233, 1) 80%, rgba(154, 207, 233, 0) 100% ) no-repeat" , duration: .3 }, "bulb+=.5")

    let triggerrebalanceYourWorkDayIn = { trigger: "#section_rebalance", start: "0% center", end: "100% center" };
    let rebalanceYourWorkDayIn = gsap.timeline({ paused: true, scrollTrigger: triggerrebalanceYourWorkDayIn })         
    .fromTo("#ourStory > *", 
      { yPercent: 0, autoAlpha: 1 }, 
      { yPercent: -110, autoAlpha: 0, duration: .3 }, 0)
    .fromTo("[id^='letter-']", 
      { y: 0, x: 0, rotationZ: function(){ return gsap.utils.random(-45, 45); }, xPercent: function(){ return gsap.utils.random(-33, 33); } }, 
      { y: 0, x: 0, rotationZ: 0, xPercent: 0, duration: 5, ease: "elastic.out(1.5,.1)" }, 0.1)
    .fromTo("#illu-logo", 
      { scale: .8, yPercent: 110, autoAlpha: 0 }, 
      { y: 0, yPercent: 0, autoAlpha: 1, duration: .5 }, 0)
    .fromTo("#illu-logo", 
      { rotationZ: -25, transformOrigin: "50% 70%" }, 
      { rotationZ: 0, duration: 5, ease: "elastic.out(2, .3)" }, 0);


  } else if (document.querySelector('.home-hero')) {
      gsap.registerPlugin(ScrollTrigger);

      ScrollTrigger.defaults({
        toggleActions: "restart complete reverse reset"//,
      });

      let breathemanbreathes = gsap.timeline( { paused: false, repeat: -1, repeatDelay: .3, yoyo: true } )
        .to("#breatheman-chest", { transformOrigin: "50% 100%", scale: 1.125, yPercent: -5, ease: "power2.inout", duration: 5 }, 0)
        .to("#breatheman-neck", { transformOrigin: "50% 100%", scaleX: 1.125, yPercent: -13, ease: "power2.inout", duration: 4.9 }, 0.1)   
        .to("#breatheman-head", { transformOrigin: "50% 100%", yPercent: -9, ease: "power2.inout", duration: 4.9 }, 0.3)  
        .to("#breatheman-brows", { transformOrigin: "50% 100%", yPercent: -66, scaleX: .9, ease: "power2.inout", duration: 4.7 }, 0.3)    
        .to("#breatheman-nose", { transformOrigin: "50% 50%", scaleX: 1.2, ease: "power2.inout", duration: 4.8 }, 0.2);    

      gsap.fromTo("#home-benefits-block img", { autoAlpha: 0, yPercent: 40 }, { autoAlpha: 1, yPercent: 0, duration: .5, scrollTrigger: { trigger: "#home-benefits-block", start: "0% 70%", end: "100% 70%", scrub: false } } );
      
      gsap.fromTo("#home-benefits-block div:nth-child(2) *", { autoAlpha: 0 }, { autoAlpha: 1, duration: 1, scrollTrigger: { trigger: "#home-benefits-block", start: "0% 70%", end: "100% 70%", scrub: false } } );

      gsap.fromTo("#home-about-block img", { autoAlpha: 0, yPercent: 40 }, { autoAlpha: 1, yPercent: 0, duration: .5, scrollTrigger: { trigger: "#home-about-block", start: "0% 70%", end: "100% 70%", scrub: false } } );
      
      gsap.fromTo("#home-about-block div:nth-child(2) *", { autoAlpha: 0 }, { autoAlpha: 1, duration: 1, scrollTrigger: { trigger: "#home-about-block", start: "0% 70%", end: "100% 70%", scrub: false } } );
      
      gsap.fromTo("#home-example-video-block-breathe figure", { autoAlpha: 0, yPercent: 40 }, { autoAlpha: 1, yPercent: 0, duration: .5, scrollTrigger: { trigger: "#home-example-video-block-breathe", start: "0% 70%", end: "100% 70%", scrub: false } } );
      
      gsap.fromTo("#home-example-video-block-breathe div:nth-child(2) *", { autoAlpha: 0 }, { autoAlpha: 1, duration: 1, scrollTrigger: { trigger: "#home-example-video-block-breathe", start: "0% 70%", end: "100% 70%", scrub: false } } );

      gsap.fromTo("#home-example-video-block-move figure", { autoAlpha: 0, yPercent: 40 }, { autoAlpha: 1, yPercent: 0, duration: .5, scrollTrigger: { trigger: "#home-example-video-block-move", start: "0% 70%", end: "100% 70%", scrub: false } } );
      
      gsap.fromTo("#home-example-video-block-move div:nth-child(2) *", { autoAlpha: 0 }, { autoAlpha: 1, duration: 1, scrollTrigger: { trigger: "#home-example-video-block-move", start: "0% 70%", end: "100% 70%", scrub: false } } );

  
  } else {
    console.log('nothing to gsap here');
  }
}
