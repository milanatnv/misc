<?php
    require "functions.php";
    require "header.php";
    
    $p = isset($_REQUEST['p']) ? $_REQUEST['p'] : 'login';
    if (!api_user_logged_in()) $p = 'login';
        
    require $p . ".php";
    
    
    
    require "footer.php";
?>