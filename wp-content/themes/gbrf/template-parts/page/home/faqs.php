<?php
$faqs_slide_title = get_field('faqs_slide_title');
$faqs_button_label = get_field('faqs_button_label');
$faqs_button_link = get_field('faqs_button_link');
?>

<div class="section header-bg-lilac fp-auto-height-responsive bg-lilac pt-0 pb-[80px]" id="ethics" data-scroll-indicator-title="<?php echo $faqs_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $faqs_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Faqs</h2></div>
		</div>
		<div class="container mt-[45px]">
			<div class="row h-full flex flex-col justufy-center lg:justify-between">
				<div class="col text-white">

				<?php while( have_rows('faq')) : the_row();
						$faq_question = get_sub_field('faq_question');
						$faq_answer = get_sub_field('faq_answer');
						 ?>
						<div class="faq-container pt-[24px] pb-[32px] border-b border-white">
								<div class="faq-question-container flex items-center duration-[0.4s] cursor-pointer">
									<img class="mr-[75px] duration-[0.4s] hidden lg:block"src="<?php echo get_template_directory_uri();?>/img/plus.svg"><h2 class="uppercase text-[44px] lg:text-[63px]"><?php echo $faq_question; ?></h2>
								</div>
							<p class="answer overflow-hidden text-white text-[16px] lg:text-[18px] lg:mt-0 lg:ml-[115px]"><?php echo $faq_answer; ?></p>
						</div>	
				
					<?php endwhile; ?>
				</div>		

				<div class="col">	
					<?php echo $faqs_slide_copy; 
					if ($faqs_button_label && $faqs_button_link) { ?>
						<a href="<?php echo $faqs_button_link['url']; ?>" class="btn white-btn-outline mt-[50px]"><?php echo $faqs_button_label; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
					<?php } ?>
				
				</div>
			</div>
		</div>
	</div>