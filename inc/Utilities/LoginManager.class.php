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
            
            
            $pageName = "MovieHunter-Home.php";
            $pageName2 = "About.php";

            //Allows the the pages to not get redirected to the homepage if there's no session.
            if(strpos($_SERVER['PHP_SELF'], $pageName) == true || strpos($_SERVER['PHP_SELF'], $pageName2) == true) {

            } else {
                header('Location: '."MovieHunter-Home.php");
            }
            
            
            return false;

        }
    }

    static function verifySession(){
        if(isset($_SESSION['logged'])){
            if($_SESSION['logged'] != null){
                return true;
            } else {
                return false;
            }
        }
        return false;
        
    }
        
    
}

?>