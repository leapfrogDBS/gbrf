<?php
$cc_slide_title = get_field('cc_slide_title');
$cc_title = get_field('cc_title');
$cc_copy = get_field('cc_copy');
$cc_footnote = get_field('cc_footnote');
?>

<div class="section relative header-bg-orange fp-auto-height-responsive bg-orange pb-[50px] overflow-hidden" id="carbon-calculator" data-scroll-indicator-title="<?php echo $cc_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $cc_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Carbon Calculator</h2></div>
		</div>
		<div class="container ">
			<div class="row lg:grid lg:grid-cols-2 lg:gap-x-[200px]  pt-[50px] lg:pt-[165px] lg:pb-[165px] pb-[50px]">
                <div class="col pb-[50px] relative z-10">
                    <h2 class="text-white uppercase lg:text-[90px] lg:leading-[80px]">
                        <?php echo $cc_title; ?>
                    </h2>
                    <div class="text-white mt-[16px] lg:mt-[32px]">
                        <?php echo $cc_copy; ?>
                        <p class="text-white text-sm"><?php echo $cc_footnote; ?></p>
                    </div>
                </div>
                <div class="col">
                    <div class="form">
                        <label for="tonnes" class="text-blue font-bold block uppercase font-[Halisa] text-[18px] ml-[16px] mb-[10px]">Tonnes</label>
                        <input type="number" id="tonnes" name="tonnes" placeholder="0,000 Tonnes" class="block border-0 w-full p-[16px] rounded-lg placeholder-grey">
                        <label for="Kilometres" class="text-blue font-bold block uppercase font-[Halisa] text-[18px] ml-[16px] mb-[10px] mt-[40px]">Kilometres</label>
                        <input type="number" id="kilometres" name="kilometres" placeholder="0,000 Kilometres" class="block border-0 w-full p-[16px] rounded-lg placeholder-grey">
                        <div class="relative">
                            <div class="hidden lg:block absolute top-1/2 right-full translate-x-[6px] -translate-y-[50%] z-10 pointer-events-none">
                                <?php include(locate_template('img/cc-img2.svg'));?>
                            </div>
                            <div onclick="calculate()"  class="btn orange-btn orange-btn-2 mt-[24px] lg:mt-[32px] flex justify-center text-center py-[17px] hover:bg-blue hover:text-white relative z-10">Calculate</div>
                        </div>

                    </div>
                    <div class="form-answer mt-[72px]">
                        <p for="savings" class="text-blue font-bold block uppercase font-[Halisa] text-[18px] ml-[16px] mb-[10px]">Savings</p>
                        <div id="savings-wrap" class="block border-0 w-full p-[16px] rounded-lg bg-white h-[56px] text-grey select-none">
                            <span id="savings">0</span> <span>KG Per Tonne</span>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="hidden lg:block absolute -translate-x-[72%] -translate-y-[78.25%] pointer-events-none">
                            <?php include(locate_template('img/cc-img1.svg'));?>
                        </div>
                        <a href="#" class="btn orange-btn orange-btn-2 mt-[24px] lg:mt-[32px] w-full flex justify-center py-[17px] hover:bg-blue hover:text-white relative z-10">Enquire about New Business<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
                    </div>
                </div>
			</div>
		</div>
	</div>

<script>
    function calculate() {

        //(km*0.10749) – (km*0.02782) = CO2e saving per tonne of goods moved

        let tonnes = document.getElementById("tonnes").value;
        let kilometres = document.getElementById("kilometres").value;
        let savings = document.getElementById("savings");
        let answer = tonnes * ((0.10749 * kilometres) - (0.02782 * kilometres));
        savings.innerHTML = answer;

        if ( answer > 0 ) {
            document.querySelector('#savings-wrap').classList.remove('text-grey');
        } else {
            document.querySelector('#savings-wrap').classList.add('text-grey');
        }
    }
</script>
