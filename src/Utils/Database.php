<?php
# @Author: Anis KASMI
# @Date:   2019-03-01T22:35:21+02:00
# @Email:  contact@aniskasmi.com
# @Filename: Database.php
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-08-19T19:15:50+03:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Utils;

class Database {
  private static $db;
  private static $config;

  public static function setConfig ($conf){
    self::$config = $conf;
  }

  public static function getDB() {
    $dsn = 'mysql:host=' . self::$config['host'] . ';dbname=' . self::$config['dbname'];
    $options = array(
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    );

    if (!isset(self::$db)) {
      try {
        self::$db = new \PDO($dsn, self::$config['dbuser'], self::$config['dbpassword'], $options);
      } catch(\PDOException $e) {
          die('ERREUR DE CONNEXION'. $e);
      } catch(\Exception $e) {
        die('AUTRE TYPE D\'ERREUR');
      }
    }
    return self::$db;
  }
}
