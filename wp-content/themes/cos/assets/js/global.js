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

singleListToggle();


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


// highlight nav item for current section
window.onscroll = function() {
	var fromTop = window.scrollY;

  for(var i = 0; i < sections.length; i++) {

    if (sections[i].getBoundingClientRect().top <= window.innerHeight / 3) {

		var currentSection = sections[i].getAttribute('id');

		sections[i].classList.add('current');
		//curLink.classList.add('active');

 // THROTTLE THIS SHIT

		links.forEach(function(link) {
			var hash = link.getAttribute('href');
			var active = hash.replace('#', '');

			console.log('active ' + active);
			console.log('current ' + currentSection);

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

};

// window.addEventListener("scroll", event => {
//   let fromTop = window.scrollY;
//
//   links.forEach(link => {
//     let section = document.querySelector(link.hash);
//
//     if (
//       section.offsetTop <= fromTop &&
//       section.offsetTop + section.offsetHeight > fromTop
//     ) {
//       link.classList.add("current");
//     } else {
//       link.classList.remove("current");
//     }
//   });
// });
