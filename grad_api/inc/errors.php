<?php 
if (! empty($_SESSION['errors'])) 
{
    foreach($_SESSION['errors'] as $error){?>
    <alert class="alert alert-danger"> <?php echo ($error) ?></alert>
<?php }
}
unset($_SESSION['errors']);
?>