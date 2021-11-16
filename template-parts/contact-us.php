		<?php 
			$hero_class = get_post_meta($post->ID, 'hero_class', true); 
			$nonce = wp_create_nonce('profistone_' . get_the_ID());

			// Notícias
			if(is_home())
			$hero_class = "noticias";

			// Onde estamos
			if(is_page(14)):

		?>
		
		<section class="map">
			<iframe
				width="450"
				height="250"
				frameborder="0" style="border:0"
				src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAXFfbQdEBYVslEMSHsMfarnV57Af8_uA8&center=38.755571450346686,-9.219530780291663&zoom=15&maptype=roadmap" allowfullscreen>
			</iframe>
		</section>
			
			
		<?php
			endif;
		?>

		<div class="dim"></div>
		<dialog class="thanks">
            <button aria-label="Fechar."></button>
            <h1>Agradecemos sua mensagem de contacto</h1>
            <p>
                E retornaremos o mais breve possível.
            </p>
		</dialog>

		<section class="contact contact__<?php echo $hero_class ?>">
			<h2>Contacte-nos</h2>
			<form>
				<label for="name">
					<input
						type="text"
						id="name"
						name="lead_name"
						autocomplete="name"
						placeholder="Nome"
					/>
				</label>
				<label for="email">
					<input
						type="email"
						id="email"
						name="lead_email"
						autocomplete="email"
						placeholder="E-mail"
					/>
				</label>
				<label for="phone">
					<input
						type="tel"
						id="phone"
						name="lead_phone"
						autocomplete="tel-local"
						placeholder="Telefone (opcional)"
					/>
				</label>
				<label for="message">
					<textarea
						id="message"
						name="lead_message"
						placeholder="Mensagem"
					></textarea>
				</label>
				<input type="checkbox" name="terms" id="terms" />
				<label for="terms"
					>Li e aceito os
					<a href="http://profistone.local/wp-content/uploads/2021/11/Politica-de-Privacidade-Profistone.pdf"
						>termos e condições da política de privacidade</a
					></label
				>
				<button
					data-nonce="<?php echo $nonce; ?>"
					data-post="<?php echo get_the_ID(); ?>"
				>
					Enviar <span class="loading"></span>
				</button>
			</form>
		</section>
	
	<?php 
	
		// Onde estamos
		if(is_page(14)) {
			include(locate_template("template-parts/address.php"));
		} 
	
	?>

	