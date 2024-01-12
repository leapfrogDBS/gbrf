<?php

/**
 * gbrf functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gbrf
 */
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gbrf_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on gbrf, use a find and replace
		* to change 'gbrf' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('gbrf', get_template_directory() . '/languages');
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');
	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'gbrf'),
		)
	);
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'gbrf_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'gbrf_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gbrf_content_width()
{
	$GLOBALS['content_width'] = apply_filters('gbrf_content_width', 640);
}
add_action('after_setup_theme', 'gbrf_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gbrf_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'gbrf'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'gbrf'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'gbrf_widgets_init');
/**
 * Enqueue scripts and styles.
 */
function gbrf_scripts()
{
	wp_enqueue_style('gbrf-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('gbrf-style', 'rtl', 'replace');
	wp_enqueue_script('gbrf-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'gbrf_scripts');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Hide the Page and Post Content Editor - Gutenberg
 */
add_action('init', function () {
	remove_post_type_support('case_study', 'editor');
	remove_post_type_support('train', 'editor');
	remove_post_type_support('directors', 'editor');
	remove_post_type_support('testimonials', 'editor');
	remove_post_type_support('staff', 'editor');
	remove_post_type_support('page', 'editor');
}, 99);


function get_jobs($field)
{
	global $wpdb;
	$table_name = $wpdb->prefix . $field;

	// Fetch the data from the database
	$read_data = $wpdb->get_row("SELECT json_data FROM $table_name WHERE id = 1", ARRAY_A);

	if (!empty($read_data)) {
		$portal_data = json_decode($read_data['json_data'], true); // Convert JSON string to associative array
		return new WP_REST_Response(json_encode($portal_data), 200); // Re-encode to JSON and return
	} else {
		return new WP_REST_Response(json_encode(['message' => 'Data not found']), 404); // Return JSON-encoded error message
	}
}


add_action('rest_api_init', function () {
	register_rest_route('yournamespace/v1', '/getjobs/', array(
		'methods' => 'GET',
		'callback' => 'get_jobs',
	));
});


function add_custom_scripts()
{

	wp_enqueue_script('jobs-js',  get_template_directory_uri() . '/js/jobs.js');
	wp_localize_script('jobs-js', 'careersData', array(
		"site_url" => site_url(),
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'filters' => get_jobs('filters'),
		'portal_data' => get_jobs('portal_data')

	));
	wp_enqueue_script('splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js');
	wp_enqueue_script('splide-grid-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-grid@0.4.1/dist/js/splide-extension-grid.min.js');
	wp_enqueue_style('splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css');
	wp_enqueue_style('tailwind-css', get_template_directory_uri() . '/css/tailwind.css');
	wp_enqueue_style('google-font-css', 'https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
	wp_enqueue_style('theme-style-css', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('scrolldots-css', get_template_directory_uri() . '/css/easyScrollDots.min.css');
	wp_enqueue_script('countup-js', get_template_directory_uri() . '/js/countUp.js');
	wp_enqueue_script('scrolldots-js', get_template_directory_uri() . '/js/easyScrollDots.min.js');
	wp_enqueue_script('app-js', get_template_directory_uri() . '/js/app.js');
}
add_action('wp_enqueue_scripts', 'add_custom_scripts');
if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}
function include_jQuery()
{
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, '1.8.3');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'include_jQuery');
function create_testimonial_posttype()
{
	$args = array(
		'labels' => array(
			'name' => 'Testimonials',
			'singular_name' => 'Testimonial',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('testimonials', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_testimonial_posttype');
function create_director_posttype()
{
	$args = array(
		'labels' => array(
			'name' => 'Directors',
			'singular_name' => 'Director',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('directors', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_director_posttype');
function create_staff_posttype()
{
	$args = array(
		'labels' => array(
			'name' => 'Staff Members',
			'singular_name' => 'Staff Member',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('staff', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_staff_posttype');
function create_case_study_posttype()
{
	$args = array(
		'labels' => array(
			'name' => 'Case Studies',
			'singular_name' => 'Case Study',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('case_study', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_case_study_posttype');
/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies()
{
	// Add new "Locations" taxonomy to Posts
	register_taxonomy('location', 'case_study', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x('Category', 'taxonomy general name'),
			'singular_name' => _x('Category', 'taxonomy singular name'),
			'search_items' =>  __('Search Categories'),
			'all_items' => __('All Categories'),
			'parent_item' => __('Parent Category'),
			'parent_item_colon' => __('Parent Category:'),
			'edit_item' => __('Edit Category'),
			'update_item' => __('Update Category'),
			'add_new_item' => __('Add New Category'),
			'new_item_name' => __('New Category Name'),
			'menu_name' => __('Categories'),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'locations', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action('init', 'add_custom_taxonomies', 0);
function create_train_posttype()
{
	$args = array(
		'labels' => array(
			'name' => 'Trains',
			'singular_name' => 'Train',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('train', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_train_posttype');
function theme_setup()
{
	/**
	 * Featured Image Support
	 */
	add_theme_support('post-thumbnails');
	add_image_size('thumb-270', 270);
	add_image_size('thumb-582', 582);
	add_image_size('thumb-595', 595);
	add_image_size('thumb-276x171', 276, 171, true);
	/**
	 * Nav Menus
	 */
	register_nav_menus(array(
		'header' => __('Header Main'),
	));
}
add_action('after_setup_theme', 'theme_setup');
// Limit Post Excerpt Length
function custom_excerpt_length($length)
{
	return 15;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);
// add the ajax fetch js
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{
?>
	<script type="text/javascript">
		function fetch() {
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: {
					action: 'data_fetch',
					keyword: jQuery('#keyword').val()
				},
				success: function(data) {
					jQuery('#datafetch').html(data);
				}
			});
		}
	</script>
	<?php
}
// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{
	$the_query = new WP_Query(
		array(
			'posts_per_page' => -1,
			's' => esc_attr($_POST['keyword']),
			'post_type' => 'post'
		)
	);
	if ($the_query->have_posts()) : ?>
		<div class="row sm:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
			<?php
			while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="col mb-[40px] sm:mb-0">
					<?php
					if (has_post_thumbnail()) {
					?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" class="w-full object-cover h-[50%] xl:h-[135px]">
					<?php
					} else {
					?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/backup-thumb.jpg" class="w-full object-cover h-[50%] xl:h-[135px]">
					<?php
					}
					if (get_post_type() === 'page') {
					?>
						<div class="article-date mt-[20px]">
							<h4 class="uppercase text-blue child:text-blue font-bold">Page - <?php echo get_the_date(); ?></h4>
						</div>
					<?php
					} else {
					?>
						<div class="article-date mt-[20px]">
							<h4 class="uppercase text-blue child:text-blue font-bold"><?php the_category(' '); ?> - <?php echo get_the_date(); ?></h4>
						</div>
					<?php
					}
					?>
					<h3 class="text-white font-bold mt-[6px] lg:mt-[10px] lg:text-[1.75vw] lg:leading-[1.1]"><a href="<?php echo esc_url(post_permalink()); ?>"><?php the_title(); ?></a></h3>
				</div>
			<?php endwhile;
			?>
		</div>
	<?php
		wp_reset_postdata();
	endif;
	die();
}
function wpshock_search_filter($query)
{
	if ($query->is_search) {
		$query->set('post_type', array('post', 'page'));
	}
	return $query;
}

add_filter('pre_get_posts', 'wpshock_search_filter');

include('createJobDB.php');



function my_admin_menu()
{
	add_menu_page(
		__('Careers page', 'my-textdomain'),
		__('Careers menu', 'my-textdomain'),
		'manage_options',
		'sample-page',
		'my_admin_page_contents',
		'dashicons-schedule',
		3
	);
}

add_action('admin_menu', 'my_admin_menu');

// delete_option('filters');
// delete_option('portal_data');

function my_admin_page_contents()
{
	?>
	<h1>
		<?php esc_html_e('Career page stored data.', 'my-plugin-textdomain'); ?>
	</h1>
	<?php
	// $filters = get_option('filters');
	// $jobs = get_option('portal_data');
	// $error_log = get_option('error_log');



	?>
	<div class="wrap">
		<h1>Filters</h1>
		<pre>
		<?php //var_dump($filters); 
		?>
		</pre>
		<h1>All jobs</h1>
		<pre>
		<?php
		echo esc_html($portal_data);
		//echo esc_html(trim(json_encode($jobs)); 
		?>
		</pre>
		<h1>Errors</h1>
		<pre>
		<?php //var_dump($error_log); 
		?>
		</pre>
	</div>
<?php
}
?>