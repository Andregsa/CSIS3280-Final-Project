<?php

class LoginManager  {

    //Verifies whether or not a user is currently logged in
    static function verifyLogin()   {

        session_start();
        
        //If they are logged in, return true
        //Otherwise, destroy the session, redirect them to the login page
        //and return false
        if(!empty($_SESSION['logged']))
        {
            return true; 
        } else 
        {
        
            session_destroy();
            header('Location: '."MovieHunter-Login.php");
            return false;

        }
    }
        
    
}

?>