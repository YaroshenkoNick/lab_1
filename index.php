<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign In/Up Form</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
if($_COOKIE['user'] == ''): // Если в ассоциативном массиве переданном через HTTP Cookie нету куки с именем user то выводится 2 формы

?>

<div class="container">
    <div class="main__forms">
        <div class="sign__form">
            <div class="title">Войти</div>
            <form action="validation-form/login.php" method="post">
                <input class="form_input" name="login" placeholder="Логин" type="text"/>
                <input class="form_input" name="pass" placeholder="Пароль" type="password"/>
                <button type="submit">Вход</button>
            </form>


        </div>

        <div class="sign__form">
            <div class="title">Зарегистрироваться</div>
            <form action="validation-form/check.php" method="post">
                <input class="form_input" name="login" placeholder="Логин" type="text"/>
                <input class="form_input" name="pass" placeholder="Пароль" type="password"/>
                <input class="form_input" name="repass" placeholder="Повторить пароль" type="password"/>
                <button type="submit">Зарегистрироваться</button>
            </form>

        </div>
    </div>
</div>


<?php
else: // если была найдена такая кука то выводится следущее
    ?>
    <p class="hello__user">
        Здравствуйте <?=$_COOKIE['user']?><br>
        <a href="/exit.php"><button style="margin-top: 40px" type="button">Выход
            </button>
        </a>
    </p>
<?php
endif;
?>


</body>
</html>
