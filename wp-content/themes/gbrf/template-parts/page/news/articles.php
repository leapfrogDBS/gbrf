<div class="section header-orange hidden md:block header-bg-white bg-white header-orange fp-auto-height-responsive pb-[40px]" id="articles" data-scroll-indicator-title="Articles">
	<div class="slide-title text-blue mt-[100px]">
		<div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg">Articles</div>
	</div>
    
	<div class="container pr-0 mt-[80px]">
        <div class="row mt-[40px] mb-[30px]">
            <div class="col">
                <h1 class="railfreight text-blue flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">Rail news</h1>
            </div>
        </div>
        <div class="row md:block pr-[12vw]">
            <div class="col flex flex-wrap gap-y-[10px] border-b-[1px] border-solid border-blue mb-[50px] pb-[20px]">
            <?php $categories = get_categories(); ?>
            <div class="btn cat-list_item active tablinks services our-services-button py-[8px] px-[16px] mr-[16px]  bg-white text-lilac border-lilac border-2 hover:text-white hover:bg-lilac hover:border-lilac" onclick="openCategory(event, 'all')">All Articles</div>

                <?php foreach($categories as $category) :  
                    if ($category->name != "uncategorized" && $category->category_count > 0)  {
                    ?>    
                        <div class="btn cat-list_item tablinks services our-services-button py-[8px] px-[16px] mr-[16px]  bg-white text-lilac border-lilac border-2 hover:text-white hover:bg-lilac hover:border-lilac" onclick="openCategory(event, '<?= $category->slug; ?>')"><?= $category->name; ?></div>
                    <?php
                    }
                    ?>

                <?php endforeach; ?>
                </ul>
            </div>
        </div>

		<div class="row">
            <div id ="all-articles" class="col col1">
                <?php 
                // the query
                $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                
                <?php if ( $wpb_all_query->have_posts() ) : 
                    $i = 0;
                    ?>            
                <div class="splide" id="articles-slider" >
                        <div class="splide__track">
                             <ul class="splide__list"> 
                                <!-- the loop -->
                                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                                    <?php
                                        $news_thumbnail_image = get_field('news_thumbnail_image'); 
                                        $news_header_image = get_field('news_header_image'); 
                                        $news_copy = get_field('news_copy'); 
                                        $news_exceprt = get_field('news_exceprt'); 
                                        $classes = "";
                                        foreach (get_the_category() as $category) {
                                            $classes .= $category->slug .' ';
                                        } 
                                        if (!$news_thumbnail_image) {
                                            $news_thumbnail_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                        } else {
                                            $news_thumbnail_image = $news_thumbnail_image['sizes']['large'];
                                        }
                                        if (!$news_exceprt) {
                                            $news_exceprt = get_the_excerpt();
                                        }
                                    ?>
                                    
                                    <li class="splide__slide mb-[42px]">
                                                                        
                                        <div class="lg:mr-[32px] md:min-h-[70vw] lg:min-h-[35vw] xl:min-h-[30vw] article pb-[40px] border-b border-grey lg:grid md:grid-cols-2 md:gap-x-[37px] md:pb-0 md:border-0 pr-[20px] <?php echo $classes; ?>">
                                            <img class="w-full lg:w-[21.5vw] min-h-full h-[35vw] lg:h-auto object-cover" data-splide-lazy="<?php echo $news_thumbnail_image; ?>"/>
                                            <div>        
                                                <div class="article-date mt-[20px]"><h4 class="uppercase text-lilac child:text-lilac font-bold"><?php the_category(' '); ?> -  <?php echo get_the_date(); ?></h4></div>
                                                <h3 class="text-blue font-bold mt-[6px] lg:mt-[10px] lg:text-[1.75vw] lg:leading-[1.1]"><?php the_title(); ?></h3>                               
                                                <p class="text-blue mb-[14px] lg:mb-[15px]"><?php echo strip_tags($news_exceprt); ?></p>
                                                <a class="read-more text-blue underline" href="<?php the_permalink(); ?>">Read more</a>
                                            </div>
                                        </div>

                                    </li>
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                 
                            </ul>
                        </div>
                    </div>
                
                
                    <?php wp_reset_query();   
                        wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

			</div>

            <div id ="filtered-posts" class="col col1">
                <?php 
                // the query
                $wpb_all_query2 = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                
                <?php if ( $wpb_all_query2->have_posts() ) : 
                   
                    ?>            
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-[42px]">
                    <!-- the loop -->
                    <?php while ( $wpb_all_query2->have_posts() ) : $wpb_all_query2->the_post(); ?>
                        <?php
                            $news_thumbnail_image = get_field('news_thumbnail_image'); 
                            $news_header_image = get_field('news_header_image'); 
                            $news_copy = get_field('news_copy'); 
                            $news_exceprt = get_field('news_exceprt'); 
                            $classes = "";
                            foreach (get_the_category() as $category) {
                                $classes .= $category->slug .' ';
                            } 
                            if (!$news_thumbnail_image) {
                                $news_thumbnail_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            } else {
                                $news_thumbnail_image = $news_thumbnail_image['sizes']['medium'];
                            }
                            if (!$news_exceprt) {
                                $news_exceprt = get_the_excerpt();
                            }
                        ?>
                        
                                             
                            <div class="lg:mr-[32px] lg:min-h-[30vh] article-filtered pb-[40px] border-b border-grey md:grid md:grid-cols-2 md:gap-x-[37px] mt-0  md:pb-0 md:border-0 <?php echo $classes; ?>">
                                <img class="w-full lg:w-[21.5vw] min-h-full object-cover" src="<?php echo $news_thumbnail_image; ?>"/>
                                <div>        
                                    <div class="article-date mt-[25px]"><h4 class="uppercase text-lilac child:text-lilac font-bold"><?php the_category(' '); ?> -  <?php echo get_the_date(); ?></h4></div>
                                    <h3 class="text-blue font-bold mt-[8px] lg:mt-[16px] lg:text-[1.75vw] lg:leading-[1.1]"><?php the_title(); ?></h3>                               
                                    <p class="text-blue mb-[16px] lg:mb-[24px]"><?php echo strip_tags($news_exceprt); ?></p>
                                    <a class="read-more text-blue underline" href="<?php the_permalink(); ?>">Read more</a>
                                </div>
                            </div>
                        
                        <?php endwhile; ?>
                        </div>
                    <!-- end of the loop -->
                
                
                
                    <?php wp_reset_query();   
                        wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

			</div>


		</div>
	</div>
</div>
<script>
    function openCategory(evt, category) {
        
        var filteredPosts = document.querySelector('#filtered-posts');
        var allPosts = document.querySelector('#all-articles');
        var downArrow =document.querySelector('#articles-down');
               
        if (!filteredPosts.style.maxHeight) {
            filteredPosts.style.maxHeight = filteredPosts.scrollHeight + "px";
            allPosts.remove();
            downArrow.classList.toggle('hidden');   
        }

        articles = document.querySelectorAll(".article-filtered");
        
        if (category == 'all') {
            for (i = 0; i < articles.length; i++) {
                if (articles[i].classList.contains('hide')) {
                    articles[i].classList.toggle('hide');
                }
            }
        } else {
            /*Inially hide all articles*/
            for (i = 0; i < articles.length; i++) {
                if (!articles[i].classList.contains('hide')) {
                    articles[i].classList.add('hide');
                }
            }

            /*Show selected*/
            for (i = 0; i < articles.length; i++) {
                if (articles[i].classList.contains(category)) {
                    articles[i].classList.toggle('hide');
                }
            }
        }
        
        
        /*Remove Active class from Buttons */
        catBtns = document.getElementsByClassName("cat-list_item");
        
        for (i = 0; i < catBtns.length; i++) {
            catBtns[i].className = catBtns[i].className.replace(" active", "");
        }
        /*Add active class to current button */
        evt.currentTarget.className += " active";
        
        /* Rebuild fullpage */
        
               
      
        
        document.querySelector('#articles').scrollIntoView();
    }

        


    
</script>
 

<script>
    var splide5 = new Splide( '#articles-slider', {
        lazyLoad: true,
        pagination: false,
        rewind: true,
        speed: '1000',
        type: 'slide',
        drag: true,
        snap: true,
        perMove: 1,
        perPage: 1,
        padding: { left: '0', right: '40vw' },
        grid: {
            rows: 2,
        },
        breakpoints: {
            980: {
                padding: { left: '0', right: '35vw' },
                grid: {
                    rows: 1,
                    gap : {
                        row: '40px',
                        col: '80px',
                    },
                },
            },
            580: {
                perPage: 1,
                
            },
        },          
    });
      splide5.mount( window.splide.Extensions );


</script>