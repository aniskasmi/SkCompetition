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

class AdminController extends CoreController {

  public function home() {
    $this->restrict();

    $users = new UserModel();

    echo $this->templates->render('admin/home', [
      'users' => $users
    ]);
  }

  public function user( $params ) {
    $this->restrict();

    $games = new GamesModel();
    $scores = new ScoresModel();
    $user = UserModel::find( htmlspecialchars( $params['id']) );

    echo $this->templates->render('admin/user', [
      'user' => $user,
      'scores' => $scores,
      'games' => $games
    ]);
  }

  public function enter( $params ) {
    $this->restrict();

    $user = UserModel::find( htmlspecialchars( $params['idUser']) );
    $game = GamesModel::find( htmlspecialchars( $params['idGame']) );

    if (isset($_POST['enter'])) {
      $score = new ScoresModel;
      $score->setUsers( $user->getId() );
      $score->setGames( $game->getId() );
      $score->setScores( htmlspecialchars( $_POST['valueScore']) );
      $score->insert();
      $this->redirect('adminUser', ['id' => $user->getId()]);
    }

    echo $this->templates->render('admin/enter', [
      'user' => $user,
      'game' => $game
    ]);
  }
}
