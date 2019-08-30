<?php 
    session_start();
    // unset( $_SESSION['count']);
    // $_SESSION['count'] = 10;

    if( empty( $_SESSION['count'] ) ){
        $_SESSION['count'] = 1;    
    }else{
        $_SESSION['count']++;    
    }

    echo $_SESSION['count'];
?>