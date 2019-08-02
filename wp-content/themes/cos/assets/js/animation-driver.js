(function() {
	var lastScroll = 0,
		scrollBank = 0,
		scrollSkip = 0,
		parallaxElements = document.querySelectorAll('.parallax-element'),
		numParallaxElements = parallaxElements.length;

	// Allows element to scroll at same rate as page after reaching the apex
	window.releaseAtApex = function (valueCalculated, orginalValue) {
		if (orginalValue > 1) {
			valueCalculated = orginalValue * -1 + orginalValue;
		}
		return valueCalculated;
	};

	for (var a = 0; a < numParallaxElements; a += 1) {
		var element = parallaxElements[a],
			parallaxValue = element.getAttribute('data-value'),
			parallaxStyle = element.getAttribute('data-style'),
			parallaxPreStyle = element.getAttribute('data-prestyle');

		if (parallaxPreStyle != '' && window[parallaxPreStyle] != undefined) {
			element.parallaxPreStyle = window[parallaxPreStyle];
		} else {
			element.parallaxPreStyle = function(value) { return value; }
		}

		element.parallaxValues = new Function('value', 'return ' + parallaxValue);
		element.parallaxStyle = new Function('value', 'return ' + parallaxStyle);
		element.parallaxFunction = function () {
			var value = this.parallaxPercent,
				valueCalculated = this.parallaxValues(value),
				valueStyles = this.parallaxPreStyle(valueCalculated, value),
				style = this.parallaxStyle(valueStyles);

			this.setAttribute('style', style);
		}
	}


	function animationControl() {
		var viewportHeight = window.innerHeight,
			animationClass = 'animation-element',
			animationElements = document.getElementsByClassName( animationClass ),
			numAnimationElements = animationElements.length;

		for (var a = 0; a < numAnimationElements; a += 1) {
			var element = animationElements[a],
				trigger = element.getAttribute( 'data-trigger' ),
				top = element.getBoundingClientRect().top;

			if (viewportHeight * trigger > top) {
				element.classList.add( 'animate' );
				element.classList.remove( animationClass );
				numAnimationElements -= 1;
				a -= 1;

				if (numAnimationElements == 0) {
					window.removeEventListener( 'scroll', animationControl, false );
					return false;
				}
			}
		}
	}

	window.addEventListener('scroll',
	function(){

		if (scrollSkip < 1) {
			var currentScroll = window.pageYOffset;

			scrollBank += Math.abs( currentScroll - lastScroll );
			lastScroll = currentScroll;

			if (scrollBank > 100) {
				animationControl();
				scrollBank = 0;
			}
			scrollSkip += 1;
		} else {
			scrollSkip = 0;
		}
	}, false);

	animationControl();
}());
