<?php
class Rents
{
//     +---------+------------------+------+-----+---------+----------------+
// | Field   | Type             | Null | Key | Default | Extra          |
// +---------+------------------+------+-----+---------+----------------+
// | RentID  | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | MovieID | int(10) unsigned | NO   |     | NULL    |                |
// | Date    | date             | NO   |     | NULL    |                |
// +---------+------------------+------+-----+---------+----------------+
    //Attributes
    private $RentID;
    private $MovieID;
    private $Date;

    //Getters
    function getRentID()
    {
        return $this->RentID;
    }
    function getMovieID()
    {
        return $this->MovieID;
    }
    function getDate()
    {
        return $this->Date;
    }

    //Setters
    function setRentID($rid)
    {
        $this->RentID = $rid;
    }
    function setMovieID($mid)
    {
        $this->MovieID = $mid;
    }
    function setDate($d)
    {
        $this->Date = $d;
    }
}
?>