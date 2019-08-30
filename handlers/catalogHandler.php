<?php 
    include ('../config/db.php');
    include ('../modules/functions.php');

    $response = [
        'products'=>[],
        'pagination'=>[
            'countPage'=> 1,
            'nowPage'=> 1
        ]
    ];

    $product_on_page = 3;
    $now_page = 1;

    if( !empty( $_GET['id'] ) ){
        if( !empty( $_GET['nowPage'] ) ){
            $now_page = $_GET['nowPage'];    
        }

        $sql_products_all = "SELECT products.* FROM products
        INNER JOIN catalogs_products ON catalogs_products.product_id = products.id
        WHERE catalogs_products.catalog_id = {$_GET['id']}
        ";

        $result_products_all = mysqli_query($db, $sql_products_all);
        $product_counts = mysqli_num_rows($result_products_all);

        //ceil - округление в большую сторону
        $count_page = ceil( $product_counts / $product_on_page );

        $response['pagination']['countPage'] = $count_page;
        $response['pagination']['nowPage'] = $now_page;

        $start_row_page = ($now_page - 1) * $product_on_page;

        $sql_products = "SELECT products.* FROM products
        INNER JOIN catalogs_products ON catalogs_products.product_id = products.id
        WHERE catalogs_products.catalog_id = {$_GET['id']}
        LIMIT {$start_row_page}, {$product_on_page}
        ";
        $result_products = mysqli_query($db, $sql_products);
        
        //кол-во записей в выборке
        $count = mysqli_num_rows($result_products);

        // $count = 4;
        while( $count > 0 ){
            $product = mysqli_fetch_assoc($result_products);
            $response['products'][] = $product;
            $count--;
        }
    }

    sleep(3);
    echo json_encode($response);
?>