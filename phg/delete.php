<?php

define('DB_USER', "c19009"); // логин админа БД
define('DB_PASSWORD', "ZllsT7zv"); // пароль админа БД
define('DB_DATABASE', "c19009_main"); // база данных
define('DB_SERVER', "localhost"); // сервер 'localhost'
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

$sql = "UPDATE texts_zen SET status=-1 WHERE id=".$_POST['id'];
$result_downloads = $connection->query($sql);
$connection->close();

header("Location: index.php");

?>