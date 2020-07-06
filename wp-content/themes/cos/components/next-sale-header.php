<header class="sale-header">
    <h2 class="heading-1">Next Sale</h2>

    <?php if(  have_rows( 'address' ) ) : ?>

        <ul class="address">

            <?php while( have_rows( 'address' ) ) : the_row(); ?>
                <?php
                    $street_number = get_sub_field( 'street_number' );
                    $street_name = get_sub_field( 'street_name' );
                    $city = get_sub_field( 'city' );
                    $state = get_sub_field( 'state' );
                    $zip = get_sub_field( 'zip_code' );
                    $neighborhood = get_sub_field( 'neighborhood' );
                    // $maps_link = 'https://www.google.com/maps/dir/304+Spalding+Rd,+Wilmington,+DE+1980';
                    // https://www.google.com/maps/dir/304+Spalding+Rd,+Wilmington,+DE+1980
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

    <ul class="date-time">
        <li>Wednesday July 8 <span>6pm - 8pm</span></li>
        <li>Thursday July 9 <span>10am - 4pm</span></li>
        <li>Friday July 10 <span>10am - 4pm</span></li>
        <li>Saturday July 11 <span>9am - 1pm</span></li>
    </ul>

    <div class="sale-meta">
        <a href="https://www.google.com/maps/dir/304+Spalding+Rd,+Wilmington,+DE+19803" class="external-link" target="_blank">
            <svg class="direction">
                <use xlink:href="#icon-location"></use>
            </svg>
            <span>Get Directions</span>
        </a>

        <a href="https://www.estatesales.net/DE/Wilmington/19806/2565471" class="external-link" target="_blank">
            <svg class="photos">
                <use xlink:href="#icon-photos"></use>
            </svg>
            <span>View Photos</span>
        </a>

        <a href="https://www.facebook.com/ChangeoverSales" class="external-link" target="_blank">
            <svg class="fb">
                <use xlink:href="#icon-facebook"></use>
            </svg>
            <span>Visit us on Facebook</span>
        </a>
    </div>
</header>
