<?php

get_header();
?>

    <div id="front-page" class="container">

        <main id="primary" class="site-main">

            <?php
            if (!is_user_logged_in()): ?>
                <form name="loginform" id="loginform"
                      action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post">
                    <label for="user_login">Username<br>
                        <input type="text" name="log" id="user_login" class="input" value="" size="20"></label>

                    <label for="user_pass">Password<br>
                        <input type="password" name="pwd" id="user_pass" class="input" value="" size="20"></label>

                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In">
                    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                </form>
            <?php else: ?>
                <a href="<?php echo wp_logout_url(); ?>">Logout</a>
            <?php endif; ?>



            <?php

            echo '<div id="front-page-post-grid" class="row justify-content-center">';

            if (is_user_logged_in()) {
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'frontpage');

                    // If comments are open or we have at least one comment, load up the comment template.
                    //if (comments_open() || get_comments_number()) :
                    // comments_template();
                    // endif;

                endwhile; // End of the loop.
            }

            echo '</div>';

            ?>

        </main><!-- #main -->

    </div>

<?php
if (is_user_logged_in()) {
get_sidebar();
get_footer();
}

