var body = document.body;
var html = document.documentElement;
var vw = window.innerWidth;
var url = window.location;
var path = url.pathname;
var toggle = document.querySelector('.menu-toggle');
var menu = document.querySelector('#site-navigation');
var sections = document.querySelectorAll('.major-section');
var lists = document.querySelectorAll('.sale-list');
var more = document.querySelector('.view-more');
var links = document.querySelectorAll('.menu-item a');
var header = document.querySelector('#masthead');
var headerHeight = header.getBoundingClientRect().height;


// navigation
toggle.addEventListener('click', function (event) {
	toggle.classList.toggle('toggled');
	menu.classList.toggle('show');
	body.classList.toggle('freeze');
	html.classList.toggle('freeze');
});


//toggle sale list
function singleListToggle() {
	lists.forEach(function(list) {
		var footer = list.children[2];
		var cta = footer.children[0];

		list.addEventListener('click', function() {
			this.classList.toggle('active');

			if (cta.getAttribute("data-less") == cta.innerHTML) {
		      cta.innerHTML = cta.getAttribute("data-more");
		    } else {
		      cta.setAttribute("data-more", cta.innerHTML);
		      cta.innerHTML = cta.getAttribute("data-less");
		    }
		});
	});
}


// smooth scroll, update url with current section
document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    //var curAnchor = this.getAttribute('href').split('#')[1];
	//history.pushState(null, '', '/' + curAnchor);

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  });
});


// do stuff on scroll
window.onscroll = function() {
	var fromTop = window.scrollY;

	// highlight nav item for current section
	for(var i = 0; i < sections.length; i++) {
		if (sections[i].getBoundingClientRect().top <= window.innerHeight / 3) {

			var currentSection = sections[i].getAttribute('id');

			sections[i].classList.add('current');

			links.forEach(function(link) {
				var hash = link.getAttribute('href');
				var active = hash.replace('#', '');

				if(active == currentSection) {
					link.classList.add('active');
				} else {
					link.classList.remove('active');
				}
			});

		} else {
		    sections[i].classList.remove('current');
		}
	}
	console.log(headerHeight);
	console.log(fromTop);

	// scale header
	if(headerHeight < fromTop) {
		header.classList.add('scrolled');
	} else {
		header.classList.remove('scrolled');
	}
};



// initiate slider
jQuery(document).ready(function($){
	$('.slider').bxSlider({
		mode: 'fade',
		auto: true,
		autoHover: true,
	});
});



singleListToggle();
