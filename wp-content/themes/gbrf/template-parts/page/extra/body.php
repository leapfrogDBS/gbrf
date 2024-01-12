<?php
$terms_slide_title = get_field('terms_slide_title');
$terms_left_column_copy = get_field('terms_left_column_copy');
$orange_background = get_field('orange_background');
$this_background;
$pip_color;
$bullet = "white-bullet.svg";

$include_signature_footer = get_field('include_signature_footer');
$sign_year = get_field('sign_year');

if ($orange_background) {
    $this_background = "bg-orange blue-logo";
    $pip_color = "text-blue";
    $bullet = "blue-bullet.svg";
} else {
    $this_background = "bg-blue";
    $pip_color = "text-white";
}

?>


<div class="section <?php echo $this_background; ?> active fp-auto-height-responsive min-h-screen pb-[64px] overflow-y-visible" id="free-text" data-scroll-indicator-title="<?php echo $terms_slide_title; ?>">
    <div class="<?php echo $pip_color; ?> pt-[140px] hidden md:block">
    <?php 
    if ($terms_slide_title) { 
    ?>
        
            <div class="container pl-[2%] font-bold flex items-center"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/<?php echo $bullet; ?>"><?php echo $terms_slide_title; ?><h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
        
    <?php 
    }
    ?>
    </div>

    <div class="container pt-[100px] lg:pt-[50px]">
        <div class="row">
            <div id="details" class="col text-white md:columns-2  xl:columns-1 gap-x-[42px]">
                <?php echo $terms_left_column_copy; ?>
                <?php $iteration = 1; ?>
                <?php while( have_rows('terms_right_column_copy')) : the_row();
                    $terms_section_title = get_sub_field('terms_section_title');
                    $terms_section_copy = get_sub_field('terms_section_copy');
                ?>
                <div class="section-container mb-[48px] break-inside-avoid">
                    <h4 class="text-white font-bold mb-[16px] text-[18px] lg:block"><?php echo $terms_section_title; ?></h4>
                    <?php echo $terms_section_copy; ?>
                </div>
                <?php 
                $iteration++;
                endwhile; ?>	
            </div>
        </div>
    </div>
	
</div>

<?php
if ($include_signature_footer) {

?>

<div id="footer-signature-1" class="section text-blue py-16 border-b border-blue">
    <div class="container">
        <div class="row lg:w-1/2 mb-12">
            <div class="col">
                <p class="font-bold">As the board of Directors we pledge our commitment to these goals and will report progress on a biannual basis.</p>
            </div>
        </div>
        <div class="row sm:flex justify-between">
            <div class="col flex flex-col col-span-6">
                <div class="flex items-center mb-[30px]">
                    <p class="mb-0">Signed</p>
                    <img class="w-[200px] ml-[50px]" src="<?php echo get_template_directory_uri();?>/img/signature.png" >
                </div>
                <p>January <?php echo $sign_year; ?></p>
            </div>
            <div class="col flex flex-col justify-end">
                <p class="mb-1">John Smith</p>
                <p class="font-bold mb-1">Managing Partner</p>
                <p class="font-bold mb-1">GB Railfreight</p>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

<script>
document.addEventListener("DOMContentLoaded", function(){
    var section = document.querySelector('#free-text');
    if (section.classList.contains('blue-logo')) {
        var logo = document.querySelector('#logo-container img');
        var blueLogo = logo.getAttribute('data-blue');
        document.querySelector('.desktop-header-container').classList.add('blue');
        document.querySelector('.desktop-header-container nav').style.background = "#FF7A00";
        logo.src = blueLogo;
    }
});

</script>