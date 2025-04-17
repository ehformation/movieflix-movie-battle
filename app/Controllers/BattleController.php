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

}