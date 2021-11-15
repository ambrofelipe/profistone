<?php

namespace app;

/**
 * Enqueue JS and CSS assets
 * @package app
 */
class Enqueue {

	/**
	 * Enqueue constructor.
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts') );

	}

	/**
	 * Add CSS
	 */
	public function styles() {
		wp_enqueue_style( 'main-style', Assets::get('css', 'main.css') );
	}

	/**
	 * Add JS
	 */
	public function scripts() {

        wp_enqueue_script( 'vendor-script', Assets::get('js', 'vendor.js'), array(), null, true );
		wp_enqueue_script( 'main-script', Assets::get('js', 'main.js'), array('jquery'), null, true );

		// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
		wp_localize_script( 'main-script', 'settings', 
			array( 
				'ajaxurl' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('ajaxform'),
				'error' => __('Desculpe, houve um erro ao enviar o e-mail. Já avisámos a equipa.') 
				) 
			);
	}

}