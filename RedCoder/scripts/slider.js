$(function(){

	var width = 648;
	var animationSpeed = 1000;
	var pause = 7000;
	var currentSlide = 1;

	var $slider = $("#slider");
	var $slides = $slider.find("#slides");
	var $slide = $slides.find(".slide");

	var $slideLeft = $("#slide-left");
	var $slideRight = $("#slide-right");

	var interval;

 	function hideNavigation() {
		$slideLeft.hide()
		$slideRight.hide()
 	}

	function showNavigation() {
		$slideLeft.show()
		$slideRight.show()
	}

	function startSlider() {
		interval = setInterval(function(){
			$slides.animate({"margin-left":"-="+width}, animationSpeed, function(){
				currentSlide++;
				if(currentSlide === $slide.length) {
					currentSlide = 1;
					$slides.css("margin-left", 0);
				}
			});
		}, pause);
	}

	function stopSlider() {
		clearInterval(interval)
	}

	$slider.on("mouseenter", stopSlider).on("mouseleave", startSlider);
	$slider.on("mouseenter", showNavigation).on("mouseleave", hideNavigation);

	$slideLeft.click(function(){
		if (currentSlide > 1) {
		$slides.animate({"margin-left":"+="+width}, animationSpeed);
		currentSlide = currentSlide - 1;
	} else {
		return false
	}
	});

	$slideRight.click(function(){
		if (currentSlide < ($slide.length - 1)) {
		$slides.animate({"margin-left":"-="+width}, animationSpeed);
		currentSlide = currentSlide + 1;
	} else {
		return false
	}
	});

	hideNavigation();
	startSlider();
});
