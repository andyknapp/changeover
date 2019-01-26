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

</footer><!-- #colophon -->

<?php
	include('assets/icons/svg-defs.svg');
	wp_footer();
?>

<script>
	// load webfonts async
	WebFontConfig = {
		google: { families: [ 'Open+Sans+Condensed:300,700', 'Open+Sans:400,600,700,800' ] }
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
