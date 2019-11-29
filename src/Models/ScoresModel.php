<?php
# @Author: Théodore Turpin <theo>
# @Date:   2018-03-04T14:38:55+01:00
# @Email:  admin@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-18T19:46:02+01:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Models;

class ScoresModel extends CoreModel {
  protected static $tableName = 'scores';
  protected static $orderBy = 'scores';

  protected $id;
  protected $users;
  protected $games;
  protected $scores;

  public function insert() {
    $db = \Manager\Utils\Database::getDb();
    $req = 'INSERT INTO '. static::$tableName .' (games, users, scores) VALUES (:games, :users, :scores)';
    $stmt = $db->prepare($req);
    $stmt->bindValue(':games', $this->getGames(), \PDO::PARAM_STR);
    $stmt->bindValue(':users', $this->getUsers(), \PDO::PARAM_STR);
    $stmt->bindValue(':scores', $this->getScores(), \PDO::PARAM_STR);
    $stmt->execute();
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
     * Get the value of Users
     *
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set the value of Users
     *
     * @param mixed $users
     *
     * @return self
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get the value of Games
     *
     * @return mixed
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Set the value of Games
     *
     * @param mixed $games
     *
     * @return self
     */
    public function setGames($games)
    {
        $this->games = $games;

        return $this;
    }

    /**
     * Get the value of Scores
     *
     * @return mixed
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * Set the value of Scores
     *
     * @param mixed $scores
     *
     * @return self
     */
    public function setScores($scores)
    {
        $this->scores = $scores;

        return $this;
    }

}
