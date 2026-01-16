<?php
/**
 * Attorney Lite Theme Customizer
 *
 * @package Attorney Lite
 */
 
function attorney_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'attorney_lite_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 230,
		'wp-head-callback'       => 'attorney_lite_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'attorney_lite_custom_header_setup' );
if ( ! function_exists( 'attorney_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see attorney_lite_custom_header_setup().
 */
function attorney_lite_header_style() {
	?>    
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header{
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // attorney_lite_header_style 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function attorney_lite_customize_register( $wp_customize ) {
	//Add a class for titles
    class attorney_lite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#f8634b',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','attorney-lite'),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('header_bg_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'header_bg_color',array(
			'label' => esc_html__('Header Background Color','attorney-lite'),				
			'section' => 'colors',
			'settings' => 'header_bg_color'
	))
	);
	
	$wp_customize->add_section('header_button',array(
			'title'	=> esc_html__('Header Button','attorney-lite'),					
			'priority'		=> null
	));
	
	$wp_customize->add_setting('header_buttontext',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_buttontext',array(
			'label'	=> esc_html__('Add Button Text','attorney-lite'),
			'section'	=> 'header_button',
			'setting'	=> 'header_buttontext'
	));	
	
	$wp_customize->add_setting('header_buttonlink',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_buttonlink',array(
			'label'	=> esc_html__('Add Button Link','attorney-lite'),
			'section'	=> 'header_button',
			'setting'	=> 'header_buttonlink'
	));		
	
	// Hide Header Button
	$wp_customize->add_setting('hide_header_button',array(
			'sanitize_callback' => 'attorney_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_button', array(
    	   'section'   => 'header_button',    	 
		   'label'	=> esc_html__('Uncheck To Show Header Button In Header','attorney-lite'),
    	   'type'      => 'checkbox'
     )); 	
	 // Hide Header Button	
	

	$wp_customize->add_setting('footer_text_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_text_color',array(
			'label' => esc_html__('Copyright Text Color','attorney-lite'),				
			'section' => 'colors',
			'settings' => 'footer_text_color'
		))
	);

	// Inner Page Banner Settings
	$wp_customize->add_section('inner_page_banner',array(
			'title'	=> esc_html__('Inner Page Banner Settings','attorney-lite'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_page_banner_thumb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_page_banner_thumb', array(
        'section' => 'inner_page_banner',
		'label'	=> esc_html__('Upload Default Banner Image','attorney-lite'),
        'settings' => 'inner_page_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_page_banner_option',array(
			'sanitize_callback' => 'attorney_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_page_banner_option', array(
    	   'section'   => 'inner_page_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Page Banner On All Inner Pages. For Display Different Banner Image On Each Page Set Page Featured Image. Set Image Size (1400 X 300) For Better Resolution.','attorney-lite'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings
	 
	// Inner Post Banner Settings
	$wp_customize->add_section('inner_post_banner',array(
			'title'	=> esc_html__('Category / Archive And Single Post Banner Settings','attorney-lite'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_post_banner_thumb',array(
			'default'	=> null,

			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_post_banner_thumb', array(
        'section' => 'inner_post_banner',
		'label'	=> esc_html__('Upload Default Banner Image','attorney-lite'),
        'settings' => 'inner_post_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_post_banner_option',array(
			'sanitize_callback' => 'attorney_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_post_banner_option', array(
    	   'section'   => 'inner_post_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Post Banner On Category / Archive And Single Post. For Display Different Banner Image On Each Post Set Post Featured Image. Set Image Size (1400 X 300) For Better Resolution.','attorney-lite'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings	

	$wp_customize->add_section('footer_text_copyright',array(
			'title'	=> esc_html__('Footer Copyright Text','attorney-lite'),				
			'priority'		=> null
	));
	
	$wp_customize->add_setting('footer_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('footer_text',array(
			'label'	=> esc_html__('Add Copyright Text Here','attorney-lite'),
			'section'	=> 'footer_text_copyright',
			'setting'	=> 'footer_text'
	));		 
}
add_action( 'customize_register', 'attorney_lite_customize_register' );
//Integer
function attorney_lite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function attorney_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function attorney_lite_custom_css() {
    wp_enqueue_style(
        'attorney-lite-custom-style',
        get_stylesheet_directory_uri() . '/css/attorney-lite-custom-style.css'  
    );
        $color = esc_html(get_theme_mod( 'color_scheme' ));
		$headerbgcolor = esc_html(get_theme_mod( 'header_bg_color' )); 
		$footertextcolor = esc_html(get_theme_mod( 'footer_text_color' )); 
		
        $custom_css = "
					#sidebar ul li a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.tagcloud a,
					.header-phone-number,
					#sidebar li a:hover,				
					.footer-row .cols-3 ul li a:hover,
					.footer-row .cols-3 ul li.current_page_item a,
					.footer-row .cols-3 ul li.current-menu-item a,
					.main-navigation ul li a:focus, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_item a,
					.main-navigation ul ul li a:hover,
					.main-navigation ul ul li a:focus,
					.main-navigation ul li:hover a, .main-navigation ul li a:focus, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_item a,
					#sidebar ul li a:hover, #sidebar li a:hover,
					.logo a:focus, button:focus, input[type='button']:focus, input[type='reset']:focus, input[type='submit']:focus, input[type='text']:focus, input[type='email']:focus, input[type='url']:focus, input[type='password']:focus, input[type='search']:focus, input[type='number']:focus, input[type='tel']:focus, input[type='range']:focus, input[type='date']:focus, input[type='month']:focus, input[type='week']:focus, input[type='time']:focus, input[type='datetime']:focus, input[type='datetime-local']:focus, input[type='color']:focus, textarea:focus,
					.post-navigation a,
					#comments a,
					.postmeta a,
					.footer-row .cols-3 ul li a:hover
					{ 
						 color: {$color} !important;
					}
					
					#sidebar h2::after, #sidebar h3::after, #sidebar h4::after, #sidebar h5::after, #sidebar h6::after, #sidebar h6 #sidebar label::after, #sidebar .wp-block-search__label::after{background: {$color} !important;}

					#commentform input#submit:hover,
					.wpcf7 input[type='submit'],
					input.search-submit,
					.recent-post .morebtn:hover, 
					.read-more-btn,
					.woocommerce-product-search button[type='submit'],
					.view-all-btn a:hover,
					.social-icons a:hover,
					.header:after,
					.header-right-infos
					{ 
					   background-color: {$color} !important;
					}
					
					.pagination .nav-links a{background: {$color} !important;}

					.titleborder span:after, .sticky{border-bottom-color: {$color} !important;}
					.header{background-color:{$headerbgcolor} !important;}
					.copyright-txt{color: {$footertextcolor} !important;}	
					.main-navigation ul ul li a:hover, .main-navigation ul ul li a:focus {background-color: {$color} !important;}			
				";
        wp_add_inline_style( 'attorney-lite-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'attorney_lite_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function attorney_lite_customize_preview_js() {
	wp_enqueue_script( 'attorney_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'attorney_lite_customize_preview_js' );