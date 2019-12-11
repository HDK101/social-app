<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Posts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <?php
    include "../header.php";

    $login_cookie = isset($_COOKIE["login"]) ? $_COOKIE["login"] : "";

    $page = isset($_GET['page']) ? $_GET['page'] : '';

    //$post_id = isset($_GET['id']) ? $_GET['id'] : '';

    /*Verifica se o usuário está logado, área restrista para não-logados*/
    if (!empty($login_cookie)) {
        if (!isset($_SESSION["login"]) & !isset($_SESSION["pass"])) {
            header("Location: /web/?logout=true");
        }
    } else {
        header("Location: /web/?logout=true");
    }

    include "../modules/pageget.php";

    switch ($page) {
        case "home":
            include "allposts.php";
            break;
        case "post":
            include "seepost.php";
            break;
    }

    include "../footer.php";
    ?>
</body>

</html>