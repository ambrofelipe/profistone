<?php get_header(); ?>

<main class="news news__blog">
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

	<div class="hero hero__internal hero--news">
		<h1>Notícias</h1>
	</div>
	
	<div class="news wrapper">
<?php

$args = array(
    'post_type' => 'news',
    'posts_per_page' => 3
);

$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query -> have_posts() ) : ?>

    <?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>

		<article class="news news__article">
        	<h2><?php the_title(); ?></h2>

			<div class="info">
				<h3>
					<?php 
						$categories = get_the_category(); 

						if(!empty($categories)) {
							echo esc_html($categories[0] -> name);
						}
					?>
				</h3>
				<time datetime="<?php echo get_the_date("c"); ?>"
					><?php echo get_the_date("j, F | Y"); ?></time
				>
			</div>

			<?php if (get_the_post_thumbnail()) : ?>									 
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>

			<p>
				<?php echo wp_trim_excerpt(); ?>
			</p>

			<a href="<?php echo get_the_permalink() ?>" class="button button__news">Ler mais</a>
		</article>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>

</div>

</main>

<?php get_footer(); ?>