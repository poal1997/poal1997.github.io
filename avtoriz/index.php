<?php 
    require "db.php";
    session_start();
?>
<?php if( isset($_SESSION['logged_user']) ) : ?>
    Привет, <?php echo $_SESSION['logged_user']->login; ?>!
    <hr>
    <a href="/logout.php">Выйти</a><br>
    <a href="/admin.php">Вход в админку</a>
<?php else : ?>
<a href="/login.php">Войти</a><br>
<a href="/signup.php">Регистрация</a>
<?php endif; ?>