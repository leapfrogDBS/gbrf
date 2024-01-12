<?php
$certificates_slide_title = get_field('certificates_slide_title');
$certificates_heading = get_field('certificates_heading');
$zip = get_field('pdf_zip', 'option');

?>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[64px]" id="training" data-scroll-indicator-title="<?php echo $certificates_slide_title; ?>">
    <div class="slide-title text-white">
        <div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $certificates_slide_title; ?><h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
    </div>
    <div class="container mt-[150px]">
        <div class="row">
            <div class="col text-white uppercase pr-[10%]">
                <?php echo $certificates_heading; ?>
            </div>
        </div>
        <div class="row"> 
            <h4 class="text-white font-bold mt-[56px] mb-[32px] lg:mt-[130px]">Select Report(s) to Download</h4>
            <div>    
                <div class="flex-1 grid grid-cols-1 lg:grid-cols-2 lg:gap-x-[36px] pr-[10%]">
                    <?php while( have_rows('pdf', 'option')) : the_row();
                        $pdf_title = get_sub_field('pdf_title');
                        $link_to_pdf = get_sub_field('link_to_pdf');                                             
                        $pdf_link = get_sub_field('pdf_link');
                        $page_link = get_sub_field('cert_page_link');
                        if ($link_to_pdf) { ?>
                            <a href="<?php echo $pdf_link['url']; ?>" download="<?php echo $pdf_title; ?>" class="pdf-link text-white hover:text-orange hover:underline visited:text-white text-[16px] border-b border-grey py-[12px] lg:py-[7px] lg:text-[18px]"><?php echo $pdf_title; ?></a>
                        <?php
                        } else { ?>
                            <a href="<?php echo $page_link; ?>" target="_blank" class="pdf-link text-white hover:text-orange hover:underline visited:text-white text-[16px] border-b border-grey py-[12px] lg:py-[7px] lg:text-[18px]"><?php echo $pdf_title; ?></a>
                        <?php
                        }
                    ?>
                        
                        
                
                    <?php endwhile; ?>                           
                </div>
                <div class="mt-[24px] lg:flex lg:items-end lg:first-letter:justify-end lg:mt-0">
                    <a href="<?php echo $zip['url']; ?>" id="download-all" class="mt-[30px] btn white-btn-outline">Download all PDFs<img class="btn-icon rotate-90" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover rotate-90 hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
                </div>
            </div>    
        </div>            
    </div>
</div>

