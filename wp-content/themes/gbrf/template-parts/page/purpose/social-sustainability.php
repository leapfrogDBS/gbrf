<?php
$ss_slide_title = get_field('ss_slide_title');
$ss_col_one_heading = get_field('ss_col_one_heading');
$ss_copy_col_one = get_field('ss_copy_col_one');
$ss_col_two_heading = get_field('ss_col_two_heading');
$ss_copy_col_two = get_field('ss_copy_col_two');
$ss_col_three_heading = get_field('ss_col_three_heading');
$ss_copy_col_three = get_field('ss_copy_col_three');
$ss_slide_image_one = get_field('ss_slide_image_one');
?>

<div class="section header-bg-lilac bg-lilac fp-auto-height-responsive pb-[85px]" id="simulator" data-scroll-indicator-title="<?php echo $ss_slide_title; ?>">
	<div class="slide-title text-white">
		<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $ss_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Sustainability Partnerships</h2></div>
	</div>
	<div class="container mt-[40px]">
		<div class="row">
			<div class="col">
				<img class="w-full mb-[40px]" src="<?php echo $ss_slide_image_one['url']; ?>">
			</div>
		</div>
		<div class="row lg:grid lg:grid-cols-3 gap-x-[66px]">
			<div class="col">
				<h3 class="text-white font-bold mb-6 lg:min-h-[80px] lg:mb-0"><?php echo $ss_col_one_heading; ?></h3>
				<div class="text-white mb-4"><?php echo $ss_copy_col_one; ?></div>
			</div>
			<div class="col">
				<h3 class="text-white font-bold lg:min-h-[80px] lg:mb-0"><?php echo $ss_col_two_heading; ?></h3>
				<div class="text-white mb-4"><?php echo $ss_copy_col_two; ?></div>
			</div>			
			<div class="col">
				<h3 class="text-white font-bold lg:min-h-[80px] lg:mb-0"><?php echo $ss_col_three_heading; ?></h3>
				<div class="text-white mb-4"><?php echo $ss_copy_col_three; ?></div>
			</div>					
		</div>
	</div>
</div>