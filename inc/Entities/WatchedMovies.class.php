<?php
class WatchedMovies
{


    // +-----------+------------------+------+-----+---------+----------------+
    // | Field     | Type             | Null | Key | Default | Extra          |
    // +-----------+------------------+------+-----+---------+----------------+
    // | WatchedID | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
    // | UserID    | int(11)          | NO   | PRI | NULL    |                |
    // | IMDbID    | varchar(20)      | NO   |     | NULL    |                |
    // | Date      | date             | NO   |     | NULL    |                |
    // | Rate      | varchar(5)       | NO   |     | NULL    |                |
    // +-----------+------------------+------+-----+---------+----------------+

    //Attributes
    private $WatchedID;
    private $UserID;
    private $IMDbID;
    private $Date;
    private $Rate; //0-10.0 Stars


    //Getters
    function getWatchedID()
    {
        return $this->WatchedID;
    }
    function getUserID()
    {
        return $this->UserID;
    }
    function getIMDbID()
    {
        return $this->IMDbID;
    }
    function getDate()
    {
        return $this->Date;
    }
    function getRate()
    {
        return $this->Rate;
    }

    //Setters
    function setWatchedID($rid)
    {
        $this->RentID = $rid;
    }
    function setIMDbID($mid)
    {
        $this->IMDbID = $mid;
    }
    function setDate($d)
    {
        $this->Date = $d;
    }
    function setUserID($uid)
    {
        $this->UserID = $uid;
    }
    function setRate($r)
    {
        $this->Rate = $r;
    }
}
?>