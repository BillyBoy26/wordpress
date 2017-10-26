<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boston
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'boston' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="top-zone-header container">
			<button class="menu-toggle" id="menu-button" aria-label="menu" aria-controls="layout-drawer" aria-expanded="false"></button>
			<div class="top-zone">
				<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
					<?php dynamic_sidebar( 'header-widget-area' ); ?>
				<?php endif; ?>
				<div class="topbar-search">
					<?php do_action('boston_top_searchform'); ?>
					<form action="/" method="get">
					    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="<?php esc_html_e('Search and hit enter...', 'boston') ?>" />
						<span class="genericon genericon-search"></span>
						<!-- <i class="fa fa-search" aria-hidden="true"></i> -->
					</form>
				</div>
			</div>
		</div>
		<div class="site-branding">
			<div class="container">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}

				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
				<?php do_action('boston_after_site_description'); ?>
			</div>
		</div><!-- .site-branding -->

		<div class="site-topbar" id="site-topbar">
			<div class="container">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
				<?php do_action('boston_before_top_searchform'); ?>
			</div>
		</div>

	</header><!-- #masthead -->

	<div id="layout-drawer" area-expanded="false">
		<div id="close-drawer">
			<button area-label="<?php esc_html_e( 'Close Sidebar', 'boston' ); ?>" >
				<?php esc_html_e( 'Close Sidebar', 'boston' ); ?>
			</button>
			<div>
				<?php get_template_part('assets/images/inline', 'closedrawer.svg'); ?>
			</div>
			
		</div>
		<div class="title-drawer-layout">
			<h1 id="title-drawer"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<div class="menu-drawer">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</div>
		
		<div class="bottom-drawer">
			<div class="social-drawer isSocialVisible straight">
				<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
						<?php dynamic_sidebar( 'header-widget-area' ); ?>
				<?php endif; ?>
			</div>
			<div class="footer-drawer">
				<p><?php printf( esc_html__( ' %2$s &copy; %1$s', 'boston' ), date('Y'), get_bloginfo( 'name' ) ); ?></p>
				<p><?php printf( esc_html__( ' All Rights Reserved.', 'boston' )); ?></p>
			</div>
			
		</div>
	</div>

	<?php if ( is_archive() ) { ?>
		<header class="page-header archive-header">
			<div class="container">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</div>
		</header><!-- .page-header -->
	<?php } ?>

	<?php if ( is_home() || is_front_page() ) : ?>
		<div id="featured-content">
			<?php get_template_part( 'template-parts/loop', 'featured' ); ?>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">
		<div class="container">
