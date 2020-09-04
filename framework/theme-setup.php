<?php

if ( ! function_exists( 'noc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function noc_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
	}
endif;

if( ! function_exists( 'noc_image_sizes' ) ) :
	function noc_image_sizes() {
		/**
		 * Remove default wordpress image sizes
		 */
		remove_image_size( 'thumbnail' );
		remove_image_size( 'medium' );
		remove_image_size( 'large' );

		/**
		 * Image size widths
		 * By setting with height to 9999(unlimited) it will scale the image properly
		 */
		add_image_size( 'nocDesktop', 1600, 9999);
		add_image_size( 'nocLaptop', 1200, 9999);
		add_image_size( 'nocTablet', 1000, 9999);
		add_image_size( 'nocMobile', 800, 9999);
	}
endif;

add_action( 'init', 'noc_image_sizes' );
add_action( 'after_setup_theme', 'noc_setup' );