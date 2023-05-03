<?php

define('DB_USER', ""); // логин админа БД
define('DB_PASSWORD', ""); // пароль админа БД
define('DB_DATABASE', ""); // база данных
define('DB_SERVER', "localhost"); // сервер 'localhost'
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

$sql = "UPDATE texts_zen SET suggestio=".$_POST['suggestio'].", modus=".$_POST['modus'].", status=1 WHERE id=".$_POST['id'];
$result_downloads = $connection->query($sql);
$connection->close();

header("Location: index.php");

?>