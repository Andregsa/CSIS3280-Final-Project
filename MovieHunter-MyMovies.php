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
$movies = MyMoviesDAO::getMovieByUser($user->getUserID());
Page::mymovies($movies);
Page::Footer();

?>