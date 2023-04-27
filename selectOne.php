<?php
require_once 'inc/dbConnection.php';
require_once 'function.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
$URI=$_SERVER['REQUEST_URI'];
$uriArray=explode("/",$URI);
$id=end($uriArray);
$query="select * from post where id ='$id'";
$runQuery=mysqli_query($conn,$query);
$post=mysqli_fetch_assoc($runQuery);
$post=json_encode($post);
printf($post);
} 
else 
{
    msg("method not allowed",403);
}
?>