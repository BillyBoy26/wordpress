<?php 

if(!isset($instance['title'])) { $instance['title'] = ''; }
if(!isset($instance['always_straight'])) { $instance['always_straight'] = ''; }
if(!isset($instance['round_icons'])) { $instance['round_icons'] = ''; }

?>

<div class="social_icons_widget">

<p><label for="<?php echo $this->get_field_id('title'); ?>">Titre :</label>
<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" /></p>

<p>
	<input type="checkbox" name="<?php echo $this->get_field_name('always_straight'); ?>" id="<?php echo $this->get_field_id('always_straight'); ?>" <?php checked($instance["always_straight"],"on"); ?>>
	<label for="<?php echo $this->get_field_id('always_straight'); ?>">
		Toujours afficher les icones
	</label>
</p>
<p>
	<input type="checkbox" name="<?php echo $this->get_field_name('round_icons'); ?>" id="<?php echo $this->get_field_id('round_icons'); ?>" <?php checked($instance["round_icons"],"on"); ?>>
	<label for="<?php echo $this->get_field_id('round_icons'); ?>">
		Icones arrondis
	</label>
</p>
</div>