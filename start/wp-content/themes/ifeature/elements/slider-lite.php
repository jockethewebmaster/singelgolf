<?php
/**
 * Title: Slider Lite Element
 *
 * Description: Slides three images having optional custom links
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Add Slider page options
add_action( 'init', 'cyberchimps_slider_lite_page_options' );

function cyberchimps_slider_lite_page_options() {
    /**
     * Set up Portfolio Lite on Page options
     */

    // set directory
    $directory = get_template_directory_uri();

    $page_fields	= array(
        // Image one
        array(
            'type'	=> 'single_image',
            'id'	=> 'cyberchimps_slider_lite_slide_one_image',
            'class'	=> '',
            'name'	=> __( 'Slide One Image', 'cyberchimps_elements' ),
            'std'	=> $directory . apply_filters( 'cyberchimps_slider_lite_img1', '/images/branding/slide1.jpg' )
        ),
        array(
            'type'	=> 'text',
            'id'	=> 'cyberchimps_slider_lite_slide_one_url',
            'class'	=> '',
            'name'	=> __( 'Slide One Link', 'cyberchimps_elements' ),
            'std'	=> 'http://cyberchimps.com'
        ),
        array(
            'type'	=> 'single_image',
            'id'	=> 'cyberchimps_slider_lite_slide_two_image',
            'class'	=> '',
            'name'	=> __( 'Slide Two Image', 'cyberchimps_elements' ),
            'std'	=> $directory . apply_filters( 'cyberchimps_slider_lite_img2', '/elements/lib/images/slider/slide1.jpg' )
        ),
        array(
            'type'	=> 'text',
            'id'	=> 'cyberchimps_slider_lite_slide_two_url',
            'class'	=> '',
            'name'	=> __( 'Slide Two Link', 'cyberchimps_elements' ),
            'std'	=> 'http://cyberchimps.com'
        ),
		array(
            'type'	=> 'single_image',
            'id'	=> 'cyberchimps_slider_lite_slide_three_image',
            'class'	=> '',
            'name'	=> __( 'Slide Three Image', 'cyberchimps_elements' ),
            'std'	=> $directory . apply_filters( 'cyberchimps_slider_lite_img3', '/elements/lib/images/slider/slide1.jpg' )
        ),
        array(
            'type'	=> 'text',
            'id'	=> 'cyberchimps_slider_lite_slide_three_url',
            'class'	=> '',
            'name'	=> __( 'Slide Three Link', 'cyberchimps_elements' ),
            'std'	=> 'http://cyberchimps.com'
        )

    );
    /*
     * configure your meta box
     */
    $page_config = array(
        'id'				=> 'slider_lite_options', // meta box id, unique per meta box
        'title'				=> __( 'Slider Lite Options', 'cyberchimps_elements' ), // meta box title
        'pages'				=> array( 'page' ), // post types, accept custom post types as well, default is array('post'); optional
        'context'			=> 'normal', // where the meta box appear: normal (default), advanced, side; optional
        'priority'			=> 'low', // order of meta box: high (default), low; optional
        'fields'			=> $page_fields, // list of meta fields (can be added by field arrays)
        'local_images'		=> false, // Use local or hosted images (meta box images for add/remove)
        'use_with_theme'	=> true //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
    );

    /*
     * Initiate your meta box
     */
    $page_meta = new Cyberchimps_Meta_Box( $page_config );
}

// Action for Slider Lite
add_action( 'slider_lite', 'cyberchimps_slider_lite_content' );

function cyberchimps_slider_lite_content() {
	global $wp_query, $post;

	// Set directory uri
	$directory_uri = get_template_directory_uri();
	$slide         = array();
	$link          = array();

	if( is_page() ) {
		$slides[0]['img'] = get_post_meta( $post->ID, 'cyberchimps_slider_lite_slide_one_image', true );
		$slides[1]['img'] = get_post_meta( $post->ID, 'cyberchimps_slider_lite_slide_two_image', true );
		$slides[2]['img'] = get_post_meta( $post->ID, 'cyberchimps_slider_lite_slide_three_image', true );

		$slides[0]['link'] = get_post_meta( $post->ID, 'cyberchimps_slider_lite_slide_one_url', true );
		$slides[1]['link'] = get_post_meta( $post->ID, 'cyberchimps_slider_lite_slide_two_url', true );
		$slides[2]['link'] = get_post_meta( $post->ID, 'cyberchimps_slider_lite_slide_three_url', true );
	}

	else {

		$slides[0]['img'] = cyberchimps_get_option( 'image_one_slide', $directory_uri . apply_filters( 'cyberchimps_slider_lite_img1', '/images/branding/slide1.jpg' ) );
		$slides[1]['img'] = cyberchimps_get_option( 'image_two_slide', $directory_uri . apply_filters( 'cyberchimps_slider_lite_img2', '/elements/lib/images/slider/slide1.jpg' ) );
		$slides[2]['img'] = cyberchimps_get_option( 'image_three_slide', $directory_uri . apply_filters( 'cyberchimps_slider_lite_img3', '/elements/lib/images/slider/slide1.jpg' ) );

		$slides[0]['link'] = cyberchimps_get_option( 'image_one_slide_url', apply_filters( 'cyberchimps_slider_lite_url1', 'http://cyberchimps.com' ) );
		$slides[1]['link'] = cyberchimps_get_option( 'image_two_slide_url', apply_filters( 'cyberchimps_slider_lite_url2', 'http://cyberchimps.com' ) );
		$slides[2]['link'] = cyberchimps_get_option( 'image_three_slide_url', apply_filters( 'cyberchimps_slider_lite_url3', 'http://cyberchimps.com' ) );

	}
	$i = 0;
	?>
	<div class="row-fluid">
	<div id="slider_lite" class="carousel slide">
		<div class="carousel-inner">
			<?php foreach ($slides as $slide): ?>
			<?php if ($slide['img'] != ''): ?>
			<?php if ($i == 0): ?>
			<div class="active item">
				<?php else: ?>
				<div class="item">
					<?php endif; ?>
					<a href="<?php echo esc_url( $slide['link'] ); ?>">
						<img src="<?php echo esc_url( $slide['img'] ); ?>" alt="Slider"/>
					</a>
				</div>
				<?php endif; ?>
				<?php $i++;
				endforeach;
				?>
			</div>

			<!-- Slider nav -->
			<a class="carousel-control left slider-lite-left" href="#slider_lite" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right slider-lite-right" href="#slider_lite" data-slide="next">&rsaquo;</a>

		</div>
	</div>
	<!-- row-fluid -->
	
	<script type="text/javascript">
		jQuery(document).ready(function () {

			// Initialize the slider.
			jQuery('.carousel').carousel();
		});
	</script>
			
<?php
}

?>