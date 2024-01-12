<?php
$news_header_image = get_field('news_header_image');
$news_header_title = get_field('news_header_title');

$fallback = "";

if (!$news_header_image) {
    if (has_post_thumbnail()) {
        $news_header_image = get_the_post_thumbnail_url();
    } else {
        $news_header_image = "";
        $fallback = "fallback";
    }
} else {
    $news_header_image = $news_header_image['url'];
}

if (!$news_header_title) {
    $news_header_title = "<h2>" . get_the_title() . "</h2>";
    
}

?>
<div class="section header-bg-transparent items-end bg-cover bg-center bg-no-repeat pb-[56px] justify-end <?php echo $fallback; ?>" id="article-header" style="background-image: url(<?php echo esc_url($news_header_image); ?>)" data-scroll-indicator-title="Introduction">
<div class="slide-title text-white l-0 w-full z-[9999]">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Introduction</div>
    </div>	
    <span id="overlay" class="absolute bg-[#0E0F20] opacity-20 z-1 inset-0"></span>
   
    <div class="container absolute bottom-[40px]">
        <div class="row">
            <div class="col col1 text-white uppercase lg:max-w-[770px] article-title-text">
                <?php echo $news_header_title; ?>
            </div>
        </div>
    </div>
</div>