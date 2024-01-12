<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gbrf
 */

get_header();
?>

	<section class="bg-orange min-h-screen flex items-center">
		<div class="container">
			<div class="row">
				<h1 class="text-blue leading-none text-xl font-semibold">Error code 404</h1>
			</div>
			<div class="row my-10">
				<h2 class="text-blue leading-none text-8xl">OOPS!</h2>
				<h2 class="text-white leading-none text-8xl">WE CAN'T SEEM TO FIND THE PAGE YOU'RE LOOKING FOR</h2>	
			</div>
			<div class="row flex justify-end">
			<a href="/" class="btn white-btn-outline text-blue border-blue hover:bg-blue hover:text-white">Back to Home<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
			</div>
		</div>
		

	</section>
<style>
	nav {
		display: none;
	}
</style>
<?php
get_footer();
