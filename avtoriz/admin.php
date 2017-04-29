<?php 
    require "db.php";
    session_start();
    if( !isset($_SESSION['logged_user']) )
    {
        header ('Location: /');
    }
?>
<h1>Админ панель:</h1>
<a href="add.php">Добавить запись</a>
<a href="edit.php">Редактировать запись</a>
<a href="del.php">Удалить запись</a>