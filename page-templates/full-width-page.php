<?php
/**
 * Template Name: Full Width Page (no sidebar)
 *
 * Template for pages
 *
 * @package            ${PACKAGE}
 * @license            license.txt
 * @copyright          ${YEAR} ${COMPANY}
 * @since              ${VERSION}
 *
 * Please do not edit this file. This file is part of the ${PACKAGE} Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header(); ?>

<div id="content-full" class="content-area">
	<div class="row">
		<main id="main" class="site-main col-md-12" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php get_template_part( 'loop-nav' ); ?>

			<?php else : ?>

				<?php get_template_part( 'loop-no-posts' ); ?>

			<?php endif; ?>

		</main>
		<!-- #main -->
	</div>
	<!-- row -->
</div>
<!-- #content-full -->

<?php get_footer(); ?>