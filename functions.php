<?php

/**
 * Autoloader
 *
 * @param string $class class name
 *
 * @return void
 */
function app_autoloader($class) {

	$path = dirname(__FILE__) . DIRECTORY_SEPARATOR;

	$class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
	if ( file_exists($path . $class . '.php') ) {
		include $path . $class . '.php';
	}

}

// Register autoloader
spl_autoload_register('app_autoloader');

// Theme setup
new \app\Setup();

// JS and CSS
new \app\Enqueue();

// Custom post types
new \app\Types();

// Contact form
new \app\Form();

function profistone_excerpt_length($length) {
	return 60;
}
add_filter('excerpt_length','profistone_excerpt_length', 999);

function profistone_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'profistone_excerpt_more', 999);

function profistone_span_archive_news_count($links) {
  $links = str_replace('(', '<span>', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}
add_filter('get_archives_link', 'profistone_span_archive_news_count');

/**
 * This function will connect wp_mail to your authenticated
 * SMTP server. This improves reliability of wp_mail, and 
 * avoids many potential problems.
 *
 * Values are constants set in wp-config.php. Be sure to
 * define the using the wp_config.php example in this gist.
 *
 * Author:     Chad Butler
 * Author URI: https://butlerblog.com
 *
 * For more information and instructions, see: https://b.utler.co/Y3
 */
add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
	if ( ! is_object( $phpmailer ) ) {
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

function log_mailer_errors( $wp_error ){
  $fn = ABSPATH . '/wp-content/debug.log';
  $fp = fopen($fn, 'a');
  fputs($fp, "Mailer Error: " . $wp_error->get_error_message() ."\n");
  fclose($fp);
}
add_action('wp_mail_failed', 'log_mailer_errors', 10, 1);

?>