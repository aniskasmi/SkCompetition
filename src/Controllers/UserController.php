<?php
# @Author: Anis Kasmi <pink3vil>
# @Date:   2018-03-04T15:09:03+01:00
# @Email:  contact@aniskasmi.com
# @Filename: UserController.php
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-05-12T17:01:31+03:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Controllers;
use Manager\Models\UserModel;

class UserController extends CoreController {


  public function login() {
     $errors = [];
     if (isset($_SESSION['user'])) {
       $this->redirect('home');
     }

     //-- AUTH ACTION
     if (isset($_POST['login'])) {
       $email = $_POST['email'];
       $password = $_POST['password'];
       $user = \Manager\Models\UserModel::checkAccount( $email, $password );
       if ($user) {
         //-- Connect User
         \Manager\Models\UserModel::connect( $user );
         //-- RememberMe System
         if (isset($_POST['rememberMe'])) {

         }
         $user = $user->findByMail( $email );
         $this->redirect('home');
       } else {
         //-- No user exist
         $errors[] = "Connexion refusée. Nom de compte ou mot de passe incorrect.";
       }
     }
     echo $this->templates->render('auth/login', ['errors' => $errors]);
   }

  public function register() {
   $errors = [];
   $success = NULL;
   $users = new UserModel();

   if (isset($_POST['register'])) {
     $users->setPseudo( htmlspecialchars($_POST['pseudo']) );
     $users->setEmail( htmlspecialchars($_POST['email']));
     $users->setPassword( htmlspecialchars($_POST['password']));
     $users->register();
     $success = 'Inscription enregistrée.';
   }
   echo $this->templates->render('auth/register', ['errors' => $errors, 'success' => $success]);
  }

  public function logout() {
    \Manager\Models\UserModel::logout();
    $this->redirect('login');
  }
}
