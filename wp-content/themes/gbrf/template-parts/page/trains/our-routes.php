<div class="section header-bg-lilac bg-lilac fp-auto-height-responsive pb-[70px] lg:pb-[100px]" id="simulator" data-scroll-indicator-title="Our Routes">
	<div class="slide-title text-white">
		<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Our Routes<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Our Routes</h2></div>
	</div>
	<div class="container mt-[40px] pr-[2%]">
		<div class="row xl:grid xl:grid-cols-2 items-center gap-x-[32px] lg:gap-x-[100px]">
			<div class="flex col col1 flex-col">
				<h3 class="text-white">GB Railfreight’s administrative headquarters are in London. From there, we coordinate the work of our nationwide 900-strong team that works around the clock to deliver the best possible service for our customers.</h3>
                <div class="hidden sm:grid grid-cols-2 justify-start w-full gap-[16px]">

                    <?php while( have_rows('trains_route')) : the_row();
                        $route_location = get_sub_field('route_location');
                        $route_class = strtolower(str_replace(' ', '-', $route_location));
                    ?>
                        <div class="flex justify-center lg:justify-start mt-[15px] sm:mt-0 ">
                            <div onclick="showRoute(event, '<?php echo $route_class; ?>')" class="route-selector <?php echo $route_class; ?> btn border-2 text-center border-white text-white px-[16px] py-[8px] hover:text-lilac hover:border-yellow hover:bg-yellow"><?php echo $route_location; ?></div>               
                        </div>
                        
                    <?php endwhile;
                        reset_rows(); ?>                  
                </div>

                <div id="mobile-selectors" class="sm:hidden">
                    <div class="splide" id="routes-slider" >
                        <div class="splide__track">
                            <ul class="splide__list"> 

                                <?php while( have_rows('trains_route')) : the_row();
                                    $route_location = get_sub_field('route_location');
                                    $route_class = strtolower(str_replace(' ', '-', $route_location));
                                ?>
                                
                                    <li class="text-[16px] splide__slide">        
                                        <div class="flex justify-center">
                                            <div onclick="showRoute(event, '<?php echo $route_class; ?>')" class="route-selector w-full py-2 justify-center <?php echo $route_class; ?> btn border-2 text-center border-white text-white px-[16px] py-[8px] hover:text-lilac hover:border-yellow hover:bg-yellow"><?php echo $route_location; ?></div>               
                                        </div>
                                    </li>
                                <?php endwhile;
                                    reset_rows(); ?>                  
                            </ul>    
                        </div>
                    </div>
                </div>
</div>

			<div class="col col2 text-white mb-[76px] mt-[24px] lg:mt-0 lg:mb-0">
                <div class="relative">
                    <img class="w-full" src="<?php echo get_template_directory_uri();?>/img/map2.svg"> 
                    
                    <!-- loop all repeater fields to get the images. start hidden -->
                    

                    <?php while( have_rows('trains_route')) : the_row();
                        $route_image = get_sub_field('route_image');
                        $route_location = get_sub_field('route_location');
                        $route_class = strtolower(str_replace(' ', '-', $route_location));
                    ?>
                        <img class="<?php echo $route_class; ?> train-route absolute top-0 left-0 w-full h-full hidden" src="<?php echo $route_image['url']; ?>">    
                        
                    <?php endwhile; ?>
                </div>  
			</div>
		</div>
	</div>
</div>

<script>
/* When route is clicked -
    loop all images. 
        if any not have hidden OR category matches, toggle. 
        add class active to target? */
function showRoute(evt, route) {
    
    allRoutes = document.querySelectorAll(".train-route");
    for (i = 0; i < allRoutes.length; i++) {
         if (!allRoutes[i].classList.contains('hidden') || allRoutes[i].classList.contains(route)) {
            allRoutes[i].classList.toggle('hidden');
        }
    }

    if (evt.currentTarget.classList.contains('active')) {
        evt.currentTarget.classList.toggle('active'); 
    } else {

        allSelectors = document.querySelectorAll('.route-selector');
        for (i = 0; i < allSelectors.length; i++) {
            if(allSelectors[i].classList.contains('active')) {
                allSelectors[i].classList.toggle('active');
            }
        }
        evt.currentTarget.classList.toggle('active'); 
    }   
}                    

</script>

<script>
    var splide1 = new Splide( '#routes-slider', {
            

        pagination: false,
        rewind: true,
        speed: '1000',
        type: 'slide',
        drag: true,
        snap: true,
        perMove: 1,
        perPage: 1,
        gap: '30px',
        padding: { left: '0', right: '30vw' },
                    
        });
      splide1.mount();


</script>