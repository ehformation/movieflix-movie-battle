<?php

defined('ABSPATH') or die('Accès interdit');

if(empty($films) || count($films) < 2){
    echo '<p>Pas assez de film</p>';
    return;
}
?>

<section id="serv_pg" class="pt-4 pb-4 bg_grey">
    <div class="container-xl">
        <div class="row trend_1">
            <div class="col-md-12">
                <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Lequel de ces deux films preferes-tu?</h4>
            </div>
        </div>

        <form method="POST" action="?movieflix-action=vote">

            <div class="row serv_pg1 mt-4">
                <?php $i=0; foreach($films as $film) : ?>
                    <div class="col-md-4">
                        <div class="serv_pg1i bg_dark p-4 pt-3">
                            <h1 class="col_light"><i class="fa fa-video-camera"></i> <span class="pull-right">0<?php echo $i + 1; ?></span></h1>
                            <img src="<?php echo get_the_post_thumbnail_url($film->ID, 'full') ?>" alt="Affiche du film">
                            <h5 class="col_red"><?php echo $film->post_title ?></h5>
                            <button type="submit" name="film_id" value="<?php echo $film->ID ?>">Voter</button>
                        </div>
                    </div>
                <?php $i++; endforeach; ?>
            </div>
        </form>
    </div>
</section>
