
<?php require_once './protected/config/config.php' ?>
<?php

if (!filter_has_var(INPUT_GET, 'U')) {
    
    header('Location:'.BASE_URL);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" 
    integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
    <title>Login</title>
</head>
    <body class="login_body">
        <div class="login_div">
                <h1>Login</h1>
                <div class="login_inside_div">
                    <form action="" method="post">
                        <div class="input_field">
                            <input type="text" name="username" required>
                            <label>Username</label>
                        </div>
                        <div class="input_field">
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="submit">
                        <input type="submit" name="" value="Login">
                        </div>
                        <div class="signup_link">
                            Not a member?</br>
                             <a href="#">Signup</a>
                        </div>
                    </form>
            </div>
        </div>
    </body>
</html>
