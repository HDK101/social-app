<div class="background-content" style="height:65vh">
    <div class="content-whitebox" style="width:90vw; max-width: 540px;">
        <div class="login-content">
            <br>
            <br>
            <form action="/web/enter.php" method="post">
                <h1 style="margin-bottom: 30px" class="center lead-big">Login</h1>
                <label class="label center">Email:</label>
                <input class="center input-text-style" type="email" name="email">
                <br>
                <label class="label center">Pass:</label>
                <input class="center input-text-style" type="password" name="pass">
                <div class="center"><a class="lead" href="?page=forgot">Forgot password?</a></div>
                <?php 
                include "modules/errorhandling.php";
                ?>
                <input style="margin-top: 20px; margin-bottom: 20px" class="center button-styles orange" value="Login" type="submit">
                <br>
                <br>
                <br>
                <br>
            </form>
        </div>
    </div>
</div>