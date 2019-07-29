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
    $msg="";
    //LoginManager::verifyLogin();
    Page::Header();
    UserDAO::initialize();
    

   
    $number = 1;
    $searchMovie="";
    $searchYear="";


    if(isset($_POST["cancel"])){
        if($_POST["cancel"]=="return"){
            $search= explode("/",$_POST["search"]);
            $searchMovie = $search[0];
            if(count($search)>1)
            $searchYear = $search[1];
            else{
                $searchYear="";
            }

             $fullLink = "searchField=$searchMovie&yearField=$searchYear";
            header('Location: MovieHunter-Search.php?'.$fullLink);  
        }
    }

    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if(!empty($_GET)){
            $movies = array();

            if(isset($_GET['searchField']) && !empty(trim($_GET['searchField']))){
                $searchMovie=rawurlencode(trim($_GET['searchField']));
                $searchYear=trim($_GET['yearField']);
                
                $endOfPage = false;
                
                try{

                    while(true){

                        $fullLink = $link."?s=".rawurlencode(trim($_GET['searchField']))."&y=".trim($_GET['yearField'])."&page=".$number.OMDB_KEY;
                        
                        if(!@$result = file_get_contents($fullLink,false)){
                            throw new Exception("Problem to Reach the Web Service!");
                        }

                        $result = file_get_contents($fullLink,false);
                        $result = json_decode($result);


                    if(isset($result->{"Response"})){
                        if($result->{"Response"}=="False" && $result->{"Error"}=="Movie not found!" ){
                            break;

                        } 

                    }


                        foreach($result as $sresult){
                            
                            if(gettype($sresult) == 'array'){

                                foreach($sresult as $std){
                                        
                                    if($std->Poster=="N/A" )
                                    {
                                        //Do nothing
                                    }

                                
                                    else{

                                        if(get_class($std) == 'stdClass'){
                                            $movie = new Movies();
                                            $movie->setTitle($std->Title);
                                            $movie->setPoster($std->Poster);
                                            $movie->setMovieID($std->imdbID);
                                            $movie->setYear($std->Year);
                                            
                                            $movies[] = $movie;
            
                                        }
                                    }
                        
                                }
                            }
                        }

                        $number++;
                }
                // while($endOfPage==false);
                    
                } catch (exception $ex){
                    //LOG THE ERROR!!!
                    $msg = "Page Not Available at the Moment"."<BR>"."Please Come Back Later!";

                     //Write to the error log
                    error_log($ex->getMessage() ." at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILE);

                }
                
                if(!$movies){
                    $msg = "Movie Not Found!"."<BR>"."Try Refine Your Search!";
                    Page::MoviesSearch($movies,$number,$_GET['searchField'],$msg);
                }
                else{
                    if(!empty(trim($_GET['yearField'])))
                    Page::MoviesSearch($movies,$number,trim($_GET['searchField'])."/".trim($_GET['yearField']),$msg);
                    else{
                        Page::MoviesSearch($movies,$number,trim($_GET['searchField']),$msg);
                    }
                }
                Page::Footer();
               
            }

            if(isset($_GET['searchField']) && empty(trim($_GET['searchField']))){
                $msg = "Movie Not Found!"."<BR>"."Try Refine Your Search!";
                Page::MoviesSearch($movies,$number,$_GET['searchField'],$msg);
                Page::Footer();
            }


            //CODE TO SEND THE USERT TO DETAIL MOVIE PAGE
            if(isset($_GET['action']) && $_GET['action']=="detailMovie" ){

                $fullLink = $link."?i=".rawurlencode(trim($_GET['MovieID'])).OMDB_KEY;
                $result = file_get_contents($fullLink,false);
                $result = json_decode($result);

                    if(get_class($result) == 'stdClass'){
                        $movie = new Movies();
                        $movie->setTitle($result->Title);
                        $movie->setYear($result->Year);
                        $movie->setRuntime($result->Runtime);
                        $movie->setGenre($result->Genre);
                        $movie->setPlot($result->Plot);
                        $movie->setRating($result->imdbRating);
                        $movie->setPoster($result->Poster);
                        $search = $_GET['search'];
                      
                        

                    }
                           
 
            Page::MovieDetail($movie,$msg,$search);
            Page::Footer();
                
            }

            



        }

    }

    
    
?>