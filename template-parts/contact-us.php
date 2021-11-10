		<?php 
			$hero_class = get_post_meta($post->ID, 'hero_class', true); 

			if(is_home())
			$hero_class = "noticias";
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
			<form action="">
				<label for="name">
					<input
						type="text"
						id="name"
						name="name"
						autocomplete="name"
						placeholder="Nome"
					/>
				</label>
				<label for="email">
					<input
						type="email"
						id="email"
						name="email"
						autocomplete="email"
						placeholder="E-mail"
					/>
				</label>
				<label for="phone">
					<input
						type="tel"
						id="phone"
						name="phone"
						autocomplete="tel-local"
						placeholder="Telefone (opcional)"
					/>
				</label>
				<label for="text">
					<textarea
						name="text"
						id="text"
						placeholder="Mensagem"
					></textarea>
				</label>
				<input type="checkbox" name="terms" id="terms" />
				<label for="terms"
					>Li e aceito os
					<a href="#"
						>termos e condições da política de privacidade</a
					></label
				>
				<button>
					Enviar <span class="loading"></span>
				</button>
			</form>
		</section>
	
	<?php 
	
		if($hero_class === "contactos") {
			include(locate_template("template-parts/address.php"));
		} 
	
	?>

	