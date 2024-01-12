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
//include(locate_template('template-parts/page/news/news.php'));
include(locate_template('template-parts/page/news/articles-mobile.php'));
include(locate_template('template-parts/page/news/articles.php'));
	//include(locate_template('template-parts/page/news/articles-main.php'));
	//include(locate_template('template-parts/page/news/articles-filtered.php'));
include(locate_template('template-parts/page/news/case-studies.php'));
include(locate_template('template-parts/page/news/media.php'));
include(locate_template('template-parts/footer.php'))

?>


</div>	

<script>
	var logo = document.querySelector('#logo-container img');
	var orangeLogo = logo.getAttribute('data-orange');
	var searchIcon = document.querySelector('#search-icon')
    var orangeSearchIcon = searchIcon.getAttribute('data-orange');
	document.querySelector('.desktop-header-container').classList.add('orange');
	document.querySelector('.desktop-header-container nav').style.background = "#fff";
	logo.src = orangeLogo;
	searchIcon.src = orangeSearchIcon;
</script>

<?php 
/**
 * Get footer
 */
get_footer();

