<?php
# @Author: Théodore Turpin <Niwalo>
# @Date:   2018-03-04T12:08:58+01:00
# @Email:  admin@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-18T12:44:55+01:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Controllers;
use Manager\Models\UserModel;

class CoreController {

  //Plates object
  protected $templates;
  protected $router;
  protected $user;

  public function __construct($router) {
    //Save router
    $this->router = $router;
    //Get User
    $this->user = \Manager\Models\UserModel::getUser();
    //Add config
    $config = parse_ini_file(__DIR__.'/../../config.ini');
    //Search Templates
    $this->templates = new \League\Plates\Engine(__DIR__.'/../Views/');
    //Set basePath
    $basePath = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
    //Set namePanel
    $namePanel = "Skyreka Cup";
    $users = new UserModel();
    //Set default input error
    $defaultInputError = "Ce champ est requis";
    //Add available data in templates
    $this->templates->addData([
      'baseUrl' => $basePath,
      'namePanel' => $namePanel,
      // 'leNomDeLaDonnee' => 'LaValeur'
      'router' => $this->router,
      'user' => $this->user,
      'users' => $users,
      'config' => $config
    ]);
  }

  public function redirect( $routeName, $params=[]) {
   header('Location: ' . $this->router->generate( $routeName, $params ) );
   exit();
  }

  public function refresh() {
    header("Refresh:0");
  }

  public function restrict( $rank = NULL ) {
    if (!isset($_SESSION['user'])) {
      $this->redirect('login');
    }
    if ($rank != NULL && $this->user->getRank() < $rank) {
      $this->redirect('error404');
    }
  }
}
