<?php 
$email = isset($_SESSION['login']) ? $_SESSION['login'] : '';

$connect = @mysqli_connect("localhost", "root", "", "socialapp") or die("Não foi possível conectar ao banco de dados");
@mysqli_select_db($connect, "socialapp") or die("Não foi possível selecionar o banco de dados");

$query = "SELECT login FROM usuarios WHERE email = '{$email}'";
$select = mysqli_query($connect,$query);
$name = mysqli_fetch_assoc($select)['login'];

?>
<div class="background-content">
    <div class="content-whitebox" style="overflow:hidden; width:90vw; max-width: 768px; margin:auto; height: 350px;">
        <div style="height: 250px; background-color: white; padding: 10px">
            <div style="width: 35%; float:left">
                <img src="img/profilepic.png" alt="Profile" class="img-auto-height img-fly-animation">
            </div>
            <div style="width: 65%; float:right;">
                <h1 class="lead-big center">Welcome,<em style="color:rgb(48, 48, 48);">
                        <?php
                        echo strpos($name, '<script>') ? 'User' : $name;
                        ?></em>
                </h1>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div style="background-color:aqua; width: 300px; margin: auto; height: 30px">
                <a class="button-styles green center" style="display:block; width: 100%;" href="/web/posts">Create post</a>
                </div>
            </div>
        </div>
        <div style="height: 100px; background-color: rgba(0.5,0.5,0.5,0.2)">

        </div>
    </div>
</div>