<?php
$contact_page_slide_title = get_field('contact_page_slide_title');
?>

<div class="section header-bg-blue bg-blue pb-[45px] lg:pb-[100px] h-full" id="ethics" data-scroll-indicator-title="<?php echo $contact_page_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container px-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $contact_page_slide_title; ?></div>
		</div>
		<div class="container mt-[140px]">
			<div class="row  flex-col justufy-center lg:justify-between mb-[50px]">
				<div class="col text-white">

				<?php while( have_rows('contact_locations')) : the_row();
						$contact_location = get_sub_field('contact_location');
                        $contact_page_office = get_sub_field('contact_page_office');
                        $contact_page_address = get_sub_field('contact_page_address');
                        $contact_page_telephone = get_sub_field('contact_page_telephone');
                        $contact_page_email = get_sub_field('contact_page_email');
                        $contact_page_contact_link = get_sub_field('contact_page_contact_link');
						 ?>
						<div class="locations-container pt-[12px] pb-[16px] border-b first:border-t border-white lg:pt-[19px] lg:pb-[32px]">
                            <div class="location-container flex items-center duration-[0.4s] cursor-pointer">
                                <h2 class="uppercase"><?php echo $contact_location; ?></h2><img class="ml-[12px] duration-[0.4s] w-[11px] h-[6px] lg:w-[30px] lg:h-[16px] lg:ml-[24px]"src="<?php echo get_template_directory_uri();?>/img/chevron-down.svg">
                            </div>
                            <div class="answer overflow-hidden gap-x-[12px] grid grid-cols-2 lg:flex lg:gap-x-[32px]">
                                <h4 class="w-[160px] col-start-1 row-start-1 text-white font-bold text-[16px] lg:w-[195px] lg:text-[18px] lg:pr-[10px]"><?php echo $contact_page_office;?></h4>
                                <div class="col-start-2 text-white text-[16px] lg:text-[18px] lg:w-[195px]"><?php echo $contact_page_address;?></div>
                                <div class="mt-[16px] col-start-2 lg:w-[195px] lg:mt-0">
                                    <a href="tel:<?php echo $contact_page_telephone;?>"><p class="text-white text-[16px] lg:text-[18px] mb-0"><?php echo $contact_page_telephone;?></p></a>
                                    <a href="mailto:<?php echo $contact_page_email;?>"><p class="text-white text-[16px] lg:text-[18px] mb-0"><?php echo $contact_page_email;?></p></a>
                                </div>
                                
                            </div>
						</div>	
				
					<?php endwhile; ?>
				</div>		
			</div>
		</div>
	</div>
<script>
 var acc = document.getElementsByClassName("location-container");
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
        panel.style.marginTop = "64px"
      }
      
    });
  }    
</script>