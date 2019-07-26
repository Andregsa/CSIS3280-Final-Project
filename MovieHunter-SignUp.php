<?php
    require_once("inc/config.inc.php");
    require_once("templates/Page.class.php");
    require_once("inc/Utilities/Validation.class.php");
    require_once("inc/Entities/User.class.php");
    require_once("inc/Utilities/PDOAgent.class.php");
    require_once("inc/Utilities/UserDAO.class.php");
  


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
            $u->setPassword(password_hash($_POST['password1'], PASSWORD_DEFAULT));
            UserDAO::createUser($u);
            header('Location: '."MovieHunter-Login.php");
        }

    }
    Page::showCreateUser($errors);
    Page::Footer();
?>