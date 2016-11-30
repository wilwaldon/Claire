<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'wp_lucy'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'wp_lucy'),
		'two' => __('Two', 'wp_lucy'),
		'three' => __('Three', 'wp_lucy'),
		'four' => __('Four', 'wp_lucy'),
		'five' => __('Five', 'wp_lucy')
	);

// Multicheck Array
	$multicheck_array = array(
		'one' => __('Facebook', 'wp_lucy'),
		'two' => __('Pinterest', 'wp_lucy'),
		'three' => __('Twitter', 'wp_lucy'),
		'four' => __('Blog-Lovin', 'wp_lucy'),
		'five' => __('Instagram', 'wp_lucy')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	// Top Navigation Option

	$options[] = array(
		'name' => __('General', 'wp_lucy'),
		'type' => 'heading');

	// $options[] = array(
	// 	'name' => __('logo', 'wp_lucy'),
	// 	'desc' => __('Upload your logo. Suggested size of logo should be 500px wide by 150px high', 'wp_lucy'),
	// 	'id' => 'logo',
	// 	'type' => 'upload');

	$options[] = array(
		'name' => __('Blog Name', 'wp_lucy'),
		'desc' => __('Your Blog Title goes here', 'wp_lucy'),
		'id' => 'blog_name',
		'std' => 'Blog Name',
		'type' => 'text');

	$options[] = array(
		'name' => __( 'Blog Name & Logo Color', 'wp_lucy' ),
		'desc' => __( 'Select the color of your Blog Title.', 'wp_lucy' ),
		'id' => 'header-color',
		'std' => '',
		'type' => 'color');

	$options[] = array(
		'name' => __( 'Link Color', 'wp_lucy' ),
		'desc' => __( 'Select the color of your links.', 'wp_lucy' ),
		'id' => 'link-color',
		'std' => '',
		'type' => 'color');

	$options[] = array(
		'name' => __( 'Link Hover Color', 'wp_lucy' ),
		'desc' => __( 'Select the color of your links when hovered.', 'wp_lucy' ),
		'id' => 'link-color-hover',
		'std' => '',
		'type' => 'color');

	$options[] = array(
		'name' => __( 'Button Background Color', 'wp_lucy' ),
		'desc' => __( 'Select the color of your button background.', 'wp_lucy' ),
		'id' => 'btn-bg',
		'std' => '',
		'type' => 'color');

	$options[] = array(
		'name' => __( 'Button Text Color', 'wp_lucy' ),
		'desc' => __( 'Select the color of your button text.', 'wp_lucy' ),
		'id' => 'btn-txt',
		'std' => '',
		'type' => 'color');

	$options[] = array(
		'name' => __( 'Button Background HoverColor', 'wp_lucy' ),
		'desc' => __( 'Select the color of your button background when hovered.', 'wp_lucy' ),
		'id' => 'btn-bg-hvr',
		'std' => '',
		'type' => 'color');

	$options[] = array(
		'name' => __('favicon', 'wp_lucy'),
		'desc' => __('Upload your favicon. PNG preferred', 'wp_lucy'),
		'id' => 'favicon',
		'type' => 'upload');

		$options[] = array(
		'name' => __('loading-icon', 'wp_lucy'),
		'desc' => __('Upload your loading icon. GIF works the best!', 'wp_lucy'),
		'id' => 'loading-icon',
		'type' => 'upload');

	// Sidebar Options

	$options[] = array(
		'name' => __('Sidebar', 'wp_lucy'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('headshot', 'wp_lucy'),
		'desc' => __('Upload your headshot to the sidebar!', 'wp_lucy'),
		'id' => 'headshot',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Add Your Name', 'wp_lucy'),
		'desc' => __('Sidebar Name Under Image.', 'wp_lucy'),
		'id' => 'sidebar_title',
		'std' => 'Default Value',
		'type' => 'text');


	$options[] = array(
		'name' => __('Textarea', 'wp_lucy'),
		'desc' => __('Your Sidebar Blurb Goes here.', 'wp_lucy'),
		'id' => 'sidebar_blurb',
		'std' => 'Your Sidebar Blurb Goes here',
		'type' => 'textarea');

	return $options;
}