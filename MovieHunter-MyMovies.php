<?php
require_once("templates/Page.class.php");
require_once("inc/config.inc.php");
require_once("inc/Entities/Movies.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/DAO/MyMoviesDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
LoginManager::verifyLogin();
Page::Header();
MyMoviesDAO::init();
$user = UserDAO::getUserEmail($_SESSION['logged']);
$lastClickedBTN = "";
$movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),"Title");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['sort'])){
        switch($_GET['sort']){
            case 'title':
            $lastClickedBTN = getLastBTN();
            $movies = sortMovies($lastClickedBTN,"Title");
            break;
            case 'year';
            $lastClickedBTN = getLastBTN();
            $movies = sortMovies($lastClickedBTN,"Year");
            break;
            case 'runtime':
            $lastClickedBTN = getLastBTN();
            $movies = sortMovies($lastClickedBTN,"Runtime");
            break;
            case 'genre':
            $lastClickedBTN = getLastBTN();
            $movies = sortMovies($lastClickedBTN,"Genre");
            break;
            case 'plot':
            $lastClickedBTN = getLastBTN();
            $movies = sortMovies($lastClickedBTN,"Plot");
            break;
            case 'rating';
            $lastClickedBTN = getLastBTN();
            $movies = sortMovies($lastClickedBTN,"Rating");
            break;
            case 'category';
            $lastClickedBTN = getLastBTN();
            $movies = sortMovies($lastClickedBTN,"Category");
            break;
        }
        
    } else {
        
    }
}

function getLastBTN(){
  
    $lastClickedBTN = "1";
    if(isset($_GET['last'])){
        if($_GET['last'] == "1"){
            $lastClickedBTN = "0";
        }
    } else {
        $lastClickedBTN = "1";
    }
    return $lastClickedBTN;
   
}

function sortMovies($lastbtn,$columnName){
    $user = UserDAO::getUserEmail($_SESSION['logged']);
    
    if($lastbtn == "1"){
        $movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),$columnName." ASC");
    }else {
        $movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),$columnName." DESC");
    }
    return $movies;
}
//global $movies;
Page::mymovies($movies,$lastClickedBTN);
Page::Footer();

?>