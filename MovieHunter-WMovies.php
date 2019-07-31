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
var_dump($movies);
if(isset($_POST))
{
    if(isset($_POST['edit']) || isset($_POST['saveEdits']))
    {
        $id = $_POST['edit'];
        
        Page::editWMovieRate($id);
        
        $r = null;
        if(isset($_POST['userrate']))
        {
            $r = $_POST['userrate'];
            if(is_numeric($r))
            {
                $id = $_POST['hiddenWatchedID'];
             
                WatchedMoviesDAO::updateWatchedMovies($id,$r);
                header('Location:MovieHunter-WMovies.php');
                unset($_GET);
            }
        }
    }
    else if(isset($_POST['delete']))
    {
        WatchedMoviesDAO::deleteWMovie($_POST['delete']);
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}
Page::wmovies($movies);
Page::Footer();

?>