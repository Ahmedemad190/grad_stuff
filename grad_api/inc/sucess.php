<?php

if (! empty ($_SESSION['sucess']))
{
    ?> 
    <alert class="alert alert-success"> <?php echo $_SESSION['sucess'];?></alert>
<?php }

unset($_SESSION['success']);
?> 