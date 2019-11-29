<?php
# @Author: Anis KASMI <Pink3vil>
# @Date:   2018-03-04T11:59:21+01:00
# @Email:  contact@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-04-14T02:14:56+03:00
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
		<title><?= $namePanel; ?> | Inscription</title>
		<!-- Bootstrap Core CSS -->
		<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/style.css" rel="stylesheet">
		<!-- You can change the theme colors from here -->
		<link href="css/colors/blue.css" id="theme" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- ============================================================== -->
		<div class="preloader">
			<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
		</div>
		<section id="wrapper" style="background: #263238;">
			<div class="login-register" style="background: #263238;">
				<div class="login-box card">
					<div class="card-body">
						<?php if (!empty($success)): ?>
              <div class="alert alert-success"><?= $success; ?></div>
            <?php endif; ?>
						<img src="images/logoofficiel.png" alt="logo" style="width:90%;">
						<form data-toggle="validator" role="form" class="form-horizontal form-material" id="loginform" action="<?= $router->generate('register'); ?>" method="POST">
							<div class="form-group ">
								<div class="col-xs-6">
									<input class="form-control" type="text" placeholder="Votre pseudo" name="pseudo" data-error="Rempli bien le champ !" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6">
									<input class="form-control email-inputmask" type="text" placeholder="Adresse e-mail"  name="email" data-error="Rempli bien le champ !" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6">
									<input class="form-control numeric-inputmask" type="number" step="1" id="password" placeholder="Mot de passe (Uniquement numérique 0-9)" name="password" data-error="Rempli bien le champ !" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6">
									<input class="form-control numeric-inputmask" type="number" step="1" data-match="#password" data-error="Les mots de passe ne correspond pas" placeholder="Confirmation mot de passe (Uniquement numérique 0-9)" name="confirm_password" required>
								</div>
							</div>
							<div class="form-group text-center m-t-20">
								<div class="col-xs-12">
									<button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="register">S'inscrire</button>
								</div>
							</div>
							<div class="form-group m-b-0">
								<div class="col-sm-12 text-center">
									Déjà inscrit? <a href="<?= $router->generate('login'); ?>" class="text-danger m-l-5"><b>Connectez-vous !</b></a>
								</div>
							</div>
						</form>
						</div>
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
			<script src="js/custom.min.js"></script>
		</body>
	</html>
