<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0, user-scalable=no"
		/>

        <?php wp_head(); ?>

		<!-- favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="" />
		<link rel="icon" type="image/png" sizes="192x192" href="" />
		<link rel="icon" type="image/png" sizes="32x32" href="" />

		<meta name="theme-color" content="#4B58A1" />

		<!-- Google Tag Manager -->

		<!-- End Google Tag Manager -->
	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->

		<!-- End Google Tag Manager (noscript) -->

		<header>
			<address>
				<ul>
					<li>
						<a
							href="tel:+351213224900"
							title="Liga para nosso número."
							>+351 213 224 900</a
						>
					</li>
					<li>
						<a
							href="mailto:geral@profistone.com"
							title="Envia-nos um e-mail."
							>geral@profistone.com</a
						>
					</li>
					<li class="instagram">
						<a
							href="//instagram.com/profistone_"
							title="Instagram da Profistone."
						></a>
					</li>
					<li class="linkedin">
						<a
							href="//linkedin.com/company/profistone"
							title="LinkedIn da Profistone."
						></a>
					</li>
				</ul>
			</address>
			<nav>
				<a href="/" class="logo" title="Profistone"></a>

				<?php
					wp_nav_menu(
						array(
							'menu' => 'primary',
							'container' => '',
							'theme_location' => 'primary',
							'items_wrap' => '<ul id="" class="top-nav">%3$s</ul>'
						)
					)
				?>
			</nav>
		</header>
