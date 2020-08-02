<header class="sale-header">
    <h2 class="heading-1">Next Sale</h2>

    <?php if(  have_rows( 'address' ) ) : ?>

        <ul class="address">

            <?php while( have_rows( 'address' ) ) : the_row(); ?>
                <?php
                    $street_number = str_replace(' ', '', get_sub_field( 'street_number' ));
                    $street_name = get_sub_field( 'street_name' );
                    $street_name_encode = str_replace(' ', '+', $street_name);
                    $city = get_sub_field( 'city' );
                    $state = get_sub_field( 'state' );
                    $zip = get_sub_field( 'zip_code' );
                    $neighborhood = get_sub_field( 'neighborhood' );
                    $maps_url = '';

                    if( $street_name && $street_name_encode && $city && $state && $zip ) {
                        $maps_url = 'https://www.google.com/maps/place/' . $street_number . '+' . $street_name_encode . '+' . $city . '+' . $state . '+' . $zip;
                    }
                ?>

                <?php if( $street_number || $street_name) : ?>
                    <li><?php echo $street_number . ' ' . $street_name; ?></li>
                <?php endif; ?>

                <?php if( $neighborhood ) : ?>
                    <li><?php echo $neighborhood; ?></li>
                <?php endif; ?>

                <?php if( $city || $state ) : ?>
                    <li><?php if( $city ) echo $city . ', '; if( $state ) echo $state; if( $zip ) echo ' ' . $zip; ?></li>
                <?php endif; ?>

            <?php endwhile; ?>
        </ul>

    <?php endif; ?>

    <?php if( have_rows( 'sale_dates' ) ) : ?>

        <ul class="date-time">

            <?php while( have_rows( 'sale_dates' ) ) : the_row(); ?>
                <?php
                    $date_field = get_sub_field( 'date' );
                    $date_obj = DateTime::createFromFormat('d/m/Y', $date_field );
                    $time = '';

                    if( get_sub_field( 'time' ) ) {
                        $time = '<span>' . get_sub_field( 'time' ) . '</span>';
                    }
                ?>

                <li><?php echo $date_obj->format( 'l F j') ?> <?php echo $time; ?></li>

            <?php endwhile; ?>

        </ul>

    <?php endif; ?>
    
</header>
