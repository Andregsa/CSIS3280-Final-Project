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
    LoginManager::verifyLogin();
    Page::Header();
    MyMoviesDAO::init();
    UserDAO::initialize();
    

   
    $number = 1;
    $searchMovie="";
    $searchYear="";
    $search;
    $action ="";
    

    if(!empty($_POST)){

         //Instantiate Movies
         $myMovies = new Movies;
       
         $myMovies->setIMDbID($_POST["IMDbID"]);
         $myMovies->setTitle($_POST["title"]);
         $myMovies->setYear($_POST["year"]);
         $myMovies->setRuntime($_POST["runtime"]);
         $myMovies->setGenre($_POST["genre"]);
         $myMovies->setPlot($_POST["plot"]);
         $myMovies->setRating($_POST["rating"]);
         $myMovies->setPoster($_POST["poster"]);
         $myMovies->setCategory("Searched");
         $selectedMovie = $myMovies;

         $search = $myMovies;
         

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
        }  else{
    
            if($_POST["type"]=="AddToMyMovies"){
               
                if(!$_SESSION){
                    //VALIDATE
                    $msg = "Please Login First!";
                    $search = $_POST["search"];
                    $action="detailMovieID";
                    //Log the message
                    error_log(" Message: ".$msg
                    . " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER);

                }
                else{
                   
                    $user = UserDAO::getUserEmail($_SESSION['logged']);
                    $myMovies->setUserID($user->getUserID());
                   
                    //VERIFY IF THE MOVIE IS ALREADY IN THE USER'S LIST!!!!
                    $allMovies = MyMoviesDAO::getMovieByUser($user->getUserID());
                    $sameMovie = false;
                    foreach($allMovies as $movie){
                       
                        if($movie->getTitle() == $myMovies->getTitle() && $movie->getYear() == $myMovies->getYear()){
                            $sameMovie = true;
                            
                        }
                        
                    }
                    if ($sameMovie == true){
                        $msg="Movie Already Added";
                        $search = $_POST["search"];
                        //Log the message
                        error_log("UserID: ".$user->getUserID()." Message: ".$msg
                        ." / IMDbID: ".$movie->getIMDbID(). " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER);
                        $action="detailMovieID";
                    } else {
                        $result = MyMoviesDAO::createMovie($myMovies);
                        if($result>0){
                            $msg="Movie Added to Your List";
                            //Log the message
                            error_log("UserID: ".$user->getUserID()." Message: ".$msg
                            ." / IMDbID: ".$myMovies->getIMDbID(). " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER);
                            $search = $_POST["search"];
                            $action="detailMovieID";
                        }
                    }
                }
            }
            else if($_POST["type"]=="MarkAsWatched"){
                if(!$_SESSION){
                    //VALIDATE
                    $msg = "Please Login First!";
                    $search = $_POST["search"];
                    $action="detailMovieID";
                    //Log the message
                    error_log("Message: ".$msg
                    ." at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER);
                }
                else{
                    $user = UserDAO::getUserEmail($_SESSION['logged']);
                    //VERIFY IF THE MOVIE IS ALREADY IN THE LIST!
                    $allWMovies = WatchedMoviesDAO::getWMovieByUser($user->getUserID());
                    $sameWMovie = false;
                    foreach($allWMovies as $wmovie){
                       
                        if($wmovie->getIMDbID() == $myMovies->getIMDbID()){
                            $sameWMovie = true;
                        }
                        
                    }
                    if ($sameWMovie == true){
                        $msg="Movie Already Watched";
                        $search = $_POST["search"];
                        $action="detailMovieID";
                        //Log the message
                        error_log("UserID: ".$user->getUserID()." Message: ".$msg
                        ." / IMDbID: ".$myMovies->getIMDbID(). " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER);
                    } else {
                    $myMovies->setUserID($user->getUserID());

                         //VERIFY IF THE MOVIE IS ALREADY IN THE MYMOVIES LIST!!!!
                    $allMovies = MyMoviesDAO::getMovieByUser($user->getUserID());
                    $sameMovie = false;
                    foreach($allMovies as $movie){
                       
                        if($movie->getIMDbID() == $myMovies->getIMDbID()){
                            $sameMovie = true;
                            $IMDbID = $movie->getIMDbID();
                            
                        }
                        
                    }

                    if($sameMovie==true){


                        $wm  = new WatchedMovies();
                        $wm->setUserID($user->getUserID());
                        $wm->setIMDbID($IMDbID);
                        $wm->setDate(date("Y:m:d"));
                        $wm->setRate(0);//must be updated by user.
                        WatchedMoviesDAO::createWMovies($wm);
                        $msg="Movie Added to Your Watch List";
                        $search = $_POST["search"];
                        $action="detailMovieID";
                        //Log Message
                        error_log("UserID: ".$user->getUserID()." Message: ".$msg
                        ." / IMDbID: ".$myMovies->getIMDbID(). " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER);
                    
                    }

                    else{
                        //IF MOVIES DOES NOT EXIST IN MY MOVIE LIST, 
                        //ADD TO MYLIST FIRST TO GET THE MOVIE ID AFTER AND POPULATE MYWATCHED MOVIED LIST
                        $myMovies->setCategory("Watched");
                        MyMoviesDAO::createMovie($myMovies);

                        $allMovies = MyMoviesDAO::getMovieByUser($user->getUserID());
                        
                        foreach($allMovies as $movie){
                        //GET THE MOVIE ID IN MYMOVIE LIST TO USER AS FOREIGN KEY IN MY WATCHED LIST
                            if($movie->getIMDbID() == $myMovies->getIMDbID()){
                                $sameMovie = true;
                                $IMDbID = $movie->getIMDbID();  
                            } 
                        }

                        $wm  = new WatchedMovies();
                        $wm->setUserID($user->getUserID());
                        $wm->setIMDbID($IMDbID);
                        $wm->setDate(date("Y:m:d"));
                        $wm->setRate(0);//must be updated by user.
                        WatchedMoviesDAO::createWMovies($wm);
                        $msg="Movie Added to Your Watch List";
                        $search = $_POST["search"];
                        $action="detailMovieID";
                        //Log Message
                        error_log("UserID: ".$user->getUserID()." Message: ".$msg
                        ." / IMDbID: ".$myMovies->getIMDbID(). " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER);

                    }
                }
                    
                }

            }
    
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
                                            $movie->setIMDbID($std->imdbID);
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

                    //Log Message
                    error_log("Message: ".$msg
                    ." Search: ".$_GET['searchField']. " / Year: ".$_GET['yearField']. " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILE);

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
                 //Log Message
                 error_log("Message: ".$msg
                 ." Search: ".$_GET['searchField']. " / Year: ".$_GET['yearField']. " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILE);
                Page::MoviesSearch($movies,$number,$_GET['searchField'],$msg);
                Page::Footer();
            }


            //CODE TO SEND THE USER TO DETAIL MOVIE PAGE
            if(isset($_GET['action']) && ($_GET['action']=="detailMovie") || $action == "detailMovieID"){

                $fullLink = $link."?i=".rawurlencode(trim($_GET['IMDbID'])).OMDB_KEY;
                $result = file_get_contents($fullLink,false);
                $result = json_decode($result);

                
                    if(get_class($result) == 'stdClass'){
                        $movie = new Movies();
                       
                        $movie->setTitle($result->Title);

                        $movie->setYear($result->Year);

                        //There's some occasional situations
                        //Where the content received from omdb isn't INT.
                        $modify = $result->Runtime;
                        $modify = str_replace(" min","",$modify);
                        $movie->setRuntime($modify);
                        $movie->setGenre($result->Genre);
                        $movie->setPlot($result->Plot);
                        $movie->setRating($result->imdbRating);
                        $movie->setPoster($result->Poster);
                        $movie->setIMDbID($result->imdbID);
                        $search = $_GET['search'];
                        
                        
                        

                    }
                           
                    
            Page::MovieDetail($movie,$msg,$search);
            Page::Footer();
                
            }
        }

    }

 

    switch($action){
    
        case "detailMovieID" : detailMovieID();
        break;
    
    }
    
    //This function is to return to Movie Detail page after the user add the movie to Mylist.
    //We get the MovieId from the POST method and use to display the same movie again.
    function detailMovieID(){
        global $msg;
        global $search;
        global $selectedMovie;
     
        Page::MovieDetail($selectedMovie,$msg,$search);
        Page::Footer();
    
    }
    
    
    
    
?>