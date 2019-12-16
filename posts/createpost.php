<?php
session_start();

$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$session_login = isset($_SESSION['login']) ? $_SESSION['login'] : '';

$connect = @mysqli_connect("localhost", "root", "", "socialapp") or die("Não foi possível conectar ao banco de dados!");
@mysqli_select_db($connect, "socialapp") or die("Não foi possível selecionar o banco de dados!");

/*Busca o ID do usuário logado no banco de dados*/
$query_id = "SELECT ID FROM usuarios WHERE email= '$session_login'";
$select = mysqli_query($connect, $query_id);
$array = mysqli_fetch_assoc($select);

$id = intval($array['ID']);

/*Cria a postagem*/
$query_insert = "INSERT INTO posts(userid, title, content) VALUES ('$id','$title','$content')";
$insert = mysqli_query($connect, $query_insert);

if ($insert) {
    $post_id = mysqli_insert_id($connect);
    header("Location: /web/posts/?page=post&id=$post_id");
} else {
    setcookie('error', "posterror");
    header('Location: /web/posts/');
}
