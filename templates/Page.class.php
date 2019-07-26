<?php 

class Page{
    static function Header(){?>
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
        <li><a class="active" href="MovieHunter-Home.php">HOME</a></li>
        <li><a href="#">MY MOVIES</a></li>
        <li><a href="#">MY WATCHED MOVIES</a></li>
        <li><a href="#">MY ACCOUNT</a></li>
        <li><a href="#">ABOUT</a></li>
      </ul>
    </div>
    <div id="sub-navigation">
  
      <div id="search">
        <form action="#" method="get" accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="search field" placeholder="Search a Movie" id="search-field" class="blink search-field"  />
          <input type="text" name="year field" placeholder="Enter Year (Optional)" id="search-field" class="blink search-field"  />
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
          
          if($count<6){
            if($count==0){
              echo '<div class="Extended">';  
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailLatest&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';
              
            }
            elseif($count>0 && $count<5){
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailLatest&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';    
            }
            else{
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailLatest&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
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
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailLatest&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';
              
            }
            elseif($count>6 && $count<(sizeOf($topRated)-1)){
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailLatest&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
              echo  '<div class="rating">';
              echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
              echo     '</div>';
              echo '</div>';    
            }
            else{
              echo '<div class="movie">';
              echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailLatest&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
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
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailTopRated&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';
        
      }
      elseif($count>0 && $count<5){
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailTopRated&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';    
      }
      else{
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailTopRated&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
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
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailTopRated&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';
        
      }
      elseif($count>6 && $count<(sizeOf($topRated)-1)){
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailTopRated&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';    
      }
      else{
        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><a href="'.$_SERVER["PHP_SELF"].'?action=detailTopRated&MovieID='.$movie->getMovieID().'"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></a></span> <img src="'.$movie->getPoster().'" alt="Poster Missing" /></div>';
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


    static function Footer(){ ?>
        <div id="footer">
        <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
        <p class="rf">Design by <a href="http://chocotemplates.com/">ChocoTemplates.com</a></p>
        <div style="clear:both;"></div>
      </div>
    </div>
    <!-- END PAGE SOURCE -->
    </body>
    </html>



    <?php }

static function showLogin() { ?>
    <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
     <div class="form-group" style="width:30%;">
         <label for="email2" style="color:white;">Email</label>
         <input type="text" name="email2" class="form-control" id="exampleInputEmail1"  placeholder="Email">
     </div>
     <div class="form-group" style="width:30%;">
         <label for="password2" style="color:white;">Password</label>
         <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Password">
     </div>

     <button type="submit" class="btn btn-primary" value="Submit">Sign In</button>
   </form>
   <BR>
    <button type="button" class="btn btn-primary" onclick="window.location.href ='MovieHunter-SignUp.php'">Create New User</button>
 
     <?php }

     static function showCreateUser() { ?>
        <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
         <div class="form-group" style="width:30%;">
             <label for="first_name" style="color:white;">First Name</label>
             <input type="text" name="first_name" class="form-control" id="first_name"  placeholder="Enter First Name">
         </div>
         <div class="form-group" style="width:30%;">
             <label for="last_name" style="color:white;">Last Name</label>
             <input type="text" name="last_name" class="form-control" id="last_name"  placeholder="Enter Last Name">
         </div>
         <div class="form-group" style="width:30%;">
             <label for="birthday" style="color:white;">Birthday</label>
             <input type="text" name="birthday" class="form-control" id="birthday"  placeholder="Enter Yout Birthday">
         </div>
         <div class="form-group" style="width:30%;">
            <label for="InputEmail1" style="color:white;">Email</label>
            <input type="text" name="email1" class="form-control" id="email1"  placeholder="Enter Your Email">
        </div>
         
         <div class="form-group" style="width:30%;">
             <label for="password1" style="color:white;">Password</label>
             <input type="password" name="password1" class="form-control" id="Password1" placeholder="Enter Password">
         </div>
         <div class="form-group" style="width:30%;">
             <label for="con-password" style="color:white;">Confirm Password</label>
             <input type="password" name="con-password" class="form-control" id="Re-Password" placeholder="Confirm Password">
         </div>
        
         <button type="submit" class="btn btn-primary" value="Submit" >Sign Up</button>
       </form>
     
         <?php }




  static function MovieDetail(Movies $movie){
  echo '<div id="main">';
  echo '<div id="content">';

        echo '<div class="movie">';
        echo  '<div class="movie-image"> <span class="play"><span class="name">'.$movie->getTitle().'<BR>'.$movie->getYear().'</span></span> <a href="#"><img src="'.$movie->getPoster().'" alt="" /></a> </div>';
        echo  '<div class="rating">';
        echo    '<p>IMDb RATING '.$movie->getRating().'</p>';
        echo     '</div>';
        echo '</div>';


  echo '</div>';
  echo '</div>';


  
  }

}
?>