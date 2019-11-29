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
    <div class="col-lg-12">
      <div class="card blog-widget">
        <div class="card-body">
          <h4 class="card-title">Score de <?= $user->getPseudo(); ?> sur <?= $game->getName(); ?></h4>
          <form class="form-material m-t-40" method="POST" action="<?php $router->generate('adminEnter'); ?>">
            <div class="form-group">
              <label>Score de <?= $user->getPseudo(); ?> sur <?= $game->getName(); ?></label>
              <input type="text" name="valueScore" class="form-control form-control-line">
            </div>
            <div class="form-actions">
              <button type="submit" name="enter" class="btn btn-success"> <i class="fa fa-check"></i> Sauvegarder</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
