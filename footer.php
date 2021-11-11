		<footer>
			<div class="wrapper">
				<a
					href="#"
					title="Página inicial da Profistone — consigo desde o início."
				></a>
				<p>Acompanhamos o seu negócio desde a sua constituição</p>
				<p>
					Aumentamos o valor da sua empresa, através da entrega de
					informação contabilística de qualidade e através de uma
					adequada gestão fiscal
				</p>
				<p>
					Entregamos informação de gestão, capaz de o apoiar na tomada
					de decisão
				</p>
				<p>
					Disponibilizamos equipas multidisciplinares, jovens e
					motivadas para lhe entregar soluções inovadoras.
				</p>
				<nav>
					<span>Menus</span>
					<?php
						$legal_args = array(
							'menu'              => "15",
							'menu_class'        => "",
							'menu_id'           => "",
							'container'         => "",
							'container_class'   => "",
							'container_id'      => "",
							'item_spacing'      => "discard",
						);

						wp_nav_menu($legal_args);
					?>
				</nav>
				<address>
					<span>Contactos</span>
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
						<li>Rua Latino Coelho, n. 1<br />2700-514 Amadora</li>
					</ul>
				</address>
			</div>
			<div class="bar">
				<div class="wrapper">
					<span class="copy"
						>Profistone &copy; 2021. Todos os direitos
						reservados.</span
					>

					<?php
						$legal_args = array(
							'menu'              => "3",
							'menu_class'        => "",
							'menu_id'           => "",
							'container'         => "",
							'container_class'   => "",
							'container_id'      => "",
							'item_spacing'      => "discard",
						);

						wp_nav_menu($legal_args);
					?>
				</div>
			</div>
		</footer>
    
    <?php wp_footer(); ?>
    
	</body>
</html>