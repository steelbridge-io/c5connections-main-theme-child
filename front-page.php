<?php

get_header();
$text = "News";
?>

    <div id="front-page" class="container">

        <main id="primary" class="site-main">
			
			<?php
			if ( ! is_user_logged_in() ): ?>
                <form name="loginform" id="loginform"
                      action="<?php echo esc_url( site_url( 'wp-login.php',
					      'login_post' ) ); ?>" method="post">
                    <label for="user_login">Username<br>
                        <input type="text" name="log" id="user_login"
                               class="input" value="" size="20"></label>

                    <label for="user_pass">Password<br>
                        <input type="password" name="pwd" id="user_pass"
                               class="input" value="" size="20"></label>

                    <input type="submit" name="wp-submit" id="wp-submit"
                           class="button button-primary" value="Log In">
                    <input type="hidden" name="redirect_to"
                           value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                </form>
			<?php endif; ?>
			
			
			<?php
			
			
			if ( is_user_logged_in() ) {
				
				$announcement      = "Announcements";
				$safe_announcement = htmlspecialchars( $announcement,
					ENT_QUOTES,
					'UTF-8' );
				echo '<div class="well text-center">' .
				     '<h1>' . $safe_announcement . '</h1>' .
				     '</div>';
				
				$args = array(
					'post_type'      => 'announcements',
					'posts_per_page' => 6,
					'orderby'        => 'date',
					'order'          => 'DESC',
				);
				
				echo '<div id="front-page-announcement-grid" class="row justify-content-center">';
				
				$query = new WP_Query( $args );
				
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part( 'template-parts/content',
							'frontpage' );
					}
     
				} else {
					
					$non_announcement = "No Announcements at this time.";
					$safe_non_announcement = htmlspecialchars( $non_announcement,
						ENT_QUOTES,
						'UTF-8' );
					echo '<div class="well text-center">' .
					     '<h3>' . $safe_non_announcement . '</h3>' .
					     '</div>';
				}
				
				// Restores the default post data
				wp_reset_postdata();
				
				echo '</div>';
				
				$safe_text = htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' );
				echo '<div class="well text-center">' .
				     '<h1>' . $safe_text . '</h1>' .
				     '</div>';
				
				echo '<div id="front-page-post-grid" class="row justify-content-center">';
    
    
				while ( have_posts() ) :
					the_post();
					
					get_template_part( 'template-parts/content', 'frontpage' );
					
					// If comments are open or we have at least one comment, load up the comment template.
					//if (comments_open() || get_comments_number()) :
					// comments_template();
					// endif;
				
				endwhile; // End of the loop.
				
				echo '</div>';
			}
			
			?>

        </main><!-- #main -->

    </div>

<?php
if ( is_user_logged_in() ) {
	get_sidebar();
	get_footer();
}

