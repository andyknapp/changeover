<?php if( have_rows( 'sale_item_types' ) ) : ?>

    <div class="sale-lists sale-cols container-site">
        <div class="sale-col">

            <?php $i = 1; while( have_rows( 'sale_item_types' ) ) : the_row(); ?>

                <div class="sale-list" data-col="<?php echo $i; ?>">

                    <header class="list-header">
                        <h3 class="heading-4"><?php echo get_sub_field( 'item_type' ); ?></h3>
                        <svg>
                            <use xlink:href="#icon-down"></use>
                        </svg>
                    </header>

                    <ul class="list">
                        <?php
                            $items_str = get_sub_field( 'items' );
                            $items_format = str_replace( ['<p>', '</p>'], ['<li>', '</li>'], $items_str);
                            echo $items_format;
                        ?>

                        <li class="more">More!</li>
                    </ul>

                </div>


            <?php if( $i % 2 === 0 ) : // even cols  ?>

                <!-- close .sale-col and open new div -->
                </div> <div class="sale-col">

            <?php endif; ?>

            <?php $i++; endwhile; ?>

        </div><!-- close .sale-col -->
    </div>
<?php endif; ?>
