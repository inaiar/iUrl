<?php
require_once("config.php");
if($_POST){
    if($_POST['username'] && $_POST['password']){
        $result = checkLogin($_POST['username'],$_POST['password']);
        if($result){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['isadmin'] = checkAdmin($_POST['username'],$_POST['password']);
            $_SESSION['isdeclaredadmin'] = checkDeclaredAmin($_POST['username'],$_POST['password']);
            header('Location: dashboard');
        }else{
            $error = 'invalid credentials!';
        }
    }else{
        $error = 'fill all the filelds ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>LOG IN</title>
</head>
<body style="font-family: 'Ubuntu', sans-serif;">
    <div class="container is-fluid">
        <?php if($error){ ?>
        <div class="notification is-danger m-4">
            <button class="delete"></button>
            <p><?php echo $error; ?></p>
        </div>
        <?php } ?>
        <form action="login.php" method="post" class="section is-medium is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
            <div class="field">
                <p>Enter your username:</p>
                <input class="input" name="username" placeholder="Username">
            </div>
            <div class="field">
                <p>Enter your password:</p>
                <input class="input" name="password" placeholder="Password">
            </div>
            <div class="field">
                <button class="button is-success" type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>