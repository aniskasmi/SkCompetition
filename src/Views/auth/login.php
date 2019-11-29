<?php
# @Author: Anis KASMI <Pink3vil>
# @Date:   2018-03-04T11:59:21+01:00
# @Email:  contact@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-18T12:48:58+01:00
# @Copyright: Skyreka Studio (skyreka.com)
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <base href="<?= $baseUrl . '/public/' ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="descriptn" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>
    <?= $namePanel; ?> | Connexion</title>
  <!-- Bootstrap Core CSS -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/colors/green-dark.css" id="theme" rel="stylesheet">
  <!-- Switchery -->
  <link href="plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <section id="wrapper" class="login-register" style="background: #263238;">
    <div class="login-box card">
      <div class="card-body">
        <?php if (count($errors) > 0): ?>
        <?php foreach($errors as $error): ?>
        <div class="alert alert-danger">
          <?=$error?>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <form data-toggle="validator" role="form" class="form-horizontal form-material" id="loginform" action="<?= $router->generate('login'); ?>" method="POST">
          <img src="images/logoofficiel.png" alt="logo" style="width:100%;">
          <div class="m-t-30 form-group ">
            <div class="col-xs-12">
              <input class="form-control" type="text" placeholder="Adresse e-mail" name="email" data-error="Rempli bien le champ !>" required> </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="text" placeholder="Votre mot de passe" name="password" style="-webkit-text-security: disc;" data-error="Rempli bien le champ !>" required autocomplete="off"> </div>
          </div>
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login">Connexion</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.slimscroll.js"></script>
  <script src="js/waves.js"></script>
  <script src="js/validator.js"></script>
  <script src="plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
  <script src="js/mask.init.js"></script>
  <!--Switch -->
  <script src="plugins/switchery/dist/switchery.min.js"></script>
  <script src="js/custom.min.js"></script>
</body>
</html>
