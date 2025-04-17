<?php

defined('ABSPATH') or die('Accès interdit');

require_once MOVIEFLIX_PLUGIN_PATH . 'app/Controllers/BattleController.php';

class MovieFlixRouter {
    public function handle_request() {
        $action = isset($_GET['movieflix_action']) ? sanitize_text_field($_GET['movieflix_action']) : null;

        $controller = new BattleController();

        switch ($action) {
            case 'vote' : 
                $controller->vote();
                break;
            default:
                $controller->display_battle();
                break;
        }
    }
}