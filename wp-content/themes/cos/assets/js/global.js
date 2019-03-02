var body = document.body;
var html = document.documentElement;
var vw = window.innerWidth;
var url = window.location;
var toggle = document.querySelector('.menu-toggle');
var menu = document.querySelector('#site-navigation');
var sections = document.querySelectorAll('.major-section');
var lists = document.querySelectorAll('.sale-list');
var more = document.querySelector('.view-more');

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
document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    var curAnchor = this.getAttribute('href').split('#')[1];
    history.pushState(null, null, curAnchor);

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  });
});


// window.onscroll = function() {
//   // Don't run the rest of the code if every section is already visible
//   if (!document.querySelectorAll('.major-section:not(.current)')) return;
//
//   // Run this code for every section in sections
//   for (const section of sections) {
//     if (section.getBoundingClientRect().top <= window.innerHeight * 0.75 && section.getBoundingClientRect().top > 0) {
//       section.classList.add('current');
//       var currentSection = section.getAttribute('id');
//
//       // var curAnchor = this.getAttribute('href').split('#')[1];
//
//       history.pushState(null, '', currentSection);
//       console.log(currentSection);
//     } else {
//         section.classList.remove('current');
//     }
//   }
// };
