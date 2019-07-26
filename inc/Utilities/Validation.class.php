<?php
//Validate User Input -- Needed for Log In
class Validation  {
  static function validateLogin($inputs) {
    $errors = array();
    if(empty($inputs['email2']))
    {
      $errors[] = "Please enter an email";
    }
    if(empty($inputs['password2']))
    {
      $errors[] = "Please enter a password";
    }
    return $errors;
  }


   static function validateSignUp($inputs) {
    $errors = array();
    
    //Confirms all values were entered
    if(empty($inputs['first_name']))  {
      $errors[] = "Please enter a first name";
    }
    if(empty($inputs['last_name'])) {
      $errors[] = "Please enter a last name";
    }
    if(empty($inputs['birthday']))  {
      $errors[] = "Please enter a birthday";
    }
    if(empty($inputs['email1']))  {
      $errors[] = "Please enter an email";
    }
    if (empty($inputs['password1']))  {
      $errors[] = "Please enter a password";
    }
    if (empty($inputs['con-password'])) {
      $errors[] = "Please confirm a password";
    }

    //Password and password confirmation must be the same
    if(!empty($inputs['password1']) && !empty($inputs['con-password'])){
      if($inputs['password1'] != $inputs['con-password'] ){
        $errors[] = "Make sure both passwords are the same";
      }
    }
    
    return $errors;
  }
  
}
?>
