<!-- BEM -->
<!-- block element modificator -->
<!-- GULP GRANT WEBPACK -->
<!-- BEM GULP  -->

<?php
    slava.zhukov@gmail.com
    session_start();
    session_destroy();
?>

<?php if ( $_SESSION['admin'] ):?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Добавление товара</title>
  </head>
  <body>
    
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <h1>Добавление товара</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 text-white">
                <nav class="nav flex-column">
                    <a class="nav-link active bg-primary text-white" href="/admin/productList">Товары магазина</a>
                    <a class="nav-link" href="#">Заказы</a>
                    <a class="nav-link" href="#">Пользователи</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Документация</a>
                </nav>
            </div>
            <div class="col-9">
                <form method="POST" enctype="multipart/form-data" action="/admin/handlers/addProductHandler">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Название товара</label>
                        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Куртка белая">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Стоимость товара</label>
                        <input name="price" type="number" class="form-control" id="exampleFormControlInput2" placeholder="5500">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Категория товара</label>
                        <select name="category" class="form-control" id="exampleFormControlSelect1">
                            <option>Женщинам -> Куртки</option>
                            <option>Женщинам -> Обувь</option>
                            <option>Мужчинам -> Куртки</option>
                            <option>Мужчинам -> Футболки</option>
                            <option>Детям -> Шапки</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Выберите размер</label>
                        <select name="size[]" multiple class="form-control" id="exampleFormControlSelect2">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Выберите фото</label>
                        <input name="pic[]" type="file" multiple class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Описание товара</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Добавить товар</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php else: ?>

<h1>Идите вон!</h1>

<?php endif;?>