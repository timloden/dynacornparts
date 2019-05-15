<?php

/* Enqueue styles
--------------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'dynacornparts_styles', 99 );

function dynacornparts_styles() {

	wp_enqueue_style( 'dynacornparts', get_stylesheet_uri(), [], '0.0.0' );

}

/* Enqueue scripts
--------------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'dynacornparts_scripts', 99 );

function dynacornparts_scripts() {

	// Vendor scripts
	//wp_enqueue_script( 'dynacorn-vendor-scripts', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), '20151215', true );

	// Custom scripts
	wp_enqueue_script( 'dynacornparts-custom-scripts', get_template_directory_uri() . '/assets/js/custom.min.js', array('customize-preview'), '20151215', true );

}
