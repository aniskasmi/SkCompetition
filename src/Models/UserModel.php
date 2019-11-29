<?php
# @Author: Théodore Turpin <theo>
# @Date:   2018-03-04T14:38:55+01:00
# @Email:  admin@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-18T19:46:02+01:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Models;
use Manager\Models\IlotModel;
use Manager\Models\VacationModel;

class UserModel extends CoreModel {
  protected static $tableName = 'users';
  protected static $orderBy = 'id';

  protected $id;
  protected $pseudo;
  protected $email;
  protected $password;
  protected $status;


  public static function logout() {
    unset($_SESSION['user']);
    //-- Remove cookie of RememberMe
    unset($_COOKIE['username']);
    unset($_COOKIE['password']);
    setcookie('username', '', time() - 3600);
    setcookie('password', '', time() - 3600);
    //-- Destroy Session
    session_destroy();
  }

  /**
   * [login description]
   * @method login
   * @return [boolean] [Return if user exist and user have good password]
   */
  public function login() {
    $user = self::find( $this->getEmail(), 'email' );
    //If an user have this email on DB
    if ($user) {
      //Check Password of this user
      if (password_verify( $this->getPassword(), $user->getPassword() )) {
        $user->UpdateLastLogin();
        return $user;
      }
      return false;
    }
    return false;
  }

  public static function connect( $user ) {
    $_SESSION['user'] = [
      'id' => $user->getId()
    ];
  }

  /**
   * [getUser Return Users informations from db by $_SESSION id]
   * @method getUser
   * @return [array]  [info of users]
   */
  public static function getUser() {
    if (isset($_SESSION['user'])) {
      $userId = $_SESSION['user']['id'];
      $user = \Manager\Models\UserModel::find( $userId );
    } else {
      return false;
    }

    if (!isset($_SESSION['user'])) return false;
    return (object) $user;
  }
  /**
   * Hash string with BCRYPT and salt key
   * @method hashPassword
   * @param  integer      $ms [description]
   * @return [type]           [description]
   */
  public function hashPassword( $ms = 100) {
    for ($i = 4; $i < 31; $i++) {
        $options = [
          'cost' => '8'
        ];
        $time_start = microtime(true);
        $hash = password_hash( $this->getPassword(), PASSWORD_BCRYPT, $options);
        $time_end = microtime(true);
        if (($time_end - $time_start) * 1000 > $ms) {
            return $i;
        }
    }
    return $hash;
  }

  /**
   * [register Add new user on db]
   * @method register
   * @return [type]   [description]
   */
  public function register() {
    $db = \Manager\Utils\Database::getDb();
    $req = 'INSERT INTO '. static::$tableName .' (pseudo, email, password) VALUES (:pseudo, :email, :password)';
    $stmt = $db->prepare($req);
    $stmt->bindValue(':pseudo', $this->getPseudo(), \PDO::PARAM_STR);
    $stmt->bindValue(':email', $this->getEmail(), \PDO::PARAM_STR);
    $stmt->bindValue(':password', $this->hashPassword(), \PDO::PARAM_STR);
    $stmt->execute();
  }

  public static function findByMail( $email ) {
   $conn = \Manager\Utils\Database::getDB();
   $sql = 'SELECT * FROM users WHERE email LIKE :email';
   $stmt = $conn->prepare( $sql );
   $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
   $stmt->execute();
   $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
   return $stmt->fetch(\PDO::FETCH_CLASS);
 }

  public static function checkAccount($email, $password, $alreadyHashed = false) {
   $user = self::findByMail($email);
   if ($user) {
     if ($alreadyHashed) {
       if ($password === $user->getPassword()) {
         $isOk = true;
       }
       $isOk = false;
     } else {
       $isOk = password_verify($password, $user->getPassword());
     }
     if ($isOk) {
       return $user;
     } else {
       return false;
     }
   } else {
     return false;
   }
 }


    /**
     * Get the value of Table Name
     *
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set the value of Table Name
     *
     * @param mixed $tableName
     *
     * @return self
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get the value of Order By
     *
     * @return mixed
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Set the value of Order By
     *
     * @param mixed $orderBy
     *
     * @return self
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Pseudo
     *
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of Pseudo
     *
     * @param mixed $pseudo
     *
     * @return self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of Password
     *
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of Status
     *
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

}
