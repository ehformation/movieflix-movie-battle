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

    public function add_vote($film_id){
        $nbr_votes = get_post_meta($film_id, 'movieflix_votes');
        $nbr_votes = $nbr_votes ? intval($nbr_votes) + 1 : 1;
        update_post_meta( $film_id, 'movieflix_votes', $nbr_votes);
    }

}
    