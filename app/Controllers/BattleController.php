<?php

defined('ABSPATH') or die('Accès interdit');

require_once MOVIEFLIX_PLUGIN_PATH . 'app/Models/BattleModel.php';

class BattleController {
    
    private $model;

    public function __construct() {
        $this->model = new BattleModel();
    }

    public function display_battle(){
        $films = $this->model->get_random_films();

        include MOVIEFLIX_PLUGIN_PATH . 'app/Views/battleView.php';
    }

    public function vote() {
        if(isset($_POST['film_id'])){
            $film_id = intval($_POST['film_id']);

            if(!isset($_COOKIE["voted_film_$film_id"])){
                $this->model->add_vote($film_id);
                setcookie("voted_film_$film_id", 1, time() + 3600 * 24, '/');
            }
            wp_redirect( home_url() );
            exit;
        }
    }

}