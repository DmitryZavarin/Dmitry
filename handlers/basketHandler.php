<?php
    include ('../config/db.php');
    include ('../modules/functions.php');

    if( !empty( $_GET['id'] ) ){
        if( empty( $_SESSION['basket'] ) ){
            $_SESSION['basket'] = [];    
        }

        $is_find = false;
        foreach($_SESSION['basket'] as $key=>$basketItem){
            if( $basketItem['id'] == $_GET['id'] ){
                $_SESSION['basket'][$key]['quantity']++;  
                $is_find = true;  
            }
        }

        if($is_find == false){
            $_SESSION['basket'][] = [
                'id'=> $_GET['id'],
                'quantity'=> 1
            ];
        }
        
    }

    $quantity = 0;
    if( !empty( $_SESSION['basket'] ) ){
        foreach( $_SESSION['basket'] as $basketItem ){
            $quantity = $quantity + $basketItem['quantity'];  
        }    
    }

    echo $quantity;
?>