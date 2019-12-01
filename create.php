<?php

abstract class CredentialType
{
    const USER = 'user';
    const PASS = 'pass';
    const EMAIL = 'email';
}

$user = $_POST['user'];
$email = $_POST['email'];
$password = md5($_POST['pass']);

$connect = @mysqli_connect("localhost", "root", "shambler_faust_10", "socialapp") or die("Não foi possível conectar ao banco de dados!");
@mysqli_select_db($connect, "socialapp") or die("Não foi possível selecionar o banco de dados!");
$user_query_select = "SELECT * FROM usuarios WHERE login = '$user'";
$email_query_select = "SELECT * FROM usuarios WHERE email = '$email'";
$user_select = @mysqli_query($connect, $user_query_select) or die("Não foi possível executar no banco de dados!");
$email_select = @mysqli_query($connect, $email_query_select) or die("Não foi possível executar no banco de dados!");
$user_array = mysqli_fetch_array($user_select);
$email_array = mysqli_fetch_array($email_select);
$logarray = $user_array['login'];
$emailarray = $email_array['email'];

if (check_credential($user, CredentialType::USER) || check_credential($password, CredentialType::PASS) || check_credential($email, CredentialType::EMAIL)) {
    echo "Insira dados válidos.";
} else {
    //Verifica se o email ou o nome do usuario estão sendo usados
    if ($logarray == $user || $emailarray == $email) {
        setcookie("error","alreadyexists");
        header("Location: /web/?page=register");
    } else {
        $query = "INSERT into usuarios(login,senha,email) VALUES ('$user','$password','$email')";
        $insert = @mysqli_query($connect, $query) or die("Não foi possível executar no banco de dados!");

        if ($insert) {
            setcookie("login", "true");
            $_SESSION["login"] = $user;
            $_SESSION["pass"] = $pass;
            header("Location: /web/");
        } else {
            echo "Não foi possível cadastrar.";
        }
    }
}

function check_credential($credential, $type)
{
    if (isset($credential) || !empty($credential)) {
        $pos_email = strpos($credential, "@");
        if (($type == CredentialType::USER & strlen($credential) < 4) || ($type == CredentialType::PASS & strlen($credential) < 10)  || ($type == CredentialType::EMAIL & $pos_email === false)) {
            return true;
        }
    }
    return false;
}
