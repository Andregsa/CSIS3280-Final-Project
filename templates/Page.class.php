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
    <h1 id="logo"><a href="#">MovieHunter</a></h1>
   
    <div id="navigation">
      <ul>
        <li><a class="active" href="#">HOME</a></li>
        <li><a href="#">MY MOVIES</a></li>
        <li><a href="#">MY WATCHED MOVIES</a></li>
        <li><a href="#">MY ACCOUNT</a></li>
        <li><a href="#">ABOUT</a></li>
      </ul>
    </div>
    <div id="sub-navigation">
      <ul>
        <li><a href="#">SHOW ALL</a></li>
        <li><a href="#">LATEST TRAILERS</a></li>
        <li><a href="#">TOP RATED</a></li>
        <li><a href="#">MOST COMMENTED</a></li>
      </ul>
      <div id="search">
        <form action="#" method="get" accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="search field" placeholder="Enter search here" id="search-field" class="blink search-field"  />
          <input type="text" name="year field" placeholder="Enter year here" id="search-field" class="blink search-field"  />
          <input type="submit" value="GO!" class="search-button" />
        </form>
      </div>
    </div>
  </div>


    <?php }


static function MainPage($movie){ ?>
    <div id="main">
    <div id="content">
      <div class="box">
        <div class="head">
          <h2>LATEST TRAILERS</h2>
          <p class="text-right"><a href="#">See all</a></p>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">X-MAN</span></span> <a href="#"><img src="<?php echo $movie?>" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">SPIDER MAN 2</span></span> <a href="#"><img src="templates/css/images/movie2.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">SPIDER MAN 3</span></span> <a href="#"><img src="templates/css/images/movie3.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">VALKYRIE</span></span> <a href="#"><img src="templates/css/images/movie4.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">GLADIATOR</span></span> <a href="#"><img src="templates/css/images/movie5.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie last">
          <div class="movie-image"> <span class="play"><span class="name">ICE AGE</span></span> <a href="#"><img src="templates/css/images/movie6.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>TOP RATED</h2>
          <p class="text-right"><a href="#">See all</a></p>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">TRANSFORMERS</span></span> <a href="#"><img src="templates/css/images/movie7.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">MAGNETO</span></span> <a href="#"><img src="templates/css/images/movie8.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">KUNG FU PANDA</span></span> <a href="#"><img src="templates/css/images/movie9.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">EAGLE EYE</span></span> <a href="#"><img src="templates/css/images/movie10.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">NARNIA</span></span> <a href="#"><img src="templates/css/images/movie11.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie last">
          <div class="movie-image"> <span class="play"><span class="name">ANGELS &amp; DEMONS</span></span> <a href="#"><img src="templates/css/images/movie12.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>MOST COMMENTED</h2>
          <p class="text-right"><a href="#">See all</a></p>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">HOUSE</span></span> <a href="#"><img src="templates/css/images/movie13.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">VACANCY</span></span> <a href="#"><img src="templates/css/images/movie14.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">MIRRORS</span></span> <a href="#"><img src="templates/css/images/movie15.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">THE KINGDOM</span></span> <a href="#"><img src="templates/css/images/movie16.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie">
          <div class="movie-image"> <span class="play"><span class="name">MOTIVES</span></span> <a href="#"><img src="templates/css/images/movie17.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie last">
          <div class="movie-image"> <span class="play"><span class="name">THE PRESTIGE</span></span> <a href="#"><img src="templates/css/images/movie18.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="cl">&nbsp;</div>
      </div>
    </div>
   
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

}
?>