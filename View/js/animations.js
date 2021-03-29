const card_front =document.querySelector('.front');
const card_back =document.querySelector('.back');
const image =document.querySelector('#image');
const tl = new TimelineMax();
tl.fromTo(
	card_front,
	1.2,
	{x: "-100%"},
	{x: "0%"})
.fromTo(
	card_front,
	1.2,
	{opacity: "0"},
	{opacity: "1"},
	"-=1.2");



var tween_back = TweenMax.fromTo(back, 3, {autoAlpha:0}, {autoAlpha:1});


const controller = new ScrollMagic.Controller();

const scene_back= new ScrollMagic.Scene({
	triggerElement:front,
	duration: 1000,
	triggerHook: 0

})
.setTween(tween_back)
.addTo(controller);

var tween_front = TweenMax.fromTo(front, 3, {autoAlpha:1}, {autoAlpha:0});



const scene_front= new ScrollMagic.Scene({
	triggerElement:front,
	duration: 500,
	triggerHook: 0

})
.setTween(tween_front)
.addTo(controller);