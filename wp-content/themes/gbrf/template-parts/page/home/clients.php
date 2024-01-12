<?php
$our_clients_slide_title = get_field('our_clients_slide_title');
$our_clients_slide_copy = get_field('our_clients_slide_copy');
?>


<div class="section header-bg-white bg-white header-orange fp-auto-height-responsive bg-white pt-0 pb-[110px]" id="clients" data-scroll-indicator-title="<?php echo $our_clients_slide_title; ?>">
		<div class="slide-title text-blue">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg"><?php echo $our_clients_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Our Clients</h2></div>
		</div>
		<div class="container mt-[45px]">
			<div class="row lg:grid lg:grid-cols-2">
				<div class="col col1 text-blue mb-[76px] lg:order-2 lg:pl-[100px] lg:mb-0">
						<?php echo $our_clients_slide_copy; ?>
				</div>
				<div class="col col2 grid grid-cols-2 gap-y-[42px] gap-x-[50px] lg:order-1 lg:gap-x-0 lg:gap-y-0">

				<?php while( have_rows('our_clients_logo')) : the_row();
						$our_clients_logo_image = get_sub_field('our_clients_logo_image');
						?>
					<div class="logo-container flex items-center">
						<img class="client-logo m-auto scale-90 max-h-[72px] lg:max-h-[98px] lg:scale-100" src="<?php echo $our_clients_logo_image['url']; ?>">
					</div>	
				<?php endwhile; ?>
				</div>			
			</div>
		</div>
	</div>