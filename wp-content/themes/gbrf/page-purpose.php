<?php

/**
 * Get header
 */
get_header();
?>

<div id="fullpage">

<?php
/**
 * Home hero
 */
include(locate_template('template-parts/page/purpose/purpose.php'));
include(locate_template('template-parts/page/purpose/environment.php'));
include(locate_template('template-parts/page/purpose/social-sustainability.php'));
include(locate_template('template-parts/page/purpose/buildings.php'));
include(locate_template('template-parts/page/purpose/carbon-calculator.php'));
include(locate_template('template-parts/footer.php'))

?>


</div>	

<?php 
/**
 * Get footer
 */
get_footer();
