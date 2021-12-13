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
		<link rel="icon" sizes="any" href="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/apple-touch-icon.png" />
		<link rel="icon" type="image/png" sizes="192x192" href="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/icon-192.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/icon-32.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/icon-16.png" />
		<link rel="manifest" href="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/site.webmanifest" />
		
		<meta name="theme-color" content="#4B58A1" />

		<meta
			name="description"
			content="Estamos no mercado desde 1978, dedicados à prestação de serviços de contabilidade. Consigo desde o início."
		/>

		<meta property="og:title" content="Profistone - Consigo desde o início." />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php echo site_url(); ?>" />
		<meta property="og:image" content="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/icon-192.png" />
		<meta
			property="og:description"
			content="Estamos no mercado desde 1978, dedicados à prestação de serviços de contabilidade. Consigo desde o início."
		/>

		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="Profistone - Consigo desde o início." />
		<meta
			name="twitter:description"
			content="Estamos no mercado desde 1978, dedicados à prestação de serviços de contabilidade. Consigo desde o início."
		/>
		<meta name="twitter:image" content="<?php echo site_url(); ?>/wp-content/themes/Profistone/build/favicon/icon-192.png" />

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
							href="tel:+351213224901"
							title="Liga para nosso número."
							>+351 213 224 901</a
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
