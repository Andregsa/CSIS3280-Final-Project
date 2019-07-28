<?php
//Validate User Input -- Needed for Log In
class Validation  {
  static function validateLogin($inputs) {
    foreach ($inputs as $input){
      $input = trim($input);
    
    }

    $errors = array();
    if(empty(trim($inputs['email2'])))
    {
      $errors[] = "Please enter an email";
    }
    if(empty(trim($inputs['password2'])))
    {
      $errors[] = "Please enter a password";
    }
    return $errors;
  }


   static function validateSignUp($inputs) {
    $errors = array();
    
    //Confirms all values were entered
    if(empty(trim($inputs['first_name'])))  {
      $errors[] = "Please enter a first name";
    }
    if(empty(trim($inputs['last_name']))) {
      $errors[] = "Please enter a last name";
    }

    //If they enter no birth date, then the formatting error
    //The incorrect birthdate format error will not appear
    $birthdayError = false;
    if(empty(trim($inputs['birthday'])))  {
      $errors[] = "Please enter a birthday";
      $birthdayError = true;
    }
    if(empty(trim($inputs['email1'])))  {
      $errors[] = "Please enter an email";
    }
    if(!filter_var($_POST["email1"],FILTER_VALIDATE_EMAIL)){
      $errors[] = "Please enter a correct format email";
  }
    if (empty(trim($inputs['password1'])))  {
      $errors[] = "Please enter a password";
    }
    if (empty(trim($inputs['con-password']))) {
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
        $today = date("Y"); 


        if(count($dates) == 3){
          for($i = 0; $i <= 2; $i++){

            if(!is_numeric($dates[$i])){
              $dateError = true;
            }
            else{

              $date =  $dates[$i]+0; //Adding 0 string is converted to an integer or float implicitly.
              if(!is_integer($date)){
                $dateError = true;
              }
            }
            
          }
        
          if ($dates[0]< 1900 || $dates[0] > $today){
            $dateError = true;
          }
          if($dates[1]==2 && $dates[2]>29){ //check if the user entered more then 29 in february month
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
