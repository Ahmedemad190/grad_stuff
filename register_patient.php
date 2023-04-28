<?php
require_once 'inc/dbConnection.php';
?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') 
{
    //data
    extract($_POST);

    //validation
    $errors =[];
    //userName => required | string | min 3
    if($name == "")
    {
       $errors[]="  name is required";
    }
    elseif(!is_string($name))
    {
      $errors[]="  name must be string";
    }
    elseif(strlen($name)<3)
    {
      $errors[]=" name must be more than 3 char";
    }
    //email => required | email | unique
    if($email == "")
    { 
      echo "<br>";
       $errors[]="   email is required";
       echo "<br>";
    }
    elseif( !filter_var($email,FILTER_VALIDATE_EMAIL))
    {
      $errors[]="  email not valid";
    }
    $checkEmail="select * from patient where `email`= '$email'";
    $runcheckEmail=mysqli_query($conn,$checkEmail);
    $emailRows=mysqli_num_rows($runcheckEmail);
    if($emailRows>0)
    {
      $errors[]="email already exists";
    }
    //password => required | min:4
    if($password == "")
    {
       $errors[]=" password is required";
    }
    elseif(strlen($password)<4)
    {
      $errors[]=" password must be more than 4";
    }


    //phone => required | phone number | unique
    $phoneRegex = "/^01[0,1,2,5][0-9]{8}$/";   

    if($phone == "")
    {
       $errors[]="  phone is required";
    }
    elseif(preg_match($phoneRegex,$phone) !=1)
    {
      $errors[]="phone number not valid";
    }
    $checkphone="select * from patient where `phone`='$phone'";
    $runcheck_phone=mysqli_query($conn,$checkphone);
   $phoneRows=mysqli_num_rows($runcheck_phone);
   if($phoneRows >0 )
   {
    $errors[]="  phone already exist";
   }

    //address => required
    if($address == "")
    {
       $errors[]="address is required";
    }
    if(empty($errors))
    {
      $password=password_hash($password,PASSWORD_BCRYPT);
      $newUser="insert into patient(`name`,`email`,`password`,`phone`,`address`) values('$name','$email','$password','$phone','$address')";
      $runQuery=mysqli_query($conn,$newUser); 
   /*  if($runQuery)
     {
<div class="alert alert-success">
  <strong>inserted</strong> Indicates a successful or positive action.
</div>       
     }else {
      echo "inserted failed";
     } 
     */

     echo "welcome patient";

    }
    else
    {
      foreach($errors as $error)
      {  
        echo $error;
             
      }
    }

}
?>
