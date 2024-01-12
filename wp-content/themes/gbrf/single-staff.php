<?php

/**
 * Get header
 */
get_header();
?>

<div id="fullpage">

<?php
include(locate_template('template-parts/posts/staff/main.php'));
include(locate_template('template-parts/footer.php'));
?>


</div>	

<script>
    const btn = document.getElementById('menu-btn');
    const searchButton = document.getElementById('search-icon');
    var searchIcon = document.querySelector('#search-icon')
    var logo = document.querySelector('#logo-container img');
    var orangeLogo = logo.getAttribute('data-orange');
    var orangeSearchIcon = searchIcon.getAttribute('data-orange');
    var navContainer = document.querySelector('.header-container nav');
    logo.src = orangeLogo;
    searchIcon.src = orangeSearchIcon;
    document.querySelector('.desktop-header-container').classList.add('orange');
</script>

<?php 
/**
 * Get footer
 */
get_footer();
