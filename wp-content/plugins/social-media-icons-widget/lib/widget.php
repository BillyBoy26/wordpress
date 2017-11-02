<?php 
	extract($args);
	echo $before_widget; 
?>

<div class="social-icons-widget">
	<?php 
		wp_enqueue_script('plugin', plugin_dir_url(__FILE__) . '../js/plugin.js');
		echo '<button id="share-button" class="social-button-container" type="button"">';
 		echo 	'<i class="fa fa-share-alt social-share-button "/></i>'; 
 		echo '</button>'
	?>

	<ul id="social-icons">
		<li class="facebook">
			<a href="https://www.facebook.com/%C3%89cole-Base-Paris-%C3%A0-linstitut-National-du-Judo-1477862432307396/">
				<i class="fa fa-facebook"></i>
			</a>
		</li>
		<li class="googleplus">
			<a href="https://plus.google.com/u/0/104851237243935102246"">
				<i class="fa fa-google-plus"></i>
			</a>
		</li>
		<li class="instagram">
			<a href="https://www.instagram.com/deniscasselle/?hl=fr">
				<i class="fa fa-instagram"></i>
			</a>
		</li>
		<li class="twitter">
			<a href="https://twitter.com/Polegar5">
				<i class="fa fa-twitter"></i>
			</a>
		</li>
		<li class="pinterest">
			<a href="https://pinterest.com/">
				<i class="fa fa-pinterest"></i>
			</a>
		</li>
	</ul>
</div>


<?php echo $after_widget; ?>