<?php
$privacy_slide_title = get_field('privacy_slide_title');
$privacy_introduction_text = get_field('privacy_introduction_text');
?>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[64px]" id="services" data-scroll-indicator-title="<?php echo $privacy_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $privacy_slide_title; ?><h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
		</div>
		<div class="container mt-[150px]">
			<div class="row lg:grid lg:grid-cols-2 gap-x-[150px]">
			<div class="col text-white">
					<?php echo $privacy_introduction_text; ?>					
				</div>
				<div class="col col2 lg:pr-[20%]">
                    <?php

                    // Check rows exists.
                    if( have_rows('privacy_subject') ):

                        // Loop through rows.
                        while( have_rows('privacy_subject') ) : the_row();

                            // Load sub field value.
                            $privacy_title = get_sub_field('privacy_title');
                            $privacy_details = get_sub_field('pricavy_details');
                        ?>
                        <div class="subject border-b border-grey py-[12px] mb-0">
                            <p class="subject-title text-white hover:text-orange hover:underline mb-0"><?php echo $privacy_title; ?></p>
                            <p class="subject-details hidden text-white my-[20px]"><?php echo $privacy_details; ?></p>
                        </div>
                        <?php
                        endwhile;
                    endif;

                    ?>
				</div>
			</div>
		</div>
	</div>
<script>
/*Expand Train when clicked on to show more information */
const subjects = document.querySelectorAll('.subject');
    for (let i = 0; i < subjects.length; i++) {
        subjects[i].addEventListener('click', (e) => {
            for (let j = 0; j < subjects.length; j++) {   
                if(j==i || subjects[j].classList.contains('active') ) {
                    subjects[j].classList.toggle('active');
                    subjects[j].querySelector('.subject-details').classList.toggle('hidden');
                } 
            }
            
        });
}
</script>