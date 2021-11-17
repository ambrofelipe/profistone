<?php

namespace app;

class Setup {

    /**
     * Theme setup constructor.
     */
    public function __construct(){
        add_action('after_setup_theme', array($this, 'profistone_theme_setup'));
		remove_action('shutdown', array($this, 'wp_ob_end_flush_all'), 1);
		add_action('shutdown', function() { while (@ob_end_flush()); });
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    public function profistone_theme_setup(){
        
        /*
         * Make theme available for translation.
         * Translations can be filed in the /lang/ directory.
         */
        load_theme_textdomain('profistone', get_template_directory() . '/lang');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');


        // Registers navigation menu locations for a theme.
        register_nav_menus(array(
            'primary' => __('Main Menu', 'profistone'),
            'footer' => __('Footer Menu', 'profistone'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array('search-form'));
    }
}