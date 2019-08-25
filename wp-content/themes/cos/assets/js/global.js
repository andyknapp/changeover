var body = document.body;
var html = document.documentElement;
var vw = window.innerWidth;
var url = window.location;
var path = url.pathname;
var toggle = document.querySelector('.menu-toggle');
var menu = document.querySelector('#site-navigation');
var saleMain = document.querySelector('#next-sale');
var listsContainer = document.querySelector('.sale-lists');
var lists = document.querySelectorAll('.sale-list');
var more = document.querySelector('.view-more');
var links = document.querySelectorAll('.menu-item a');
var header = document.querySelector('#masthead');
var headerHeight = header.getBoundingClientRect().height;
var bp = 640; // $bp-small


// navigation
toggle.addEventListener('click', function (event) {
	toggle.classList.toggle('toggled');
	menu.classList.toggle('show');
	body.classList.toggle('freeze');
	html.classList.toggle('freeze');
});


//toggle sale list
function listToggle() {

	lists.forEach(function(list) {
		var listRect = list.getBoundingClientRect(),
			listHeight = listRect.height;

		list.addEventListener('click', function(e) {
			if(vw >= bp) {
				if(listsContainer.classList.contains('full-list')) {
					listsContainer.classList.remove('full-list');
				} else {
					listsContainer.classList.add('full-list');
				}

			} else {
				list.classList.toggle('list-active');
			}

		});
	});
}


// close mobile nav
function closeNav() {
	links.forEach(function(link) {
		link.addEventListener('click', function() {
			toggle.classList.remove('toggled');
			menu.classList.remove('show');
			body.classList.remove('freeze');
			html.classList.remove('freeze');
		});
	});

}

closeNav();


function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};



// smooth scroll, update url with current section
document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  });
});



function scaleHeader() {
	var sections = document.querySelectorAll('.major-section');
	var lastScroll = 0;

	function scrollStuff() {
		var fromTop = window.scrollY;

		// scale header
		if(headerHeight < fromTop) {
			header.classList.add('scrolled');
		} else {
			header.classList.remove('scrolled');
		}

		lastScroll = fromTop;
	}

	scrollStuff();
}



// initiate slider
jQuery(document).ready(function($){
	$('.slider').bxSlider({
		mode: 'fade',
		auto: false,
		adaptiveHeight: true,
		autoHover: true,
	});
});


listToggle();

window.addEventListener('scroll', function() {
	scaleHeader();
});
