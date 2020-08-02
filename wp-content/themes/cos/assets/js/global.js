var body = document.body;
var html = document.documentElement;
var url = window.location;
var path = url.pathname;
var toggle = document.querySelector('.menu-toggle');
var menu = document.querySelector('#site-navigation');
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


window.addEventListener('scroll', function() {
	scaleHeader();
});
