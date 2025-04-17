<?php

defined('ABSPATH') or die('Accès interdit');

require_once MOVIEFLIX_PLUGIN_PATH . 'app/Controllers/BattleController.php';

class MovieFlixRouter {
    public function handle_request() {
        $action = isset($_GET['movieflix-action']) ? sanitize_text_field($_GET['movieflix-action']) : null;

        $controller = new BattleController();

        switch ($action) {
            case 'vote' : 
                $controller->vote();
                break;
            default:
               
            break;
        }
    }
}