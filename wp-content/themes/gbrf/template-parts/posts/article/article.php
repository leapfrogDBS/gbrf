<?php
$news_article_section_header = get_field('news_article_section_header');
$news_copy = get_field('news_copy');
$news_secondary_image = get_field('news_secondary_image');

if (!$news_copy) {
    $news_copy = get_the_content();
}

?>


<div class="section header-bg-lilac fp-auto-height-responsive bg-lilac pb-[50px] relative" id="wellbeing" data-scroll-indicator-title="Article">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Article<h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
    </div>
    <div class="container mt-[30px]">
        <div class="row lg:grid lg:grid-cols-5 items-center lg:gap-x-[40px]">
            <div class="col lg:order-2 lg:col-span-2">
                <?php
                if ($news_secondary_image) {  
                ?>
                    <img class="w-full m-auto lg:mr-0 ml-auto mb-[60px]" src="<?php echo $news_secondary_image['url']; ?>">
                <?php
                }
                ?>
                <div class="col hidden lg:flex justify-end lg:pl-[15%]">
                <?php $next_post = get_adjacent_post(false, '', true);
                    if(!empty($next_post)) { ?>
                    <div class="flex items-center gap-x-[16px] lg:gap-x-[32px]">
                        <?php 
                            $news_thumbnail_image = get_field('news_thumbnail_image', $next_post->ID ); 
                        
                            if (!$news_thumbnail_image) {
                                if (has_post_thumbnail()) {
                                    $news_thumbnail_image = get_the_post_thumbnail_url($next_post->ID);
                                } else {
                                    $news_thumbnail_image = get_template_directory_uri() . "/img/article-fallback.svg";
                                }
                            } else {
                                $news_thumbnail_image = $news_thumbnail_image['url'];
                            }
                        ?>
                        <img class="w-[165px] h-[130px] object-contain lg:w-[115px] lg:h-[115px]" src="<?php echo $news_thumbnail_image; ?>">
                        <div class="flex-1">
                            <h4 class="text-yellow uppercase font-bold font-[Halisa] text-[18px]">Read Next Story</h4>
                            <?php
                            echo '<a class="text-white underline mt-[8px]" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>'; 
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col lg:order-1 text-white lg:col-span-3 pr-[4%]">
                <div class="article-date mt-[24px] mb-[16px] lg:mt-0"><h4 class="uppercase text-yellow visited:text-yellow child:text-yellow font-bold"><?php the_category(' '); ?> -  <?php echo get_the_date(); ?></h4></div>
                <?php
                    if ($news_article_section_header) {
                    ?>    
                    <div class="text-white uppercase child:lg:text-[63px]">
                        <?php echo $news_article_section_header; ?>
                    </div>
                    <?php
                    }
                    ?>
                <div class="text-white mt-[32px]" id="article-copy">
                    <?php echo $news_copy; ?>
                </div> 
                <div class="mt-[80px]"> 
                    <a href="<?php echo get_home_url(); ?>/news" class="btn white-btn-outline p-[8px] pr-[16px]"><img class="btn-icon rotate-180" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden rotate-180" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg">Back to News</a>                       
                </div>
            </div>
            <div class="col flex lg:hidden justify-start lg:pl-[15%] mt-[60px]">
                <?php $next_post = get_adjacent_post(false, '', true);
                    if(!empty($next_post)) { ?>
                    <div class="flex items-center gap-x-[16px] lg:gap-x-[32px]">
                    <?php 
                            $news_thumbnail_image = get_field('news_thumbnail_image', $next_post->ID ); 
                        
                            if (!$news_thumbnail_image) {
                                $news_thumbnail_image = get_the_post_thumbnail_url($next_post->ID);
                            } else {
                                $news_thumbnail_image = $news_thumbnail_image['url'];
                            }
                        ?>
                        <img class="w-[165px] h-[130px] object-cover lg:w-[115px] lg:h-[115px]" src="<?php echo $news_thumbnail_image; ?>">
                        <div class="flex-1">
                            <h4 class="text-yellow uppercase font-bold font-[Halisa] text-[18px]">Read Next Story</h4>
                            <?php
                            echo '<a class="text-white underline mt-[8px]" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>'; 
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
