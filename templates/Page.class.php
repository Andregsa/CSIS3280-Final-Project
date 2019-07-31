<?php 
require_once("inc/config.inc.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/DAO/MyMoviesDAO.class.php");
require_once("inc/Utilities/DAO/HomePageDAO.class.php");
require_once("inc/Utilities/DAO/WatchedMoviesDAO.class.php");
require_once("inc/Entities/Movies.class.php");
require_once("inc/Entities/WatchedMovies.class.php");
UserDAO::initialize();
MyMoviesDAO::init();
WatchedMoviesDAO::init();
HomePageDAO::init();
class Page{
    static function Header(){
      $mySession = LoginManager::verifySession();
      $activePage = basename($_SERVER['PHP_SELF'], ".php");
      ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MovieHunter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="templates/css/style.css" type="text/css" media="all" />
<script type="text/javascript" src="templates/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="templates/js/jquery-func.js"></script>
!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--[if IE 6]><link rel="stylesheet" href="templates/css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="MovieHunter-Home.php">MovieHunter</a></h1>
   
    <div id="navigation">
      <ul>
      <li><a class="<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-Home.php">HOME</a></li>
      <!-- Check if the User is LoggedIn -->
      <?php if ($mySession == true){ ?>
        <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-MyMovies.php">MY MOVIES</a></li>
        <?php } 
        // If Not, Send the user to Login Page
        else { ?>
          <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-Login.php">MY MOVIES</a></li>
          <?php  }
         ?>

        <?php if ($mySession == true){ ?>
        <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-WMovies.php">MY WATCHED MOVIES</a></li>
        <?php } 
        // If Not, Send the user to Login Page
        else { ?>
        <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-Login.php">MY WATCHED MOVIES</a></li>
          <?php  }
         ?>

        <?php if ($mySession == true){ ?>
          <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-Account.php">MY ACCOUNT</a></li>
      <?php } else { ?>
        <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-Login.php">MY ACCOUNT</a></li>
       <?php  }
         ?>
        
        <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-About.php">ABOUT</a></li>
        
        <?php if ($mySession == true){ ?>
        
          <li><a class= "<?= ($activePage == 'index') ? 'active':''; ?>" name="loggedBTN" href="MovieHunter-Home.php?logout=true">LOG OUT</a></li>
        <?php } else { ?>
          <li><a style="color:#f2a223;" class= "<?= ($activePage == 'index') ? 'active':''; ?>" href="MovieHunter-Login.php">SIGN IN</a></li>
         <?php  }
           ?>
      </ul>
      <?php if ($mySession == true){ 
        
        $user = UserDAO::getUserEmail($_SESSION['logged']);
        ?>
        <div id="positioning">
        <div id="inform">
          
        <p><?php echo "Welcome, ". $user->getFirst_Name()." ". $user->getLast_Name();?></p>
        </div>
        </div>
      <?php } else { ?>
       <?php  }
         ?>
      
    </div>
    
    <div id="sub-navigation">
    
      <div id="search">
        <form action="MovieHunter-Search.php" method="get" accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="searchField" placeholder="Search a Movie" id="search-field" class="blink search-field"  />
          <input type="text" name="yearField" placeholder="Enter Year (Optional)" id="search-field" class="blink search-field"  />
          <input type="submit" value="GO!" class="search-button" />
        </form>
      
    </div>
  </div>


    <?php }


static function MainPage($topRated,$latestTrailers){ ?>
    <div id="main">
    <div id="content">


    <div id="toggle_container"> 

      <div class="box">
        <div class="head">
          <h2>LATEST TRAILERS</h2>
          <p class="text-right">See all</p>
        </div>


        <?php 

      $count=0;
        foreach($latestTrailers as $movie) {
          $defaultImage = "'https://www.moviewatcher.site//assets/img/no_poster_available.png'"; 
          
          if($count<6){
            if($count==0){
              echo '<div class="Extended">';  
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';
              
            }
            elseif($count>0 && $count<5){
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';    
            }
            else{
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';
              echo '</div>';
            }

          $count++;
          }

          else{
            if($count==6){
              echo '<div class="Summary">';  
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';
              
            }
            elseif($count>6 && $count<(sizeOf($topRated)-1)){
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing"onerror="this.onerror=null;this.src='. $defaultImage  .'; " /></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';    
            }
            else{
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; " /></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';
              echo '</div>';
            }

          $count++;
          }


        }  ?>

        <div class="cl">&nbsp;</div>
        
      </div>

    <!--End of toggle_container -->
    </div>

      <!-- TOP RATED MOVIES -->
      <div id="toggle_container"> 

<div class="box">
  <div class="head">
    <h2>TOP RATED</h2>
    <p class="text-right">See all</p>
  </div>


  <?php 
$count=0;
  foreach($topRated as $movie) {
    
    if($count<6){
      if($count==0){
        echo '<div class="Extended">';  
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';
        
      }
      elseif($count>0 && $count<5){
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';    
      }
      else{
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; " /></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';
        echo '</div>';
      }

    $count++;
    }

    else{
      if($count==6){
        echo '<div class="Summary">';  
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';
        
      }
      elseif($count>6 && $count<(sizeOf($topRated)-1)){
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';    
      }
      else{
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';
        echo '</div>';
      }

    $count++;
    }


      }  ?>



   
<?php }

    static function MoviesSearch($movie, $number, $search,$msg=""){
      $activePage = basename($_SERVER['PHP_SELF'], ".php");
      $defaultImage = "'https://www.moviewatcher.site//assets/img/no_poster_available.png'"; 
     
      echo '<div class="box">';
      echo '<div class="head">';

      foreach($movie as $movie){
      echo '<div class="movie">';
      echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?search='.$search.'&action=detailMovie&IMDbID='.$movie->getIMDbID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'"   onerror="this.onerror=null;this.src='. $defaultImage  .'; "/></div>';
      echo '</div>';  

      }

      echo '<h2>'.$msg.'</h2>';

      ?> 

      <div class="pagechange" style="clear:both;">
     
      </div>
      </div>
      </div>
      
    <?php }

    static function Footer(){ ?>
        <div id="footer">
        <p class="lf">Copyright &copy; 2019 <a href="#">Movie Hunter</a> - All Rights Reserved</p>
        <p class="rf">Design by <a href="http://chocotemplates.com/">ChocoTemplates.com</a></p>
        <div style="clear:both;"></div>
      </div>
    </div>
    <!-- END PAGE SOURCE -->
    </body>
    </html>



    <?php }

static function showLogin($errors,$msg) { ?>
    <div id="errors">
         
      <p class="errorLine"><?php echo $msg;?></p>
        
     </div>
  <div id ="cont1">
    <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
     <div class="form-group">
         <label for="email2" style="color:white;">Email</label>
         <input type="text" name="email2" class="form-control" id="exampleInputEmail1"  placeholder="Email">
     </div>
     <div class="form-group">
         <label for="password2" style="color:white;">Password</label>
         <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Password">
     </div>

     <button type="submit" class="btn btn-warning" value="Submit">Sign In</button>
   </form>
   <BR>
    <button type="button" class="btn btn-warning" onclick="window.location.href ='MovieHunter-SignUp.php'">Create New User</button>
  </div>
  <div id="cont2">
      <div id="errors">
         <?php foreach($errors as $error){ ?>
         <p class="errorLine"><?php echo $error;?></p>
         <?php } ?>
     </div>
   </div>

     <?php }

static function showCreateUser($errors) { ?>
  <div id ="cont1">
     <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <div class="form-group">
          <label for="first_name" style="color:white;">First Name</label>
          <input type="text" name="first_name" class="form-control" id="first_name"  placeholder="Enter First Name">
      </div>
      <div class="form-group">
          <label for="last_name" style="color:white;">Last Name</label>
          <input type="text" name="last_name" class="form-control" id="last_name"  placeholder="Enter Last Name">
      </div>
      <div class="form-group">
          <label for="birthday" style="color:white;">Birthday YYYY-MM-DD</label>
          <input type="text" name="birthday" class="form-control" id="birthday"  placeholder="Enter Your Birthday">
      </div>
      <div class="form-group">
         <label for="InputEmail1" style="color:white;">Email</label>
         <input type="text" name="email1" class="form-control" id="email1"  placeholder="Enter Your Email">
     </div>
      
      <div class="form-group">
          <label for="password1" style="color:white;">Password</label>
          <input type="password" name="password1" class="form-control" id="Password1" placeholder="Enter Password">
      </div>
      <div class="form-group">
          <label for="con-password" style="color:white;">Confirm Password</label>
          <input type="password" name="con-password" class="form-control" id="Re-Password" placeholder="Confirm Password">
      </div>
      <button type="submit" class="btn btn-warning"value="Submit" >Sign Up</button>
      </form>
  </div>
  <div id="cont2">
      <div id="errors">
         <?php foreach($errors as $error){ ?>
         <p class="errorLine"><?php echo $error;?></p>
         <?php } ?>
     </div>
   </div>
<?php }





  static function MovieDetail(Movies $movie,$msg="",$search=""){

        echo '<div class="movie_detail">';
        echo '<table id="movie_detail" class="table table-dark">';

        echo '<tr>';
        echo  '<td rowspan="6"><img src="'.$movie->getPoster().'" alt="" /></td>' ;
        echo  '<th>'."Title:".'</th>' ;
        echo  '<td>'.$movie->getTitle().'</td>' ;
        echo '</tr>';

        echo '<tr>';
        echo  '<th>'."Year:".'</th>' ;
        echo  '<td>'.$movie->getYear().'</td>' ;
        echo '</tr>';
        echo '<tr>';

        echo  '<th>'."RunTime:".'</th>' ;
        echo  '<td>'.$movie->getRuntime().' minutes</td>' ;
        echo '</tr>';

        echo  '<th>'."Genre:".'</th>' ;
        echo  '<td>'.$movie->getGenre().'</td>' ;
        echo '</tr>';

        echo  '<th>'."Plot:".'</th>' ;
        echo  '<td>'.$movie->getPlot().'</td>' ;
        echo '</tr>';

        echo  '<th>'."IMDb Rating:".'</th>' ;
        echo  '<td>'.$movie->getRating().'</td>' ;
        echo '</tr>';

        echo '</table>';

        echo '<form method="POST" ACTION="'. $_SERVER["PHP_SELF"] .'">';
        ?>

        <input type="hidden" name="IMDbID" value="<?php echo $movie->getIMDbID(); ?>">
        <input type="hidden" name="title" value="<?php echo $movie->getTitle(); ?>">
        <input type="hidden" name="year" value="<?php echo $movie->getYear(); ?>">
        <input type="hidden" name="runtime" value="<?php echo $movie->getRuntime(); ?>">
        <input type="hidden" name="genre" value="<?php echo $movie->getGenre(); ?>">
        <input type="hidden" name="plot" value="<?php echo $movie->getPlot(); ?>">
        <input type="hidden" name="rating" value="<?php echo $movie->getRating(); ?>">
        <input type="hidden" name="poster" value="<?php echo $movie->getPoster(); ?>">
        <input type="hidden" name="category" value="<?php echo $movie->getCategory(); ?>">
        <input type="hidden" name="IMDbID" value="<?php echo $movie->getIMDbID(); ?>">
        <input type="hidden" name="search" value="<?php echo $search ?>">

        <button type="cancel" class="btn btn-warning" name="cancel" value="return">Return</button>
         <button type="submit" class="btn btn-warning" name="type" value="AddToMyMovies">Add To My Movies List</button>
         <button type="submit" class="btn btn-warning" name="type" value="MarkAsWatched">Mark as Watched</button>

        <?php
        echo '<form>';

        echo '<h2 >'. $msg. '</h2>' ;
        
        
        echo '</div>';

  }
      static function showAccountDetails(User $u)
      { 
        $id = $u->getUserID();
        ?>
        <h4>Account Details</h4>
        <table class="table table-dark">
        <tr>
        <th>Email</th>
        <td><?php echo $u->getEmail(); ?></td>
        </tr>
        <th>First Name</th>
        <td><?php echo $u->getFirst_Name(); ?></td>
        </tr>
        <th>Last Name</th>
        <td><?php echo $u->getLast_Name(); ?></td>
        </tr>
        <th>Birthday</th>
        <td><?php echo $u->getBirthday(); ?></td>
        </tr>
        </table>
        <form method="POST" action=<?php echo $_SERVER['PHP_SELF'];?>>
        <input type="hidden" name="loggedOut">
        <button type="button" class="btn btn-warning" onclick="window.location.href ='MovieHunter-Account.php?action=edit&id=<?php echo $u->getUserID()?>'">Edit</button>
        <button type="button" class="btn btn-warning" onclick="window.location.href ='MovieHunter-Account.php?action=delete&id=<?php echo $u->getUserID()?>'">Delete</button>
        <button type="submit" class="btn btn-warning" name="logout">Logout</button>
        </form>
      <?php
      }
      static function editAccountDetails(User $u)
      {?>
        <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="hidden" name="id" value=<?php echo $u->getUserID(); ?>>
         <div class="form-group" style="width:30%;">
             <label for="first_name" style="color:white;">First Name</label>
             <input type="text" name="first_name" class="form-control" id="first_name"  value=<?php echo $u->getFirst_Name()?>>
         </div>
         <div class="form-group" style="width:30%;">
             <label for="last_name" style="color:white;">Last Name</label>
             <input type="text" name="last_name" class="form-control" id="last_name"  value=<?php echo $u->getLast_Name()?>>
         </div>
         <div class="form-group" style="width:30%;">
             <label for="birthday" style="color:white;">Birthday</label>
             <input type="text" name="birthday" class="form-control" id="birthday"  value=<?php echo $u->getBirthday()?>>
         </div>
         <div class="form-group" style="width:30%;">
            <label for="InputEmail1" style="color:white;">Email</label>
            <input type="text" name="email1" class="form-control" id="email1"  value=<?php echo $u->getEmail()?>>
        </div>
         
         <div class="form-group" style="width:30%;">
             <label for="password1" style="color:white;">Password</label>
             <input type="password" name="password1" class="form-control" id="Password1" placeholder="New Password">
         </div>
         <div class="form-group" style="width:30%;">
             <label for="con-password" style="color:white;">Confirm Password</label>
             <input type="password" name="con-password" class="form-control" id="Re-Password" placeholder="Confirm Password">
         </div>
         <button type="cancel" class="btn btn-warning" name="cancel">Cancel</button>
         <button type="submit" class="btn btn-warning" name="saveEdits">Save Changes</button>
       </form>
       <?php
      }
      static function aboutPage()
      {?>
      <div class="container">
      <h4>ABOUT US</h4>
      <p class="font-weight-light" style="color:white">Welcome to Movie Hunter, your number one source for movie content. We're dedicated to giving you 
      the best information on latest movies. This web site was created as part of the CSIS 3280 Final Project by 'Ninja Turtles'
      The three minds behind this project are Anusha Das, Andre Sa and Adam McCallum. Hope this web site helps 
      all you movie buffs out there!
      </p></div>
      
      <?php
      }
      static function mymovies($mm, $lastclicked="", $msg)
      {?>
      <table class="table table-dark">
      <?php
      if($lastclicked != ""){
        $lastclicked = "&last=".$lastclicked;
      }
      echo '<h2>'.$msg.'</h2>';
      echo '<thead style="text-align:center; font-size:1.2em;">';
      echo '<tr>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=title'.$lastclicked.'">'."Title".'</th>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=year'.$lastclicked.'">'."Year".'</th>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=runtime'.$lastclicked.'">'."RunTime".'</th>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=genre'.$lastclicked.'">'."Genre".'</th>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=plot'.$lastclicked.'">'."Plot".'</th>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=rating'.$lastclicked.'">'."Rating".'</th>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=category'.$lastclicked.'">'."Category".'</th>';
      echo '<th><a class="linksort" href="'.$_SERVER['PHP_SELF'].'?sort=category'.$lastclicked.'">'."Delete".'</th>';
      echo '</tr>';
      echo '</thead>';

      echo '<tbody>';
      foreach($mm as  $movie)
      {
        
        echo '<tr>';
        echo '<td>'.$movie->getTitle().'</td>';
        echo '<td>'.$movie->getYear().'</td>';
        echo '<td>'.$movie->getRuntime()." Min.".'</td>';
        echo '<td>'.$movie->getGenre().'</td>';
        echo '<td>'.$movie->getPlot().'</td>';
        echo '<td>'.$movie->getRating().'</td>';
        echo '<td>'.$movie->getCategory().'<br><ul style="list-style:none;display:inline;">
        
        <li style="width:25px;height:25px;display:inline;">
        <a href="'.$_SERVER['PHP_SELF'].'?movie='.$movie->getIMDbID().'&action=edit">
        <img class="icons" style="width:25px;height:25px;display:inline;"src="templates/css/images/icons-edit.png" alt="not av">
        </li>
        
        '/*.<li style="width:25px;height:25px;display:inline;">
        <a href="'.$_SERVER['PHP_SELF'].'?movie='.$movie->getIMDbID().'&action=delete">
        <img class="icons" style="width:25px;height:25px;display:inline;" src="templates/css/images/icons-delete.png" alt="not av">
        </li>
        .*/;'
        </ul></td>';

        echo '<td>
        <form method="POST" action="'.$_SERVER['PHP_SELF'].'">
        <ul>
        <li style="width:25px;height:25px;display:inline;">
        <input type="hidden" name="deleteMovie" value="'.$movie->getIMDbID().'">
        <button type="submit" name="delete" style="border:0;background:transparent;">
        <img class="icons" style="width:25px;height:25px;display:inline;" src="templates/css/images/icons-delete.png" alt="not av">
        </li>

        </ul>
        </form>
        </td>';
        echo '</tr>';
      }
      echo '</tbody>';
      ?>
      </table>
      <?php
      }
      Static function showEditCategory($movie,$msg){ 
         echo '<div class="movie_detail">';
        echo '<table id="movie_detail" class="table table-dark">';

        echo '<tr>';
        echo  '<td rowspan="7"><img src="'.$movie->getPoster().'" alt="" /></td>' ;
        echo  '<th>'."Title:".'</th>' ;
        echo  '<td>'.$movie->getTitle().'</td>' ;
        echo '</tr>';

        echo '<tr>';
        echo  '<th>'."Year:".'</th>' ;
        echo  '<td>'.$movie->getYear().'</td>' ;
        echo '</tr>';
        echo '<tr>';

        echo  '<th>'."RunTime:".'</th>' ;
        echo  '<td>'.$movie->getRuntime().' minutes</td>' ;
        echo '</tr>';

        echo  '<th>'."Genre:".'</th>' ;
        echo  '<td>'.$movie->getGenre().'</td>' ;
        echo '</tr>';

        echo  '<th>'."Plot:".'</th>' ;
        echo  '<td>'.$movie->getPlot().'</td>' ;
        echo '</tr>';

        echo  '<th>'."IMDb Rating:".'</th>' ;
        echo  '<td>'.$movie->getRating().'</td>' ;
        echo '</tr>';

        echo  '<th>'."Category:".'</th>' ;
        echo  '<td>'.$movie->getCategory().'</td>' ;
        echo '</tr>';

        echo '</table>';

        echo '<form method="POST" ACTION="'. $_SERVER["PHP_SELF"] .'">';
        ?>
        
        <h2 style="color:white;">Edit Category</h2>
        <input type="hidden" name="IMDbID"value="<?php echo $movie->getIMDbID();?>">
        <input type="text" style="margin-bottom:10px;" name="movieCategory" value="<?php echo $movie ->getCategory();?>"> <br>
        <button type="cancel" class="btn btn-warning" name="type" value="return">Return</button>
        <button type="submit" class="btn btn-warning" name="type" value="editCategory">Complete Edit</button>
        

        <?php
        echo '</form>';

        echo '<h2 >'. $msg. '</h2>' ;
        
        
        echo '</div>';
        
        
      }

      Static function wmovies($Wm)
      {?>
      <br />
      <table class="table table-dark">
      <?php
      echo '<form method="POST" action="">';
      echo '<tr>';
      echo '<th>Title</th>';
      echo '<th>Date Watched</th>';
      echo '<th>Your Rate</th>';
      echo '</tr>'; 
      
      foreach($Wm as  $movie)
      {
        if(get_class($movie) == "Movies"){
          $m = HomePageDAO::getMovie($movie->getIMDbID());
        } else if (get_class($movie) == "WatchedMovies"){
           
          $user = UserDAO::getUserEmail($_SESSION['logged']);
         
    
          $m = MyMoviesDAO::getMovie2($movie->getIMDbID(),$user->getUserID());
       
        }
     
        echo '<tr>';
        echo '<td>'.$m->getTitle().'</td>';
        echo '<td>'.$movie->getDate().'</td>';
        echo '<td>'.$movie->getRate().'</td>';
        echo '<td><button type="submit" class="btn btn-warning" name="edit" value='.$movie->getWatchedID().'>Edit</button></td>';
        echo '<td><button type="submit" class="btn btn-warning" name="delete" value='.$movie->getWatchedID().'>Remove</button></td>';
        echo '</tr>';
      }
      echo '</form>';
      ?>
      </table>
      <?php
      }
      static function editWMovieRate($id)
      {?>
      <form method="POST" action="">
      <h4>Your Rating: </h4>

      <div class="input-group">
      
        <input type="decimal" name="userrate" id="userrate" min="1" max="10"/>
        <input type="hidden" name="hiddenWatchedID" value="<?php echo $id;?>">
        &nbsp<span class="input-group-addon"><button type="submit" class="btn btn-warning" name="saveEdits" onclick="window.location.href ='MovieHunter-WMovies.php'">Save</button></span>
      </div>
      </form>
      <?php
      }

}
?>