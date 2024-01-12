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
include(locate_template('template-parts/page/people/ethics.php'));
include(locate_template('template-parts/page/people/ethos.php'));
include(locate_template('template-parts/page/people/directors.php'));
//include(locate_template('template-parts/page/people/directors-grid.php'));
include(locate_template('template-parts/page/people/owners.php'));
include(locate_template('template-parts/page/people/wellbeing.php'));
include(locate_template('template-parts/page/people/charity.php'));
include(locate_template('template-parts/page/people/apprenticeships.php'));
include(locate_template('template-parts/page/people/careers.php'));
include(locate_template('template-parts/page/people/vacancies.php'));
include(locate_template('template-parts/page/people/testimonials.php'));
include(locate_template('template-parts/footer.php'))

?>


</div>	



<?php 
/**
 * Get footer
 */
get_footer();
