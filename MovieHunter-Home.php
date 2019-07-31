<?php
    require_once("templates/Page.class.php");
    require_once("inc/Entities/Movies.class.php");
    require_once("inc/Entities/WatchedMovies.class.php");
    require_once("inc/Utilities/DAO/TopRatedDAO.class.php");
    require_once("inc/Utilities/DAO/LatestTrailersDAO.class.php");
    require_once("inc/Utilities/DAO/MyMoviesDAO.class.php");
    require_once("inc/Utilities/DAO/HomePageDAO.class.php");
    require_once("inc/Utilities/DAO/WatchedMoviesDAO.class.php");
    require_once("inc/Utilities/PDOAgent.class.php");
    require_once("inc/config.inc.php");
    require_once("inc/Utilities/LoginManager.class.php");
    
    LoginManager::verifyLogin();
    

    //Initialize Variables
    $action = "";   
    $errors=array(); //Variables for error messages
    $msg="";

    //Initialize Customer DAO
    TopRatedDAO::init();
    LatestTrailersDAO::init();
    MyMoviesDAO::init();
    HomePageDAO::init();
    WatchedMoviesDAO::init();

    

    if(!empty($_POST)){

        if(isset($_POST['loggedBTN'])){
            $_SESSION['logged'] = null;
                
            header('Location: '.$_SERVER['PHP_SELF']);
        }

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
        $myMovies->setCategory($_POST["category"]);
        

        if(isset($_POST["cancel"])){
            if($_POST["cancel"]=="return")
            $action="homePage";

        }
        else{

            if($_POST["type"]=="AddToMyMovies"){
                if(!$_SESSION){
                    //VALIDATE
                    $msg = "Please Login First!";
                    $action="detailMovieID";
                }
                else{
                    $user = UserDAO::getUserEmail($_SESSION['logged']);
                    $myMovies->setUserID($user->getUserID());

                    //VERIFY IF THE MOVIE IS ALREADY IN THE USER'S LIST!!!!
                    $allMovies = MyMoviesDAO::getMovieByUser($user->getUserID());
                    $sameMovie = false;
                    foreach($allMovies as $movie){
                       
                        if($movie->getIMDbID() == $myMovies->getIMDbID()){
                            $sameMovie = true;
                        }
                        
                    }
                    if ($sameMovie == true){
                        $msg="Movie Already Added";
                        $action="detailMovieID";
                    } else {
                        $result = MyMoviesDAO::createMovie($myMovies);
                        if($result>0){
                            $msg="Movie Added to Your List";
                            $action="detailMovieID";
                        }
                    }
                }
            }
            else if($_POST["type"]=="MarkAsWatched"){
                if(!$_SESSION){
                    //VALIDATE
                    $msg = "Please Login First!";
                    $action="detailMovieID";
                }
                else{
                    $user = UserDAO::getUserEmail($_SESSION['logged']);
                    //VERIFY IF THE MOVIE IS ALREADY IN THE LIST!
                    $allMovies = WatchedMoviesDAO::getWMovieByUser($user->getUserID());
                    $sameMovie = false;
                    foreach($allMovies as $movie){
                       
                        if($movie->getIMDbID() == $myMovies->getIMDbID()){
                            $sameMovie = true;
                        }
                        
                    }
                    if ($sameMovie == true){
                        $msg="Movie Already Added";
                        $action="detailMovieID";
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
                            if(!WatchedMoviesDAO::createWMovies($wm)==null){
                                $msg="Movie Added to Your Watch List";
                                $action="detailMovieID";
                                }
                                else{
                                    $msg="Error While Adding the Movie";
                                }
                        
                        }

                        else{
                            //IF MOVIES DOES NOT EXIST IN MY MOVIE LIST, 
                            //ADD TO MYLIST FIRST TO GET THE MOVIE ID AND AFTER POPULATE MYWATCHED MOVIED LIST
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
                            if(!WatchedMoviesDAO::createWMovies($wm)==null){
                                $msg="Movie Added to Your Watch List";
                                $action="detailMovieID";
                                }
                                else{
                                    $msg="Error While Adding the Movie";
                                }
    
                        }
                    
                    }
                }

            }
        }
    }

        //Check if there was get data, perform the action
    if (!empty($_GET))    {
        if(isset($_GET["action"])){
            $action = $_GET["action"];
        }
        //If they click the logout button redirect and set their sessions to null.
        if (isset($_GET["logout"])){
            $_SESSION['logged'] = null;
            unset($_SESSION);
            session_destroy();
            header('Location: '.$_SERVER['PHP_SELF']);
        }
    }
    
    
//Run a case statement to see what was requested.

switch($action){
    
    //Show Detail Movie
    case "detailMovie" : detailMovie();
    break;
    case "detailMovieID" : detailMovieID();
    break;
    case "homePage" :homePage();
    break;

   
    default : homePage();

}



function homePage(){
    //GET Top Rated Movies and Lastest Trailers from DB
    $topRatedMovies = HomePageDao::getMovieCateg("Top Rated");
    $latestTrailers = HomePageDao::getMovieCateg("Latest Trailers");
    global $msg;
    Page::Header();
    //Parse Top Rated Movies and Lastest Trailers into Home Page
    Page::MainPage($topRatedMovies,$latestTrailers);
    Page::Footer();
  
}

function detailMovie(){
    global $msg;
    Page::Header();
    $selectedMovie = HomePageDAO::getMovie($_GET["IMDbID"]);
    //Parse Top Rated Movies and Lastest Trailers into Home Page
    Page::MovieDetail($selectedMovie,$msg);
    Page::Footer();

}

//This function is to return to Movie Detail page after the user add the movie to Mylist.
//We get the MovieId from the POST method and use to display the same movie again.
function detailMovieID(){
    global $msg;
    Page::Header();
    $selectedMovie = HomePageDAO::getMovie($_POST["IMDbID"]);
    //Parse Top Rated Movies and Lastest Trailers into Home Page
    Page::MovieDetail($selectedMovie,$msg);
    Page::Footer();

}
?>