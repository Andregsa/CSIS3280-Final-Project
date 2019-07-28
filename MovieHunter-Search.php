<?php
require_once("inc/config.inc.php");
require_once("templates/Page.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/Validation.class.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Movies.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");

    $link = "http://www.omdbapi.com/";
    //LoginManager::verifyLogin();
    Page::Header();
    UserDAO::initialize();
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if(!empty($_GET)){
            var_dump("lolnotempt");
            if(isset($_GET['searchField']) || isset($_GET['yearField'])){
                var_dump("hi");
                $link = $link."?s=".$_GET['searchField'].OMDB_KEY;
                $link = file_get_contents($link,false);
                $link = json_decode($link);
                var_dump($link);

                $movies = array();
                


                foreach($link as $slink){
                    foreach($slink as $std){
                        var_dump($std);
                        $movie = new Movies();
                        
                        $movie->setTitle($std->Title);
                        $movie->setPoster($std->Poster);
                        $movie->setMovieID($std->imdbID);

                    $movies[] = $movie;
                    }
                    
                }
                var_dump($movies);

                Page::displayMovies($movies);
                Page::Footer();
                
                var_dump($link);
            }
        }
    }


?>