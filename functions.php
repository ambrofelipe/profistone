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

?>