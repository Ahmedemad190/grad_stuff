<?php 

function msg (string $msg, int $code)
{
echo json_encode($msg);
http_response_code($code);
}
?>