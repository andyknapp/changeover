// navigation

var toggle = document.querySelector('.menu-toggle');
var menu = document.querySelector('#site-navigation');
var body = document.body;
var html = document.documentElement;


toggle.addEventListener('click', function (event) {
	toggle.classList.toggle('toggled');
	menu.classList.toggle('show');
	body.classList.toggle('freeze');
	html.classList.toggle('freeze');
});
