<?php
get_header();
?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>
<div id="jobApp" class="icims-template">
	<div class="section header-orange header-bg-white bg-white header-orange">
		<div class="container">
			<div class="row mt-[7rem] md:mt-48 mb-8">
				<div class="col text-blue uppercase mb-8">
					<p class="font-bold mb-0">Career Opportunities</p>
					<h2 class=" md:text-6xl lg:text-8xl">Job Listings</h2>
				</div>
				<div class="col lg:max-w-[60%] text-black">
					<p class="font-bold">Here are our current job openings. Please click on the job title for more information, and apply if you are interested.</p>
				</div>
			</div>
			<div class="row mt-12 mb-12 lg:mb-24">
				<div class="col">
					<div>
						<div class="lg:grid lg:grid-cols-8 gap-x-6 mt-6 xxl:grid-cols-7">
							<div class="flex flex-col col-span-2 mb-6 lg:mb-0">
								<label class="block leading-[20px] text-[14px] md:text-lg  text-blue font-bold" for="search">Search</label>
								<input @keyup.prevent.enter="searchJobs()" v-model="searchTerm" class="h-11 block w-full border-blue border-2 bg-white px-4 py-1" type="text" id="search" name="search" placeholder="Start your job search here">
							</div>
							<div class="flex flex-col col-span-2 justify-center mb-6 lg:mb-0">
								<label class="block text-lg text-blue font-bold" for="job-categories">Category</label>
								<select v-model="selectedCategory" class="px-4 h-11 block bg-white border-blue border-2 w-full py-1" name="job-categories" id="job-categories">
									<option value="">All</option>
									<option v-for="category in categories" :value='category.id' :key="category.id">{{category.value}}</option>
								</select>
							</div>
							<div class="flex flex-col col-span-2 justify-center"><label class="block text-lg text-blue font-bold" for="job-locations">Location</label>
								<select v-model="selectedLocation" class="px-4 h-11 block bg-white border-blue border-2 w-full py-1" name="job-locations" id="job-locations">
									<option value="">All</option>
									<option v-for="location in locations" :value='location.id' :key="location.id">{{location.value}}</option>
								</select>
							</div>
							<div class="flex flex-col col-span-2 xxl:col-span-1 lg:items-center lg:justify-end mt-8 md:mt-0">
								<div class="flex md:mt-[30px] lg:mt-0" @click="searchJobs">
									<div :class="loading && categories.length && locations.length ? 'bg-blue' : ''" class="btn orange-btn orange-btn-2 flex justify-center hover:bg-blue hover:text-white relative text-[13px] lg:text-[16px] p-[8px] pl-[30px] z-10">
										<span>Search</span>
										<img v-if="loading && categories.length && locations.length" class="animate-spin w-7 h-7" src="<?= get_template_directory_uri() ?>/img/loading-white.svg">
										<img v-else class="w-7 h-7 " src="<?= get_template_directory_uri() ?>/img/arrow-white-right.svg">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		

			<div v-if="splitArray.length" class="row mb-[20px] lg:mb-[60px]">
				<div class="col">
					<h2 class="text-blue uppercase font-extrabold text-3xl lg:text-6xl">Results</h2>
				</div>
			</div>
			<div class="col">
				<div v-for="job in splitArray[pageIndex]" class="job-container border-b-2 border-grey-500 pb-[20px] mb-[20px] lg:pb-[30px] lg:mb-[30px]">
					<p class="text-lilac uppercase font-extrabold mb-0">{{job['header'][3].value}}</p>
					<a :href="`<?= home_url(); ?>/careers-job-details/?endpoint=${job.portalData.self}&portalUrl=${job.portalData.portalUrl}`">
						<h3 class="font-bold text-blue mb-3 text-[30px]">{{job['header'][0].value}}</h3>
					</a>
					<div class="row lg:grid lg:grid-cols-12">
						<div class="col col-span-9 leading-4">
							<p class="text-black leading-[20px] text-[14px] md:text-lg  body-text lg:mb-[30px]" v-html="strippedContent(job['description'][0].value)"></p>
							<p class="text-sm text-lilac">Job ID: {{job['header'][1].value}} | Posted: {{job['header'][6].value}}</p>
						</div>
						<div class="col col-span-3 lg:flex flex-col gap-y-3 lg:items-end">
							<a :href="job.portalData.portalUrl" class="mt-[30px]  lg:my-0 mr-4 btn orange-btn-outline text-[13px] lg:text-[16px]" target="_blank">Apply Now
								<img class="btn-icon" src="<?= get_template_directory_uri(); ?>/img/arrow-orange-right.svg">
								<img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri(); ?>/img/arrow-white-right.svg">
							</a>
							<a class="btn white-btn text-[13px] lg:text-[16px]" :href="
								`<?= home_url(); ?>/careers-job-details/?endpoint=${job.portalData.self}&portalUrl=${job.portalData.portalUrl}`">Find Out More
								<img class="btn-icon" src="<?= get_template_directory_uri() ?>/img/arrow-blue-right.svg">
								<img class="btn-icon-hover hidden" src="<?= get_template_directory_uri() ?>/img/arrow-white-right.svg">
							</a>
						</div>
					</div>
				</div>
				<div v-if="detailedResults.length && detailedResults.length" class="flex justify-between gap-x-3 items-center">
					<button v-if="detailedResults.length && pageIndex > 0" @click="pageIndex--" class="btn white-btn hidden lg:flex">
						<img class="btn-icon  transform rotate-180" src="<?= get_template_directory_uri() ?>/img/arrow-blue-right.svg">
						<img class="btn-icon-hover hidden  transform rotate-180" src="<?= get_template_directory_uri() ?>/img/arrow-white-right.svg">
						Previous Page
					</button>
					<div class="flex gap-3 justify flex-wrap">
						<div @click="pageIndex=i-1" :class="i == pageIndex+1 ? 'bg-orange text-white border-orange hover:bg-blue hover:border-blue' : 'border-blue border-2 text-blue hover:bg-orange font-bold hover:border-orange'" v-for="i in pageCount" class="text-center cursor-pointer rounded-full pt-1.5 h-10 w-10 align-middle  hover:text-white z-10  border-2 ">
							{{i}}
						</div>
					</div>

					<button v-if="pageIndex != i && pageIndex+1 < pageCount" @click="pageIndex++" class="btn white-btn hidden lg:flex ">Next Page
						<img class="btn-icon" src="<?= get_template_directory_uri() ?>/img/arrow-blue-right.svg">
						<img class="btn-icon-hover hidden" src="<?= get_template_directory_uri() ?>/img/arrow-white-right.svg">
					</button>

				</div>
				<img style="height: 100px;width: 100px;margin: auto;text-align: center;display: block;;" v-if="loading && categories.length && locations.length" class="animate-spin w-12 h-12 mx-auto block text-center  " src="<?= get_template_directory_uri() ?>/img/loading-orange.svg">
				<h3 v-if="searchBegun && detailedResults.length == 0" class="text-orange text-bold">Sorry, there are no job listings matching your search.</h3>
			</div>
		</div>
	</div>
</div>
<style>
	.scroll-indicator-controller.blue-menu{
		display: none !important;
	}
</style>
<script>
	var logo = document.querySelector('#logo-container img');
	var orangeLogo = logo.getAttribute('data-orange');
	var searchIcon = document.querySelector('#search-icon')
	var orangeSearchIcon = searchIcon.getAttribute('data-orange');
	document.querySelector('.desktop-header-container').classList.add('orange');
	document.querySelector('.desktop-header-container nav').style.background = "#fff";
	logo.src = orangeLogo;
	searchIcon.src = orangeSearchIcon;
</script>
<script>
	function submitForm() {
		document.querySelector(".submit-button").click();
	}
</script>
<?php
include(locate_template('template-parts/footer.php'));
get_footer();
