<?php
    require_once("templates/Page.class.php");
    require_once("inc/Entities/MyMovies.class.php");


    $movie_url='http://www.omdbapi.com/?apikey=c44d978e&t=pirates+of+the+caribbean&page=1&plot=short';
    $movies_json= file_get_contents($movie_url);
    $movies_array = json_decode($movies_json,true);

    $myMovies = new MyMovies;

    $myMovies->setTitle($movies_array["Title"]);
    $myMovies->setYear($movies_array["Year"]);
    $myMovies->setRunTime($movies_array["Runtime"]);
    $myMovies->setGenre($movies_array["Genre"]);
    $myMovies->setPlot($movies_array["Plot"]);
    $myMovies->setPoster($movies_array["Poster"]);



    


    Page::Header();
    //Test to retrieve the poster and plot in the X-Man title.
   Page::MainPage($movies_array["Poster"]);
   //var_dump($myMovies);
    Page::Footer();






?>