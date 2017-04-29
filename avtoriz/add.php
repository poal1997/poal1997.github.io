<?php 
    require "db.php";
    session_start();
    if( !isset($_SESSION['logged_user']) )
    {
        header ('Location: /');
    }
?>
<html>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    
    <h2>Добавить новую модель</h2>
    <form method="get" action="add.php">
        Введите название новости:<br> 
        <input type="text" name="title" />
        Контент: <br> 
        <textarea name="content" cols="40" rows="10"></textarea>
        <input type="submit" name="add" value="Добавить">
    </form>

    
    <?php
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$title = isset($_REQUEST['title']) ? $_REQUEST['title'] : '';
	$content = isset($_REQUEST['content']) ? $_REQUEST['content'] : '';

	$dblink = mysql_connect($server, $user, $password);

	if($dblink)
	echo 'Соединение установлено.';
	else
	die('Ошибка подключения к серверу баз данных.');

	$database = 'my_first_blog';
	$selected = mysql_select_db($database, $dblink);
	if($selected)
	echo ' Подключение к базе данных прошло успешно.';
	else
	die(' База данных не найдена или отсутствует доступ.');
	?>
    
    <?php
    if(isset($_GET['add'])) { 
		mysql_query(" INSERT INTO posts(title, content, image) VALUES ('$title','$content', 'http://placehold.it/600x340')");
		mysql_close();
		echo "Новость успешно добавлена!";   
    }
    ?>
</body>
</html>