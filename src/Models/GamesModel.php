<?php
# @Author: Théodore Turpin <theo>
# @Date:   2018-03-04T14:38:55+01:00
# @Email:  admin@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-18T19:46:02+01:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Models;

class GamesModel extends CoreModel {
  protected static $tableName = 'games';
  protected static $tableNameTrain = 'trainhistory';
  protected static $orderBy = 'id';

  protected $id;
  protected $name;
  protected $img;
  protected $link;

  public function create() {
    $db = \Manager\Utils\Database::getDb();
    $req = 'INSERT INTO '. static::$tableName .' (firstname, lastname, email, phone, street, postal, city, sub_contractor, password, ads, cyno, ssiap1, ssiap2) VALUES (:firstname, :lastname, :email, :phone, :street, :postal, :city, :sub_contractor ,:password, :ads, :cyno, :ssiap1, :ssiap2)';
    $stmt = $db->prepare($req);
    $stmt->bindValue(':firstname', $this->getFirstname(), \PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $this->getLastname(), \PDO::PARAM_STR);
    $stmt->bindValue(':email', $this->getEmail(), \PDO::PARAM_STR);
    $stmt->bindValue(':phone', $this->getPhone(), \PDO::PARAM_STR);
    $stmt->bindValue(':street', $this->getStreet(), \PDO::PARAM_STR);
    $stmt->bindValue(':postal', $this->getPostal(), \PDO::PARAM_STR);
    $stmt->bindValue(':city', $this->getCity(), \PDO::PARAM_STR);
    $stmt->bindValue(':sub_contractor', $this->getSubContractor(), \PDO::PARAM_STR);
    $stmt->bindValue(':password', $this->hashPassword(), \PDO::PARAM_STR);
    $stmt->bindValue(':ads', $this->getAds(), \PDO::PARAM_STR);
    $stmt->bindValue(':cyno', $this->getCyno(), \PDO::PARAM_STR);
    $stmt->bindValue(':ssiap1', $this->getSsiap1(), \PDO::PARAM_STR);
    $stmt->bindValue(':ssiap2', $this->getSsiap2(), \PDO::PARAM_STR);
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
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get the value of Img
     *
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of Img
     *
     * @param mixed $img
     *
     * @return self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }


    /**
     * Get the value of Link
     *
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of Link
     *
     * @param mixed $link
     *
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

}
