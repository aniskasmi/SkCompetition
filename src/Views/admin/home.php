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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Pseudo</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users::findAll() as $user): ?>
                  <tr>
                    <td>#<?= $user->getId(); ?></td>
                    <td><?= $user->getPseudo(); ?></td>
                      <td><span class="label label-success">Passé</span> </td>
                    <td>
                      <a href="<?= $router->generate('adminUser', ['id' => $user->getId()] ) ?>" class="btn btn-danger waves-effect waves-light">A lui</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
