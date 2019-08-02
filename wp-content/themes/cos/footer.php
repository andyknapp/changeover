<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Changover_Sales
 */

?>

</main><!-- #content -->

<footer id="colophon" class="site-footer">
	<ul>
		<li>Changeover Sales</li>
		<li>Est. 1977</li>
	</ul>
	<a href="mailto:changeoversales@aol.com" target="_blank">changeoversales@aol.com</a>
	<a href="tel:1-302-562-5385">302-562-5385</a>
</footer><!-- #colophon -->

<?php
	include('assets/icons/svg-defs.svg');
	wp_footer();
?>

<script>
	// load webfonts async
	WebFontConfig = {
		google: { families: [ 'Open+Sans+Condensed:300,700', 'Open+Sans:300italic,400,600,700,800' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();
</script>

<script>
	var spy = new Gumshoe('.menu-item a', {

		// Active classes
		navClass: 'active', // applied to the nav list item
		contentClass: 'active', // applied to the content

		// Nested navigation
		nested: false, // if true, add classes to parents of active link
		nestedClass: 'active', // applied to the parent items

		// Offset & reflow
		offset: 0, // how far from the top of the page to activate a content area
		reflow: false, // if true, listen for reflows

		// Event support
		events: true // if true, emit custom events

	});
</script>

</body>
</html>
