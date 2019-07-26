<?php
    require_once("templates/Page.class.php");
    require_once("inc/Entities/Movies.class.php");
    require_once("inc/Utilities/TopRatedDAO.class.php");
    require_once("inc/Utilities/LatestTrailersDAO.class.php");
    require_once("inc/Utilities/PDOAgent.class.php");
    require_once("inc/Utilities/PDOAgent.class.php");
    require_once("inc/config.inc.php");


    //Initialize Variables
    $action = "";   
    $errors=array(); //Variables for error messages

    //Initialize Customer DAO
    TopRatedDAO::init();
    LatestTrailersDAO::init();

    //Instantiate Movies
    $myMovies = new Movies;


        //Check if there was get data, perform the action
    if (!empty($_GET))    {
        $action = $_GET["action"];
    }
    
    
//Run a case statement to see what was requested.

switch($action){
    
    //Show Detail Movie
    case "detailLatest" : detailMovieLatest();
    break;
    case "detailTopRated" : detailMovieTopRated();
    break;

   
    default : homePage();

}



function homePage(){
    //GET Top Rated Movies and Lastest Trailers from DB
    $topRatedMovies = TopRatedDAO::getMovies();
    $latestTrailers = LatestTrailersDAO::getMovies();
    global $msg;
    Page::Header();
    //Parse Top Rated Movies and Lastest Trailers into Home Page
    Page::MainPage($topRatedMovies,$latestTrailers);
    Page::Footer();
  
}

function detailMovieLatest(){
    global $msg;
    Page::Header();
    $selectedMovie = LatestTrailersDAO::getMovie($_GET["MovieID"]);
    //Parse Top Rated Movies and Lastest Trailers into Home Page
    Page::MovieDetail($selectedMovie);
    Page::Footer();

}
function detailMovieTopRated(){
    global $msg;
    Page::Header();
    $selectedMovie = TopRatedDAO::getMovie($_GET["MovieID"]);
    //Parse Top Rated Movies and Lastest Trailers into Home Page
    Page::MovieDetail($selectedMovie);
    Page::Footer();

}

   
    

    
   






?>