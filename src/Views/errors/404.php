<?php
# @Author: Anis KASMI <aniskasmi>
# @Date:   2019-03-12T00:24:09+01:00
# @Email:  contact@aniskasmi.com
# @Filename: 404.php
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-03-28T23:37:39+02:00
# @Copyright: Skyreka Studio (skyreka.com)
$this->layout('layout/noheader');
?>
<div class="error-box" style="background-color: black !important;">
    <div class="error-body text-center">
        <h1 class="text-danger" style="margin: 9rem;">Wait...</h1>
        <h3 class="text-uppercase">Annoncement bientôt</h3>
        <a href="<?= $router->generate('logout') ?>" style="margin-top: 2rem !important;" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Déconnexion</a>
      </div>
</div>
