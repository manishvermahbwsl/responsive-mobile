<?php
/**
 * Theme Options
 *
 * Setup theme specfic settings
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/**
 * Retrieve Theme option settings
 *
 */
function responsive_mobile_get_options()
{
	// Parse array of option defaults against user-configured Theme options
	$responsive_mobile_options = Responsive_Options::$static_responsive_mobile_options;

	if ( !$responsive_mobile_options ) {
		return Responsive_Options::$static_default_options;
	}

	// Return parsed args array
	return $responsive_mobile_options;
}

// TODO is this filter actually doing anything?
add_filter( 'responsive_mobile_options_init', 'responsive_mobile_get_options' );

/**
 * Get valid layouts
 */
function responsive_mobile_valid_layouts()
{
	$layouts = array(
		'default'                   => __( 'Default', 'responsive-mobile' ),
		'content-sidebar-page'      => __( 'Content/Sidebar', 'responsive-mobile' ),
		'sidebar-content-page'      => __( 'Sidebar/Content', 'responsive-mobile' ),
		'content-sidebar-half-page' => __( 'Content/Sidebar Half Page', 'responsive-mobile' ),
		'sidebar-content-half-page' => __( 'Sidebar/Content Half Page', 'responsive-mobile' ),
		'full-width-page'           => __( 'Full Width Page (no sidebar)', 'responsive-mobile' )
	);

	return apply_filters( 'responsive_mobile_valid_layouts', $layouts );
}

/**
 * Set Theme Options
 */
function responsive_mobile_theme_options_set()
{

	/**
	 * Creates and array of sections and each section again conatains array of options.
	 *
	 * @key This must match the id of the section you want the options to appear in
	 *
	 * Attributes of each sections :-
	 * @title - Title of the section. This text is used to be displyed as the section name in the theme theme option page.
	 * @fields - This is an array of option fields inside a section.
	 *
	 * Attributes of each fields :-
	 * @title Title on the left hand side of the options
	 * @subtitle Displays underneath main title on left hand side
	 * @heading Right hand side above input
	 * @type The type of input e.g. text, textarea, checkbox
	 * @id The options id
	 * @description Instructions on what to enter in input
	 * @placeholder The placeholder for text and textarea
	 * @options array used by select dropdown lists
	 */
	 // Get custom categories of boxes element

	$options = array(
		'theme_elements'   => array(
			'title'  => __( 'Theme Elements', 'responsive-mobile' ),
			'fields' => array(
				array(
					'title'       => __( 'Disable breadcrumb list?', 'responsive-mobile' ),
					'type'        => 'checkbox',
					'id'          => 'breadcrumb',
					'description' => __( 'Check to disable', 'responsive-mobile' ),
					'default'     => false,
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Use minified CSS', 'responsive-mobile' ),
					'type'        => 'checkbox',
					'id'          => 'minified_css',
					'description' => __( 'Check to disable', 'responsive-mobile' ),
					'default'     => false,
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Disable Call to Action Button?', 'responsive-mobile' ),
					'type'        => 'checkbox',
					'id'          => 'cta_button',
					'description' => __( 'Check to disable', 'responsive-mobile' ),
					'default'     => false,
					'validate'    => 'checkbox'
				)
			)
		),
		'logo_upload'      => array(
			'title'  => __( 'Logo Upload', 'responsive-mobile' ),
			'fields' => array(
				array(
					'title'       => __( 'Custom Header', 'responsive-mobile' ),
					'type'        => 'description',
					'id'          => 'logo_upload_desc',
					'description' => __( 'Need to replace or remove default logo?', 'responsive-mobile' ) . ' <a href="' . admin_url( 'themes.php?page=custom-header' ) . '">' . __( 'Click here', 'responsive-mobile' ) . '</a>',
					'default'     => ''
				),
                            array(
					'title'       => __( 'Sticky Header', 'responsive-mobile' ),
					'type'        => 'checkbox',
					'id'          => 'sticky_header',
					'description' => __( 'Check to enable', 'responsive-mobile' ),
					'default'     => false
				)
			)
		),
		'home_page'        => array(
			'title'  => __( 'Home Page', 'responsive-mobile' ),
			'fields' => array(
				array(
					'title'       => __( 'Enable Custom Front Page', 'responsive-mobile' ),
					'type'        => 'checkbox',
					'id'          => 'front_page',
					'description' => sprintf( __( 'Overrides the WordPress %1sfront page option%2s', 'responsive-mobile' ), '<a href="options-reading.php">', '</a>' ),
					'default'     => '',
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Headline', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'home_headline',
					'description' => __( 'Enter your headline', 'responsive-mobile' ),
					'placeholder' => __( 'Hello, World!', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Subheadline', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'home_subheadline',
					'description' => __( 'Enter your subheadline', 'responsive-mobile' ),
					'placeholder' => __( 'Your H2 subheadline here', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Content Area', 'responsive-mobile' ),
					'type'        => 'editor',
					'id'          => 'home_content_area',
					'description' => __( 'Enter your content', 'responsive-mobile' ),
					'placeholder' => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'editor'
				),
				array(
					'title'       => __( 'Call to Action (URL)', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'cta_url',
					'description' => __( 'Enter your call to action URL', 'responsive-mobile' ),
					'placeholder' => '#nogo',
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Call to Action (Text)', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'cta_text',
					'description' => __( 'Enter your call to action text', 'responsive-mobile' ),
					'placeholder' => __( 'Call to Action', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Featured Content', 'responsive-mobile' ),
					'subtitle'    => '<a class="help-links" href="' . esc_url( 'http://cyberchimps.com/guide/responsive/' ) . '" title="' . esc_attr__( 'See Docs', 'responsive-mobile' ) . '" target="_blank">' .
						__( 'See Docs', 'responsive-mobile' ) . '</a>',
					'type'        => 'editor',
					'id'          => 'featured_content',
					'description' => __( 'Paste your shortcode, video or image source', 'responsive-mobile' ),
					'placeholder' => '<img class="aligncenter" src="' . get_template_directory_uri() . '"/core/images/featured-image.png" width="440" height="300" alt="" />',
					'default'     => '',
					'validate'    => 'editor'
				),
				array(
					'title'       => __( 'Enable Callout element', 'responsive-mobile' ),
					'type'        => 'checkbox',
					'id'          => 'callout_toggle_btn',
					'description' => '',
					'default'     => '',
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Headline', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'callout_headline',
					'description' => __( 'Enter callout headline', 'responsive-mobile' ),
					'placeholder' => __( 'Hello, World!', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Content Area', 'responsive-mobile' ),
					'type'        => 'editor',
					'id'          => 'callout_content_area',
					'description' => __( 'Enter your content', 'responsive-mobile' ),
					'placeholder' => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'editor'
				),
				array(
					'title'       => __( 'Content Text Color', 'responsive-mobile' ),
					'type'        => 'color',
					'id'          => 'callout_text_color',
					'description' => __( 'Select color for your text', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Call to Action (URL)', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'callout_cta_url',
					'description' => __( 'Enter your call to action URL', 'responsive-mobile' ),
					'placeholder' => '#nogo',
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Call to Action (Text)', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'callout_cta_text',
					'description' => __( 'Enter your call to action text', 'responsive-mobile' ),
					'placeholder' => __( 'Call to Action', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Callout Button Text Color', 'responsive-mobile' ),
					'type'        => 'color',
					'id'          => 'callout_btn_text_color',
					'description' => __( 'Select color for button text', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Callout Button Background Color', 'responsive-mobile' ),
					'type'        => 'color',
					'id'          => 'callout_btn_back_color',
					'description' => __( 'Select color for button background', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Callout Background Image', 'responsive-mobile' ),
					'type'        => 'upload',
					'description' => 'Recommended Image size is 1366px X 273px.',
					'id'          => 'callout_featured_content',
					'default'     => '',
					'button'      => 'Browse'
				)
			)
		),
		'layouts'          => array(
			'title'  => __( 'Default Layouts', 'responsive-mobile' ),
			'fields' => array(
				array(
					'title'    => __( 'Default Static Page Layout', 'responsive-mobile' ),
					'type'     => 'select',
					'id'       => 'static_page_layout_default',
					'options'  => responsive_mobile_valid_layouts(),
					'default'  => 'default',
					'validate' => 'select'
				),
				array(
					'title'    => __( 'Default Single Blog Post Layout', 'responsive-mobile' ),
					'type'     => 'select',
					'id'       => 'single_post_layout_default',
					'options'  => responsive_mobile_valid_layouts(),
					'default'  => 'default',
					'validate' => 'select'
				),
				array(
					'title'    => __( 'Default Blog Posts Index Layout', 'responsive-mobile' ),
					'type'     => 'select',
					'id'       => 'blog_posts_index_layout_default',
					'options'  => responsive_mobile_valid_layouts(),
					'default'  => 'default',
					'validate' => 'select'
				)
			)
		),
		'social'           => array(
			'title'  => __( 'Social Icons', 'responsive-mobile' ),
			'fields' => array(
				array(
					'title'       => __( 'Twitter', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'twitter_uid',
					'description' => __( 'Enter your Twitter URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Facebook', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'facebook_uid',
					'description' => __( 'Enter your Facebook URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'LinkedIn', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'linkedin_uid',
					'description' => __( 'Enter your LinkedIn URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'YouTube', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'youtube_uid',
					'description' => __( 'Enter your YouTube URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'StumbleUpon', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'stumbleupon_uid',
					'description' => __( 'Enter your StumbleUpon URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'RSS Feed', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'rss_uid',
					'description' => __( 'Enter your RSS Feed URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Google+', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'googleplus_uid',
					'description' => __( 'Enter your Google+ URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Instagram', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'instagram_uid',
					'description' => __( 'Enter your Instagram URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Pinterest', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'pinterest_uid',
					'description' => __( 'Enter your Pinterest URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				// TODO removed as no font icon for this yet
				//				array(
				//					'title'       => __( 'Yelp!', 'responsive-mobile' ),
				//					'type'        => 'text',
				//					'id'          => 'yelp_uid',
				//					'description' => __( 'Enter your Yelp! URL', 'responsive-mobile' ),
				//					'default'     => '',
				//					'validate'    => 'url'
				//				),
				array(
					'title'       => __( 'Vimeo', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'vimeo_uid',
					'description' => __( 'Enter your Vimeo URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'foursquare', 'responsive-mobile' ),
					'type'        => 'text',
					'id'          => 'foursquare_uid',
					'description' => __( 'Enter your foursquare URL', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'url'
				)
			)
		),
		'css'              => array(
			'title'  => __( 'CSS Styles', 'responsive-mobile' ),
			'fields' => array(
				array(
					'title'       => __( 'Custom CSS Styles', 'responsive-mobile' ),
					'subtitle'    => '<a class="help-links" href="https://developer.mozilla.org/en/CSS" title="CSS Tutorial" target="_blank">' . __( 'CSS Tutorial', 'responsive-mobile' ) . '</a>',
					'type'        => 'textarea',
					'id'          => 'responsive_mobile_inline_css',
					'description' => __( 'Enter your custom CSS styles.', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'css'
				)
			)
		),
		'scripts'          => array(
			'title'  => __( 'Scripts', 'responsive-mobile' ),
			'fields' => array(
				array(
					'title'       => __( 'Custom Scripts for Header and Footer', 'responsive-mobile' ),
					'subtitle'    => '<a class="help-links" href="http://codex.wordpress.org/Using_Javascript" title="Quick Tutorial" target="_blank">' . __( 'Quick Tutorial', 'responsive-mobile' ) . '</a>',
					'heading'     => __( 'Embeds to header.php &darr;', 'responsive-mobile' ),
					'type'        => 'textarea',
					'id'          => 'responsive_mobile_inline_js_head',
					'description' => __( 'Enter your custom header script.', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'js'
				),
				array(
					'heading'     => __( 'Embeds to footer.php &darr;', 'responsive-mobile' ),
					'type'        => 'textarea',
					'id'          => 'responsive_mobile_inline_js_footer',
					'description' => __( 'Enter your custom footer script.', 'responsive-mobile' ),
					'default'     => '',
					'validate'    => 'js'
				)
			)
		),
		'Team Section'          => array(
			'title'  => __( 'Team Section for the homepage', 'responsive-mobile' ),
			'fields' => array(
			array(
					'title'       => __( 'Enable Team Section', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'checkbox',
					'id'          => 'team',
					'default'     => '',
					'description' => __( 'The featured image, title and content from the selected post category will be used. Recommended image size for the featured images: 164 x 164px', 'responsive-mobile' ),
					'placeholder' => ''
			),
			array(
					'title'       => __( 'Team Title', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'team_title',
					'default'     => '',
					'description' => __( 'Enter your team title', 'responsive-mobile' ),
					'placeholder' => __( 'Team', 'responsive-mobile' )
			),
			array(
					'title'       => __( 'Select Category for team', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'select',
					'id'          => 'team_val',
					'default'     => '',
					'description' => '',
					'placeholder' => '',
					'options'     => Responsive_Options::responsive_mobile_categorylist_validate()
			)
			)
		),
            'Contact Section'          => array(
			'title'  => __( 'Contact Section for the homepage', 'responsive-mobile' ),
			'fields' => array(
			array(
					'title'       => __( 'Enable Contact Section', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'checkbox',
					'id'          => 'enable_contact',
					'default'     => '',
					'description' => __( 'Check to enable', 'responsive-mobile' ),
					'placeholder' => ''
			),
			array(
					'title'       => __( 'Contact Section Title', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'contact_title',
					'default'     => '',
					'description' => __( 'Enter contact section title', 'responsive-mobile' ),
					'placeholder' => __( 'Get In Touch', 'responsive-mobile' )
			),
                        array(
					'title'       => __( 'Contact Address', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'contact_address',
					'default'     => '',
					'description' => __( '', 'responsive-mobile' ),
					'placeholder' => __( 'Sollicitudin Accumsa, hendrerit finibus, Jnibus- 45, Suscipit eleifend. ', 'responsive-mobile' )
			),
                            array(
					'title'       => __( 'Contact Number', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'contact_number',
					'default'     => '',
					'description' => __( '', 'responsive-mobile' ),
					'placeholder' => __( '+1 212 555 1234', 'responsive-mobile' )
			),
                             array(
					'title'       => __( 'Contact Email', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'contact_email',
					'default'     => '',
					'description' => __( '', 'responsive-mobile' ),
					'placeholder' => __( 'hello@yourdomain', 'responsive-mobile' )
			),
                             array(
					'title'       => __( 'Additional Data', 'responsive-mobile' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'contact_form',
					'default'     => '',
					'description' => __( 'Recommended: Contact Form', 'responsive-mobile' ),
					'placeholder' => __( '', 'responsive-mobile' )
			),
			
			)
		)

	);

	$options = apply_filters( 'responsive_mobile_option_options_filter', $options );

	$theme_options = new Responsive_Options( $options );

	return $theme_options;
}

add_action( 'after_setup_theme', 'responsive_mobile_theme_options_set' );
