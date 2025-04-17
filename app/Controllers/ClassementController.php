<?php

defined('ABSPATH') or die('Accès interdit');

require_once MOVIEFLIX_PLUGIN_PATH . 'app/Models/BattleModel.php';

class ClassementController {
    
    private $model;

    public function __construct() {
        $this->model = new BattleModel();
    }

    public function show() {
        $films = $this->model->get_films_votes();
        include MOVIEFLIX_PLUGIN_PATH . 'app/Views/classementView.php';
    }

}