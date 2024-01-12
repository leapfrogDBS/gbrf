<?php
$enquire_page_slide_title = get_field('enquire_page_slide_title');
$enquire_heading = get_field('enquire_heading');
$enquire_button_one_text = get_field('enquire_button_one_text');
$enquire_button_one_link = get_field('enquire_button_one_link');
$enquire_button_two_text = get_field('enquire_button_two_text');
$enquire_button_two_link = get_field('enquire_button_two_link');
$cf_sortcode = get_field('cf_shortcode', 'option');

?>

<div class="section header-bg-lilac fp-auto-height-responsive bg-lilac pb-8 lg:pb-[150px]" id="enquire" data-scroll-indicator-title="<?php echo $enquire_page_slide_title; ?>">
	<div class="slide-title text-white">
		<div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $enquire_page_slide_title; ?></div>
	</div>
	<div class="container mt-[150px]">
		<div class="row mt-[40px] mb-[30px]">
            <div class="col">
                <h1 class="railfreight text-white flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">Contact</h1>
            </div>
        </div>
		<div id="contact-form-row" class="row lg:grid lg:grid-cols-2 items-center">
			<div class="col col1">
				<h2 class="uppercase text-white">If you are a potential Customer interested in working with GB Railfreight, please FILL OUT OUR ENQUIRY FORM.</h2>
			</div>			
			<div class="mt-[50px] col col lg:pl-[10vw] lg:mt-0">
			<?php echo do_shortcode($cf_sortcode); ?>
				<div class="flex justify-end">
					<div onclick="submitForm()" id="custom-submit" class="btn text-white border-[1px] border-white hover:border-blue hover:bg-blue md:mt-[24px] lg:mt-0">Enquire<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></div>
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