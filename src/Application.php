<?php
# @Author: Théodore TURPIN
# @Date:   2019-03-01T21:57:33+02:00
# @Email:  contact@skyreka.com
# @Filename: Application.php
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-18T23:42:14+01:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager;

class Application {

  public function __construct() {
    $config = parse_ini_file(__DIR__.'/../config.ini');
    \Manager\Utils\Database::setConfig($config);
    $this->router = new \AltoRouter();
    $basePath = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
    $this->router->setBasePath($basePath);
    $this->mapping();
  }

  public function mapping() {
    //-- Home page
    $this->router->map('GET|POST', '/in', ['MainController', 'homeIn'], 'homeIn');
    $this->router->map('GET|POST', '/', ['MainController', 'home'], 'home');
    // --------------------
    // ERRORS
    // --------------------
    //-- Permission Error
    $this->router->map('GET', '/404', ['MainController', 'error404'], 'error404');
    // --------------------
    // User
    // --------------------
    $this->router->map('GET|POST', '/admin', ['AdminController', 'home'], 'adminHome');
    $this->router->map('GET|POST', '/admin/user/[i:id]', ['AdminController', 'user'], 'adminUser');
    $this->router->map('GET|POST', '/admin/enter/[i:idGame]/[i:idUser]', ['AdminController', 'enter'], 'adminEnter');
    $this->router->map('GET|POST', '/login', ['UserController', 'login'], 'login');
    $this->router->map('GET|POST', '/register', ['UserController', 'register'], 'register');
    $this->router->map('GET', '/logout', ['UserController', 'logout'], 'logout');
  }

  public function run() {

    $match = $this->router->match();

    if (!$match) {
      $controllerName = '\Manager\Controllers\MainController';
      $methodName = 'error404';
    } else {
      $controllerName = '\Manager\Controllers\\'.$match['target'][0];
      $methodName = $match['target'][1];
    }
    $controller = new $controllerName($this->router);
    $controller->$methodName($match['params']);
  }
}
