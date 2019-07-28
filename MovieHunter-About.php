<?php
    require_once("templates/Page.class.php");
    require_once("inc/Utilities/LoginManager.class.php");


    
    LoginManager::verifyLogin();
    Page::Header();
    Page::aboutPage();
    Page::Footer();






?>