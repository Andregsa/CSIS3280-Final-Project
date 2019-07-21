<?php
class MyMovies
{
//     +---------+------------------+------+-----+---------+----------------+
// | Field   | Type             | Null | Key | Default | Extra          |
// +---------+------------------+------+-----+---------+----------------+
// | MovieID | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | Title   | char(100)        | YES  |     | NULL    |                |
// | Year    | year(4)          | YES  |     | NULL    |                |
// | Runtime | int(3)           | YES  |     | NULL    |                |
// | Genre   | tinytext         | YES  |     | NULL    |                |
// | Plot    | text             | YES  |     | NULL    |                |
// | Poster  | varchar(1024)    | YES  |     | NULL    |                |
// +---------+------------------+------+-----+---------+----------------+
    //Attributes
    private $MovieID;
    private $Title;
    private $Year;
    private $Runtime;
    private $Genre;
    private $Plot;
    private $Poster;

    //Getters
    function getMovieID()
    {
        return $this->MovieID;
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
    
    //Setters
    function setMovieID($Mid)
    {
        $this->MovieID = $mid;
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
}
?>