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
include(locate_template('template-parts/page/services/services.php')); 
include(locate_template('template-parts/page/services/our-services.php')); 
include(locate_template('template-parts/page/services/access-rates.php')); 
include(locate_template('template-parts/page/services/safety-culture.php'));
include(locate_template('template-parts/footer.php'))

?>


</div>

<script>
document.addEventListener("DOMContentLoaded", function(){

if(window.location.hash) {
    var hash = window.location.hash.substring(1).replace("-id", "");; //Puts hash in variable, and removes the # character
    // hash found
    document.getElementById(hash).click();
    const servicesSection = document.getElementById('environment-slide');
    servicesSection.scrollIntoView({ behavior: 'smooth' });
   


  } else {
    /* Open first Tab of tabbed content */
    document.querySelector(".defaultOpen").click();
  }
});
</script>

<?php 
/**
 * Get footer
 */
get_footer();
