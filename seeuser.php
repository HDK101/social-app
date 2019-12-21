<div class="background-content">
    <div class="content-whitebox" style="overflow:hidden; width:90vw; max-width: 768px; margin:auto; height: 250px;">
        <div style="height: 250px; background-color: white; padding: 10px">
            <div style="width: 35%; float:left">
                <img src="img/profilepic.png" alt="Profile" class="img-auto-height img-fly-animation">
            </div>
            <div style="width: 65%; float:right;">
                <h1 class="lead-big center"><em style="color:rgb(48, 48, 48);">
                        <?php
                        echo strpos($name, '<script>') ? 'User' : $name;
                        ?></em>
                </h1>
                </div>
            </div>
        </div>
    </div>
</div>