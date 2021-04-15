<?php 


$name = trim(htmlspecialchars($_POST['name']));
$cat = $_POST['cat'];
$num = trim(htmlspecialchars($_POST['num']));
$groupe = $_POST['gp'];
$col = $_POST['col'];


$_db = DB::getInstanse();

// ДОБАВЛЕНИЕ НОВЫХ ГРУПП ЕСЛИ ТАКИЕ ЕСТЬ
$query = $_db->query('SELECT * FROM `groupe` ');
$q = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($q as $i => $key){
    $groupe_id[] = $key['id'];
    $groupe_name[] = $key['groupe_name'];
}
// Сравниваем массивы из БД с полученым от пользователя
$add_new = array_diff($groupe, $groupe_id);

// Если есть новые группы тогда добавляем в БД
if (!empty($add_new)) {
    foreach($add_new as $new){
        //Проверка на повтор имени
        if (!in_array($new, $groupe_name)) {
            //Проверка на пустату
            if($new !== ''){
                $sql = "INSERT INTO `groupe` (`id`, `groupe_name`) VALUES(NULL, ?)";
                $query = $_db->prepare($sql);
                $query->execute([$new]);
            }
        } 
    }
}

// ДОБАВЛЕНИЕ НОВЫХ КАТЕГОРИЙ ЕСЛИ ТАКИЕ ЕСТЬ
$query = $_db->query('SELECT * FROM `cat` ');
$q = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($q as $i => $key){
    $cat_id[] = $key['id'];
    $cat_name[] = $key['cat_name'];
}

$add_new = array_diff($cat, $cat_id);

if (!empty($add_new)) {
    foreach($add_new as $new){
        //Проверка на повтор имени
        if (!in_array($new, $cat_name)) {
            //Проверка на пустату
            if($new !== ''){
                $sql = "INSERT INTO `cat` (`id`, `cat_name`) VALUES(NULL, ?)";
                $query = $_db->prepare($sql);
                $query->execute([$new]);
            }
        } 
    }
}  

//Проверка категории, и получения его id
$query = $_db->query('SELECT id FROM `cat` ');
$q = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($q as $i => $key){
    $cat_id[] = $key['id'];
}

if (!in_array($cat[0], $cat_id)) {
    $query = $_db->query("SELECT id FROM `cat` WHERE `cat_name` = '{$cat[0]}'");
    $cat = $query->fetch(PDO::FETCH_ASSOC);
    $cat = $cat['id']; 
}else{
    $cat = $cat[0];
}


//Проверка группы, и получения его id
$query = $_db->query('SELECT id FROM `groupe` ');
$q = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($q as $i => $key){
    $groupe_id[] = $key['id'];
}

for($i=0;$i <= count($groupe)-1;$i++){
    if (!in_array($groupe[$i], $groupe_id)) {
        $query = $_db->query("SELECT id FROM `groupe` WHERE `groupe_name` = '{$groupe[$i]}'");
        $gr = $query->fetch(PDO::FETCH_ASSOC);
        $groupe[$i] = $gr['id']; 
    }
}


//Добавление записей
$sql = "INSERT INTO `nir` (`id`, `name`, `id_cat`, `num`, `id_groupe`) VALUES (NULL, ?, ?, ?, ?);";
$query = $_db->prepare($sql);

for($i=0;$i <= count($col)-1;$i++){
    for($y=1;$y <= $col[$i];$y++){
        $query->execute([$name, $cat, $num, $groupe[$i]]);
    }
}


?>
<h2 text-align='center'>Данные добавлены</h2>
<meta http-equiv="refresh" content="3; url=http://localhost/"> 
