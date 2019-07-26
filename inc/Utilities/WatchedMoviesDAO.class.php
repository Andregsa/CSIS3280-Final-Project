<?php

class WatchedMoviesDAO    {

    private static $db;

    //Initialize DAO class
    static function init()  {
        
        self::$db = new PDOAgent("Rents");

    }

    //CREATE a single Rent
    static function createRents(Rents $newRent): int   {

        //Generate the INSERT STATEMENT for the Rent;
        $sqlInsert = "INSERT INTO Rents (MovieID, Date)
         VALUES (:mid, :d);";

        //prepare the query
        self::$db->query($sqlInsert);

        //Setup the bind parameters
        self::$db->bind(':mid', $newRent->getMovieID());
        self::$db->bind(':d', $newRent->getDates());

        //Execute the query
        self::$db->execute();

        //Return the last inserted ID!!
       return  self::$db->lastInsertId();

    }

    //READ a single Rent
    static function getRent(int $id) : Rents   {
        
        $singleSelect = "SELECT * FROM Rent WHERE RentID = :id";

        //Prepare the query
        self::$db->query($singleSelect);

        //Set the bind parameters
        self::$db->bind(':id', $id);

        //Execute the query
        self::$db->execute();

        //Get the row
        return self::$db->singleResult();

    }

    static function getRents()    {

        $sqlQuery = "SELECT * FROM Rents;";

        //Query!
        self::$db->query($sqlQuery);

        //Execute!
        self::$db->execute();

        //Return the results!
        return self::$db->resultSet();

    }

    //UPDATE 
    static function updateRent(Rents $updatedRent): int   {
        try {
            //Create the query
            $updateQuery = "UPDATE Rents SET MovieID = :mid, Date = :d WHERE RentID = :id;";

            //Query
            self::$db->query($updateQuery);

            //Bind
            self::$db->bind(':id',$updateRent->getRentID());
            self::$db->bind(':mid',$updatedRent->getRentID());
            self::$db->bind(':d', $updatedRent->getDate());
            
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
    static function deleteRent(int $id): bool {

        try {

            //Create the delete query
            $deleteQuery = "DELETE FROM Rents WHERE RentID = :id";

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
