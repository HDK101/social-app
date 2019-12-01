<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Login Page</title>
</head>

<body>
    <?php

    //Verifica se existe um parâmetro "page" no GET, "home" é a página principal
    $page = isset($_GET["page"]) ? $page = $_GET["page"] : "home";
    //Verifica se existe um parâmetro "logout" no GET, finalidade de deslogar o usuário ao apertar o Logout
    $logout = isset($_GET["logout"]) ? $_GET["logout"] : "";
    //Verifica se existe um parâmetro "login" no GET, finalidade de manter o usuário logado
    $login_cookie = isset($_COOKIE["login"]) & empty($logout) ? $_COOKIE["login"] : "";

    //Desloga o usuário
    if (!empty($logout)) {
        setcookie("login", "", time() - 3600);
        $login_cookie = "";
        header("Location: /web/");
    }
    
    include "header.php";

    if (empty($login_cookie)) {
        switch ($page) {
            case "home":
                include "home.php";
                break;
            case "login":
                include "login.php";
                break;
            case "register":
                include "register.php";
                break;
            default:
                echo "Page not found!";
                break;
        }
    } else {
        //Conecta o usuário se estiver com o cookie
        if (!empty($login_cookie)) {
            include "dashboard.php";
        }
    }

    include "footer.php";
    ?>
</body>

</html>