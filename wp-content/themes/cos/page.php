<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Changover_Sales
 */

get_header();
?>

	<section class="intro container-mid">
		<header>
				<h1 class="heading-2">Estate & Tag Sales</h1>
		</header>
		<div class="intro-content">
			<p>Since 1977, we have provided complete estate sale services and professionaly conducted in-home Tag Sales in Delaware, Pennsylvania and New Jersey.</p>
			<p>Whether you are a private individual, executer, trust officer, real estate agent or attorney, Changeover Sales will be be happy to consult with you to best serve your needs in the disposition of one item or a houseful.</p>
		</div>
	</section>

	<section class="sale">
		<header>
			<?php // if there is an active sale ?>
				<h2 class="heading-1">Next Sale</h2>

			<?php //else : ?>
				<!-- <h2 class="heading-2">Upcoming Sale</h2> -->
				<ul class="address">
					<li>123 Main St.</li>
					<li>Wilmington, DE 19803</li>
				</ul>

				<ul class="date-time">
					<li>Thursday Feb 2 9-4</li>
					<li>Friday Feb 3 9-4</li>
					<li>Saturday Feb 4 9-4</li>
				</ul>
		</header>

		<div class="sale-description container-small">
			<p class="copy-1">Blurb about next sale. Lorem ipsum dolor sit amet consectetur, adipiscing elit fermentum bibendum sociosqu senectus, lacus nibh tellus lobortis. Phasellus primis imperdiet in massa neque potenti sodales nostra eros feugiat, vitae magna odio netus.</p>
		</div>

		<div class="sale-meta">
			<a href="#">View Pictures</a>
			<a href="#">Directions</a>
			<a href="#">Facebook</a>
		</div>

		<div class="sale-lists container-site">
			<div class="sale-list">
				<h3 class="heading-4">Furniture</h3>
				<ul>
					<li>Chair</li>
					<li>Chair</li>
					<li>Chair</li>
					<li>Chair</li>
					<li>Chair</li>
					<li>Chair</li>
				</ul>
			</div>

			<div class="sale-list">
				<h3 class="heading-4">Clothing</h3>
				<ul>
					<li>Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
				</ul>
			</div>

			<div class="sale-list">
				<h3 class="heading-4">Clothing</h3>
				<ul>
					<li>Shirt Shirt Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
					<li>Shirt</li>
				</ul>
			</div>

			<div class="sale-list">
				<h3 class="heading-4">Clothing</h3>
				<ul>
					<li>Shirt Shirt Shirt</li>
					<li>Shirt Shirt Shirt</li>
					<li>Shirt Shirt Shirt</li>
					<li>Shirt Shirt Shirt</li>
					<li>Shirt Shirt Shirt</li>
					<li>Shirt Shirt Shirt</li>
				</ul>
			</div>

		</div>

		<aside class="upcoming">
			<header>
				<h4 class="heading-3">Upcoming Sales</h4>
				<p>Check back soon for more information!</p>
			</header>
			<div class="upcoming-sales">
				<ul class="address">
					<li>Sharpley</li>
					<li>Wilmington, DE</li>
				</ul>
				<ul class="address">
					<li>Neighborhood</li>
					<li>Wilmington, DE</li>
				</ul>
			</div>
		</aside>
	</section>

	<section class="how-it-works">
		<h5 class="heading-1">How it Works</h5>
	</section>

<?php
get_footer();
