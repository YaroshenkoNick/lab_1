<?php
    setcookie('user', $user['login'], time() - 3600, "/"); // удаляет куки
    header('Location: /'); // переадресация на главную страницу
?>
