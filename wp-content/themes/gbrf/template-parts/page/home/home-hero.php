<?php
$hh_background_image = get_field('hh_background_image');
$hh_title = get_field('hh_title');
$hh_button_text = get_field('hh_button_text');
$hh_button_link = get_field('hh_button_link');
$hh_button_text_two = get_field('hh_button_text_two');
$hh_button_link_two = get_field('hh_button_link_two');

?>
<div class="section hide-nav header-bg-transparent bg-transparent items-end bg-cover bg-no-repeat pb-[40px] lg:pb-[56px] justify-end" id="home-hero" style="background-image: url(<?php echo esc_url($hh_background_image['url']); ?>)">	
	<span id="overlay" class="absolute bg-[#0E0F20] opacity-20 z-1 inset-0"></span>
		<div class="container absolute bottom-[56px]">
		<div class="row lg:grid lg:grid-cols-2">
			<div class="col col1 mb-[24px] lg:mb-0">
				<div class="h1 font-[800] tracking-wide relative z-100 max-w-[600px] leading-[80%] m-0 flex items-center text-white uppercase"><?php echo $hh_title; ?></div>
			</div>
			<div class="col col2 flex flex-col gap-y-[15px] items-start justify-end lg:items-end">
				
				<?php if ($hh_button_text && $hh_button_link) { ?>
					<a href="<?php echo $hh_button_link['url']; ?>" class="btn orange-btn hover:bg-transparent hover:text-orange hover:border-orange"><?php echo $hh_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden " src="<?php echo get_template_directory_uri();?>/img/arrow-orange-right.svg"></a>
				<?php } ?>
				<?php if ($hh_button_text_two && $hh_button_link_two) { ?>
					<a href="<?php echo $hh_button_link_two['url']; ?>" class="btn blue-btn border-blue hover:bg-white"><?php echo $hh_button_text_two; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
				<?php } ?>
				
			</div>
		</div>
	</div>
</div>