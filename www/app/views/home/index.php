<?php 
?>
<!DOCTYPE html>
<html lang="RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <script src="/assets/jquery/main.js"></script>
    <title>ООО НИР</title>
</head>
<body>
    <?php require('header.php');?>
    <div class="container">
        <form method='POST' action="/AddData" class="mt-5" > 
            <div class="form-group">
                <label for="nameHome">Наименование</label>
                <input type="text" name='name' class="form-control" id="nameHome" placeholder="Наименование дома" >
            </div>

            <div class="form-group">
                <label for="nameHome">Категория</label>
                <select name='cat[]' class="selected-category form-control" id="selected-category">
                    <?php 
                        //Вывод категорий из БД
                        echo $data[0];
                    ?>
                    <option value = "0">Добавить...</option>
                </select>
                <div id="add-selected-category"  class="row">
                    <div class="col-10">
                        <input class="input-add-category mt-2 form-control" type="text" placeholder='Добавте новую категорию'>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-warning  add__cat ">+</button>
                    </div>
                </div>
            </div>
        
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Порядковый номер</label>
                <div class="col-10">
                    <input class="form-control" type="number" name='num' value="1" id="example-number-input">
                </div>
            </div>

            <div id="add-groupe" class="row add-selected-groupe">
                <div class="col-10">
                    <input class="input-add-groupe mt-2 form-control" type="text" placeholder='Добавте новый элемент группа объектов'>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-warning  add__cat ">+</button>
                </div>
            </div>

            <div class="form-group block-inputs">
                <div class=" row block-input">
                    <div class="col-6 newBlock">
                        <label for="gpObg">Группа объектов</label>
                        <select name='gp[]' class="selected-groupe form-control">
                            <?php
                                //Вывод категорий из БД
                                echo $data[1];
                            ?>
                            <option value = "0">Добавить...</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="example-number-input" >Количество элементов в группе</label>
                        <input class="form-control" name='col[]' type="number" value="1" id="example-number-input">
                    </div>
                    <button type="button" class="btn btn-warning del__b m-2">-</button>
                    <button type="button" class="btn btn-warning  add__b m-2">+</button> 
                </div>

                
            </div>

            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
    
    
    
</body>
</html>