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
$movieID;
$msg = "";
$movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),"Title");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['IMDbID'])){
        
        if($_POST['type'] == "editCategory"){
            $movieEdit = MyMoviesDAO::getSingleMovieByUser($_POST['IMDbID'],$user->getUserID());
            
            //The database will not attempt to update the same information
            if($movieEdit->getCategory() != $_POST['movieCategory']){
                $movieEdit->setCategory($_POST['movieCategory']);
                
                //The database can't store a category greater than 50 characters
                if( 50 < strlen($_POST['movieCategory'])){
                    $msg = "Character Limit Reached";
                } else {
                    $result = MyMoviesDAO::updateMyMovies($movieEdit);
                    if($result>0){
                    $msg = "Category Edited!";
                    $movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),"Title");
                    }
                    else{
                        $msg = "Category Unchanged!";
                    }
                }
                
            } else {
                $msg = "Category Unchanged!";
            }
            
          
            
        }

    
        
    }
    if(isset($_POST['deleteMovie'])){
        
        //Getting a movie returns false if the movie does not exist in the database
        $movieToDelete = MyMoviesDAO::getSingleMovieByUser($_POST['deleteMovie'],$user->getUserID());
        if($movieToDelete == false){
            $msg = "";
        } else {
            $movieDelete = MyMoviesDAO::deleteMovie($_POST['deleteMovie'],$user->getUserID());
            $msg = "The Movie Was Deleted";
            $movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),"Title");
        }
        
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
   
    //If they edit movie category button was pressed
    if(isset($_GET['movie'])){
        if(isset($_GET['action'])){
            $action = $_GET['action'];
            switch($action){

                case 'edit':
                $movieIMDbID = $_GET['movie'];
               
                //Prepares the movie to be display showEditCategory()
                $movie = MyMoviesDAO::getSingleMovieByUser($movieIMDbID,$user->getUserID());
                break;
            }
        }
    }
    //If a sort button was clicked
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
//When clicking a type to sort by
//It always alternates between ascending and descending
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

//Toggles sorts between ascending and descending
function sortMovies($lastbtn,$columnName){
    $user = UserDAO::getUserEmail($_SESSION['logged']);
    
    if($lastbtn == "1"){
        $movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),$columnName." ASC");
    }else {
        $movies = MyMoviesDAO::getMovieByUserSort($user->getUserID(),$columnName." DESC");
    }
    return $movies;
}


//Ensures that the page will remain on the edit page with these things true
//Otherwise the mymovies page will display
if(isset($_GET['action']) && $_GET['action'] == "edit" ){
    Page::showEditCategory($movie,$msg);
} else {
    Page::mymovies($movies,$lastClickedBTN,$msg);
}


Page::Footer();

?>