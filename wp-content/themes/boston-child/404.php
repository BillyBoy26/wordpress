<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Boston
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'boston' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php 
					printf( esc_html__('Il semble que rien n\'ait été trouvé à cet emplacement. Essayez peut-être une recherche ou retourner sur la page d\'%s ?', 'boston'),
						sprintf('<a href="%s" class="link-theme">%s</a>',
							esc_url( home_url( '/' )),
							esc_html__( 'accueil', 'boston' ))
				 	);


					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_sidebar();
get_footer();
