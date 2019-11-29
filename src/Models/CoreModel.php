<?php
# @Author: Théodore Turpin
# @Date:   2018-03-04T12:38:44+01:00
# @Email:  admin@skyreka.com
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-11-19T12:47:18+01:00
# @Copyright: Skyreka Studio (skyreka.com)

namespace Manager\Models;

use Lcobucci\JWT\Signer\Key;

/**
 * [CoreModel All of global functions used on project]
 */
class CoreModel {

  /**
   * [protected description]
   * @var [string] [Table of DB used]
   */
  protected static $tableName;

    /**
     * [findAll Return all records of tables]
     * @param null $find
     * @param null $result
     * @return array [class] [Return all records from DB]
     */
    public static function findAll( $find = NULL, $result = NULL) {
        $conn = \Manager\Utils\Database::getDB();
        if ($find != NULL) {
            $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE '. $find .'=:find ORDER BY '.static::$orderBy.' DESC';
            $stmt = $conn->prepare( $sql );
            $stmt->bindValue(':find', $result, \PDO::PARAM_INT);
        } else {
            $sql = 'SELECT * FROM ' . static::$tableName . ' ORDER BY '.static::$orderBy.' DESC ';
            $stmt = $conn->prepare($sql);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }


    public static function findById( $id ) {
    $conn = \Manager\Utils\Database::getDB();
    $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE id=:id';
    $stmt = $conn->prepare( $sql );
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
    return $stmt->fetch();
  }


    /**
     * [find Return one records with WHERE]
     * @param $result
     * @param string $find
     * @param bool $showArchive
     * @return mixed [type]     [description]
     */
     public static function find( $result, $find = 'id') {
       $conn = \Manager\Utils\Database::getDB();
       $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE '. $find .'= :find ORDER BY '.static::$orderBy.' ASC';
       $stmt = $conn->prepare( $sql );
       $stmt->bindValue(':find', $result, \PDO::PARAM_INT);
       $stmt->execute();
       $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
       $result = $stmt->fetch();
       if ($result) {
         return $result;
       }
       return NULL;
     }

    /**
     * [findMultiple Find Multiple on DB Double Where]
     * @param $find
     * @param $findTwo
     * @param $result
     * @param $resultTwo
     * @param boolean $fetchAll
     * @return array|mixed [type] [Fetch or FetchAll]
     */
  public static function findMultiple( $find, $findTwo, $result, $resultTwo, $fetchAll = false) {
    $conn = \Manager\Utils\Database::getDB();
    $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE '. $find .'= :find AND '. $findTwo .'= :findTwo ORDER BY '.static::$orderBy.' DESC';
    $stmt = $conn->prepare( $sql );
    $stmt->bindValue(':find', $result, \PDO::PARAM_INT);
    $stmt->bindValue(':findTwo', $resultTwo, \PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
    if ($fetchAll) {
      return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }
    return $stmt->fetch();
  }


    /**
     * [countMultiple Count Multiple on DB Double Where]
     * @param $find
     * @param $findTwo
     * @param $result
     * @param $resultTwo
     * @return  [int] [Number counted]
     */
  public function countMultiple( $find, $findTwo, $result, $resultTwo ) {
    $conn = \Manager\Utils\Database::getDB();
    $sql = 'SELECT COUNT(id) as Total FROM ' . static::$tableName . ' WHERE '. $find .'= :find AND '. $findTwo.'= :findTwo AND archive = 0';
    $stmt = $conn->prepare( $sql );
    $stmt->bindValue(':find', $result, \PDO::PARAM_INT);
    $stmt->bindValue(':findTwo', $resultTwo, \PDO::PARAM_INT);
    $stmt->execute();
    $stmt = $stmt->fetch();
    return $stmt['Total'];
  }

    /**
     * [Archive Fonction]
     * @param  [type] $array
     * @return void [type] [description]
     */
  public static function archive( $id ) {
    $conn = \Manager\Utils\Database::getDB();
    if (is_array($id)) {
      $sql = 'UPDATE ' . static::$tableName . ' SET archive = 1 WHERE `id` IN (' . implode(', ', $id) . ')';
    } else {
      $sql = 'UPDATE ' . static::$tableName . ' SET archive = 1 WHERE id = '. $id;
    }
    $stmt = $conn->prepare( $sql );
    $stmt->execute();
  }

    /**
     * Sum result on database
     * @method count
     * @param $sum
     * @param $find
     * @param $result
     * @return  [string]  Sum]
     */
  public function sum( $sum, $find, $result ) {
    $conn = \Manager\Utils\Database::getDB();
    $sql = 'SELECT SUM('. $sum .') as Sum FROM ' . static::$tableName . ' WHERE '. $find .'= :find AND archive = 0';
    $stmt = $conn->prepare( $sql );
    $stmt->bindValue(':find', $result, \PDO::PARAM_INT);
    $stmt->execute();
    $stmt = $stmt->fetch();
    return $stmt['Sum'];
  }

    /**
     * [Delete record on DB]
     * @param $id
     * @return void Return if delete as worked
     */
  public static function delete( $id ) {
    $conn = \Manager\Utils\Database::getDB();
    if (is_array($id)) {
      $sql = 'DELETE FROM ' . static::$tableName . ' WHERE `id` IN (' . implode(', ', $id) . ')';
    } else {
      $sql = 'DELETE FROM ' . static::$tableName . ' WHERE `id` = '.$id;
    }
    $stmt = $conn->query($sql);
  }

    /**
     * [getDatesFromRange Return all dates between two dates in an array]
     * @param string $start First Day
     * @param string $end End Day
     * @param string $format Format of date
     * @return array Return all dates between start and end var
     * @throws \Exception
     */
  public function getDatesFromRange($start, $end, $format = 'd-m-Y') {
    $array = array();
    $interval = new \DateInterval('P1D');

    $realEnd = new \DateTime($end);
    $realEnd->add($interval);
    $realEnd->modify('-1 day');
    $period = new \DatePeriod(new \DateTime($start), $interval, $realEnd);

    foreach($period as $date) {
        $array[] = $date->format($format);
    }

    return $array;
  }

  /**
   * [dateFromDb Return date from DB for Front]
   * @param  string $dateDb
   * @param  boolean $time If you like display hours
   * @return string Return date for front display Ex, FR => Le 11 Aout 2015
   */
  public function dateFromDb( $dateDb, $time = true ) {
    setlocale (LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8','fra');
    if ($time) {
      return strftime('%d %B %Y &agrave; %Hh%M', strtotime($dateDb));
    }
    return strftime('%d %B %Y', strtotime($dateDb));
  }

  public function dateFromDbNoHours( $dateDb, $time = true ) {
    setlocale (LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8','fra');
    if ($time) {
      return strftime('%d %B %Y ', strtotime($dateDb));
    }
    return strftime('%d %B %Y', strtotime($dateDb));
  }

  public function hoursFromDb( $dateDb ) {
    setlocale (LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8','fra');
    return strftime('%H:%M', strtotime($dateDb));
  }

  /**
   * [dateToDb Return date from Front for DB]
   * @param  string $date Date from Front
   * @return string Return at format for DB query
   */
  public function dateToDb( $date ) {
    $dateForDB = str_replace(" ","",$date);
    $dateForDB = explode('-', $dateForDB);
    if ($dateForDB[1] == 'Janv') {
      $dateForDB[1] = 1;
    }
    if ($dateForDB[1] == 'Févr') {
      $dateForDB[1] = 2;
    }
    if ($dateForDB[1] == 'Mars') {
      $dateForDB[1] = 3;
    }
    if ($dateForDB[1] == 'Avril') {
      $dateForDB[1] = 4;
    }
    if ($dateForDB[1] == 'Mai') {
      $dateForDB[1] = 5;
    }
    if ($dateForDB[1] == 'Juin') {
      $dateForDB[1] = 6;
    }
    if ($dateForDB[1] == 'Juil') {
      $dateForDB[1] = 7;
    }
    if ($dateForDB[1] == 'Août') {
      $dateForDB[1] = 6;
    }
    if ($dateForDB[1] == 'Sept') {
      $dateForDB[1] = 9;
    }
    if ($dateForDB[1] == 'Oct') {
      $dateForDB[1] = 10;
    }
    if ($dateForDB[1] == 'Nov') {
      $dateForDB[1] = 11;
    }
    if ($dateForDB[1] == 'Dec') {
      $dateForDB[1] = 12;
    }
    $dateForDB = $dateForDB[2].'-'.$dateForDB[1].'-'.$dateForDB[0];
    return $dateForDB;
  }

  public function periodHours( $firstDay, $secondDay ) {
    $start = new \DateTime( $firstDay );
    $end = new \DateTime( $secondDay );
    //difference between days
    $diff = $end->diff($start);
    $hours = $diff->h + ($diff->days * 24);
    switch ($diff->i) {
      case '15':
        $minutes = ".25";
        break;
      case '30':
        $minutes = ".5";
        break;
      case '45':
        $minutes = ".75";
        break;

      default:
        $minutes = NULL;
        break;
    }
    return $hours + $minutes;
  }

	public function getWeekdayDifference( $startDate, $endDate) {
			$start = new \DateTime($startDate);
			$end = new \DateTime($endDate);
			$days = $start->diff($end, true)->days;
			$minute = $start->diff($end, true)->i;

			$sundays = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);

      if ($end->format('D') == 'Sun' OR $start->format('D') == 'Sun') {
        switch ($minute) {
          case '15':
            $minutes = ".25";
            break;
          case '30':
            $minutes = ".5";
            break;
          case '45':
            $minutes = ".75";
            break;

          default:
            $minutes = NULL;
            break;
        }
      }

			if($end->format('D') == 'Sun' && $start->format('D') == 'Sun') {
					return $end->format('H') - $start->format('H') + $minutes;
			} elseif($end->format('D') == 'Sun') {
					return $end->format('H') + $minutes;
			} else {
					return $sundays * 24;
			}
	}

  function getWeekEnd($startDate, $endDate)
  {
    $working_hours = [
        [0, 86400], // Sun
        null,
        null,
        null,
        null,
        null,
        null //Sat
    ];
    $start = new \DateTime($startDate);
    $end = new \DateTime($endDate);
  	$seconds = 0; // Total working seconds
  	// Calculate the Start Date (Midnight) and Time (Seconds into day) as Integers.
  	$start_date = clone $start;
  	$start_date = $start_date->setTime(0, 0, 0)->getTimestamp();
  	$start_time = $start->getTimestamp() - $start_date;
  	// Calculate the Finish Date (Midnight) and Time (Seconds into day) as Integers.
  	$end_date = clone $end;
  	$end_date = $end_date->setTime(0, 0, 0)->getTimestamp();
  	$end_time = $end->getTimestamp() - $end_date;
  	// For each Day
  	for ($today = $start_date; $today <= $end_date; $today += 86400) {
  		// Get the current Weekday.
  		$today_weekday = date('w', $today);
  		// Skip to next day if no hours set for weekday.
  		if (!isset($working_hours[$today_weekday][0]) || !isset($working_hours[$today_weekday][1])) continue;
  		// Set the office hours start/finish.
  		$today_start = $working_hours[$today_weekday][0];
  		$today_end = $working_hours[$today_weekday][1];
  		// Adjust Start/Finish times on Start/Finish Day.
  		if ($today === $start_date) $today_start = min($today_end, max($today_start, $start_time));
  		if ($today === $end_date) $today_end = max($today_start, min($today_end, $end_time));
  		// Add to total seconds.
  		$seconds += $today_end - $today_start;
  	}
    if ($seconds == 86400) {
      return 24;
    }
  	$time = date('H:i', $seconds);
    $hms = explode(":", $time);
    return ($hms[0] + ($hms[1]/60));
  }

  public function getNightHours($start, $end){
		$startDate = new \DateTime($start);
		$endDate = new \DateTime($end);
		$periodInterval = new \DateInterval( "PT1M" );

		$period = new \DatePeriod( $startDate, $periodInterval, $endDate );
		$count = 0;

		foreach($period as $date){

			$startofday = clone $date;
			$startofday->setTime(21,00);

			$endofday = clone $date;
			$endofday->setTime(6,00);

			if($date >= $startofday){
				$count++;
			}
			if($date <= $endofday){
				$count++;
			}
		}
    $time = sprintf("%02d:%02d", floor($count/60), $count%60);
    $hms = explode(":", $time);
    $result = ($hms[0] + ($hms[1]/60));
    $result = round($result, 2, PHP_ROUND_HALF_UP);
    if (
      substr($result, strpos($result, ".")) != "0.25" &&
      substr($result, strpos($result, ".")) != "0.50" &&
      substr($result, strpos($result, ".")) != "0.45") {
      $arr = explode(".", $result, 2);
      return $arr[0];
    }
    return round($result, 2, PHP_ROUND_HALF_UP);
	}

  public function IntDiv($a, $b) {
    return ($a - $a % $b) / $b;
  }


  public function periodNightHours( $start, $end ) {
    $nights = (strtotime($start) - strtotime($end)) / 86400;
    return $nights;
  }

  public function period( $firstDay, $secondDay ) {
    $date1 = new \DateTime($firstDay);
    $date2 = new \DateTime($secondDay);
    $diff = $date2->diff($date1);
    return $diff->format('%a J et %h H');
  }

  /**
   * [arrayFlatten To flatten a multidimensional Array]
   * @param  array $array Array multidimensional
   * @return array [Return just on array]
   */
  public function arrayFlatten( $array ) {
    if (!is_array($array)) {
      return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
      if (is_array($value)) {
        $result = array_merge($result, $this->arrayFlatten($value));
      }
      else {
        $result[$key] = $value;
      }
    }
    return $result;
  }

  /**
   * Generate unique key
   * @return key
   */
  public function generateKey( $length ) {
    //return substr( md5(uniqid(rand(), true)), 0, $length);
    return hexdec( uniqid() );
  }

}
