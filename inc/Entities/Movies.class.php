<?php
class Movies
{
    // +----------+------------------+------+-----+---------+----------------+
    // | Field    | Type             | Null | Key | Default | Extra          |
    // +----------+------------------+------+-----+---------+----------------+
    // | MovieID  | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
    // | Title    | char(100)        | YES  |     | NULL    |                |
    // | Year     | year(4)          | YES  |     | NULL    |                |
    // | Runtime  | varchar(10)      | YES  |     | NULL    |                |
    // | Genre    | tinytext         | YES  |     | NULL    |                |
    // | Plot     | text             | YES  |     | NULL    |                |
    // | Poster   | varchar(1024)    | YES  |     | NULL    |                |
    // | Rating   | varchar(5)       | NO   |     | NULL    |                |
    // | Category | varchar(50)      | NO   |     | NULL    |                |
    // | IMDbID   | varchar(20)      | NO   |     | NULL    |                |
    // +----------+------------------+------+-----+---------+----------------+
    //Attributes
    private $MovieID;
    private $UserID;
    private $Title;
    private $Year;
    private $Runtime;
    private $Genre;
    private $Plot;
    private $Poster;
    private $Rating;
    private $Category;
    private $IMDbID;

    //Getters
    function getMovieID()
    {
        return $this->MovieID;
    }
    function getUserID()
    {
        return $this->UserID;
    }
    function getTitle()
    {
        return $this->Title;
    }
    function getYear()
    {
        return $this->Year;
    }
    function getRuntime()
    {
        return $this->Runtime;
    }
    function getGenre()
    {
        return $this->Genre;
    }
    function getPlot()
    {
        return $this->Plot;
    }
    function getPoster()
    {
        return $this->Poster;
    }
    function getRating()
    {
        return $this->Rating;
    }
    function getCategory()
    {
        return $this->Category;
    }
    function getIMDbID()
    {
        return $this->IMDbID;
    }
    
    //Setters
    function setMovieID($mid)
    {
        $this->MovieID = $mid;
    }
    function setUserID($Uid)
    {
        $this->UserID = $Uid;
    }
    function setTitle($title)
    {
        $this->Title = $title;
    }
    function setYear($year)
    {
        $this->Year = $year;
    }
    function setRuntime($rn)
    {
        $this->Runtime = $rn;
    }
    function setGenre($g)
    {
        $this->Genre = $g;
    }
    function setPlot($plt)
    {
        $this->Plot = $plt;
    }
    function setPoster($pstURL)
    {
        $this->Poster = $pstURL;
    }
    function setRating($newRating)
    {
        $this->Rating = $newRating;
    }
    function setCategory($newCat)
    {
        $this->Category = $newCat;
    }
    function setIMDbID($newIMDbID)
    {
        $this->IMDbID = $newIMDbID;
    }
}
?>