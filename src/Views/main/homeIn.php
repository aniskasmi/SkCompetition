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
            <div class="table-responsive m-t-20">
              <table class="table stylish-table">
                <thead>
                  <tr>
                    <th>Pseudo</th>
                    <th>Score</th>
                    <th>Pts</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach (\Manager\Models\ScoresModel::findAll( 'games', $game->getId() ) as $index => $score): ?>
                    <?php if ($index == 0): ?>
                      <tr>
                        <td>
                          <?php if ($user->getId() === $score->getUsers()): ?>
                            <p style="font-weight: bold;"><?= \Manager\Models\UserModel::find( $score->getUsers() )->getPseudo(); ?> <i class="mdi mdi-crown" style="color: yellow;"></i></p>
                          <?php else: ?>
                            <?= \Manager\Models\UserModel::find( $score->getUsers() )->getPseudo(); ?> <i class="mdi mdi-crown" style="color: yellow;"></i>
                          <?php endif; ?>
                        </td>
                        <td><?= $score->getScores(); ?>  </td>
                        <td><?= \Manager\Models\PointsModel::find( $index )->getPoints(); ?>pts</td>
                      </tr>
                    <?php else: ?>
                       <tr>
                         <td>
                           <?php if ($user->getId() === $score->getUsers()): ?>
                             <p style="font-weight: bold;"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> <?= \Manager\Models\UserModel::find( $score->getUsers() )->getPseudo(); ?></p>
                           <?php else: ?>
                             <?= \Manager\Models\UserModel::find( $score->getUsers() )->getPseudo(); ?> <i class="mdi mdi-crown" style="color: yellow;"></i>
                           <?php endif; ?>
                         </td>
                         <td><?= $score->getScores(); ?>  </td>
                         <td><?= \Manager\Models\PointsModel::find( $index )->getPoints(); ?>pts</td>
                       </tr>
                     <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
