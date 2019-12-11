<div class="background-content">
    <div class="content-whitebox" style="overflow:hidden; width:90vw; max-width: 768px; margin:auto; height: 500px;">
        <div style="height: 50%; background-color: white; padding: 10px">
            <div style="width: 35%; float:left">
                <img src="img/profilepic.png" alt="Profile" class="img-auto-height img-fly-animation">
            </div>
            <div style="width: 65%; float:right;">
                <h1 class="lead-big center"><em style="color:rgb(48, 48, 48);">Welcome,
                        <?php
                        $welcome_name = isset($_SESSION['login']) ? $_SESSION['login'] : '';
                        echo strpos($welcome_name, '<script>') ? 'User' : $welcome_name;
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
        <div style="height: 50%; background-color: rgba(0.5,0.5,0.5,0.2)">

        </div>
    </div>
</div>