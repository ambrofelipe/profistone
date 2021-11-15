		<?php 
			$hero_class = get_post_meta($post->ID, 'hero_class', true); 
			$nonce = wp_create_nonce('profistone_' . get_the_ID());

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

		// function send($mail) {
		// 	if(!$mail) {
		// 		throw new Exception("Logged error");
		// 	}

		// 	return $mail;
		// }

		// if($_SERVER['REQUEST_METHOD'] === "POST") {
		// 	$name    = $_POST["lead_name"];
		// 	$email   = $_POST['lead_email'];
		// 	$phone   = $_POST['lead_phone'];
		// 	$message = $_POST['lead_message'];

		// 	$to = "ambrofelipe@gmail.com";
		// 	$subject = "👋 Novo pedido de contacto do site";
		// 	$headers = "From: " . $email . "\r\n" . 
		// 			"Reply-To: " . $email . "\r\n";

		// 	try {
		// 		send(wp_mail($to, $subject, strip_tags($message), $headers));
		// 	} catch (Exception $e) {
		// 		error_log($e->getMessage());
		// 	}
		// }

	
		if($hero_class === "contactos") {
			include(locate_template("template-parts/address.php"));
		} 
	
	?>

	