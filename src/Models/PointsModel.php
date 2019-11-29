<?php
# @Author: Théodore Turpin <theo>
# @Date:   2018-03-04T14:38:55+01:00
# @Email:  admin@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-18T19:46:02+01:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Models;

class PointsModel extends CoreModel {
  protected static $tableName = 'points';
  protected static $orderBy = 'id';

  protected $id;
  protected $points;

  public static function countScore( $user ) {
    $conn = \Manager\Utils\Database::getDB();
    $sql = 'SELECT SUM(scores) as Total FROM ' . static::$tableName . ' WHERE users = :find';
    $stmt = $conn->prepare( $sql );
    $stmt->bindValue(':find', $user, \PDO::PARAM_INT);
    $stmt->execute();
    $stmt = $stmt->fetch();
    return $stmt['Total'];
  }

  public static function countAllScore( $user ) {
    $pts = 0;
    foreach (\Manager\Models\GamesModel::findAll() as $game) {
      foreach (\Manager\Models\ScoresModel::findAll( 'games',  $game->getId() ) as $index => $score) {
        if ($score->getUsers() === $user) {
          switch ($index) {
            case '0':
              $pts = $pts + 70;
              break;

            case '1':
              $pts = $pts + 60;
              break;

            case '2':
              $pts = $pts + 50;
              break;
          }
        }
      }
    }
    return $pts;
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
     * Get the value of Points
     *
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set the value of Points
     *
     * @param mixed $points
     *
     * @return self
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

}
