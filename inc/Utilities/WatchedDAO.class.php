<?php

class WatchedDAO    {

    private static $db;

    //Initialize DAO class
    static function init()  {
        
        self::$db = new PDOAgent("WatchedMovies");

    }

    //CREATE a single WatchedMovie
    static function createWMovies(WatchedMovies $wm): int   {

        //Generate the INSERT STATEMENT for the WatchedMovies;
        $sqlInsert = "INSERT INTO WatchedMovies (MovieID, Date, Rate)
         VALUES (:mid, :d, :r);";

        //prepare the query
        self::$db->query($sqlInsert);

        //Setup the bind parameters
        self::$db->bind(':mid', $wm->getMovieID());
        self::$db->bind(':d', $wm->getDates());
        self::$db->bind(':r', $wm->getRate());

        //Execute the query
        self::$db->execute();

        //Return the last inserted ID!!
       return  self::$db->lastInsertId();

    }

    //READ a single WatchedMovie
    static function getWMovie(int $id) : WatchedMovies   {
        
        $singleSelect = "SELECT * FROM WatchedMovies WHERE WatchedID = :id";

        //Prepare the query
        self::$db->query($singleSelect);

        //Set the bind parameters
        self::$db->bind(':id', $id);

        //Execute the query
        self::$db->execute();

        //Get the row
        return self::$db->singleResult();

    }

    static function getWatchedMovies()    {

        $sqlQuery = "SELECT * FROM WatchedMovies;";

        //Query!
        self::$db->query($sqlQuery);

        //Execute!
        self::$db->execute();

        //Return the results!
        return self::$db->resultSet();

    }

    //UPDATE 
    static function updateWatchedMovies(WatchedMovies $updateWMovies): int   {
        try {
            //Create the query
            $updateQuery = "UPDATE WatchedMovies SET MovieID = :mid, Date = :d ,Rate = :r WHERE WatchedID = :id;";

            //Query
            self::$db->query($updateQuery);

            //Bind
            self::$db->bind(':id',$updateWMovies->getWatchedID());
            self::$db->bind(':mid',$updateWMovies->getMovieID());
            self::$db->bind(':d', $updateWMovies->getDate());
            self::$db->bind(':r', $updateWMovies->getRate());
            
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
    static function deleteWMovie(int $id): bool {

        try {

            //Create the delete query
            $deleteQuery = "DELETE FROM WatchedMovies WHERE WatchedID = :id";

            self::$db->query($deleteQuery);

            //Bind the id
            self::$db->bind(':id', $id);
            
            //Execute the query
            self::$db->execute();

            if (self::$db->rowCount() != 1) {
                throw new Exception("There was an error deleting customer $id");
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
