<?php get_header(); ?>

<main>

<?php 

	if(have_posts()) {
		while(have_posts()) {
			the_post();
		}
	}

	include(locate_template("template-parts/hero-internal.php")); 

	the_content(); 

?>

</main>

<?php

	include(locate_template("template-parts/contact-us.php"));

	get_footer(); 

?>
