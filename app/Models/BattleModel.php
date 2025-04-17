<?php

defined('ABSPATH') or die('Accès interdit');

class BattleModel {

    public function get_random_films() {
        $args = array(
            'post_type' => 'film',
            'posts_per_page' => 2,
            'order_by' => 'rand',
            'post_status' => 'publish',
        );

        return get_posts($args);
    }
}
    