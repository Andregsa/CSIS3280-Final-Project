<?php
    require_once("inc/config.inc.php");
    require_once("templates/Page.class.php");
    require_once("inc/Utilities/Validation.class.php");
    require_once("inc/Entities/User.class.php");
    require_once("inc/Utilities/LoginManager.class.php");
    require_once("inc/Utilities/PDOAgent.class.php");
    require_once("inc/Utilities/DAO/UserDAO.class.php");
  


    UserDAO::initialize();
    Page::Header();
    $errors = array();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //Confirms no input errors
        $errors = Validation::validateSignUp($_POST);
      
        //If there's no errors, create their account and redirect them to the login page
        if (empty($errors)){
            $u = new User();
            
            $u->setFirst_Name($_POST['first_name']);
            $u->setLast_Name($_POST['last_name']);
            $u->setBirthday($_POST['birthday']);
            $u->setEmail($_POST['email1']);
            $encryptedPW = password_hash($_POST['password1'],PASSWORD_DEFAULT);
            $u->setPassword($encryptedPW);
         
            if(UserDAO::getUserEmail($_POST['email1'])==false){
                $newUserID = UserDAO::createUser($u);
                header('Location: '."MovieHunter-Login.php?SignUpMsg=Account%20Created%20Successfully!");
                error_log("New User Created! ID: ".$newUserID.
                " Account Informatio: "
                ."Fn: ".$_POST['first_name']
                ."/ Ln: ".$_POST['last_name']
                ."/ BOD: ".$_POST['birthday']
                ."/ Email: ".$_POST['email1']
                ."/ Password: ".$encryptedPW.
                " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER); 
            }
            else{
                $errors[]="This email is already being used!";
                 //Log the message
                error_log("SignUp Message: ".$errors[0]
                ." / Email: ".$_POST['email1']. " at ". date('m/d/Y H:i:s', time()). "\n",3, LOG_FILEUSER); 

            }
            
        }

    }
    
    Page::showCreateUser($errors);
    Page::Footer();
?>