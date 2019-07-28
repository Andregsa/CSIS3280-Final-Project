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
Page::wmovies($movies);
Page::Footer();

?>