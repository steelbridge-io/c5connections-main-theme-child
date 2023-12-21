<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package c5connections_Theme
 */

get_header();
?>

    <div id="single-post-template" class="container">

        <main id="primary" class="site-main">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="'
						           . esc_url( get_permalink() )
						           . '" rel="bookmark">',
							'</a></h2>' );
					endif; ?>
					
					<?php
					$post_id   = get_the_ID(); // Replace with your post ID.
					$author_id = get_post_field( 'post_author', $post_id );
					
					echo '<span class="published">Published:&nbsp;'
					     . get_the_date( 'F j, Y',
							$post_id )
					     . '</span>';  // Echo the date of the post. Change the format as needed.
					echo '<span class="author">Author:&nbsp;'
					     . get_the_author_meta( 'display_name',
							$author_id ) . '</span>';  // Echo the author name.
					?>
					
					<?php
					
					if ( 'post' === get_post_type() ) :
						?>
                        <div class="entry-meta">
							<?php
							c5connections_theme_posted_on();
							c5connections_theme_posted_by();
							?>
                        </div><!-- .entry-meta -->
					<?php endif; ?>
                </header><!-- .entry-header -->
				
				<?php c5connections_theme_post_thumbnail(); ?>

                <div id="daily-story-container">
                
					<?php
					while ( have_posts() ) :
						the_post();
						
						get_template_part( 'template-parts/content',
							get_post_type() );
						
						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">'
								               . esc_html__( 'Previous:',
										'c5connections-theme' )
								               . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">'
								               . esc_html__( 'Next:',
										'c5connections-theme' )
								               . '</span> <span class="nav-title">%title</span>',
							)
						);
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					
					endwhile; // End of the loop.
					?>
                </div>
            </article><!-- #post-<?php the_ID(); ?> -->

        </main><!-- #main -->

    </div>

<?php
get_sidebar();
get_footer();
