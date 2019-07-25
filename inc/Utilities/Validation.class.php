<?php
//Validate User Input -- Needed for Log In
class Validate($inputs)
{
  function validateLogin($inputs)
  {
    $errors = array();
    if(empty($inputs['username']))
    {
      $errors = "Please enter a username";
    }
    if(empty($inputs['password']))
    {
      $errors = "Please enter a password";
    }
    return $errors;
  }
   function validateSignUp($inputs)
  {
    $errors = array();
    if(empty($inputs['username']))
    {
      $errors = "Please enter a username";
    }
    if(empty($inputs['password']))
    {
      $errors = "Please enter a password";
    }
    return $errors;
  }
  
}
?>
