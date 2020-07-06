<section id="next-sale" class="sale major-section sticky-parent">

    <?php include( 'next-sale-header.php' ); ?>

    <?php if ( get_field( 'intro_statement' ) ) : ?>
        <div class="sale-description container-small">

            <?php echo get_field( 'intro_statement' ); ?>

        </div>
    <?php endif; ?>

    <?php
        include( 'next-sale-lists.php' );

        if ( get_field( 'closing_statement' ) ) {
            echo get_field( 'closing_statement' );
        }
    ?>

    <aside class="upcoming container-small">
    <header class="upcoming-header flex animation-element fade-up" data-trigger="0.95">
        <h4 class="heading-3 underline">Upcoming Sales</h4>
        <p>Check back soon for more information!</p>
    </header>
    <div class="upcoming-sales animation-element fade" data-trigger="0.93">
        <ul class="address">
            <li>July 22-25</li>
            <li>Breidalblik</li>
            <li>Greenville, DE</li>
        </ul>

        <ul class="address">
            <li>August</li>
            <li>Virtual Sale</li>
        </ul>

        <ul class="address">
            <li>Fall 2020</li>
            <li>Huge Pop-Up Sale</li>
            <li>Independence Mall</li>
            <li>Rte 202 Wilmington, DE</li>
        </ul>
    </div>
</aside>

</section>
