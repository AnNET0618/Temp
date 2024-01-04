<?php
    $login = filter_var(trim($_POST['login']),
                       FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),
                       FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
                       FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 5 || mb_strlen($login) > 100){
    echo "Недопустимая длина логина(от 5 до 100 символов)";
    exit();
}else if(mb_strlen($name) < 2 || mb_strlen($name) > 100){
    echo "Недопустимая длина имени";
    exit();
}else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 25){
    echo "Недопустимая длина пароля (от 4 до 25 символов)";
    exit();
}

$pass = md5($pass."ahfdi6952");
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd', '8889');
$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$pass', '$name')");
echo "Вы зарегистрированы!";
$mysql->close();
?>