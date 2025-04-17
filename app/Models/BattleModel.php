<?php

defined('ABSPATH') or die('Accès interdit');

class BattleModel {

    public function get_daily_random_films() {
        $key = "movieflix_daily_battle_" . date("dmY"); 

        $films = get_transient($key); 

        if($films == false){
            $args = array(
                'post_type' => 'film',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'post_status' => 'publish',
            );
            $films = get_posts($args);

            $film_ids =  wp_list_pluck($films, 'ID');

            set_transient( $key, $film_ids, 24 * HOUR_IN_SECONDS);
        }else{
            $args = array(
                'post_type' => 'film',
                'post__in' => $films,
                'orderby' => 'post__in'
            );
            $films = get_posts($args);
        }

        return $films;
    }

    public function add_vote($film_id){
        $nbr_votes = get_post_meta($film_id, 'movieflix_votes');
        $nbr_votes = $nbr_votes ? intval($nbr_votes) + 1 : 1;
        update_post_meta( $film_id, 'movieflix_votes', $nbr_votes);
    }

    public function get_films_votes() {
        return get_posts( [
            'post_type' => 'film',
            'posts_per_page' => -1,
            'meta_key' => 'movieflix_votes',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ] );
    }

}
    