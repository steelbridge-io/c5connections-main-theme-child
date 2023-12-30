<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package c5connections_Theme
 */

?>

<div id="front-page-posts" class="card col-lg-3">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
                </a>
            </h4>
	        <?php
	        $post_id   = get_the_ID(); // Replace with your post ID.
	        $author_id = get_post_field( 'post_author', $post_id );
	        
	        echo '<span class="published">Published:&nbsp;' . get_the_date( 'F j, Y',
			        $post_id ) . '</span>';  // Echo the date of the post. Change the format as needed.
	        echo '<span class="author">Author:&nbsp;' . get_the_author_meta( 'display_name',
			        $author_id ) . '</span>';  // Echo the author name.
	        ?>
        </header><!-- .entry-header -->
		
		<?php c5connections_theme_post_thumbnail(); ?>

        <div class="entry-content">
			<?php
			the_excerpt();
			
			wp_link_pages(
				array(
					'before' => '<div class="page-links">'
					            . esc_html__( 'Pages:', 'c5connections-theme' ),
					'after'  => '</div>',
				)
			);
			?>
        </div><!-- .entry-content -->
		
		<?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>',
								'c5connections-theme' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
            </footer><!-- .entry-footer -->
		<?php endif; ?>
    </article><!-- #post-<?php the_ID(); ?> -->

</div>
