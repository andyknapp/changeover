var vw = window.innerWidth;
var saleMain = document.querySelector('#next-sale');
var listsContainer = document.querySelector('.sale-lists');
var lists = document.querySelectorAll('.sale-list');
var more = document.querySelector('.view-more');
var bp = 640; // $bp-small

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


// initiate slider
jQuery(document).ready(function($){
	$('.slider').bxSlider({
		mode: 'fade',
		auto: false,
		adaptiveHeight: false,
		autoHover: true,
	});
});


listToggle();
