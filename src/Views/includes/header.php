<?php
# @Author: Anis KASMI <Pink3vil>
# @Date:   2019-09-26T16:31:13+02:00
# @Email:  contact@skyreka.com
# @Filename: header.php
# @Last modified by:   Pink3vil
# @Last modified time: 2019-11-08T16:02:27+01:00
# @Copyright: Skyreka Studio (skyreka.com)
?>
<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-light">
    <div class="navbar-header">
      <a>
      <img src="images/logoofficiel.png" style="width: 60px;" alt="homepage" class="dark-logo" />
      </a>
    </div>
    <div class="navbar-collapse">
      <ul class="navbar-nav mr-auto mt-md-0">
        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
      </ul>
      <ul class="navbar-nav my-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/profile.png" alt="user" class="profile-pic" /></a>
          <div class="dropdown-menu dropdown-menu-right scale-up">
            <ul class="dropdown-user">
              <li>
                <div class="dw-user-box text-center">
                  <div class="u-text">
                    <h4><?= $user->getPseudo(); ?></h4>
                    <p class="text-muted"><?= $user->getEmail(); ?></p>
                  </div>
                </div>
              </li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= $router->generate('logout'); ?>"><i class="fa fa-power-off"></i> Déconnexion</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
