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

	if(is_page("clientes"))
	include(locate_template("template-parts/content-feedback.php"));

	include(locate_template("template-parts/contact-us.php"));

	get_footer(); 

?>