<?php 
require_once 'inc/dbConnection.php';
require_once 'function.php';
if($_GET['page'] && ["row_per_page"])
{

$page=$_GET["page"]; 
$limit=5; 
$limit=$_GET["row_per_page"];
$offset=($page-1) * $limit;
$begin=($page * $limit) - $limit;
$sql="SELECT `title`,`description`,`image`,`created_at` FROM post LIMIT {$limit} offset {$offset} ";
$runQuery=mysqli_query($conn,$sql); 
$data=array();
$query="select count(id) as total from post";
$runQuery_2= mysqli_query($conn,$query);
if(mysqli_num_rows($runQuery_2) == 1) {
    $post= mysqli_fetch_assoc($runQuery_2);
    $total=$post['total'];
}
$number_of_pages= ceil($total / $limit) ;
while($post= mysqli_fetch_all($runQuery,MYSQLI_ASSOC))
{
$data[]=$post;
}
if(count($data)>0)
{
    echo "<pre>";
    echo json_encode($data);
    echo json_encode("total number of page = $number_of_pages" );

} else {
    msg("data not found",404);
}

}

?>

