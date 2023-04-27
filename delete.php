<?php 
require_once 'inc/dbConnection.php';
require_once 'function.php';

if($_SERVER['REQUEST_METHOD']=='DELETE')
{
    $URI=$_SERVER['REQUEST_URI'];
    $uriArray=explode("/",$URI);
    $id=end($uriArray);
    $query="select * from post where id=$id";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $post=mysqli_fetch_assoc($result);
        $image=$post['image'];
    
        unlink("uploads/$image");        
        $query="delete from post where id=$id";
       $runQuery= mysqli_query($conn,$query);
        if($runQuery)
        {
            msg("post deleted successfully",200);
        }
        else {
            msg("error while deleting",201);
        }
       
    }
    else {
        msg("post not found",404 );
    }
}else 
{ 
    msg("method not allowed",403);
}


?>