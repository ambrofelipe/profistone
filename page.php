<?php get_header(); ?>

<main>

<?php 

	if(have_posts()) {
		while(have_posts()) {
			the_post();
		}
	}

	include(locate_template("template-parts/hero-internal.php")); 

	// Serviços
	if(is_page(43)) {
		$services_args = array(
			'menu'              => "16",
			'menu_class'        => "menu-services",
			'menu_id'           => "",
			'container'         => "nav",
			'container_class'   => "services__nav",
			'container_id'      => "",
			'item_spacing'      => "discard",
		);

		wp_nav_menu($services_args);
	}

	the_content(); 

?>

</main>

<?php
	// Clientes
	if(is_page(10)) {
		include(locate_template("template-parts/content-feedback.php"));
	}
	
	include(locate_template("template-parts/contact-us.php"));

	get_footer(); 

?>