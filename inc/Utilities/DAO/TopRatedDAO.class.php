<?php
class TopRatedDAO {

    // +---------+------------------+------+-----+---------+----------------+
    // | Field   | Type             | Null | Key | Default | Extra          |
    // +---------+------------------+------+-----+---------+----------------+
    // | MovieID | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
    // | Title   | char(100)        | YES  |     | NULL    |                |
    // | Year    | year(4)          | YES  |     | NULL    |                |
    // | Runtime | int(3)           | YES  |     | NULL    |                |
    // | Genre   | tinytext         | YES  |     | NULL    |                |
    // | Plot    | text             | YES  |     | NULL    |                |
    // | Poster  | varchar(1024)    | YES  |     | NULL    |                |
    // | Rating  | float(3,1)       | NO   |     | NULL    |                |
    // +---------+------------------+------+-----+---------+----------------+

    private static $db;

    //Initialize DAO class
    static function init()  {
        
        self::$db = new PDOAgent("Movies");

    }
    //CREATE a single Movie
    static function createMovie(Movies $newMovie): int   {

        //Generate the INSERT STATEMENT for the movie;
        $sqlInsert = "INSERT INTO TopRated (Title, Year,Runtime,Genre,Plot,Poster)
         VALUES (:title, :yr, :rn, :g, :plot,:pst);";

        //prepare the query
        self::$db->query($sqlInsert);

        //Setup the bind parameters
        self::$db->bind(':title', $newMovie->getTitle());
        self::$db->bind(':yr', $newMovie->getYear());
        self::$db->bind(':rn',$newMovie->getRuntime());
        self::$db->bind(':g', $newMovie->getGenre());
        self::$db->bind(':plot', $newMovie->getPlot());
        self::$db->bind(':pst', $newMovie->getPoster());

        //Execute the query
        self::$db->execute();

        //Return the last inserted ID!!
       return  self::$db->lastInsertId();

    }

    //READ a single Movie
    static function getMovie(int $id) : Movies   {
        
        $singleSelect = "SELECT * FROM TopRated WHERE MovieID = :id";

        //Prepare the query
        self::$db->query($singleSelect);

        //Set the bind parameters
        self::$db->bind(':id', $id);

        //Execute the query
        self::$db->execute();

        //Get the row
        return self::$db->singleResult();

    }


    static function getMovies()    {

        $sqlQuery = "SELECT * FROM TopRated;";

        //Query!
        self::$db->query($sqlQuery);

        //Execute!
        self::$db->execute();

        //Return the results!
        return self::$db->resultSet();

    }
//UPDATE 
static function updateTopRated(Movies $updatedMovie): int   {
    try {
        //Create the query
        $updateQuery = "UPDATE TopRated SET Title = :title, Year = :yr, Runtime = :rn, Genre = :g, Plot = :plot, Poster = :poster
         WHERE MovieID = :id;";

        //Query
        self::$db->query($updateQuery);

        //Bind
        self::$db->bind(':id', $updatedMovie->getMovieID());
        self::$db->bind(':title', $updatedMovie->getTitle());
        self::$db->bind(':yr', $updatedMovie->getYear());
        self::$db->bind(':rn',$updatedMovie->getRuntime());
        self::$db->bind(':g', $updatedMovie->getGenre());
        self::$db->bind(':plot', $updatedMovie->getPlot());
        self::$db->bind(':poster', $updatedMovie->getPoster());
        
        //Execute the query
        self::$db->execute();

        //Check the appropriate updates
        if (self::$db->rowCount() !=1)    {
            throw new Exception("There was an error updating the database!");
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
        self::$db->debugDumpParams();
    }    

    //Get the number of affected rows
    return self::$db->rowCount();
}

//DELETE
static function deleteMovie(int $id): bool {

    try {

        //Create the delete query
        $deleteQuery = "DELETE FROM TopRated WHERE MovieID = :id";

        self::$db->query($deleteQuery);

        //Bind the id
        self::$db->bind(':id', $id);
        
        //Execute the query
        self::$db->execute();

        if (self::$db->rowCount() != 1) {
            throw new Exception("There was an error deleting movie $id");
        } 
    
    } catch (Exception $ex) {

        echo $ex->getMessage();
        self::$db->debugDumpParams();
        return false;
    
    }

    return true;
    
}

}

?>