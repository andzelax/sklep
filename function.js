
(function($) {
	"use strict";
	$.fn.sliderResponsive = function(settings) {
	  
	  var set = $.extend( 
		{
		  slidePause: 5000,
		  fadeSpeed: 800,
		  autoPlay: "on",
		},
		settings
	  ); 
	  
	  var $slider = $(this);
	  var size = $slider.find("> div").length; 
	  var position = 0; 
	  var sliderIntervalID; 
		
	
	  $slider.find("div:first-of-type").addClass("show");
		
	  $slider.find("li:first-of-type").addClass("showli")
  
	  $slider.find("> div").not(".show").fadeOut();
	  
	  if (set.autoPlay === "on") {
		  startSlider(); 
	  } 
	  
	  function startSlider() {
		sliderIntervalID = setInterval(function() {
		  nextSlide();
		}, set.slidePause);
	  }
	  
	  $slider.mouseover(function() {
		if (set.autoPlay === "on") {
		  clearInterval(sliderIntervalID);
		}
	  });
		
	  $slider.mouseout(function() {
		if (set.autoPlay === "on") {
		  startSlider();
		}
	  });
  
	  $slider.find("> .right").click(nextSlide)
  
	  $slider.find("> .left").click(prevSlide);
		
	  function nextSlide() {
		position = $slider.find(".show").index() + 1;
		if (position > size - 1) position = 0;
		changeCarousel(position);
	  }
	  
	  function prevSlide() {
		position = $slider.find(".show").index() - 1;
		if (position < 0) position = size - 1;
		changeCarousel(position);
	  }
  
	  function changeCarousel() {
		$slider.find(".show").removeClass("show").fadeOut();
		$slider
		  .find("> div")
		  .eq(position)
		  .fadeIn(set.fadeSpeed)
		  .addClass("show");
	  }
  
	  return $slider;
	};
  })(jQuery);
  $(document).ready(function() {
	
	
	$("#slider3").sliderResponsive({
	  
	});
	
  }); 
  
  
  