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
include(locate_template('template-parts/page/certificates/certificates.php'));
include(locate_template('template-parts/footer.php'))

?>


</div>	


<script>
    document.querySelector('.desktop-header-container nav').style.background = "#0A2882";
</script>

<?php 
/**
 * Get footer
 */
get_footer();
