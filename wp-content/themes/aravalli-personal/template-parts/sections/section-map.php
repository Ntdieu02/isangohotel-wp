<?php   
	$contact_pg_map_link	= get_theme_mod('contact_pg_map_link','https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1438544.2714565487!2d10.197676761709376!3d51.14314480954461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1489634550185'); 
?>	
<section class="sec-default">
	<div id="map">
		<iframe src="<?php echo esc_url($contact_pg_map_link); ?>" width="100%" height="472" frameborder="0" scrolling="no" style="border:0;"></iframe>
	</div>
</section>