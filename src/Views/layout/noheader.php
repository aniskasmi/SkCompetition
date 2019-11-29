<?php
# @Author: Anis KASMI <Pink3vil>
# @Date:   2018-03-04T11:59:21+01:00
# @Email:  contact@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-08-19T19:30:53+03:00
# @Copyright: Skyreka Studio (skyreka.com)
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <base href="<?= $baseUrl . '/public/' ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>Compétition Skyreka</title>
  <!-- Bootstrap Core CSS -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- chartist CSS -->
  <link href="plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
  <link href="plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
  <link href="plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
  <!--This page css - Morris CSS -->
  <link href="plugins/c3-master/c3.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- You can change the theme colors from here -->
  <link href="css/colors/green-dark.css" id="theme" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border" style="background-color: black !important;">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">
    <?= $this->section('content'); ?>
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="plugins/popper/popper.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="js/sidebarmenu.js"></script>
  <!--stickey kit -->
  <script src="plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  <!--Custom JavaScript -->
  <script src="js/custom.min.js"></script>
  <!-- chartist chart -->
  <script src="plugins/chartist-js/dist/chartist.min.js"></script>
  <script src="plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
  <!--c3 JavaScript -->
  <script src="plugins/d3/d3.min.js"></script>
  <script src="plugins/c3-master/c3.min.js"></script>
  <!-- Chart JS -->
  <script src="js/dashboard1.js"></script>
  <!-- ============================================================== -->
  <!-- Style switcher -->
  <!-- ============================================================== -->
  <script src="plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
