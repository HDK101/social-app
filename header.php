<header>
    <div style="float: left; height: 100%;">
        <a class="logopage" href="/web/?page=home">
        <img class="logo" draggable="false" src="/web/img/blueguy.svg" alt="Logo">
    </a>
    </div>
    <?php
    if(!isset($_COOKIE["login"])){
    echo '<div style="float: right; padding-top: 2vh">
        <a class="lead-medium link-header" style="font-size: 4vh" href="/web/?page=login">Login</a>
        <a class="lead-medium link-header" style="font-size: 4vh" href="/web/?page=register">Register</a>
    </div>';
    }
    else{
        echo '<div style="float: right; padding-top: 2vh">
        <a class="lead-medium link-header" style="font-size: 4vh" href="/web/?logout=true">Logout</a>
    </div>';
    }
    ?>
    <div style="clear: both;"></div>
</header>