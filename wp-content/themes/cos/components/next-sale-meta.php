<div class="sale-meta">

    <?php if( $maps_url ) : ?>

        <a href="<?php echo $maps_url; ?>" class="external-link" target="_blank">
            <svg class="direction">
                <use xlink:href="#icon-location"></use>
            </svg>
            <span>Get Directions</span>
        </a>

    <?php endif; ?>

    <?php if( get_field( 'photos_link' ) ) : ?>

        <a href="<?php echo get_field( 'photos_link' ); ?>" class="external-link" target="_blank">
            <svg class="photos">
                <use xlink:href="#icon-photos"></use>
            </svg>
            <span>View Photos</span>
        </a>

    <?php endif; ?>

    <?php if( get_field( 'virtual_sale' ) ) : ?>
        <a href="<?php echo home_url(); ?>/shop" class="external-link">
            <svg class="photos">
                <use xlink:href="#icon-shopping-bag"></use>
            </svg>
            <span>Shop</span>
        </a>
    <?php endif; ?>

    <a href="https://www.facebook.com/ChangeoverSales" class="external-link" target="_blank">
        <svg class="fb">
            <use xlink:href="#icon-facebook"></use>
        </svg>
        <span>Visit us on Facebook</span>
    </a>
</div>
