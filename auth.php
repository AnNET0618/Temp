<?php
    $login = filter_var(trim($_POST['login']),
                       FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
                       FILTER_SANITIZE_STRING);


//$pass = md5($pass."ahfdi6952");

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd', '8889');

$result = $mysql->query("SELECT * FROM `users` WHERE (`login` = '$login' AND `pass` = '$pass')");

$user = $result->fetch_assoc();
if(empty($user))
{
   echo "Пользователь не найден!"; 
    exit();
}
else
{
    echo "Вы авторизованы!";
    exit();
}

$mysql->close();
?> 