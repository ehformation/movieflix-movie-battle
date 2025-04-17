<?php 
/**
 * Plugin Name: MovieFlix - Movie Battle
 * Description: Permet aux utilisateurs de voter entre deux films aléatoires.
 * Version: 1.0
 * Author: Elie
 */

defined('ABSPATH') or die('Accès interdit');

define('MOVIEFLIX_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('MOVIEFLIX_PLUGIN_URL', plugin_dir_url( __FILE__ ));

require_once MOVIEFLIX_PLUGIN_PATH . 'inc/router.php';

function movieflix_init() {
    $router = new MovieFlixRouter();
    $router->handle_request();
}
add_action( 'init', 'movieflix_init');

