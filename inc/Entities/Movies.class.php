<?php
class Movies
{
    // +----------+------------------+------+-----+---------+----------------+
    // | Field    | Type             | Null | Key | Default | Extra          |
    // +----------+------------------+------+-----+---------+----------------+
    // | MovieID  | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
    // | UserID   | int(11)          | NO   | PRI | NULL    |                |
    // | Title    | char(100)        | YES  |     | NULL    |                |
    // | Year     | year(4)          | YES  |     | NULL    |                |
    // | Runtime  | int(3)           | YES  |     | NULL    |                |
    // | Genre    | tinytext         | YES  |     | NULL    |                |
    // | Plot     | text             | YES  |     | NULL    |                |
    // | Poster   | varchar(1024)    | YES  |     | NULL    |                |
    // | Rating   | float(3,1)       | NO   |     | NULL    |                |
    // | Category | varchar(50)      | YES  |     | NULL    |                |
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
}
?>