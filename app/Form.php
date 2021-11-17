<?php

namespace app;

/**
 * Hook contact form into WP AJAX
 * @package app
 */
class Form {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action('phpmailer_init', array($this, 'profistone_send_smtp'));
		add_action('wp_mail_failed', array($this, 'profistone_log_mailer_errors', 10, 1));
		add_action('wp_ajax_profistone_mail', array($this, 'profistone_send_mail'));
		add_action('wp_ajax_nopriv_profistone_mail', array($this, 'profistone_send_mail'));
	}

	public function send($mail) {
		if(!$mail) {
			throw new \Exception("Logged error");
		}

		return $mail;
	}

	function profistone_send_mail() {
		$data = $_POST;
		$body = "
			Novo pedido de contacto:<br /><br />
			Nome: " . sanitize_text_field($data['name'])  . "<br />
			Email: " . sanitize_text_field($data['email']) . "<br />
			Telefone: " . sanitize_text_field($data['phone']) . "<br />
			Mensagem: " . sanitize_textarea_field($data['message']) . "<br />
			Consentimento: " . $data['check'] . "<br />
			Origem: " . $data['url'] . "<br />
		";

		$response = array('success' => true, 'data' => $data); 

		$to = 'geral@profistone.com';
		$subject = '👋 Novo pedido de contacto do site';
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: ' . $data['name'] . ' <' . $data['email'] . '>';
		$headers[] = 'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>';

		if(!check_ajax_referer( 'profistone_' . $data['post_id'], 'nonce', false)) {
			wp_send_json_error();
		}

		try {
			$this->send(wp_mail($to, $subject, $body, $headers));
			wp_send_json_success($response, 200);
		} catch (Exception $e) {
			error_log($e->getMessage());
			wp_send_json_error();
		}
	}
	
	function profistone_send_smtp($phpmailer) {
		if (!is_object($phpmailer) ) {
			$phpmailer = (object) $phpmailer;
		}

		$phpmailer->Mailer     = 'smtp';
		$phpmailer->Host       = SMTP_HOST;
		$phpmailer->SMTPAuth   = SMTP_AUTH;
		$phpmailer->Port       = SMTP_PORT;
		$phpmailer->Username   = SMTP_USER;
		$phpmailer->Password   = SMTP_PASS;
		$phpmailer->SMTPSecure = SMTP_SECURE;
		$phpmailer->From       = SMTP_FROM;
		$phpmailer->FromName   = SMTP_NAME;
	}

	function profistone_log_mailer_errors($wp_error){
		$fn = ABSPATH . '/wp-content/debug.log';
		$fp = fopen($fn, 'a');
		fputs($fp, "Mailer Error: " . $wp_error->get_error_message() ."\n");
		fclose($fp);
	}
}