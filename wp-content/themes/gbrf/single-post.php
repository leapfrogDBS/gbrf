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
include(locate_template('template-parts/posts/article/post-header.php'));
include(locate_template('template-parts/posts/article/article.php'));
include(locate_template('template-parts/footer.php'))

?>

</div>	



<?php 
/**
 * Get footer
 */
get_footer();
