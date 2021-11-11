<?php get_header(); ?>

<main class="news news__single">
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

	<?php 

		if(have_posts()) {
			while(have_posts()) {
				the_post();
			}
		}

	?>

	<div class="hero hero__internal hero--news">
		<h1><?php the_title(); ?></h1>
	</div>

	
	<div class="news wrapper">

	<!--

		Start search / month navigation widget


	-->

		<aside>
			<?php get_search_form(); ?>

			<span>Arquivo</span>

			<nav>
				<ul>
					<?php

						$archives_args = array(
							'type'            => "monthly",
							'limit'           => "3",
							'show_post_count' => true,
							'post_type'       => "news",
						);

						wp_get_archives($archives_args);

					?>
				</ul>
			</nav>

		</aside>


	<!--

		Start article


	-->

		<?php

			$categories = get_the_category();
			$category = $categories[0] -> cat_name;

			$date_tag = get_the_date("c");
			$date_print = get_the_date("j, F | Y");

		?>

		<article class="news news__article">
			<h2><?php echo $category; ?></h2>
			<time datetime="<?php echo $date_tag; ?>"
				><?php echo $date_print; ?></time
			>
			<?php the_content(); ?>
		
		</article>

	<!--

		Start Previous / Next

		
	-->

<?php
	$prev_article = get_adjacent_post(false, "", true);
	$prev_article_link = get_permalink($prev_article->ID);
	$prev_article_title = $prev_article->post_title;
	$prev_article_img = wp_get_attachment_image_url(get_post_thumbnail_id($prev_article->ID), 'thumbnail');

	$next_article = get_adjacent_post(false, "", false);
	$next_article_link = get_permalink($next_article->ID);
	$next_article_title = $next_article->post_title;
	$next_article_img = wp_get_attachment_image_url(get_post_thumbnail_id($next_article->ID), 'thumbnail');

?>

<nav class="prev-next">
	<ul>
		<li>
			<a href="<?php echo $prev_article_link; ?>">Notícia anterior</a>
			<img src="<?php echo $prev_article_img; ?>" alt="<?php echo $prev_article_title; ?>">
			<span><?php echo $prev_article_title; ?></span>
		</li>
		<li>
			<a href="<?php echo $next_article_link; ?>">Próxima notícia</a>
			<span><?php echo $next_article_title; ?></span>
			<img src="<?php echo $next_article_img; ?>" alt="<?php echo $next_article_title; ?>">
		</li>
	</ul>
</nav>

<!--

	Start news categories

	
-->

<?php
	$categories_args = array(
		'menu'              => "14",
		'menu_class'        => "",
		'menu_id'           => "",
		'container'         => "nav",
		'container_class'   => "news news__nav",
		'container_id'      => "",
		'item_spacing'      => "discard",
	);

	wp_nav_menu($categories_args);
?>

</div>

</main>

<?php

	include(locate_template("template-parts/content-mais_noticias.php"));

	include(locate_template("template-parts/contact-us.php"));

	get_footer(); 

?>
