<?php
$home_slide_title = get_field('home_slide_title');
$home_slide_image = get_field('home_slide_image');
$home_slide_copy = get_field('home_slide_copy');
$home_button_label = get_field('home_button_label');
$home_button_link = get_field('home_button_link');

$home_stat_1_decimal = get_field('home_stat_1_decimal');
$home_stat_1_prefix = get_field('home_stat_1_prefix');
$home_stat_1_figure = get_field('home_stat_1_figure');
$home_stat_1_suffix = get_field('home_stat_1_suffix');
$home_stat_1_caption = get_field('home_stat_1_caption');
$home_stat_2_decimal = get_field('home_stat_2_decimal');
$home_stat_2_prefix = get_field('home_stat_2_prefix');
$home_stat_2_figure = get_field('home_stat_2_figure');
$home_stat_2_suffix = get_field('home_stat_2_suffix');
$home_stat_2_caption = get_field('home_stat_2_caption');
$home_stat_3_decimal = get_field('home_stat_3_decimal');
$home_stat_3_prefix = get_field('home_stat_3_prefix');
$home_stat_3_figure = get_field('home_stat_3_figure');
$home_stat_3_suffix = get_field('home_stat_3_suffix');
$home_stat_3_caption = get_field('home_stat_3_caption');
$home_stat_4_decimal = get_field('home_stat_4_decimal');
$home_stat_4_prefix = get_field('home_stat_4_prefix');
$home_stat_4_figure = get_field('home_stat_4_figure');
$home_stat_4_suffix = get_field('home_stat_4_suffix');
$home_stat_4_caption = get_field('home_stat_4_caption');

?>

<div class="section header-bg-white bg-white counters header-orange fp-auto-height-responsive pt-0 pb-[110px]" id="home-slide" data-scroll-indicator-title="<?php echo $home_slide_title; ?>">
		<div class="slide-title text-blue">
			<div class="container px-[2%]"><img class="bullet-point blue" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg"><?php echo $home_slide_title; ?></div>
		</div>
		<div class="container flex flex-col justify-center mt-[50px]">
			<div class="row mt-[30px] border-b-[1px] border-solid border-blue mb-[65px] lg:mt-0">
				<div class="col">
					<h1 class="text-blue railfreight flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">GB Railfreight</h1>
				</div>
			</div>
			<div class="row haulage-row lg:grid lg:grid-cols-2 gap-x-[20px]">

				<div class="col text-blue mb-[50px]">
					<?php echo $home_slide_copy; ?>
                    <?php if($home_button_label && $home_button_link) { ?>
					    <a href ="<?php echo $home_button_link['url']; ?>" class="btn white-btn mt-[24px]"><?php echo $home_button_label; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
                    <?php } ?>
				</div>
				<div class="col numbers-row lg:grid lg:grid-cols-2  lg:gap-y-[40px] lg:gap-x-[20px]">
					<div>
						<div class="counter-container pl-[24px] mb-[32px] border-l-2 border-grey border-solid lg:mb-0">
						<div id="counter1" data-prefix="<?php echo $home_stat_1_prefix; ?>" data-suffix="<?php echo $home_stat_1_suffix; ?>" data-decimalPlaces="<?php echo $home_stat_1_decimal; ?>" data-value="<?php echo $home_stat_1_figure; ?>" class="counter font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
							<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
							<?php echo $home_stat_1_caption; ?>
							</div>
						</div>
					</div>
					<div>
						<div class="counter-container pl-[24px] mb-[32px] border-l-2 border-grey border-solid lg:mb-0 ">
							<div id="counter2" data-prefix="<?php echo $home_stat_2_prefix; ?>" data-suffix="<?php echo $home_stat_2_suffix; ?>" data-decimalPlaces="<?php echo $home_stat_2_decimal; ?>" data-value="<?php echo $home_stat_2_figure; ?>" class="counter font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
							<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
							<?php echo $home_stat_2_caption; ?>
							</div>
						</div>
					</div>
					<div>
						<div class="counter-container pl-[24px] mb-[32px] border-l-2 border-grey border-solid lg:mb-0">
							<div id="counter3" data-prefix="<?php echo $home_stat_3_prefix; ?>" data-suffix="<?php echo $home_stat_3_suffix; ?>" data-decimalPlaces="<?php echo $home_stat_3_decimal; ?>" data-value="<?php echo $home_stat_3_figure; ?>" class="counter font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
							<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
							<?php echo $home_stat_3_caption; ?>
							</div>
						</div>
					</div>
					<div>
						<div class="counter-container pl-[24px] border-l-2 border-grey border-solid">
							<div id="counter4" data-prefix="<?php echo $home_stat_4_prefix; ?>" data-suffix="<?php echo $home_stat_4_suffix; ?>" data-decimalPlaces="<?php echo $home_stat_4_decimal; ?>" data-value="<?php echo $home_stat_4_figure;?>" class="counter font-extrabold flex items-center uppercase text-lilac mb-[8px] text-[60px] lg:text-[107px] tracking-tight leading-[80%]">0</div>
							<div class="counter-subtext font-extrabold text-lilac text-[24px] leading-[1.1em]">
							<?php echo $home_stat_4_caption; ?>
						</div>
					</div>
				</div>
			</div>
			</div>

		</div>
	</div>
