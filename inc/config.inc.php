<?php

//Constants
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME","movie_hunter");
date_default_timezone_set('America/Vancouver');

//API KEY:

define("OMDB_KEY","&apikey=bde511bb");
//http://www.omdbapi.com/?apikey=c44d978e

//API KEY HAS A LIMIT OF 1000 REQUEST PER DAY
// Another API KEY: af420b4c
// Another API KEY: 5d7bc374
// Another API KEY: bde511bb

//Define the error log
define("LOG_FILE", "Log/ErrorLog/erros.log");

//Set the date.timezone (ini_set) to show up in the error log
ini_set("date.timezone","America/Vancouver");



?>
