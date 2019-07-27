<?php
    require_once("inc/config.inc.php");
    require_once("templates/Page.class.php");
    require_once("inc/Utilities/LoginManager.class.php");
    require_once("inc/Utilities/Validation.class.php");
    require_once("inc/Entities/User.class.php");
    require_once("inc/Utilities/PDOAgent.class.php");
    require_once("inc/Utilities/DAO/UserDAO.class.php");
    
    
    UserDAO::initialize();
    Page::Header();
   
    $errors = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = Validation::validateLogin($_POST);
        if(empty($errors)) {
            try {
    
            //Error starts here if the return type of getUserEmail is User
            //So you'll have to change the type to User to test
            //Since I didn't want to commit the error
            if(UserDAO::getUserEmail($_POST['email2']) == false || UserDAO::getUserEmail($_POST['email2']) == null){
                throw new exception ("Incorrect username");
            } else {
                $user = UserDAO::getUserEmail($_POST['email2']);
             
            }
       
                if($user != null && $user->verifyPassword($_POST['password2']) == true)
                {
                    session_start();
                    var_dump($_POST['email2']);
                    $_SESSION['logged'] = $_POST['email2'];
                    header('Location: '."MovieHunter-Home.php");

                } else 
                {
                    throw new exception ("Incorrect username or password");
                } 

            } catch (exception $ex)    {
                echo $ex->getMessage();
            }
            
        }
    }


    if (!empty($_GET))    {
        if(isset($_GET["SignUpMsg"])){
           $msg = $_GET["SignUpMsg"]."<BR>Please Sign In";
        }
    }

    Page::showLogin($errors,$msg);
    Page::Footer();






?>