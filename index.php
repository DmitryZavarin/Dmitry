<?php 
    $headerConfig = [
        'title'=>'Главная страница',
        'styles'=>['style.css', 'main.css']
    ];
    include('modules/header.php');
?>

<?php 
    $footerConfig = [
        'scripts'=>['script.js', 'main.js']    
    ];
    include('modules/footer.php');
?>