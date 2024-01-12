<?php

/**
 * Get header
 */
get_header();

?>
<div class="preloader">
	<div class="px-[3.3333%] w-full">
  		<img id="logo" class="w-[90%] m-auto transition-all duration-1000 ease-in-out" src="<?php echo get_template_directory_uri();?>/img/logo-white.svg" alt="large-logo">
		
    <video autoplay muted class="w-full">
      <source src="<?php echo get_template_directory_uri();?>/img/preloader.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
	</div>	  
</div>
<script>
document.querySelector('body').classList.toggle('no-scroll');  

function preloader() {
const preloader = document.querySelector('.preloader');
const fadeOutEffect = setInterval(() => {
  if (!preloader.style.opacity) {
    preloader.style.opacity = 1;
  }
  if (preloader.style.opacity > 0) {
    preloader.style.opacity -= 0.1;
  } else {
    clearInterval(fadeOutEffect);
    preloader.remove();
  }
  
}, 120);

};

setTimeout(() => {
  document.querySelector('body').classList.toggle('no-scroll');  
}, 2000);

setTimeout(preloader, 1500);


</script>	

<div id="fullpage">

<?php
/**
 * Home hero
 */
include(locate_template('template-parts/page/home/home-hero.php'));
include(locate_template('template-parts/page/home/home-slide.php'));
include(locate_template('template-parts/page/home/promise.php'));
include(locate_template('template-parts/page/home/service.php'));
include(locate_template('template-parts/page/home/clients.php'));
include(locate_template('template-parts/page/home/ethics.php'));
include(locate_template('template-parts/page/home/latest-news.php'));
include(locate_template('template-parts/page/home/faqs.php'));
include(locate_template('template-parts/footer.php'));

?>


</div>	

<script>



document.addEventListener("DOMContentLoaded", function(){


  /*FAQs accordians*/
  var acc = document.getElementsByClassName("faq-question-container");
  var i;
  
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      /* Toggle between adding and removing the "active" class,
      to highlight the button that controls the panel */
      this.classList.toggle("active");
  
      /* Toggle between hiding and showing the active panel */
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        panel.style.marginTop = "0"
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        panel.style.marginTop = "64px";
      }
      panel.classList.toggle('active');
    });
  }
}); //end DOM Load


</script>
<?php 
/**
 * Get footer
 */
get_footer();
