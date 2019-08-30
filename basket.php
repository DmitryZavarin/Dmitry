<?php 
    $headerConfig = [
        'title'=>'Корзина',
        'styles'=>['style.css', 'basket.css']
    ];
    include('modules/header.php');
    // unset($_SESSION['basket']);
    $template = [
        'products' =>[],
        'full_price' => 0
    ];

    if( !empty( $_SESSION['basket'] ) ){
        

        foreach ($_SESSION['basket']  as $basket_item) {
        $sql_basket_item = "SELECT * FROM products WHERE id = {$basket_item['id']}";
        $result_basket_item = mysqli_query($db, $sql_basket_item);
        $data_basket_item = mysqli_fetch_assoc($result_basket_item);
        $data_basket_item['quantity'] = $basket_item['quantity'];
        $data_basket_item['full_price'] = $basket_item['quantity'] * $data_basket_item['price'];
        $template['products'][] = $data_basket_item;


        $template[ 'full_price'] += $data_basket_item['full_price'];
      
        
        }

     
    }

   

    d( $template  );


?>

<div class="basket">

        <?php foreach( $template['products'] as $products):?>

        <div class="basket__item__name"><?=$products['name']?></div>
        <div class="basket__item__photo"  style="background-image:url(<?=$products['pic']?>)"></div>
        <div class="basket__item__price"><?=$products['full_price']?></div>
        <div class="basket__item__count"><?=$products['quantity']?></div>
       

        <?php endforeach;?>
    
    </div>



<?php 
    $footerConfig = [
        'scripts'=>['script.js', 'basket.js']    
    ];
    include('modules/footer.php');
?>