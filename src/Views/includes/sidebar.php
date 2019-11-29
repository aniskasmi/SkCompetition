<?php
# @Author: Anis KASMI <Pink3vil>
# @Date:   2019-09-26T16:31:13+02:00
# @Email:  contact@skyreka.com
# @Filename: sidebar.php
# @Last modified by:   Pink3vil
# @Last modified time: 2019-11-08T16:29:56+01:00
# @Copyright: Skyreka Studio (skyreka.com)?>
<aside class="left-sidebar">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <?php $competitionStatus = true; if ($competitionStatus): ?>
          <li class="nav-small-cap">Classement Général</li>
          <ul style="padding-left: 20px !important">
            <?php foreach ($users::findAll() as $index => $user): ?>
              <li>
                <?php switch ($index) {
                  case '0': $crown = '<i class="mdi mdi-crown" style="color: #ffd700; font-size: 1.5rem;"></i>'; break;
                  case '1': $crown = '<i class="mdi mdi-crown" style="color: #C0C0C0; font-size: 1.25rem;"></i>'; break;
                  case '2': $crown = '<i class="mdi mdi-crown" style="color: #cd7f32;"></i>'; break;
                  case '2': $crown = '<i class="mdi mdi-crown" style="color: yellow;"></i>'; break;
                  default: $crown = ''; break;
                }  ?>
                <?= $crown; ?> <?= $user->getPseudo(); ?>
                <span style="float: right !important;"><?= \Manager\Models\PointsModel::countAllScore( $user->getId() ); ?>pts</td></span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <li class="nav-small-cap">Participants</li>
          <ul style="padding-left: 20px !important">
            <?php foreach ($users::findAll() as $user): ?>
              <li><?= $user->getPseudo(); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
  <?php if ($config['competitionStatus'] === 1): ?>
    <div class="sidebar-footer">
       <p class="text-center mt-2">Session en cours..</p>
       <h3 class="text-center mb-3">Pink3vil</h3>
    </div>
  <?php endif; ?>
</aside>
