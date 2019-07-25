<?php
class WatchedMovies
{
//     +---------+------------------+------+-----+---------+----------------+
// | Field   | Type             | Null | Key | Default | Extra          |
// +---------+------------------+------+-----+---------+----------------+
// | RentID  | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | MovieID | int(10) unsigned | NO   |     | NULL    |                |
// | Date    | date             | NO   |     | NULL    |                |
// +---------+------------------+------+-----+---------+----------------+
    //Attributes
    private $WatchedID;
    private $MovieID;
    private $Date;
    private $Rate; //0-10.0 Stars


    //Getters
    function getWatchedID()
    {
        return $this->WatchedID;
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
    function setWatchedID($rid)
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