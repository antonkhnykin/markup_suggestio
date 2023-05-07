<?php

define('DB_USER', "c19009"); // логин админа БД
define('DB_PASSWORD', "ZllsT7zv"); // пароль админа БД
define('DB_DATABASE', "c19009_main"); // база данных
define('DB_SERVER', "localhost"); // сервер 'localhost'
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

$voc = iconv("UTF-8", "windows-1251", $_POST['vocab']);

$sql = "UPDATE texts_zen SET suggestio=".$_POST['suggestio'].", modus=".$_POST['modus'].", status=1, dt=now(), vocab='".$voc."' WHERE id=".$_POST['id'];
$result_downloads = $connection->query($sql);
$connection->close();

header("Location: index.php");

?>