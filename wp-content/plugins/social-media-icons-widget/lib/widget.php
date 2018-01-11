<?php 
	extract($args);

	$siw_title = empty($instance['title']) ? "":apply_filters('widget_title', $instance['title']);
	$siw_always_straight = $instance['always_straight'] ? TRUE : FALSE;
	$siw_round_icon = $instance['round_icons'] ? TRUE : FALSE;

	echo $before_widget; 
	if(!empty($siw_title)) {
		echo $before_title;		
		echo $siw_title;	
		echo $after_title;
	}

	$container_class = "social-icons-widget-container";
	if($siw_always_straight){
		$container_class .= " straight isSocialVisible";
	}
	if($siw_round_icon){
		$container_class .= " siw-round";
	}
	
?>
<div class="<?php echo $container_class;?>" >
	<?php 
		if(!$siw_always_straight) {
			wp_enqueue_script('plugin', plugin_dir_url(__FILE__) . '../js/plugin.js'); ?>
	
			<button id="share-button" class="social-button-container" aria-label="open-social-media" type="button"">
	 			<i class="fa fa-share-alt social-share-button" aria-hidden="true"/></i>
	 		</button>

	<?php } //if !$siw_always_straight end ?>

	<ul id="social-icons">
		<li class="facebook">
			<a href="https://www.facebook.com/%C3%89cole-Base-Paris-%C3%A0-linstitut-National-du-Judo-1477862432307396/" target="_blank" rel="noopener">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
		</li>
		<li class="googleplus">
			<a href="https://plus.google.com/u/0/104851237243935102246" target="_blank" rel="noopener">
				<i class="fa fa-google-plus" aria-hidden="true"></i>
			</a>
		</li>
		<li class="instagram">
			<a href="https://www.instagram.com/deniscasselle/?hl=fr" target="_blank" rel="noopener">
				<i class="fa fa-instagram" aria-hidden="true"></i>
			</a>
		</li>
		<li class="twitter">
			<a href="https://twitter.com/Polegar5" target="_blank" rel="noopener">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
		</li>
		<li class="pinterest">
			<a href="https://pinterest.com/" target="_blank" rel="noopener">
				<i class="fa fa-pinterest" aria-hidden="true"></i>
			</a>
		</li>
	</ul>
</div>



<?php echo $after_widget; ?>