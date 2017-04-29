<?php
require "avtoriz/db.php";
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Справочник тегов для языка HTML</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body style="background-image: url(image/1.jpg);">
	<div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Открыть навигацию</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Логотип</a>
            </div>
            <div class="collapse navbar-collapse" id="responsive-menu">
                <ul class="nav navbar-nav">
                    <li><a href="#">Пункт 1</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Пункт 2 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Пункт 1</a></li>
                            <li><a href="#">Пункт 2</a></li>
                            <li><a href="#">Пункт 3</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Пункт 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Пункт 3</a></li>
                    <li><a href="#">Пункт 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container" style="width: 450px; margin: 0 auto;">
        <?php 
            session_start();
            $data = $_POST;
            if( isset($data['do_login']) )
            {
                $errors = array();
                $user = R::findOne('users', 'login = ?', array($data['login']));
                if ( $user )
                {
                    // логин сущ
                    if( password_verify($data['password'], $user->password) )
                    {
                        // логиним пользователя если все хорошо
                        $_SESSION['logged_user'] = $user;
                        header ('Location: /');
                    } else
                    {
                        $errors[] = 'Неправильный пароль!';
                    }
                }
                else 
                {
                    //не сущ
                    $errors[] = 'Пользователь с таким именем не найден!';
                }

                if( !empty($errors) )
                {
                    echo '<div class="alert alert-danger alert-dismissible">
                                         <button class="close" type="button" data-dismiss="alert">
                                             <i class="fa fa-times fa-fw"></i>
                                         </button>
                                         '.array_shift($errors).'
                                      </div>';
                }
            }
        ob_end_flush();
        ?>
        <form action="login.php" method="post">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" placeholder="Имя пользователя" name="login" value="<?php echo @$data['login']; ?>" required autofocus />
            </div>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" placeholder="Ваш пароль" name="password" value="<?php echo @$data['password']; ?>" required />
            </div><br>
            <p align="right">
                <button type="submit" name="do_login" class="btn btn-success" style="padding-top: 0;padding-bottom: 0;">
                    <span style="position: relative;left: -12px;display: inline-block;padding: 6px 12px;background: rgba(0,0,0,0.15);border-radius: 3px 0 0 3px;"><i class="glyphicon glyphicon-ok"></i></span>Войти
                </button>
            </p>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/salvattore.min.js"></script>
</body>
</html>