<?php
    require_once("templates/Page.class.php");
    require_once("inc/config.inc.php");
    require_once("inc/Entities/User.class.php");
    require_once("inc/Utilities/PDOAgent.class.php");
    require_once("inc/Utilities/DAO/UserDAO.class.php");
    require_once("inc/Utilities/LoginManager.class.php");
    LoginManager::verifyLogin();
    Page::Header();
    UserDAO::initialize();
    //need to get id of current user
    $user = UserDAO::getUserEmail($_SESSION['logged']);
    if (!empty($_GET))    
    {
        //Perform the Action
        if ($_GET["action"] == "delete")  {
            UserDAO::deleteUser($_GET["id"]);
            $_SESSION['logged'] = null;
            header('Location: '.$_SERVER['PHP_SELF']);
        }
        else 
        {
            //Otherwise it was an edit
            Page::editAccountDetails($user);
        }
        
    
    }
    //Check for post data
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {     
        if(isset($_POST['saveEdits']))
        {
            $nu = new User();
            $nu->setUserID($_POST['id']);
            $nu->setFirst_Name($_POST['first_name']);
            $nu->setLast_Name($_POST['last_name']);
            $nu->setBirthday($_POST['birthday']);
            $nu->setEmail($_POST['email1']);
            if(!empty($_POST['con-password']))
            {
                $encryptedPW = password_hash($_POST['con-password'],PASSWORD_DEFAULT);
                $nu->setPassword($encryptedPW);
            }
            else
            $nu->setPassword($user->getPassword());
            UserDAO::updateUser($nu);
            header('Location: '.$_SERVER['PHP_SELF']);
        }
        if(isset($_POST['loggedOut']))
        {
<<<<<<< HEAD
            //NOT WORKING
            //$_SESSION['logged'] = null;
            //header('Location:MovieHunter-Login.php');
=======
            $_SESSION['logged'] = null;
            
            header('Location: '.$_SERVER['PHP_SELF']);
            
>>>>>>> fd778d547f39a587763c165cd4ed3402e18755c7
        }
    }

    if(empty($_GET))
    {
        Page::showAccountDetails($user);
    }
    
    Page::Footer();






?>