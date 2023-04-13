<?php 
require_once 'inc/dbConnection.php';
require_once 'function.php';
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    // id 
    $uri = $_SERVER["REQUEST_URI"];
    $uriarray = explode("/", $uri);
    $id = end($uriarray);
    $title = $_POST['title'];
    $description = $_POST['description'];


    $query = "select * from post where id='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0) {
        $post = mysqli_fetch_assoc($result);
        $imageOld = $post['image'];
    } 
    else {
        msg("error not found",201);
        die();
    }
    if (isset($_FILES['image']['name'])) {
        $image = $_FILES['image'];
        $name = $image['name'];
        $tmp_name = $image['tmp_name'];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $newName = uniqid() . "." . $ext;
    } else {
        $newName = $imageOld;   
    }
    $updateQuery = "update post set `title`='$title',`description`='$description', `image`='$newName' where id='$id'";
    $runQuery = mysqli_query($conn, $updateQuery);
    if ($runQuery) {
        if (isset($_FILES['image']['name'])) {
            unlink("uploads/$imageOld");
            move_uploaded_file($tmp_name, "uploads/$newName");
        }
        msg("post update successfluy", 200); 
    }else{
        msg("post not found", 201); 
    }

 }
 else 
 {
    msg("method not correct",403);
 }
?>