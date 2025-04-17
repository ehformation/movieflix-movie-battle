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


function movieflix_battle_movie_shortcode(){
    ob_start();
    $controller = new BattleController();
    $controller->display_battle();
    return ob_get_clean();
}
add_shortcode( 'battle_movie', 'movieflix_battle_movie_shortcode' );

function movieflix_create_admin_menu() {
    add_menu_page( 'Movieflix', 'Movieflix', 'manage_options', 'movieflix_dashboard', 'movieflix_dashboard_page', 'dashicons-video-alt2', 26 );
    add_submenu_page( 'movieflix_dashboard', 'Classement des films', 'Classement des films', 'manage_options', 'movieflix_classement', 'movieflix_classement_page' );
}
add_action( 'admin_menu', 'movieflix_create_admin_menu' );

function movieflix_dashboard_page() {
    echo '<div class="wrap">';
    echo '<h1>Bienvenue dans l\'admin MovieFlix</h1>';
    echo '<p>Utilisez le menu de gauche pour accéder aux fonctionnalités comme le classement des films.</p>';
    echo '</div>';
}

function movieflix_classement_page(){
    require_once MOVIEFLIX_PLUGIN_PATH . 'app/Controllers/ClassementController.php';
    $controller = new ClassementController();
    $controller->show();
}
