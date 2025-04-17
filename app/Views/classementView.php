<?php

defined('ABSPATH') or die('Accès interdit');
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Film</th>
      <th scope="col">Nombre de votes</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($films as $film) : ?>
        <tr>
            <th scope="row"><?php echo $film->ID ?></th>
            <td><?php echo $film->post_title ?></td>
            <td><?php echo intval(get_post_meta( $film->ID, 'movieflix_votes', true )) ?> votes</td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>