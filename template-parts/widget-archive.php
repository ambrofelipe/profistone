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