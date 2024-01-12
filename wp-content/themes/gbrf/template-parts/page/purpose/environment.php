<?php
$environment_slide_title = get_field('environment_slide_title');
$environment_slide_image = get_field('environment_slide_image');
$environment_slide_left_col = get_field('environment_slide_left_col');
$environment_slide_right_col = get_field('environment_slide_right_col');

$environment_stat_1_decimal = get_field('environment_stat_1_decimal');
$environment_stat_1_prefix = get_field('environment_stat_1_prefix');
$environment_stat_1_figure = get_field('environment_stat_1_figure');
$environment_stat_1_suffix = get_field('environment_stat_1_suffix');
$environment_stat_1_caption = get_field('environment_stat_1_caption');
$environment_stat_2_decimal = get_field('environment_stat_2_decimal');
$environment_stat_2_prefix = get_field('environment_stat_2_prefix');
$environment_stat_2_figure = get_field('environment_stat_2_figure');
$environment_stat_2_suffix = get_field('environment_stat_2_suffix');
$environment_stat_2_caption = get_field('environment_stat_2_caption');
$environment_stat_3_decimal = get_field('environment_stat_3_decimal');
$environment_stat_3_prefix = get_field('environment_stat_3_prefix');
$environment_stat_3_figure = get_field('environment_stat_3_figure');
$environment_stat_3_suffix = get_field('environment_stat_3_suffix');
$environment_stat_3_caption = get_field('environment_stat_3_caption');
$environment_stat_4_decimal = get_field('environment_stat_4_decimal');
$environment_stat_4_prefix = get_field('environment_stat_4_prefix');
$environment_stat_4_figure = get_field('environment_stat_4_figure');
$environment_stat_4_suffix = get_field('environment_stat_4_suffix');
$environment_stat_4_caption = get_field('environment_stat_4_caption');

?>

<div class="section header-bg-white bg-white counters header-orange fp-auto-height-responsive pb-[120px]" id="environment-slide" data-scroll-indicator-title="<?php echo $environment_slide_title; ?>">
		<div class="slide-title text-blue">
			<div class="container px-[2%]"><img class="bullet-point blue" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg"><?php echo $environment_slide_title; ?><h2 class="railfreight hidden flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Environment</h2></div>
		</div>
		<div class="container flex flex-col justify-center">
			
			<div class="row haulage-row mt-[24px] mb-[56px] text-blue lg:grid lg:grid-cols-2 lg:items-center lg:mt-[42px]">
				<div class="col col1 mb-[16px] lg:mb-0">
				<?php echo $environment_slide_left_col ?>
				</div>
				<div class="col col2 text-blue lg:pl-[40px]">
					<?php echo $environment_slide_right_col; ?>
				</div>
			</div>
			<div class="row numbers-row lg:grid lg:grid-cols-4 lg:gap-x-[2%] xl:gap-x-[50px]">
				<div class="counter-container pl-[24px] mb-[32px] border-l border-grey border-solid lg:mb-0">
					<div id="counter1" data-prefix="<?php echo $environment_stat_1_prefix; ?>" data-decimalPlaces="<?php echo $environment_stat_1_decimal; ?>" data-suffix="<?php echo $environment_stat_1_suffix; ?>" data-value="<?php echo $environment_stat_1_figure; ?>" class="counter font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
					<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
					<?php echo $environment_stat_1_caption; ?>
					</div>
				</div>
				<div class="counter-container pl-[24px] mb-[32px] border-l border-grey border-solid lg:mb-0 ">
					<div id="counter2" data-prefix="<?php echo $environment_stat_2_prefix; ?>" data-decimalPlaces="<?php echo $environment_stat_2_decimal; ?>" data-suffix="<?php echo $environment_stat_2_suffix; ?>" data-decimalPlaces="1" data-value="<?php echo $environment_stat_2_figure; ?>" class="counter decimal font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
					<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
					<?php echo $environment_stat_2_caption; ?>
					</div>
				</div>
				<div class="counter-container pl-[24px] mb-[32px] border-l border-grey border-solid lg:mb-0">
					<div id="counter3" data-prefix="<?php echo $environment_stat_3_prefix; ?>" data-decimalPlaces="<?php echo $environment_stat_3_decimal; ?>" data-suffix="<?php echo $environment_stat_3_suffix; ?>" data-value="<?php echo $environment_stat_3_figure; ?>" class="counter font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
					<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
					<?php echo $environment_stat_3_caption; ?>
					</div>
				</div>
				<div class="counter-container pl-[24px] border-l border-grey border-solid">
					<div id="counter4" data-prefix="<?php echo $environment_stat_4_prefix; ?>" data-decimalPlaces="<?php echo $environment_stat_4_decimal; ?>" data-suffix="<?php echo $environment_stat_4_suffix; ?>" data-value="<?php echo $environment_stat_4_figure;?>" class="counter font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
					<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
						<?php echo $environment_stat_4_caption; ?>
					</div>
				</div>
			</div>
		</div>	
	</div>