<?php
# @Author: Anis KASMI <aniskasmi>
# @Date:   2019-03-04T02:44:45+01:00
# @Email:  contact@aniskasmi.com
# @Filename: home.php
# @Last modified by:   aniskasmi
# @Last modified time: 2019-08-21T14:40:50+02:00
# @Copyright: Skyreka Studio (skyreka.com)

$this->layout('layout/layout');
?>
<div class="container-fluid">
  <div class="row">
    <?php foreach ($games::findAll() as $game): ?>
      <div class="col-lg-3">
        <div class="card blog-widget">
          <div class="card-body">
            <div class="blog-image"><img src="images/<?= $game->getImg(); ?>" alt="img" class="img-responsive" /></div>
            <div class="d-flex no-block">
              <h4 class="card-title"><?= $game->getName(); ?></h4>
            </div>
            <a target="_blank" href="<?= $game->getLink(); ?>" class="btn btn-block btn-danger waves-effect waves-light mt-1">Accéder au jeu</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
