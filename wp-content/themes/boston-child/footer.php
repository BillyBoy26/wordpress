<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boston
 */

?>
		</div><!-- .container -->
	</div><!-- #content -->

	<?php do_action('boston_before_footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php do_action('boston_footer_start'); ?>

		<div class="container">
			<div class="site-info">
				<p>
					<?php printf( esc_html__( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', 'boston' ), date('Y'), get_bloginfo( 'name' ) ); ?>
				</p>
				<p><?php 
					printf( esc_html__('Silhouettes du logo fournies par : %s', 'boston'),
						sprintf('<a href="%s" class="link-theme" target="_blank" rel="noopener">%s</a>',
							esc_url('https://vecteezy.com'),
							esc_html__( 'Vector Art by Vecteezy!', 'boston' ))
				 	);
				?></p>
			</div><!-- .site-info -->

		</div>
	</footer><!-- #colophon -->

	<?php do_action('boston_after_footer'); ?>

</div><!-- #page -->
<div id="obfuscator"></div>

<?php wp_footer(); ?>

</body>
</html>