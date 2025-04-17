<?php

defined('ABSPATH') or die('Accès interdit');

if(empty($films) || count($films) < 2){
    echo '<p>Pas assez de film</p>';
    return;
}
foreach($films as $film){

    var_dump($film->post_title);
}
return;
?>
