<?php

	$noticias_args = array(  
		'post_type' => 'news',
		'posts_per_page' => 3,
	);

	$noticias = new WP_Query($noticias_args);

?>

<section class="news news__others<?php if(is_front_page()) echo "--home"; ?>">
	<?php if(is_front_page()): ?>
	<h2>Últimas notícias</h2>
	<?php else: ?>
	<h2>Mais notícias</h2>
	<?php endif; ?>
	<ol>
<?php
	while ($noticias -> have_posts()) : $noticias -> the_post(); 
?>
	<li>
		<figure>
			<figcaption><?php the_title(); ?></figcaption>
			<p><?php the_excerpt(); ?></p>
			<?php
				if (get_the_post_thumbnail())								 
				the_post_thumbnail();
			?>
			<a href="<?php the_permalink(); ?>" class="button button--news">Ler mais</a>
		</figure>
	</li>

	<?php

		endwhile;
		
	wp_reset_postdata(); 

?>

	</ol>
</section>