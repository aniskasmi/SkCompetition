<?php
# @Author: Anis KASMI
# @Date:   2019-04-13T22:24:11+03:00
# @Email:  contact@aniskasmi.com
# @Filename: setting.php
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-04-13T23:38:14+03:00
# @Copyright: Skyreka Studio (skyreka.com)

$this->layout('layout/layout');
?>
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
      <h3 class="text-themecolor m-b-0 m-t-0">Votre compte</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $user->getIdentity(); ?></a></li>
        <li class="breadcrumb-item active">Paramètres</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body">
          <center class="m-t-30"> <img src="images/users/1.jpg" class="img-circle" width="150" />
            <h4 class="card-title m-t-10"><?= $user->getIdentity(); ?></h4>
            <h6 class="card-subtitle">Utilisateur d'LMS Manager</h6>
            <div class="row text-center justify-content-md-center">
              <div class="col-12">
                <a href="<?= $router->generate('ilotsList') ?>" class="link"><i class="icon-crop"></i>
                  <font class="font-medium"> Ilots : <?= $culture->count('user', $user->getId()) ?></font>
                </a>
              </div>
              <div class="col-12">
                <a href="<?= $router->generate('culturesList') ?>" class="link"><i class="icon-picture"></i>
                <font class="font-medium">Cultures : <?= $ilot->count('user', $user->getId()) ?></font>
                </a>
              </div>
            </div>
          </center>
        </div>
        <div>
          <hr>
        </div>
        <div class="card-body">
          <small class="text-muted">Adresse mail:</small>
          <h6><?= $user->getEmail(); ?></h6>
          <small class="text-muted p-t-10 db">Phone</small>
          <h6><?= $user->getPhone(); ?></h6>
          <small class="text-muted p-t-10 db">Ville</small>
          <h6><?= $user->getCity(); ?></h6>
          <small class="text-muted p-t-10 db">Exploitation:</small>
          <h6><?= $user->getHectare(); ?> ha</h6>
          <div class="map-box">
            <iframe src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=<?= $user->getCity(); ?>&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
      <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= $success; ?></div>
      <?php endif; ?>
      <div class="card">
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="settings" role="tabpanel">
            <div class="card-body">
              <form method='POST' data-toggle="validator" role="form" action="<?= $router->generate('setting'); ?>">
                <div class="form-group">
                  <label class="col-md-12">Nom:</label>
                  <div class="col-md-12">
                    <input type="text" value="<?= $user->getLastname(); ?>" class="form-control form-control-line" data-error="<?= $errorInput; ?>" required name="lastname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Prénom:</label>
                  <div class="col-md-12">
                    <input type="text" value="<?= $user->getFirstname(); ?>" class="form-control form-control-line" data-error="<?= $errorInput; ?>" required name="firstname">
                  </div>
                </div>
                <div class="form-group">
                  <label for="example-email" class="col-md-12">Email</label>
                  <div class="col-md-12">
                    <input type="email" value="<?= $user->getEmail(); ?>" class="form-control form-control-line email-inputmask" data-error="<?= $errorInput; ?>" required name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Téléphone</label>
                  <div class="col-md-12">
                    <input type="text" value="<?= $user->getPhone(); ?>" class="form-control form-control-line phonefr-inputmask" data-error="<?= $errorInput; ?>" required name="phone">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Ville</label>
                  <div class="col-md-12">
                    <input type="text" value="<?= $user->getCity(); ?>" class="form-control form-control-line" data-error="<?= $errorInput; ?>" required name="city">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Mot de passe actuel:</label>
                  <div class="col-md-12">
                    <input type="number" step="1" class="form-control form-control-line numeric-inputmask" name="actualPassword" data-error="<?= $errorInput; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Nouveau mot de passe:</label>
                  <div class="col-md-12">
                    <input type="number" step="1" id="password" class="form-control form-control-line numeric-inputmask" name="newPassword">
                  </div>
                  <label class="col-md-12 m-t-10">Confirmation:</label>
                  <div class="col-md-12">
                    <input type="number" step="1" data-match="#password" data-error="Les mots de passe ne correspond pas" class="form-control form-control-line numeric-inputmask" name="confirmPassword">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-success" type="submit" name="update">Mettre à jour</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="right-sidebar">
    <div class="slimscrollright">
      <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
      <div class="r-panel-body">
        <ul id="themecolors" class="m-t-20">
          <li><b>With Light sidebar</b></li>
          <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
          <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
          <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
          <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
          <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
          <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
          <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
          <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
          <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
          <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
          <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
          <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
          <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
        </ul>
        <ul class="m-t-20 chatonline">
          <li><b>Chat option</b></li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
          </li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
          </li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
          </li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
          </li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
          </li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
          </li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
          </li>
          <li>
            <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
