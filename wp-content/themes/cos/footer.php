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

</body>
</html>
