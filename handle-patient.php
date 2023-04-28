<?php 
require_once 'inc/dbConnection.php';

if ($_SERVER['REQUEST_METHOD']=='POST') { 

    extract($_POST);
    $errors=[];

    if(empty ($email))
    {
        $errors=["email is required"];
    } elseif(! filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $errors= ["email not valid"];
    } elseif(empty($password))
     {
        $errors=["password is required"];
     }elseif(strlen($password) < 6 )
     {
        $errors=["password is less than 6 chars"];
     }
  if( empty($errors))
   {
    $query="select * from patient where email='$email'";
    $runQuery=mysqli_query($conn,$query);
    if($runQuery) 
    {
        if(mysqli_num_rows($runQuery) ==1 )
        {
            $user=mysqli_fetch_assoc($runQuery);
            $user_name=$user['name'];
            $old_password=$user['password'];
            $is_valid=password_verify($password,$old_password);
            if($is_valid) 
            { 
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['sucess'] = "welcome $user_name";
                echo json_encode("welcome $user_name");
            } else 
            {
                $_SESSION['errors']=["credintials not correct"];
                echo json_encode("credintials not correct");
            }
        } else 
        {
            $_SESSION['errors']=["this account not exist"];
            echo json_encode("this account not exist");
        }
    }
   } else 
   {
    $_SESSION['errors']=$errors;
   }   

 } 
  else 
 {
echo "error not found";
 }
?>