<?php
# @Author: Théodore Turpin <Niwalo>
# @Date:   2018-03-04T12:16:16+01:00
# @Email:  admin@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-05-12T17:14:44+03:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Controllers;

use Manager\Models\GamesModel;
use Manager\Models\UserModel;
use Manager\Models\ScoresModel;

class MainController extends CoreController {

  public function homeIn() {
    $this->restrict();
    if ($this->user->getStatus() == 0) {
      $this->redirect('error404');
    }

    $games = new GamesModel();
    $users = new UserModel();

    echo $this->templates->render('main/homeIn', [
      'games' => $games,
      'users' => $users
    ]);
  }

  public function home() {
    $this->restrict();
    $competitionStatus = false;
    if ($this->user->getStatus() == 0) {
      $this->redirect('error404');
    }
    if ($competitionStatus) {
      $this->redirect('homeIn');
    }

    $games = new GamesModel();
    $users = new UserModel();

    echo $this->templates->render('main/home', [
      'games' => $games,
      'users' => $users
    ]);
  }

  public function error404() {
    echo $this->templates->render('errors/404');
  }

  public function error101() {
    echo $this->templates->render('errors/101');
  }
}
