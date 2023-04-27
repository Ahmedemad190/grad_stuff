<?php
require_once 'inc/dbConnection.php';
require_once 'function.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
$query="select * from post";
$runQuery=mysqli_query($conn,$query);
if(mysqli_num_rows($runQuery) >0 ) 
{
$post= mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
$post=json_encode($post);
echo "<pre>";
print_r($post);
}
else {
    $msg= "No posts founded";
echo $msg;
}

} 
else {
msg("method not allowed",403);
}
?> 

