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
    
    if(isset($_GET['previous'])){
        
    }
    
    if(isset($_GET['next'])){
        
    }

   
    $number = 1;

    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if(!empty($_GET)){
            
            if(isset($_GET['searchField']) || isset($_GET['yearField'])){
                
                if(isset($_GET['page'])){

                    if($_GET['page'] == "next"){
                        $number = intval($_GET['number']);
                        $number += 1;
                        
                    }
                    if($_GET['page'] == "previouss"){
                        $number = intval($_GET['number']);
                        $number -= 1;
                    } 
                   
                }
                
                //Keeps the page at 1 if someone goes to a previous page at page 1;
                if($number < 1){
                    $number == 1;
                }

                $link = $link."?s=".$_GET['searchField']."&page=".$number.OMDB_KEY;
                $link = file_get_contents($link,false);
                $link = json_decode($link);
               

                $movies = array();
                

                try{
                    foreach($link as $slink){
                        
                        if(gettype($slink) == 'array'){

                            foreach($slink as $std){
                                if(get_class($std) == 'stdClass'){
                                    $movie = new Movies();
                                    $movie->setTitle($std->Title);
                                    $movie->setPoster($std->Poster);
                                    $movie->setMovieID($std->imdbID);
                                    
                                     $movies[] = $movie;
    
                                }
                                
                                
        
                            }
                        }
                        
                        
                    }
                    
                } catch (exception $ex){

                }
                
                //var_dump($movies);
                Page::displayMovies($movies,$number,$_GET['searchField']);
                Page::Footer();
                
               
            }
        }
    }

    
?>