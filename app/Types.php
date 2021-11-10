<?php

namespace app;

/**
 * Add custom post types - Serviços and Notícias
 * @package app
 */
class Types {

	/**
	 * Custom post types constructor
	 */
	public function __construct() {
		add_action('init', array($this, 'profistone_create_services_post_type'));
		add_action('init', array($this, 'profistone_create_news_post_type'));
		add_action('admin_menu', array($this, 'profistone_remove_articles'));
	}

	/**
	 * Add Services
	 */
	public function profistone_create_services_post_type() {
		register_post_type('profistone_services',
			array(
				'labels' => array(
					'name' => __('Serviços'),
					'singular_name' => __('Serviço'),
					'add_new' => __('Adicionar novo'),
					'add_new_item' => __('Adicionar um Serviço'),
					'view_item' => __('Ver Serviço'),
					'edit_item' => __('Editar Serviço'),
					'search_items' => __('Buscar um Serviço'),
					'not_found' => __('Serviço não encontrado'),
					'not_found_in_trash' => __('Serviço não encontrado no lixo')
				),
				
				'public' => true,
				'show_ui' => true,
				'show_in_rest' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'show_in_admin_bar' => true,
				'hierarchical' => false,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-businessperson',
				'rewrite' => array('slug' => 'servicos'),
				'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields')
			)
		);
	}

	/**
	 * Add News
	 */
	public function profistone_create_news_post_type() {
		register_post_type('news',
			array(
				'labels' => array(
					'name' => __('Notícias'),
					'singular_name' => __('Notícia'),
					'add_new' => __('Adicionar nova'),
					'add_new_item' => __('Adicionar uma Notícia'),
					'view_item' => __('Ver Notícias'),
					'edit_item' => __('Editar Notícia'),
					'search_items' => __('Buscar uma Notícia'),
					'not_found' => __('Notícia não encontrada'),
					'not_found_in_trash' => __('Notícia não encontrada no lixo')
				),
				
				'public' => true,
				'show_ui' => true,
				'show_in_rest' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'show_in_admin_bar' => true,
				'hierarchical' => false,
				'menu_position' => 6,
				'menu_icon' => 'dashicons-admin-site-alt',
				'has-archive' => true,
				'rewrite' => array('slug' => 'noticias'),
				'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'trackbacks', 'custom-fields'),
				'taxonomies' => array('category', 'post_tag')
			)
		);
	}

	/**
	 * Removes articles menu item from WordPress Admin
	 */
	public function profistone_remove_articles(){
		remove_menu_page( 'edit.php' );
	}
}