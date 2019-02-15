var body = document.body;
var html = document.documentElement;
var url = window.location;
var toggle = document.querySelector('.menu-toggle');
var menu = document.querySelector('#site-navigation');
var sections = document.querySelectorAll('.major-section');
var lists = document.querySelectorAll('.sale-list');

// navigation
toggle.addEventListener('click', function (event) {
	toggle.classList.toggle('toggled');
	menu.classList.toggle('show');
	body.classList.toggle('freeze');
	html.classList.toggle('freeze');
});


//toggle sale listHeader
lists.forEach(function(list) {
	list.addEventListener('click', function() {
		this.classList.toggle('active');
	});
});



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
