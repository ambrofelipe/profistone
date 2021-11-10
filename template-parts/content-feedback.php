<?php

	$feedback_args = array(  
		'post_type' => 'feedback',
		'posts_per_page' => 3,
	);

	$feedback = new WP_Query($feedback_args);

?>

<section class="feedback">
	<h2>Feedback</h2>
		<ul>

<?php
	while ($feedback -> have_posts()) : $feedback -> the_post(); 

?>
	<li>
	
	<?php
		$profile_photo = get_the_post_thumbnail_url(get_the_ID());
		if ($profile_photo): ?>
		<img src="<?php echo $profile_photo ?>" alt="<?php the_title(); ?>" />
		<?php endif;
		
		the_content();
	?>

	</li>

<?php

	endwhile;
	
	wp_reset_postdata(); 

?>

	</ul>
</section>