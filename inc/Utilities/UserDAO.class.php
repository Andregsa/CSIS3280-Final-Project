<?php

class UserDAO    {

    private static $db;

    static function initialize()    {

        //Initialize the database connection
        self::$db = new PDOAgent('User');
    
    }

    //CREATE a single User
    static function createUser(User $newUser): int   {

        //Generate the INSERT STATEMENT for the user;
        $sqlInsert = "INSERT INTO User (UserID, Password, Email,First_Name,Last_Name,Birthday)
         VALUES (:id, :pw, :email, :fn, :ln, :bday);";

        //prepare the query
        self::$db->query($sqlInsert);

        //Setup the bind parameters
        self::$db->bind(':id',$newUser->getUserID());
        self::$db->bind(':pw', $newUser->getPassword());
        self::$db->bind(':email', $newUser->getEmail());
        self::$db->bind(':fn',$newUser->getFirst_Name());
        self::$db->bind(':ln', $newUser->getLast_Name());
        self::$db->bind(':bday', $newUser->getBirthday());

        //Execute the query
        self::$db->execute();

        //Return the last inserted ID!!
       return  self::$db->lastInsertId();

    }

    //READ a single User
    static function getUser(int $id) : User   {
        
        $singleSelect = "SELECT * FROM User WHERE UserID = :id";

        //Prepare the query
        self::$db->query($singleSelect);

        //Set the bind parameters
        self::$db->bind(':id', $id);

        //Execute the query
        self::$db->execute();

        //Get the row
        return self::$db->singleResult();

    }

    //READ a list of Users
    static function getUsers(): Array   {

        $selectAll = "SELECT * FROM User;";
        //Prepare the query
        self::$db->query($selectAll);

        //Execute the query
        self::$db->execute();

        //Get the row
        return self::$db->resultset();
    }

    //UPDATE 
    static function updateUser(User $updatedUser): int   {
        try {
            //Create the query
            $updateQuery = "UPDATE User SET Password = :pw, Email = :email, First_Name = :fn, Last_Name = :ln, Birthday = :bday WHERE UserID = :id;";

            //Query
            self::$db->query($updateQuery);

            //Bind
            self::$db->bind(':id',$updatedUser->getUserID());
            self::$db->bind(':pw', $updatedUser->getPassword());
            self::$db->bind(':email', $updatedUser->getEmail());
            self::$db->bind(':fn',$updatedUser->getFirst_Name());
            self::$db->bind(':ln', $updatedUser->getLast_Name());
            self::$db->bind(':bday', $updatedUser->getBirthday());
            
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
    static function deleteUser(int $id): bool {

        try {

            //Create the delete query
            $deleteQuery = "DELETE FROM User WHERE UserID = :id";

            self::$db->query($deleteQuery);

            //Bind the id
            self::$db->bind(':id', $id);
            
            //Execute the query
            self::$db->execute();

            if (self::$db->rowCount() != 1) {
                throw new Exception("There was an error deleting user $id");
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