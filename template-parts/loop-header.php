<?php
/**
 * Header Loop Template
 *
 * The template is displayed at the top of the loop
 *
 * @package      ${PACKAGE}
 * @license      license.txt
 * @copyright    ${YEAR} ${COMPANY}
 * @since        ${VERSION}
 *
 * Please do not edit this file. This file is part of the ${PACKAGE} Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Display breadcrumb
 */
responsive_get_breadcrumb_lists();

/**
 * Display archive information
 */
if( is_category() || is_tag() || is_author() || is_date() ) : ?>
	<header class="page-header">
		<h1 class="title-archive">
			<?php responsive_archive_title(); ?>
		</h1>
		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) {
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			}
		?>
	</header><!-- .page-header -->
<?php endif;

/**
 * Display Search information
 */
if( is_search() ) : ?>
	<header class="page-header">
		<h1 class="page-title title-search-results"><?php printf( __( 'Search Results for: %s', 'responsive-II' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header><!-- .page-header -->
<?php endif;
