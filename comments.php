<?php
/**
 * Comments Template
 *
 * Displays comments and comments form
 *
 * @package      ${PACKAGE}
 * @license      license.txt
 * @copyright    ${YEAR} ${COMPANY}
 * @since        ${VERSION}
 *
 * Please do not edit this file. This file is part of the ${PACKAGE} Framework and all modifications
 * should be made in a child theme.
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	?><p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'responsive-II' ); ?></p><?php
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'responsive-II' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="comment-navigation navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'responsive-II' ); ?></h1>
			<div class="nav-previous previous"><?php previous_comments_link( __( '&larr; Older Comments', 'responsive-II' ) ); ?></div>
			<div class="nav-next next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'responsive-II' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use responsive_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define responsive_comment() and that will be used instead.
				 * See responsive_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array(
					'callback'    => 'responsive_comment',
					'avatar_size' => '60',
					'type'        => 'comment'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'responsive-II' ); ?></h1>
			<div class="nav-previous previous"><?php previous_comments_link( __( '&larr; Older Comments', 'responsive-II' ) ); ?></div>
			<div class="nav-next next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'responsive-II' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'responsive-II' ); ?></p>
	<?php endif; ?>

	<?php
	if( ! empty( $comments_by_type['pings'] ) ) : // let's seperate pings/trackbacks from comments
		$count = count( $comments_by_type['pings'] );
		( $count !== 1 ) ? $txt = __( 'Pings&#47;Trackbacks', 'responsive-II' ) : $txt = __( 'Pings&#47;Trackbacks', 'responsive-II' );
		?>

		<h2 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'responsive-II' ), $count, $txt, get_the_title() ) ?></h2>

		<ol class="commentlist">
			<?php wp_list_comments( array(
					'max_depth' => '<em>',
					'type'      => 'pings'
				) ); ?>
		</ol>

	<?php endif; ?>

	<?php if( comments_open() ) : ?>

		<?php
		$fields = array(
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'responsive-II' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'E-mail', 'responsive-II' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'responsive-II' ) . '</label>' .
			'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);

		$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', $fields ) );

		comment_form( $defaults );
		?>

	<?php endif; ?>

</div><!-- #comments -->
