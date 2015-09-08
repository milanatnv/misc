<?php
    
    session_start();
    define('RESTRICTED', 1);
    $_EMAIL = "admin";
    $_PASSWORD = "admin";
    
    

    function api_user_logged_in() {
        if (isset($_SESSION['logged_in']))
            return $_SESSION['logged_in'];
        else
            return 0;
    }    
    function login($email, $password) {
        global $_EMAIL, $_PASSWORD;
        if ($email == $_EMAIL && $password == $_PASSWORD) {
            $_SESSION['logged_in'] = 1;   
            return 1;
        }
        else
            return 0;
    }
    function showAlert($message) {
        echo "<script type='text/javascript'>alert('$message');</script>";    
    }
    function redirectPage($name) {
        echo "<script type='text/javascript'>window.location.href ='$name'</script>";
    }
    function has_files_to_upload( $id ) {
        return ( ! empty( $_FILES ) ) && isset( $_FILES[ $id ] );
    }                                              
    
    
 
?>