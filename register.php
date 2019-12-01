<div class="background-content" style="height:65vh">
    <div class="content-whitebox" style="width:90vw; max-width: 540px">
        <div class="login-content">
            <br>
            <br>
            <form action="/web/create.php" method="post">
                <h1 style="margin-bottom: 30px" class="center lead-big">Register</h1>
                <label class="label center">User:</label>
                <input class="center input-text-style" type="text" name="user">
                <br>
                <label class="label center">Email:</label>
                <input class="center input-text-style" type="text" name="email">
                <br>
                <label class="label center">Pass:</label>
                <input class="center input-text-style" type="password" name="pass">
                <div class="center"><a class="lead" href="?page=login">Already registered?</a></div>
                <br>
                <?php
                $error = isset($_GET["error"]) ? $_GET["error"] : "";
                $text_error = "";
                if (!empty($error)) {
                    switch ($error) {
                        case "alreadyexists":
                            $text_error = "Account already exists.";
                            break;
                        case "invalidpassword":
                            $text_error = "Password must be higher than 10 characters.";
                            break;
                        case "invaliduser":
                            $text_error = "User must be higher than 5 characters.";
                            break;
                        case "invalidemail":
                            $text_error = "Email is required.";
                            break;
                    }
                    echo '<p class = "center" style="color: red">' . $text_error . '</p>';
                }
                ?>
                    <input style="margin-top: 20px; margin-bottom: 20px" class="center button-styles orange" value="Register" type="submit">
            </form>
        </div>
    </div>
</div>