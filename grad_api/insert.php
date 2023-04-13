<?php 
require_once 'inc/dbConnection.php';
require_once 'function.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $title=trim(htmlspecialchars($_POST['title']));
    $description=trim(htmlspecialchars($_POST['description']));
    $user_id=trim(htmlspecialchars($_POST['user_id']));
    $errors=[];
    $success=[];
    if(empty($title)) 
    {
        $errors[]="your name is required";
    } 
    elseif(is_numeric($title)) 
    {
        $errors[]="ur title must be  string";
    } 
    elseif(strlen($title)<3) 
    {
        $errors[]="your title is less than 3 chars";
    } 
    if(empty($description)) 
    {
        $errors[]="your description is required";
    } 
    elseif(is_numeric($description)) 
    {
        $errors[]="ur description must be  string";
    } 
    elseif(strlen($description<3)) 
    {
        $errors[]="your description is less than 3 chars";
    } 
    if(! empty($_FILES['image']['name'])) 
    {
        $image=$_FILES['image'];
        $name=$image['name'];
        $tmp_name=$image['tmp_name'];
        $error=$image['error'];
        $size=$image['size']/(1024*1024); 
        $ext=strtoupper(pathinfo($name,PATHINFO_EXTENSION));
        $arr=["PNG","JPG","JPEG"];
        if($error !=0) 
        {
            $errors[]="chosse correct image";
        } 
        elseif( $size >1) 
        {
            $errors[]="image large size" ;
        }
        elseif(! in_array($ext , $arr)) 
        {
            $errors[]="image not correct" ;
        } 
        $random=uniqid().time();
        $newName=$random.".".$ext;
    } 
    else 
    {
        $errors[]="please insert image";
    }
    if(empty($errors))
    {
        $query="INSERT INTO post(`title`,`description`,`image`,`user_id`)
values('$title','$description','$newName','$user_id')";
$runQuery=mysqli_query($conn,$query);    
if($runQuery){
    move_uploaded_file($tmp_name,"uploads/$newName");
    msg("inserted successfully",200);
}

} 
else 
{
    msg("error while inserting",201);
}
} 

else{
 msg("method not allowed",403);       
}
?>