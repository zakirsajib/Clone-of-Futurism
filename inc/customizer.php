<?php
/**
 * MT Theme Customizer
 *
 * @package MT
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mt_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Remove Existing sections
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	
	// Remove Existing controls
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('background_color');

	
	// Add Logo on Customizer's existing section 'title_tagline'
	$wp_customize->add_setting( 'header_logo', 
		array(
			'default' => '',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,'header_logo',
	        array(
	            'label' => __( 'Logo Upload', 'mt' ),
	            'section' => 'title_tagline',
	            'settings' => 'header_logo',
	            'description' => 'Recommended image format is SVG',
	        )
	    )
	);
	
	
	$wp_customize->add_panel( 'footer_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Footer', 'mt' ),
	    'description' => __( 'Description of what this panel does.', 'mt' ),
	) );
	
	$wp_customize->add_panel( 'signin_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Sign In', 'mt' ),
	    'description' => __( 'Description of what this panel does.', 'mt' ),
	) );

	
	// Sign In Popup logo
	$wp_customize->add_section( 'section_signin', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Sign In', 'mt' ),
			'description' => '',
			'panel' => 'signin_panel_id',
	) );
	$wp_customize->add_setting( 'signin_logo', array(
			'default' => '',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => '',
		)
	);
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,'signin_logo',
	        array(
	            'label' => 'Sign In Logo Upload',
	            'section' => 'section_signin',
	            'settings' => 'signin_logo',
	            'description' => 'Recommended Size: 420 x 96 pixels.',
	        )
	    )
	);

	
	
	
	
	// Footer Heading
	$wp_customize->add_section( 'section_footer_heading', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Heading', 'mt' ),
			'description' => '',
			'panel' => 'footer_panel_id',
	) );
	$wp_customize->add_setting( 'footer_heading_text', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control( 'footer_heading_text', array(
	    'type' => 'textarea',
	    'priority' => 10,
	    'section' => 'section_footer_heading',
	    'label' => __( 'Heading/Title Field', 'mt' ),
	    'description' => '',
	) );
	$wp_customize->add_setting( 'footer_heading_url', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control( 'footer_heading_url', array(
	    'type' => 'text',
	    'priority' => 10,
	    'section' => 'section_footer_heading',
	    'label' => __( 'Heading/Title Field URL', 'mt' ),
	    'description' => '',
	) );

	// Social Media URLs	
	$wp_customize->add_section( 'footer_section_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Social Media URLs', 'mt' ),
	    'description' => '',
	    'panel' => 'footer_panel_id',
	) );

	$wp_customize->add_setting( 'url_field_reddit', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'url_field_reddit', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'footer_section_id',
	    'label' => __( 'Reddit URL Field', 'mt' ),
	    'description' => '',
	) );
	$wp_customize->add_setting( 'url_field_fb', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'url_field_fb', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'footer_section_id',
	    'label' => __( 'Facebook URL Field', 'mt' ),
	    'description' => '',
	) );
	$wp_customize->add_setting( 'url_field_youtube', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'url_field_youtube', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'footer_section_id',
	    'label' => __( 'YouTube URL Field', 'mt' ),
	    'description' => '',
	) );
	$wp_customize->add_setting( 'url_field_inst', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'url_field_inst', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'footer_section_id',
	    'label' => __( 'Instagram URL Field', 'mt' ),
	    'description' => '',
	) );
	$wp_customize->add_setting( 'url_field_twt', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'url_field_twt', array(
	    'type' => 'url',
	    'priority' => 10,
	    'section' => 'footer_section_id',
	    'label' => __( 'Twitter URL Field', 'mt' ),
	    'description' => '',
	) );
	
		
	// Copyright
	$wp_customize->add_section( 'section_copyright', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Copyright', 'mt' ),
			'description' => '',
			'panel' => 'footer_panel_id',
	) );
	$wp_customize->add_setting( 'copyright_text', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control( 'copyright_text', array(
	    'type' => 'text',
	    'priority' => 10,
	    'section' => 'section_copyright',
	    'label' => __( 'Copyright Info Field', 'mt' ),
	    'description' => '',
	) );
	
	// Footer logo
	$wp_customize->add_section( 'section_footer_logo', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Logo', 'mt' ),
			'description' => '',
			'panel' => 'footer_panel_id',
	) );
	$wp_customize->add_setting( 'footer_logo', array(
			'default' => '',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => '',
		)
	);
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,'footer_logo',
	        array(
	            'label' => 'Footer Logo Upload',
	            'section' => 'section_footer_logo',
	            'settings' => 'footer_logo',
	            'description' => 'Recommended Size: 534 x 178 pixels.',
	        )
	    )
	);
	//Creative Commons License
	$wp_customize->add_section( 'section_ccl', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Creative Commons License', 'mt' ),
			'description' => '',
			'panel' => 'footer_panel_id',
	) );
	$wp_customize->add_setting( 'ccl', array(
			'default' => '',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => '',
			'sanitize_callback' => '',
		)
	);
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,'ccl',
	        array(
	            'label' => 'Creative Commons License Logo Upload',
	            'section' => 'section_ccl',
	            'settings' => 'ccl',
	            'description' => 'Recommended format: SVG',
	        )
	    )
	);
	$wp_customize->add_setting( 'ccl_url_text', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control( 'ccl_url_text', array(
	    'type' => 'text',
	    'priority' => 10,
	    'section' => 'section_ccl',
	    'label' => __( 'Creative Commons License URL Field', 'mt' ),
	    'description' => '',
	) );
	
}
add_action( 'customize_register', 'mt_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mt_customize_preview_js() {
	wp_enqueue_script( 'mt_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mt_customize_preview_js' );
