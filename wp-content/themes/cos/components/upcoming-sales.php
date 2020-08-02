<section class="upcoming container-small">
    <header class="upcoming-header flex">
        <h4 class="heading-3 underline">Upcoming Sales</h4>
        <p>Check back soon for more information!</p>
    </header>

    <?php if( $upcoming_sales ) : ?>

        <div class="upcoming-sales animation-element fade" data-trigger="1">

            <?php foreach( $upcoming_sales as $post ) : ?>
                <?php setup_postdata( $post ); ?>

                <div class="sale-preview">
                    <?php
                        if( get_field( 'sale_preview_image' ) ) {

                            $img_id = get_field( 'sale_preview_image' );

                            echo wp_get_attachment_image( $img_id, 'full' );
                        }
                    ?>

                    <div class="preview-copy">
                        <ul class="address">
                            <?php if( have_rows( 'address_short' ) ) : ?>
                                <?php while( have_rows( 'address_short' ) ) : the_row(); ?>

                                    <li><?php echo get_sub_field( 'address_preview' ); ?></li>

                                <?php endwhile; ?>
                            <?php endif; ?>

                        </ul>

                        <?php if( get_field( 'sale_preview_copy' ) ) : ?>

                            <p><?php echo get_field( 'sale_preview_copy' ); ?></p>

                        <?php endif; ?>

                    </div>
                </div>

            <?php endforeach; wp_reset_postdata(); ?>

        </div>

    <?php endif; ?>
</section>
