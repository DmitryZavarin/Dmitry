<?php 
    $headerConfig = [
        'title'=>'Каталог',
        'styles'=>['style.css', 'catalog.css']
    ];
    include('modules/header.php');

    $template = [
        'title'=>'Мужчинам',
        'id'=>1,
        'products'=> []
    ];

    if( !empty( $_GET['id'] ) ){
        // Формируем запрос к БД
        $sql_catalog = "SELECT * FROM catalogs WHERE id = {$_GET['id']}";
        
        //Отправляем запрос в БД и получаем результат
        $result_catalog = mysqli_query($db, $sql_catalog);

        //Преобразуем результат к ассоц. массиву
        $catalog = mysqli_fetch_assoc($result_catalog);

        //Заполняем значения массива $template значениями из БД
        $template['title'] = $catalog['name'];
        $template['id'] = $catalog['id'];

    }
?>

<div data-catalog-id="<?=$template['id']?>" class="catalog">
    <h1 class="catalog-head"><?=$template['title']?></h1>
    <div class="catalog-desc">Все товары</div>
    <div class="catalog-filters"></div>
    <div class="catalog-products"></div>
    <div class="catalog-pagination"></div>
    <div class="catalog-preloader">Загрузка</div>
</div>

<?php 
    $footerConfig = [
        'scripts'=>['script.js', 'catalog.js']    
    ];
    include('modules/footer.php');
?>