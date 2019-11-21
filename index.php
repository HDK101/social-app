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

    include "header.php";

    $page = "home";

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

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

    include "footer.php";
    ?>
</body>

</html>