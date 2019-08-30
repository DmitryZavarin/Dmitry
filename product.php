<?php 
    $headerConfig = [
        'title'=>'Карточка товара',
        'styles'=>['style.css', 'product.css']
    ];
    include('modules/header.php');

    $template = [];
    if( !empty( $_GET['id'] ) ){
        $sql_product = "SELECT * FROM products WHERE id={$_GET['id']}";
        $result_product = mysqli_query($db, $sql_product);
        $data_product = mysqli_fetch_assoc($result_product);
        $template = $data_product;
    }else{
        header('Location: /catalog.php?id=1');
    }

    // d( $template );
?>
<h1><?=$template['name']?></h1>
<button data-id="<?=$template['id']?>">Добавить в корзину</button>
<?php 
    $footerConfig = [
        'scripts'=>['script.js', 'product.js']    
    ];
    include('modules/footer.php');
?>