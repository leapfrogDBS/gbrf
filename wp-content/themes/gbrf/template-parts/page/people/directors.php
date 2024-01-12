<?php
$popup_heading = get_field('popup_heading');
$popup_heading_text = get_field('popup_heading_text');
$popup_copy = get_field('popup_copy');
$popup_button_text = get_field('popup_button_text');
$popup_button_link = get_field('popup_button_link');
$popup_logo = get_field('popup_logo');
?>

<div class="section header-bg-white bg-white counters header-orange fp-auto-height-responsive pb-[66px] flex flex-col justify-center" id="directors" data-scroll-indicator-title="Directors">
    <div class="slide-title text-blue">
        <div class="container  pl-[2%]"><img class="bullet-point blue" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg">Our Directors<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Directors</h2></div>
    </div>
    <img class=" hidden cursor-pointer down-arrow z-[101] bottom-[24px] h-[36px] w-[36px] md:bottom-[52px] rotate-90" src="<?php echo get_template_directory_uri();?>/img/arrow-lilac-right.svg">
    <div class="container pr-0 mt-[85px]">
        <div class="row">
            <div class="col col1 ">
                <?php
                $args = array(
                    'post_type'      => 'directors',
                    'posts_per_page' => 10,
                    'order' => 'ASC'
                );
                $loop = new WP_Query($args);
                if ( $loop->have_posts() ) {
                    $i = 0;
                    ?>
                    <div class="splide" id="directors-slider" >
                        <div class="splide__track">
                             <ul class="splide__list"> 
                    
                    <?php
                    while ( $loop->have_posts() ) {
                    $loop->the_post();
                    ?>
                    <?php
                    $director_image = get_field('director_image'); 
                    $director_copy = get_field('director_copy'); 
                    $director_name  = get_field('director_name'); 
                    $director_job_title = get_field('director_job_title'); 
                    
                    ?>

                    
                    <li class="splide__slide lg:min-h-[430px]">
                    
                        <div class="director min-h-[203vw] sm:min-h-[100vw] md:min-h-[600px] lg::min-h-0 text-[16px] leading-[22px] lg:flex md:gap-x-[45px] pr-[5vw] pb-[40px]">
                            <img class="w-full md:w-[230px] md:h-[230px] lg:w-auto lg:h-full object-cover object-top"src="<?php echo $director_image['url']; ?>">
                            <div>
                                <p class="text-blue mt-[24px]"><?php echo $director_name; ?></p>
                                <p class="text-blue font-bold"><?php echo $director_job_title; ?></p>    
                                <p class="text-blue mt-[16px]"><?php echo $director_copy; ?></p>
                            </div>
                        </div>
                    </li>
                    <?php 
                    
                    
                    
                    
                    }
                    ?>
                      </ul>
                        </div>
                    </div>      
                <?php    
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    			
</div>



<script>
// Get the modal
var modal = document.getElementById("modal");

// Get the button that opens the modal
var btn = document.getElementById("ownersBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.classList.toggle('hidden');
  document.querySelector('#directors').scrollIntoView();
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.classList.toggle('hidden');
}

</script>


<script>
    var splide2 = new Splide( '#directors-slider', {
            
        pagination: false,
        rewind: true,
        speed: '1000',
        type: 'slide',
        drag: true,
        snap: true,
        perMove: 1,
        perPage: 1,
        padding: { left: '0', right: '35vw' },
        grid: {
            rows: 2,
            gap : {
                row: '1rem',
                col: '135px',
            },
        },
        breakpoints: {
            1060: {
                padding: { left: '0', right: '25vw' }, 
            },
            580: {
                perPage: 1,
                grid: {
                    rows: 1,
                },
            },
            480: {
                padding: {right: '0'},

            },
        },          
    });
      splide2.mount( window.splide.Extensions );


</script>