<?php
//Validate User Input -- Needed for Log In
class Validation  {
  static function validateLogin($inputs) {
    foreach ($inputs as $input){
      $input = trim($input);
    
    }

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

    //If they enter no birth date, then the formatting error
    //The incorrect birthdate format error will not appear
    $birthdayError = false;
    if(empty($inputs['birthday']))  {
      $errors[] = "Please enter a birthday";
      $birthdayError = true;
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

    //If there's is a birthday entered
    //Then it checks if the format is right
    if($birthdayError == false) {
        $dates = array();
        $dates = explode("-",$inputs['birthday']);
        $dateError = false;

        if(count($dates) == 3){
          for($i = 0; $i <= 2; $i++){
            $dates[$i] = intval($dates[$i]);
            
            if(is_integer($dates[$i])){ 
              } else {
                $dateError = true;
              }
            }
        
            if (10000 <= $dates[0] || $dates[0] <= 999){
              $dateError = true;
            }
            if (13 <= $dates[1] || $dates[1] <= 0){
              $dateError = true;
            }
            if (32 <= $dates[2] || $dates[2] <= 0){
              $dateError = true;
            }
        }
        
        if(count($dates) != 3 || $dateError == true){
          $errors[] = "Incorrect Birthday Format";
        }
    }
     
    
    return $errors;
  }
  
}
?>
