<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boston
 */

get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<!-- <?php
			add_action('widgets_init','zero_add_sidebar');
			function zero_add_sidebar()
			{
				register_sidebar(array(
					'id' => 'my_custom_zone',
					'name' => 'Zone supérieure',
					'description' => 'Apparait en haut du site',
					'before_widget' => '<aside>',
					'after_widget' => '</aside>',
					'before_title' => '<h1>',
					'after_title' => '</h1>'
				));
			}
			?>
		
		<div><?php dynamic_sidebar('my_custom_zone');?></div> -->

		<?php 
			if(!function_exists('dynamic_sidebar') || !dynamic_sidebar("top_zone")) : ?>
		<?php endif ?>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			echo '<div class="archive__layout1">';

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			echo '</div> <!-- .archive__default -->';

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
