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
                 //Log the message
                error_log("Message: ".$msg
                ." / Rate Enter by User: ".$r. " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER); 
            }
        }
    }
    else if(isset($_POST['delete']))
    {
       if( WatchedMoviesDAO::deleteWMovie($_POST['delete'])){
         header('Location: '.$_SERVER['PHP_SELF']);
         //Log the message
         error_log("WatchedMovie ID: ".$_POST['delete']
         ." Was deleted from MyWatched List ". " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER); 
       }

       else{
        //Log the message
        error_log("WatchedMovie ID: ".$_POST['delete']
        ." Could not be deleted from MyWatched List ". " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER); 
       }
    }
}
Page::wmovies($movies,$msg);
Page::Footer();

?>