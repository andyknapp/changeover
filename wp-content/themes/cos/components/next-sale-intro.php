<?php if ( get_field( 'intro_statement' ) || get_field( 'announcement' ) || get_field( 'intro_image') ) : ?>

    <div class="sale-description container-small">

        <?php
            if( get_field( 'intro_image' ) ) {

                $img_id = get_field( 'intro_image' );

                echo wp_get_attachment_image( $img_id, 'full' );
            }

            if( get_field( 'intro_statement' ) ) {
                echo get_field( 'intro_statement' );
            }
        ?>

        <?php if( get_field( 'announcement' ) ) : ?>

            <aside class="announcement">

                <?php echo get_field( 'announcement' ); ?>

            </aside>

        <?php endif; ?>

        <?php include( 'next-sale-meta.php' ); ?>

    </div>

<?php endif; ?>
