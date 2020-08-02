<?php
// Template Name: Home Page

get_header();
?>

	<!-- <section id="intro" class="intro major-section">
		<div class="container-mid">
			<header>
				<h1 class="heading-2 underline">Estate & </br>Tag Sales</h1>
			</header>
			<div class="intro-content">
				<p>Since 1977, we have provided complete estate sale services and professionaly conducted in-home Tag Sales in Delaware, Pennsylvania and New Jersey.</p>
				<p>Whether you are a private individual, executor, trust officer, real estate agent or attorney, <span>Changeover Sales</span> will be be happy to consult with you to best serve your needs in the disposition of one item or a houseful.</p>
			</div>
		</div>
	</section> -->

    <?php
        $next_sale = get_field( 'next_sale' );
        $upcoming_sales = get_field( 'upcoming_sales' );
    ?>

    <?php if( $next_sale ) : ?>

        <!-- <hr class="spacer"> -->

        <?php foreach( $next_sale as $post) : setup_postdata( $post ); ?>

            <?php include( 'components/next-sale.php' ); ?>

        <?php endforeach; wp_reset_postdata(); ?>

    <?php endif; ?>

    <?php include( 'components/upcoming-sales.php' ); ?>

	<hr class="spacer">

	<section id="how-it-works" class="how-it-works major-section">
		<div class="container-mid animation-element fade-up" data-trigger="1">
			<h5 class="heading-1">How it Works</h5>
			<span><em>We take care of everything</em></span>
            <p>Since 1977, we have provided complete estate sale services and professionaly conducted in-home Tag Sales in Delaware, Pennsylvania and New Jersey. Whether you are a private individual, executor, trust officer, real estate agent or attorney, <span>Changeover Sales</span> will be be happy to consult with you to best serve your needs in the disposition of one item or a houseful.</p>
			<p>All our client needs to do is take what they want and leave the rest to us. We will sort saleable from non-saleable, arrange, price, tag, advertise and sell everything in 2 or 3 days leaving your home “broom clean” ready for the cleaning crew (we can arrange for that, too!).</p>
			<p>Within a week, we will furnish you with a check for the proceeds and a report with an itemized accounting of everything that sold.</p>
			<p>Our Tag Sales are professionally conducted with the utmost respect for your home & possessions. Attention to even the smallest detail, strong security measures and our friendly professional staff guarantees excellent results.</p>
			<p>Our over 4 decades of experience with antiques, fine art, jewelry and household items and our constant exposure to the ever-changing market ensures that your possessions will be properly priced to produce maximum revenue for our client.</p>
			<p>We also offer a full & partial estate purchases. If a Tag Sale isn't possible, we can offer a buyout of complete or partial contents of a home. After a purchase price has been agreed to, we will arrange for the packing & removal of all items and pay you immediately.</p>
		</div>
	</section>

	<section id="testimonials" class="testimonials major-section">
		<div class="container-mid animation-element fade-up" data-trigger="1">
			<ul class="slider">
			<li class="slide">
				<div class="container-slide">
					<blockquote>
						<p><span class="open">&ldquo;</span>Thank you so much for organizing and running the Tag Sale at my Aunt’s house. I was not very comfortable doing a sale...but you two put me immediately at ease. Thank you for treating her things with such respect.<span class="close">&rdquo;</span></p>
					</blockquote>
					<cite>Susie Racobaldo </br>Kennett Square, PA</cite>
				</div>

			</li>

			<li class="slide">
				<div class="container-slide">
					<blockquote>
						<p><span class="open">&ldquo;</span>...Kay Reilly and the team at Changeover Sales made a very difficult time much easier and as painless as possible.... What could have been a very time consuming process...was handled professionally and with the utmost consideration and courtesy by the team at Changeover Sales. Their experience and expertise was greatly appreciated and an invaluable service.<span class="close">&rdquo;</span</p>
					</blockquote>
				</div>
			</li>
		</ul>
		</div>
	</section>

	<section id="about-us" class="about major-section">
		<div class="container-mid animation-element fade-up" data-trigger="1">
			<h5 class="heading-1">About Us</h5>
			<p>Founded by Kay Reilly in 1977, we continue to be family owned and operated with a combined 70+ years of tag sales and appraisal experience. Word of mouth and customer referrals are the backbone of our thriving business and sterling reputation.</p>
			<p>We are very proud of our friendly, knowledgeable, professional staff, many who have been with us from the start! We also maintain a vast number of experts who contribute valuable information and opinions on art, antiques, jewelry, etc.</p>
		</div>
	</section>

	<hr class="spacer">

	<section id="contact" class="contact major-section">
		<div class="container-mid animation-element fade-up" data-trigger="1">
			<h5 class="heading-1">Contact</h5>
			<div class="contact-container">
				<aside class="contact-info">
                    <div class="flex-container">
                        <h4 class="copy-1">Kay Reilly</h4>
    					<h4 class="copy-1">Patty Souffie</h4>
    					<a href="mailto:changeoversales@aol.com" target="_blank">
                            <svg class="email">
                                <use xlink:href="#icon-mail"></use>
                            </svg>
                            <span>changeoversales@aol.com</span>

                        </a>
    					<a href="tel:1-302-562-5385">
                            <svg class="phone">
                                <use xlink:href="#icon-phone"></use>
                            </svg>
                            <span>302-562-5385</span>
                        </a>
                    </div>

				</aside>

				<?php gravity_form( 1, false, false, false, '', false ); ?>
			</div>
		</div>
	</section>

<?php
get_footer();
