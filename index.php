<?php
require_once 'inc/dbConnection.php';
/*
$query="select * from post";
$result=mysqli_query($conn,$query);
var_dump($result);
$post= mysqli_fetch_all($result,MYSQLI_ASSOC);
$post=json_encode($post);
echo "<pre>";
var_dump($post);
echo '</pre>';
?>*/
$query="delete from post  where id ='1'";
$runQuery=mysqli_query($conn,$query);

if($runQuery){
    echo "data deleted successfully";
}else {
    echo "error";
}