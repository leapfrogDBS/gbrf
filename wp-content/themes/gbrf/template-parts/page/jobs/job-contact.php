<?php
$jobs_page_slide_title = get_field('jobs_page_slide_title');
$form_copy = get_field('form_copy');
$job_form_shortcode = get_field('job_form_shortcode');

?>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[150px]" id="jobs-enquire" data-scroll-indicator-title="<?php echo $jobs_page_slide_title; ?>">
	<div class="slide-title text-white">
		<div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $jobs_page_slide_title; ?><h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
	</div>
	<div class="container mt-[150px]">
		<div id="contact-form-row" class="row lg:grid lg:grid-cols-2 items-center">
			<div class="col col1 text-white">
				<?php echo $form_copy; ?>
			</div>			
			<div class="mt-[50px] col col lg:pl-[10vw] lg:mt-0">
			<?php echo do_shortcode($job_form_shortcode); ?>
				<div class="flex justify-end">
					<div onclick="submitForm()" id="custom-submit" class="btn text-white border-[1px] border-white hover:border-blue hover:bg-blue mt-[24px] lg:mt-0">Enquire<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></div>
				</div>					
			</div>
		</div>
	</div>
</div>

<script>

 function submitForm() {
	document.querySelector(".wpcf7-submit").click();
 }

</script>