<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<?php
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			$hero_title = get_post_meta($post->ID, 'hero_title', true);
		}
	}
?>

        <main>  
			<svg
				width="0"
				height="0"
				viewBox="0 0 1 1"
				preserveAspectRatio="none"
				version="1.1"
				xmlns="http://www.w3.org/2000/svg"
				xmlns:xlink="http://www.w3.org/1999/xlink"
				xml:space="preserve"
				xmlns:serif="http://www.serif.com/"
				style="
					fill-rule: evenodd;
					clip-rule: evenodd;
					stroke-linejoin: round;
					stroke-miterlimit: 2;
				"
			>
				<clipPath
					id="hero-path"
					clipPathUnits="objectBoundingBox"
					transform="scale(1.35, 2.35)"
				>
					<path
						d="M0,0l0.75,0l0,0.33c-0.251,-0 -0.41,0.163 -0.75,0.017l0,-0.347Z"
					/>
				</clipPath>
			</svg>

			<div class="hero hero__home">
				<h1><?php echo $hero_title; ?></h1>
				<div class="mouse">
					<div class="scroll"></div>
				</div>
			</div>

			<?php the_content(); ?>

        </main>

<?php 

	include(locate_template("template-parts/content-feedback.php"));
	
	include(locate_template("template-parts/contact-us.php"));

	get_footer(); 

?>
