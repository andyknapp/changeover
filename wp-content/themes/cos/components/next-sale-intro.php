<?php if ( get_field( 'intro_statement' ) || get_field( 'announcement' )) : ?>

    <div class="sale-description container-small">

        <?php
            if( get_field( 'intro_statement' ) ) {
                echo get_field( 'intro_statement' );
            }
        ?>

        <?php if( get_field( 'announcement' ) ) : ?>

            <aside class="announcement">

                <?php echo get_field( 'announcement' ); ?>

            </aside>

        <?php endif; ?>

    </div>
    
<?php endif; ?>
