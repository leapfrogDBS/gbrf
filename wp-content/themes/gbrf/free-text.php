<?php
/**
* Template Name: Extra Pages
* Get header
*/
get_header();
?>

<div id="fullpage">

<?php
/**
 * Home hero
 */

include(locate_template('template-parts/page/extra/body.php'));
include(locate_template('template-parts/footer.php'))

?>


</div>	
<style>
    .scroll-indicator-controller {
        display: none;
    }
</style>
<?php 
/**
 * Get footer
 */
get_footer();