<section class="upcoming container-small">
    <header class="upcoming-header flex animation-element fade-up" data-trigger="1">
        <h4 class="heading-3 underline">Upcoming Sales</h4>
        <p>Check back soon for more information!</p>
    </header>

    <?php if( $upcoming_sales ) : ?>

        <div class="upcoming-sales animation-element fade" data-trigger="1">

            <?php foreach( $upcoming_sales as $post ) : ?>
                <?php setup_postdata( $post ); ?>

                <ul class="address">
                    <?php if( have_rows( 'address_short' ) ) : ?>
                        <?php while( have_rows( 'address_short' ) ) : the_row(); ?>

                            <li><?php echo get_sub_field( 'address_preview' ); ?></li>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>

            <?php endforeach; wp_reset_postdata(); ?>

        </div>

    <?php endif; ?>
</section>
