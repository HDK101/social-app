<?php

$user = $_POST["user"];
$pass = md5($_POST["pass"]);

$connect = @mysqli_connect("localhost", "root", "shambler_faust_10", "socialapp") or die("Não foi possível conectar ao banco de dados!");
@mysqli_select_db($connect, "socialapp") or die("Não foi possível selecionar o banco de dados!");

if (isset($user)) {
    /*Seleciona o usuário do banco de dados e verifica se a senha está correta*/
    $query_select = "SELECT * FROM usuarios WHERE login = '$user' AND senha = '$pass'";
    $select = mysqli_query($connect, $query_select);

    if (mysqli_num_rows($select) > 0) {
        setcookie("login",$user,time() + 1800);
        header("Location: /web/");
    } else {
        echo "Senha inválida ou usuário inexistente!";
    }
}
