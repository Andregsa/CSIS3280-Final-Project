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
            //Log the message
            error_log("UserID: ".$user->getUserID()." Deleted his Account" . " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER); 
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

            //Log the message
            error_log("UserID: ".$user->getUserID()." Updated his Account: "
            ."Fn: ".$_POST['first_name']
            ."/ Ln: ".$_POST['last_name']
            ."/ BOD: ".$_POST['birthday']
            ."/ Email: ".$_POST['email1']
            ."/ Password: ".$encryptedPW
            
            . " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER); 

        }
        if(isset($_POST['loggedOut']))
        {
            $_SESSION['logged'] = null;
            
            header('Location: '.$_SERVER['PHP_SELF']);
            
        }
    }

    if(empty($_GET))
    {
        Page::showAccountDetails($user);
    }
    
    Page::Footer();






?>