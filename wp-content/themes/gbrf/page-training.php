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

include(locate_template('template-parts/page/training/training.php'));
include(locate_template('template-parts/page/training/simulator.php'));
include(locate_template('template-parts/page/training/technology.php'));
include(locate_template('template-parts/footer.php'))

?>


</div>	

<?php 
/**
 * Get footer
 */
get_footer();
