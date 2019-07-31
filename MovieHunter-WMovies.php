<?php
require_once("templates/Page.class.php");
require_once("inc/config.inc.php");
require_once("inc/Entities/WatchedMovies.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/DAO/WatchedMoviesDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
LoginManager::verifyLogin();
Page::Header();
WatchedMoviesDAO::init();
$user = UserDAO::getUserEmail($_SESSION['logged']);
$movies = WatchedMoviesDAO::getWMovieByUser($user->getUserID()); 
$msg="";   

if(isset($_POST))
{
    if(isset($_POST['edit']) || isset($_POST['saveEdits']))
    {
        if(isset($_POST['edit'])){
        $id = $_POST['edit'];
        
        Page::editWMovieRate($id);
        }

        
        $r = null;
        if(isset($_POST['userrate']))
        {
            $r = $_POST['userrate'];
            if(is_numeric($r) && $r<=10 && $r>0)
            {
                $id = $_POST['hiddenWatchedID'];
             
                WatchedMoviesDAO::updateWatchedMovies($id,$r);
                header('Location:MovieHunter-WMovies.php');
                unset($_GET);
            }
            else{
                $msg = "Insert a Rate Between 1-10";
            }
        }
    }
    else if(isset($_POST['delete']))
    {
        WatchedMoviesDAO::deleteWMovie($_POST['delete']);
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}
Page::wmovies($movies,$msg);
Page::Footer();

?>