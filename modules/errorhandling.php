<?php
$error = isset($_COOKIE["error"]) ? $_COOKIE["error"] : "";
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
        case "wrongcredentials":
            $text_error = "User doesn't exist or password is wrong";
            break;
        case "posterror":
            $text_error = "Some error occurred";
            break;
    }
    echo '<p class = "center" style="color: red">' . $text_error . '</p>';
    setcookie("error", "", time() - 90);
}
